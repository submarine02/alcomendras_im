<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include('db.php');

// Check if an ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the movie from the database
    $sql = "DELETE FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    // Redirect to the main page
    header("Location: index.php");
}
?>


