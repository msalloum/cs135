<?php

/* This function chooses an element from the array, and
 * forms the question. 
 */
function createQuestion($element){	
	$question = array_rand($element);

	echo "
	<fieldset>
	<legend>Your challenge</legend>
		<form method='get'>
			<h3>What is the symbol for " . $element[$question] . "</h3>" . 
			"<input type='hidden' name='question' value=' " . $question . "'/>" . 
			createMenu($element, "answer") .  
			"<input name='go' type='submit' value='I got this!'/>
		</form>
	</fieldset>";
}

function createResult($element){

	$question = trim($_GET['question']);
	$askedQuestion = $element[$question];
	$answer = $_GET['answer'];
	$message = "";
	
	if ($element[$answer] == $askedQuestion){
		$message = "RIGHT!!!  The symbol for " . $askedQuestion . " is ".  $answer . ".";
	} else {
		echo "The result " . $askedQuestion . " => " . $element;
		$correct = array_search($askedQuestion, $element);
		$message = "Wrong, the symbol for " . $askedQuestion . "is not " . $answer . "!" .   
			       "The symbol for " . $askedQuestion . "is " . $correct . "!!";
	}

	echo "
	<fieldset>
		<legend>And you are...</legend>"  . 
		$message . 
	"</fieldset>";
}

function createMenu($qarray, $menuname){
	$menu =  "<select name='" . $menuname . "'>";
	foreach ($qarray as $key => $value) {
		$menu .= "<option value='" . $key . "'>" . $key . "</option>";
	}
	$menu .= "</select>";
	return $menu;
}
?>