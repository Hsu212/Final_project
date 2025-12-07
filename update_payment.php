<?php
// Start the session
session_start();

// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user's ID from the session
$user_id = $_SESSION['user_id'];

// Retrieve the payment information from the form
$payment_method = $_POST['payment_method'];
$card_number = $_POST['card_number'];
$expiration_date = $_POST['expiration_date'];

// Prepare the SQL statement to update the payment information
$sql = "UPDATE users SET PaymentMethod = ?, CardNumber = ?, ExpirationDate = ? WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $payment_method, $card_number, $expiration_date, $user_id);

// Execute the SQL statement
if ($stmt->execute()) {
    // Redirect the user to the home page
    header("Location: home.php");
    exit();
} else {
    echo "Error updating payment information: " . $conn->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>