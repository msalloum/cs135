<?php

/* load words into array */
function loadWords() {
  
}


function startGame() {
  
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
  
}

function handleGuess() {
  
}

?>
