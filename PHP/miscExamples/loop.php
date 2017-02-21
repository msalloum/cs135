<?php

$days = array(0=>"mon", 1=>"tue", 2=>"wed", 3=>"thur", 4=>"fri");

//while loop
$i=0;
while ($i < count($days)) {
	echo $days[$i] . "<br>";
	$i++;
}

//do while loop
$i =0;
do {
	echo $days[$i] . "<br>";
	$i++;
} while ($i < count($days));

// for loop
for ($i=0; $i<count($days); $i++) {
	echo $days[$i] . "<br>";
}

?>
