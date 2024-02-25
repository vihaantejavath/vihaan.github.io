<?php
// Connect to MySQL server
$servername = "localhost";
$username = "root";
$password = "Vihaan@32";
$dbname = "regi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch inventory data from the database
$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

// Prepare HTML table to store inventory data
$html = '<table>
            <thead>
                <tr>
                    <th>Equipment</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>';

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $html .= "<tr>";
        $html .= "<td>" . $row['equipment_name'] . "</td>";
        $html .= "<td>" . $row['quantity'] . "</td>";
        $html .= "</tr>";
    }
} else {
    $html .= "<tr><td colspan='2'>0 results</td></tr>";
}

$html .= '</tbody></table>';

// Close the database connection
$conn->close();

// Return the HTML table with inventory data
echo $html;
?>
