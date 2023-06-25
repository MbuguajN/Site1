<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Connect to the database
require_once "db.php";
// If the form is submitted
if (isset($_POST['submit'])) {
    // Get the article data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['username'];

    // Insert the article into the database
    $query = "INSERT INTO articles (title, content, author) VALUES ('$title', '$content', '$author')";
    if (mysqli_query($mysql, $query)) {
        header('Location: article.php');
        exit();
    } else {
        echo 'Error adding article: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Article</title>
</head>
<body>
    <h1>Add Article</h1>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title"><br>

        <label for="content">Content:</label><br>
        <textarea name="content" id="content" cols="30" rows="10"></textarea><br>

        <input type="submit" name="submit" value="Add Article">
    </form>
    <a href="logout.php" class="btn btn-danger">Logout</a>

</body>
</html>
