<!DOCTYPE html>
	<head>
		<title>Using functions to connect</title>
	</head>

	<body>
		<?php
			include ('dbconn.php');

			$dbc = connect_to_db( "imdb" );	
			$query = "SELECT * FROM Movie WHERE title='Avatar'";
			$result = perform_query( $dbc, $query );
			
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo  "<pre>"; print_r($row); echo "</pre>";
			
			$title = $row['title'];
			$year  = $row['year'];
			echo "Result of query is Title: $title Year: $year";
			
			disconnect_from_db( $dbc, $result );
		?>
	</body>
</html>
