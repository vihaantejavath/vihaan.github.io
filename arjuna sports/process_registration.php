<?php
$servername = "localhost";
$username = "root";
$password = "Vihaan@32";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$slot = $_POST['slot'];

// Prepare SQL statement
$sql = "INSERT INTO registrations (name, slot) VALUES ('$name', '$slot')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
