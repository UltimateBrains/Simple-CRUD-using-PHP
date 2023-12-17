<?php
// Establish database connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "crud_example");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID from GET request
$userId = $_GET["id"];

// Delete user from the database
$sql = "DELETE FROM users WHERE id = $userId";
$result = $conn->query($sql);

if ($result) {
    $response = ["status" => "success", "message" => "User deleted successfully"];
} else {
    $response = ["status" => "error", "message" => "Error deleting user: " . $conn->error];
}

echo json_encode($response);

$conn->close();
?>
