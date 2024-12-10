<?php
session_start();
include './../utils/db.php';
// function login($username, $password)
// {
//      $validUser = "admin";
//      $hashedPass = password_hash("password", PASSWORD_DEFAULT);

//      if ($username === $validUser && password_verify($password, $hashedPass)) {
//           $_SESSION['user'] = $username;
//           return "Login successful!";
//      } else {
//           return "Invalid credentials!";
//      }
// }

function signup($name, $email, $number, $password)
{
     global $pdo;

     $name = htmlspecialchars($name);
     $email = filter_var($email, FILTER_SANITIZE_EMAIL);
     $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

     // Validate email format
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          return "Invalid email format.";
     }

     // Hash the password
     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

     // Check if the email is already registered
     $stmt = $pdo->prepare("SELECT id FROM user WHERE email = :email");
     $stmt->bindParam(':email', $email);
     $stmt->execute();

     if ($stmt->rowCount() > 0) {
          return "Email is already registered.";
     }

     // Insert user into the database
     $stmt = $pdo->prepare("INSERT INTO user (name, email, number, password, regDate) VALUES (:name, :email, :number, :password, NOW())");
     $stmt->bindParam(':name', $name);
     $stmt->bindParam(':email', $email);
     $stmt->bindParam(':number', $number);
     $stmt->bindParam(':password', $hashedPassword);

     if ($stmt->execute()) {
          return "Signup successful!";
     } else {
          return "Signup failed. Please try again.";
     }
}
