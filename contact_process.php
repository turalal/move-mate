<?php
// contact_process.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the form fields and sanitize them
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Recipient email address
    $to = "sales@movemate.me";

    // Email subject
    $subject = "New Contact Message from $name";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to thank you page on success
        header("Location: thank_you.html");
        exit();
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    // If the form is not submitted via POST, redirect back to contact page
    header("Location: contact.html");
    exit();
}
