<!DOCTYPE html>
<html>
<head>
    <title>Dodawaj fiszkę</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Dodawanie nowej fiszki</h1>

        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-primary mb-4">Powrót</a>

        <form action="index.php?action=addFlashcard" method="POST">
            <div class="form-group">
                <label for="category">Kategoria:</label>
                <select name="category" id="category" class="form-control">
                    <?php
                        foreach ($categories as $category) {
                            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Przód fiszki:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Tył fiszki:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj fiszkę</button>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
