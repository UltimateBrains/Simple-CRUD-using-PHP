<?php
// Establish database connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "crud_example");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user data from POST request
$userId = $_POST["userId"];
$username = $_POST["username"];
$email = $_POST["email"];

// Update user in the database
$sql = "UPDATE users SET username='$username', email='$email' WHERE id = $userId";
$result = $conn->query($sql);

if ($result) {
    $response = ["status" => "success", "message" => "User updated successfully"];
} else {
    $response = ["status" => "error", "message" => "Error updating user: " . $conn->error];
}

echo json_encode($response);

$conn->close();
?>
