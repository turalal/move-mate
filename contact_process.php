<?php
// contact_process.php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted using POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data with fallback for undefined values
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Debug: Log the incoming data to check if POST is working
    echo "Debug - Name: " . htmlspecialchars($name) . "<br>";
    echo "Debug - Email: " . htmlspecialchars($email) . "<br>";
    echo "Debug - Message: " . htmlspecialchars($message) . "<br>";

    // Validate required fields
    if (!empty($name) && !empty($email) && !empty($message)) {

        // Define the recipient email address
        $to = 'your-email@example.com'; // Replace this with your actual email
        $subject = 'New Contact Message';
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email";

        // Attempt to send the email
        if (mail($to, $subject, $body, $headers)) {
            // Debug: Confirmation that mail() succeeded
            echo "Debug - Email sent successfully.<br>";

            // If email is sent, redirect to thank you page
            header("Location: thank_you.html");
            exit();
        } else {
            // Debug: Log error if mail function fails
            echo "Error: Email could not be sent. Please check your email configuration.";
        }

    } else {
        // Debug: Output message if required fields are missing
        echo "Error: Please fill in all required fields.";
    }

} else {
    // Debug: Indicate non-POST request received
    echo "Debug - Not a POST request.";
    
    // If not a POST request, redirect back to the contact form
    header("Location: contact.html");
    exit();
}
?>
