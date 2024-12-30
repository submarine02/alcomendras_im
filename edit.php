<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include('db.php');

// Check if an ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the movie to edit
    $sql = "SELECT * FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $movie = $stmt->fetch();

    // Check if the form is submitted to update the movie
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $director = $_POST['director'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $rating = $_POST['rating'];

        // Update the movie in the database
        $sql = "UPDATE movies SET title = ?, director = ?, year = ?, genre = ?, rating = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $director, $year, $genre, $rating, $id]);

        // Redirect to the main page
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Movie</h1>
        <a href="index.php">Back to Movie List</a>
    </header>

    <form action="edit.php?id=<?php echo $movie['id']; ?>" method="POST">
        <label for="title">Movie Title</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($movie['title']); ?>" required>

        <label for="director">Director</label>
        <input type="text" id="director" name="director" value="<?php echo htmlspecialchars($movie['director']); ?>" required>

        <label for="year">Year of Release</label>
        <input type="number" id="year" name="year" value="<?php echo htmlspecialchars($movie['year']); ?>" required>

        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($movie['genre']); ?>">

        <label for="rating">Rating (1-10)</label>
        <input type="number" id="rating" name="rating" value="<?php echo htmlspecialchars($movie['rating']); ?>" step="0.1" min="1" max="10" required>

        <button type="submit">Update Movie</button>
    </form>
</body>
</html>
