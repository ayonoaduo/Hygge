<?php 

	$conn = new mysqli("localhost", "ayonoado", "Friday9", "ayonoado");

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


	$sql = "CREATE TABLE Hygge (
	email VARCHAR(255) NOT NULL,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(30) NOT NULL,
	retype_pswd VARCHAR(30) NOT NULL,
	PRIMARY KEY (email)
	)";

	if ($conn->query($sql) === TRUE) {
	    echo "Table User created successfully";
	} else {
	    echo "Error creating table: " . $conn->error;
	}

	$conn->close();




?>
