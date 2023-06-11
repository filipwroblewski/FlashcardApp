<!DOCTYPE html>
<html>
<head>
    <title>Dodawaj fiszkę</title>
</head>
<body>
    <h1>Dodawanie nowej fiszki</h1>

    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Powrót</a>

    <form action="index.php?action=addFlashcard" method="POST">
        <label for="category">Kategoria:</label>
        <input type="number" name="category" id="category">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Add Flashcard</button>
    </form>


</body>
</html>
