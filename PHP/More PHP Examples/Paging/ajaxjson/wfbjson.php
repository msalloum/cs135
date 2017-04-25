<?php // note that this is not a complete page.
	
	$dbc = @mysqli_connect("localhost", "root", "root", "pagingEX")
	       or die("Could not open  db, " . mysqli_connect_error());
	$countryName = $_GET['countryName'];
	$query = "select CountryName, Imports, Exports from countries 
						where CountryName='$countryName'";
	$result = mysqli_query($dbc, $query);
	if ( mysqli_num_rows( $result ) == 0 ) {
		die("$country not found in database");
	}
	$row = mysqli_fetch_array($result);
	$country_data = array('countryInfo' => $row);
	echo json_encode($country_data);
	mysqli_close($dbc);
