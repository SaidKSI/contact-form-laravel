<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Form Submitted</title>
    <style>
        /* Add CSS styling for email template here */
    </style>
</head>
<body>
    <h1>Contact Form Submitted</h1>

    <p>A new contact form has been submitted:</p>

    <ul>
        <li><strong>Subject:</strong> {{ $subject }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Description:</strong> {{ $description }}</li>
    </ul>
</body>
</html>
