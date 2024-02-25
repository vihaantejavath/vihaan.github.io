<?php
// Check if the QR data and time are received
if(isset($_POST['qr_data']) && isset($_POST['time'])) {
    // Get the QR data and time
    $qrData = $_POST['qr_data'];
    $time = $_POST['time'];
    
    // Connect to MySQL server
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = "Vihaan@32"; // Replace with your MySQL password
    $dbname = "regi";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape special characters to prevent SQL injection
    $qrData = $conn->real_escape_string($qrData);
    $time = $conn->real_escape_string($time);

    // Insert QR data and time into 'qr' table
    $sql = "INSERT INTO qr (qr_data, time) VALUES ('$qrData', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "QR data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "QR data or time not received";
}
?>
