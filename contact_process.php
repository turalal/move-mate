<?php
// contact_process.php
session_start();

// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "movemate"; // Replace with your DB name

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

// Prepare email parameters
$to = "sales@movemate.me"; // Replace with the email you want to send messages to
$subject = "New Contact Form Submission from $name";
$body = "Name: $name\nEmail: $email\nMessage:\n$message";
$headers = "From: $email";

// Send the email
if (mail($to, $subject, $body, $headers)) {
    // Redirect to thank you page if the email is sent successfully
    header("Location: thank_you.html");
    exit();
} else {
    echo "Failed to send the email. Please try again later.";
}

// Close the database connection
$conn->close();
?>
