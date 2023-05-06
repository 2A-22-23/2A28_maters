<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\CRUD user\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\CRUD user\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\CRUD user\PHPMailer-master\src\SMTP.php';
require 'C:\xampp\htdocs\CRUD user\config.php';

// Establish a database connection
$pdo = new PDO("mysql:host=localhost;dbname=reverso2a28", "root", "");

// Get the user's email address from the forgot password form
$email = $_POST['Email'];

// Generate a new password
$newPassword = generateRandomPassword();

// Hash the new password
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Update the user's password in the database
$stmt = $pdo->prepare("UPDATE user SET Password = :Password WHERE Email = :Email");
$stmt->execute(['Password' => $hashedPassword, 'Email' => $email]);

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Set the SMTP server details
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'malekrabaaoui12@gmail.com';
$mail->Password = 'axgqaeilnojpichc';

// Set the email details
$mail->setFrom('webreverso2a28@gmail.com', 'Malek');
$mail->addAddress($email);
$mail->Subject = 'Password Reset';
$mail->Body = 'Your new password is: ' . $newPassword;

// Send the email
if ($mail->send()) {
  echo 'Password reset email sent successfully';
} else {
  echo 'Password reset email failed to send';
}

function generateRandomPassword($length = 8) {
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $password = '';
  for ($i = 0; $i < $length; $i++) {
    $password .= $chars[rand(0, strlen($chars) - 1)];
  }
  return $password;
}
?>
