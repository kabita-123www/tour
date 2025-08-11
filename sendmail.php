<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["msg"]);

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please fill all fields correctly.";
        exit;
    }

    $to = "yourgmailaddress@gmail.com"; // your Gmail here
    $subject = "New message from $name";
    $email_content = "Name: $name\nEmail: $email\n\nMessage:\n$message\n";
    $headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong.";
    }
} else {
    echo "Invalid request.";
}
?>
