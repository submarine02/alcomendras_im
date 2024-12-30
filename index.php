<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include('db.php');

// Fetch all movies from the database
$sql = "SELECT * FROM movies";
$stmt = $conn->prepare($sql);
$stmt->execute();
$movies = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Collection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>My Movie Collection</h1>
        <a href="add.php">Add New Movie</a>
    </header>

    <section class="movie-list">
        <?php foreach ($movies as $movie): ?>
            <div class="movie-card">
                <h2><?php echo htmlspecialchars($movie['title']); ?></h2>
                <p><strong>Director:</strong> <?php echo htmlspecialchars($movie['director']); ?></p>
                <p><strong>Year:</strong> <?php echo htmlspecialchars($movie['year']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($movie['genre']); ?></p>
                <p><strong>Rating:</strong> <?php echo htmlspecialchars($movie['rating']); ?>/10</p>
                <a href="edit.php?id=<?php echo $movie['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $movie['id']; ?>">Delete</a>
            </div>
        <?php endforeach; ?>
    </section>
</body>
</html>
