<?php
	include('dbconn.php');
?>

<!DOCTYPE html>
	<head>
		<title>Creating a drop down</title>
	</head>

	<body>
		<pre> <?php print_r($_GET);?> </pre>

		<?php

		if ( isset( $_GET['submitted'] ) )
			handle_form( $_GET['Movies'] );
		
		display_form( "Movies" );

		?>
	</body>
</html>



<?php
function handle_form( $id ){
	echo "********** $id ************** <br><br>";
	$dbc    = connect_to_db( "imdb" );	
	$query  = "SELECT * FROM Movie WHERE movieid = $id ";
	$result = perform_query( $dbc, $query );

	#$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
	
	#echo "********** <br>";
	#print_r($row);
	#echo "********** <br>";
	echo "<ul>\n";
	while ( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
			
		$title = $row['title'];
		$year  = $row['year'];
		$director  = $row['director'];
			   
		echo "<li>Title: $title, Year: $year, Director: $director </li>\n";
	}
	echo "</ul>\n";
	
	disconnect_from_db( $dbc, $result );
}

function display_form( $menuname ){
	echo '<form method = "get">';
	create_select( $menuname );
	echo '<input type="submit" name="submitted" value="Go!"></form>';
}

function create_select( $menuname ){

	echo "<select name= '$menuname'>\n";
	$dbc    = connect_to_db( "imdb" );	
	$query  = "SELECT title, year, movieid FROM MOVIE";
	$result = perform_query( $dbc, $query );
	
	while ($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )){
	
		$title = $row['title'];
		$year  = $row['year'];
		$movieid = $row['movieid'];
	   
	   	if ( isset( $_GET[$menuname] ) && ( $_GET[$menuname]==$movieid ) )
			echo "<option value = '$movieid' selected> $title  $year </option>\n";
		else
			echo "<option value = '$movieid'> $title  $year </option>\n";
	}
		
	echo "</select>";
	disconnect_from_db( $dbc, $result );
}

