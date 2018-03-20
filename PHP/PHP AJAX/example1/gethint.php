<?php

// Array with names
$a = array ("Anna","Brittany", "Cindy","Diana","Emily","Fiona",
	        "Gabriella","Helen","India","Johanna","Katy","Linda","Nina", 
            "Ophelia","Petunia","Amanda","Raquel","Cora","Doris","Eve","Evita",
            "Sandy","Farah","Rebecca", "Michele","Maria", "Isha","Violet","Liza","Elizabeth","Ellen","Wenche","Vicky");

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>