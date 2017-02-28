<?php 

	// Define database connection details via constants 
	define('DBHOST',"localhost"); 
	define('DBNAME', "bookstore");
	define('DBUSER',"mariam");
	define('DBPASS',"salloum");

	$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

	if ($conn->connect_error) {
		$output = "<p>Unable to connect to database </p>" . $conn->connect_error;
		exit($output);
	} else {
		$output = "<p>Connected to database </p>";
	}
	echo $output;
?>
