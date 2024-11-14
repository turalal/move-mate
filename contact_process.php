<?php
// contact_process.php
session_start();

// Debugging aktivləşdirin
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";
$username = "root"; // your DB username
$password = ""; // your DB password
$dbname = "movemate"; // your DB name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$message = $conn->real_escape_string($_POST['message']);

// Insert the data into your database (if necessary) or perform your email sending operation here
$to = "sales@movemate.me"; // Replace with your email address
$subject = "New Message from $name";
$body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
$headers = "From: $email";

// Check if the mail was sent
if (mail($to, $subject, $body, $headers)) {
    // Redirect to thank you page if successful
    header("Location: thank_you.html");
    exit();
} else {
    echo "There was a problem sending your message. Please try again.";
}

// Close the database connection
$conn->close();
?>
