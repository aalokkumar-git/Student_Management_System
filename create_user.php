<?php
include("config/db.php");

$username = "admin";
$passwordPlain = "admin1563";

$password = password_hash($passwordPlain, PASSWORD_DEFAULT);

$conn->query("INSERT INTO users (username, password) 
VALUES ('$username', '$password')");

echo "User created successfully";
?>