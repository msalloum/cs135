<?php

$words = array();
$numwords = 0;

include_once 'snowmanFunc.php';

function printPage($guesstemplate, $which, $guessed, $wrong) {
  echo <<<ENDPAGE
<!DOCTYPE html>
<html>
  <head>
	<title>Snowman</title>
  </head>
</html>
<body>
  <h1>SnowmanGame</h1> <br />
  <pre><img src='images/snowman$wrong.png' /></pre>
  <br />
  <p><strong>Word to guess: $guesstemplate</strong></p>
  <p>Letters used in guesses so far: $guessed</p>

  <form method="post" action="$script">
	<input type="hidden" name="wrong" value="$wrong" />
	<input type="hidden" name="lettersguessed" value="$guessed" />
	<input type="hidden" name="word" value="$which" />
	<fieldset>
	  <legend>Your next guess</legend>
	  <input type="text" name="letter" autofocus />
	  <input type="submit" value="Guess" />
	</fieldset>
  </form>
</body>
ENDPAGE;
}

//-----------------------------------------------------------------------------

loadWords();  // Read words from file

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {
  handleGuess();
} else {
  startGame();
}

?>
