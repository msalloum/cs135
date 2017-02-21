<?php

/* load words into array */
function loadWords() {
  global $words;
  global $numwords;
  $input = fopen("./words.txt", "r");

  while (true) {
    $str = fgets($input);
    if (!$str) break;
    $words[] = rtrim($str);
    $numwords++;
  }

  fclose($input);
}


function startGame() {
  global $words;
  global $numwords;
  global $hang;

  $whichWord = rand(0, $numwords - 1);
  $word =  $words[$whichWord];
  $wordLen = strlen($word);
  $guesstemplate = str_repeat('_ ', $wordLen);
  $script = $_SERVER["PHP_SELF"];

  printPage($guesstemplate, $whichWord, "", 0);
}



function consoleLoser($word) {
  echo <<<ENDPAGE
      <!DOCTYPE html>
      <html>
        <head>
          <title>Hangman</title>
        </head>
        <body>
          <h1>You lost!</h1>
          <p>The word you were trying to guess was <em> $word </em>. </p>
        </body>
      </html>
ENDPAGE;
}

function congratulateWinner($word) {
  echo <<<ENDPAGE
      <!DOCTYPE html>
      <html>
      <head>
        <title>Snowman</title>
      </head>
      <body>
        <h1>You win!</h1>
        <p>Congratulations! You guessed that the word was <em>$word</em>.</p>
      </body>
      </html>
ENDPAGE;
}

/* Evaluate guess against word */
function matchLetters($word, $guessedLetters) {
  $len = strlen($word);

  $guesstemplate = str_repeat("_ ", $len);

  for ($i = 0; $i < $len; $i++) {
    $ch = strtolower($word[$i]);
    if (strstr($guessedLetters, $ch)) {
      $pos = 2 * $i;
      $guesstemplate[$pos] = $ch;
    }
  }

  return $guesstemplate;
}

function handleGuess() {
  global $words;
  

  $which = $_POST["word"]; 
  $word  = $words[$which];
  $wrong = $_POST["wrong"];
  $lettersguessed = $_POST["lettersguessed"];
  $guess = $_POST["letter"];
  $letter = strtolower($guess[0]);

  if(!strstr($word, $letter)) { // increment counter if wrong guess
    $wrong++;
  }

  $lettersguessed = $lettersguessed . $letter; // add guessed letter to list
  $guesstemplate = matchLetters($word, $lettersguessed); // display guessed letters in word

  if (!strstr($guesstemplate, "_")) {
    congratulateWinner($word);
  } else if ($wrong >= 9) {
    consoleLoser($word);
  } else {
    printPage($guesstemplate, $which, $lettersguessed, $wrong);
  }
}

?>
