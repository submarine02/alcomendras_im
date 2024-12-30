<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$host = 'localhost';  // Database host
$dbname = 'movie_collection';  // Database name
$username = 'root';  // Database username (default for XAMPP)
$password = '';  // Database password (default is empty for XAMPP)

try {
    // Create a PDO instance for database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, show error message
    echo 'Connection failed: ' . $e->getMessage();
}
?>

