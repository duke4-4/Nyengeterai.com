<?php
// Replace these with your database credentials
$servername = "localhost:3306"; 
$username = "preorder"; 
$password = "preorder123"; 
$dbname = "provide7_preorders_db"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and retrieve form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$quantity = (int)$_POST['quantity'];

// Prepare the SQL query
$sql = "INSERT INTO preorders (name, email, phone, quantity) VALUES ('$name', '$email', '$phone', '$quantity')";

// Execute the query and check if successful
if ($conn->query($sql) === TRUE) {
    echo "Thank you for your pre-order!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
