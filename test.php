<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root";
$password = "Vihaan@32"; 
$dbname = "regi"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$roll_number = $_POST['roll-number'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$badminton_time_slot = $_POST['badminton-time-slot'];
$gym_time_slot = $_POST['gym-time-slot'];

$sql = "INSERT INTO students (name, roll_number, email, phone, badminton_time_slot, gym_time_slot)
        VALUES ('$name', '$roll_number', '$email', '$phone', '$badminton_time_slot', '$gym_time_slot')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
