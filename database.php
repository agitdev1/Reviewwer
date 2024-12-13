<?php
// Server name must be localhost
$servername = "localhost";
// user name will be root
$username = "root";
// Password is empty
$password = "";

// Creating a connection
$conn = new mysqli($servername,
			$username, $password);

// Check connection
if ($conn->connect_error) {
	die("Connection failure: "
		. $conn->connect_error);
}

// Creating a database named geekdata
$sql = "CREATE DATABASE WEBSYS";
if ($conn->query($sql) === TRUE) {
	echo "Database for WEBSYS database is created";
} else {
	echo "Error: " . $conn->error;
}

// Closing connection
$conn->close();
?>
