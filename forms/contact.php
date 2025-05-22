<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  // Your email address
  $to = "srivastavaprabhat@gmail.com"; // change to your email
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  $fullMessage = "You received a new message from your website contact form:\n\n";
  $fullMessage .= "Name: $name\n";
  $fullMessage .= "Email: $email\n";
  $fullMessage .= "Subject: $subject\n\n";
  $fullMessage .= "Message:\n$message\n";

  if (mail($to, $subject, $fullMessage, $headers)) {
    echo "OK"; // Message sent successfully
  } else {
    http_response_code(500);
    echo "Something went wrong. Please try again later.";
  }
} else {
  http_response_code(403);
  echo "Invalid request method.";
}
?>
