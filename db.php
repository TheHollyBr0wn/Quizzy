<?php
$servername = "localhost";
$username = "quiz";
$password = "quiz";
$dbname = "quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tblquestions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["qtext"]. " - Name: " . $row["an1"]. " " . $row["an2"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>