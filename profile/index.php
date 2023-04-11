<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "username", "password", "database_name");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Fetch user data from database
$user_id = 1; // Replace with dynamic user id
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// Convert user data to JSON format
	$row = mysqli_fetch_assoc($result);
	$user_data = array(
		"name" => $row["name"],
		"email" => $row["email"],
		"phone" => $row["phone"],
			"address" => $row["address"]
	);
	echo json_encode($user_data);
} else {
	echo "User not found";
}

// Close database connection
mysqli_close($conn);
?>
