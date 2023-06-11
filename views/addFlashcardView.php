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
        <select name="category" id="category">
            <?php
                foreach ($categories as $category) {
                    echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                }
            ?>
        </select>

        <label for="name">Przód fiszki:</label>
        <input type="text" name="name" id="name">

        <label for="description">Tył fiszki:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Dodaj fiszkę</button>
    </form>

</body>
</html>
