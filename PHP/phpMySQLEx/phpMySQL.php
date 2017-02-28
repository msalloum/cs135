<?php 

	// Define database connection details via constants 
	define('DBHOST',"localhost"); 
	define('DBNAME', "bookstore");
	define('DBUSER',"mariam");
	define('DBPASS',"salloum");

	$connection = new mysqli(DBHOST, DBNAME, DBUSER, DBPASS);
	if ($conn->connect_error) {
		$output = "<p>Unable to connect to database </p>" . $error;
		exit($output);
	} else {
		$output = "<p>Connected to database </p>" . $error;
	}
	echo $output;
?>
