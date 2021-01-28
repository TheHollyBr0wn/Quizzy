<?php 
// Establish database connection...
$servername = "localhost";
$username = "quiz";
$password = "quiz";
$dbname = "quiz";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, "quiz");

?>