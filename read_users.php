<?php
// Establish database connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "crud_example");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

echo json_encode($users);

$conn->close();
?>
