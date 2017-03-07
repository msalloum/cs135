<?php
	include('dbconn.php');
?>

<!DOCTYPE html>
	<head>
	<title>Selecting Multiple Records</title>
	</head>
	<body>
		<?php

			$dbc = connect_to_db( "IMDB" );	
			$query = "SELECT title, year FROM Movie";
			$result = perform_query( $dbc, $query );
			
			echo "Num Results:" . mysqli_num_rows($result);
			echo "<ul>\n";
			while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
			
				$title = $row['title'];
				$year  = $row['year'];
			   
				echo "<li>$title  $year </li>\n";
			}
			echo "</ul>\n";

			disconnect_from_db( $dbc, $result );
		?>
	</body>
</html>
