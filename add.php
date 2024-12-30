<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include('db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = $_POST['title'];
    $director = $_POST['director'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];

    // Insert the new movie into the database
    $sql = "INSERT INTO movies (title, director, year, genre, rating) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $director, $year, $genre, $rating]);

    // Redirect to the main page
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Add New Movie</h1>
        <a href="index.php">Back to Movie List</a>
    </header>

    <form action="add.php" method="POST">
        <label for="title">Movie Title</label>
        <input type="text" id="title" name="title" required>

        <label for="director">Director</label>
        <input type="text" id="director" name="director" required>

        <label for="year">Year of Release</label>
        <input type="number" id="year" name="year" required>

        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre">

        <label for="rating">Rating (1-10)</label>
        <input type="number" id="rating" name="rating" step="0.1" min="1" max="10" required>

        <button type="submit">Add Movie</button>
    </form>
</body>
</html>
