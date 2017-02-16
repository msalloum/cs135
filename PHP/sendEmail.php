<html>


<body>

<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$to = "mariam.salloum@gmail.com";
		$subject = "Comments email";
		$name = $_POST["name"];
		$comment = $_POST["comment"];
		$message = "
		<html>
			<head>
				<title>HTML email</title>
			</head>
			<body>
				<p>This email is from " . $name . "</p>

				<p> Comments: " . $comment . " </p>
				
			</body>
		</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <mariam.salloum@gmail.com>' . "\r\n";
		$headers .= 'Cc: mariam.salloum@gmail.com' . "\r\n";

		
		mail($to,$subject,$message,$headers);
	}
?>




	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  
    
	    Name: <input type="text" name="name">
	    <br><br>

	    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
	  
	    <input type="submit" name="submit" value="Submit" >  
  	</form>



</body>
</html>

