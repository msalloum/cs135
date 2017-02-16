<?php

$days = array("mon"=>"1st day", "tue"=>"2nd day", "wed" => "3rd day");

// foreach : iterating through the values
foreach ($days as $value) {
	echo $value . "<br>";
}


// foreach : iterating though values AND the keys
foreach ($days as $key => $value) {
	echo "Day of Week: " . $key . " = " . $value . "<hr><br\>";
}

?>
