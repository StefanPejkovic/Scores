<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$name = "scores";

	$conn = mysqli_connect($servername, $username, $password, $name);

	if (!$conn) {
	die("Error, unable to connect: " . mysqli_connect_error());
	}

?>