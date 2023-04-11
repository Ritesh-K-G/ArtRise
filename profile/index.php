<?php

// Set up the database connection
$host = "localhost";
$username = "your_username_here";
$password = "your_password_here";
$dbname = "your_database_name_here";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Fetch the user data from the database
$sql = "SELECT * FROM users WHERE id = 1"; // Replace 1 with the actual user ID
$result = mysqli_query($conn, $sql);

// Check if any results were returned
if (mysqli_num_rows($result) > 0) {
	// Fetch the first row of data (should be the only one)
	$row = mysqli_fetch_assoc($result);

	// Format the user data as JSON and return it to the client
	header("Content-Type: application/json");
	echo json_encode($row);
} else {
	// No results were found
	echo "No results found.";
}

// Close the database connection
mysqli_close($conn);

?>
