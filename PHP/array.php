<?php

$days = array();
$days[0] = "Mon"; // set 0th key's value to "Mon"
$days[1] = "Tue";

// also alternate approach 

$daysB = array();
$daysB[] = "Mon" ; //set the next sequential value to “Mon”
$daysB[] = "Tue" ;

/* To access values in an array you refer to their 
key using the square bracket notation. */

echo "Value at index 1 is " . $days[1] . "<br>"; 


$days = array("Mon","Tue","Wed","Thu","Fri");
$days[7] = "Sat";
print_r($days); //prints Array ([0] => Mon [1] => Tue [2] => Wed [3] => Thu [4] => Fri [7] => Sat)

//If we try referencing $days[6], it will return a NULL value

unset($days[2]);
unset($days[3]);

print_r($days); // outputs : Array ([0]=>Mon, [1]=>Tue, [4]=>Fri)

$days = array_values($days);
print_r($days); // outputs : Array ([0]=>Mon, [1]=>Tue, [2]=>Fri)

$oddKeys = array (1=> "hello", 3 => "world", 5=> "!");
if (isset($oddKeys[0])) {
	// the code below will never be reached since $oddKeys[0] is not set!
	echo "there is something set for key 0";
}
if (isset($oddKeys[1])) {
	// This code will run since a key/value pair was defined for key 1
	echo "there is something set for key 1 " . $oddKeys[1];
}




?>
