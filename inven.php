<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $equipment_name = $_POST['equipment_name'];
    $quantity = $_POST['quantity'];

    // Connect to MySQL server
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = "Vihaan@32"; // Replace with your MySQL password
    $dbname = "regi"; // Replace with your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to check if the inventory already exists
    $check_sql = "SELECT * FROM inventory WHERE equipment_name = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $equipment_name);
    $stmt->execute();
    $result = $stmt->get_result();

    // If inventory already exists, update its quantity; otherwise, insert a new entry
    if ($result->num_rows > 0) {
        // inventory exists, so update its quantity
        $update_sql = "UPDATE inventory SET quantity = ? WHERE equipment_name = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ss", $quantity, $equipment_name);
        $stmt->execute();
        echo "inventory updated successfully";
    } else {
        // inventory doesn't exist, so insert a new entry
        $insert_sql = "INSERT INTO inventory (equipment_name, quantity) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("ss", $equipment_name, $quantity);
        $stmt->execute();
        echo "New inventory added successfully";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
