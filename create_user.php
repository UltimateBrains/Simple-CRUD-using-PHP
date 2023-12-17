<?php
// Establish database connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "crud_example");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user data from POST request
$username = $_POST["username"];
$email = $_POST["email"];

// Insert user into the database
$sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
$result = $conn->query($sql);

if ($result) {
    $response = ["status" => "success", "message" => "User created successfully"];
} else {
    $response = ["status" => "error", "message" => "Error creating user: " . $conn->error];
}

echo json_encode($response);

$conn->close();
?>
