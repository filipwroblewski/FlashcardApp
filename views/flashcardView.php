<!DOCTYPE html>
<html>
<head>
    <title>Fiszki | Strona główna</title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">

    <script>
        function changeBodyColor() {
            var color = document.getElementById('colorInput').value;
            document.body.style.backgroundColor = color;

            sessionStorage.setItem('bodyColor', color);
        }

        window.onload = function() {
            var savedColor = sessionStorage.getItem('bodyColor');
            if (savedColor) {
                document.body.style.backgroundColor = savedColor;
                document.getElementById('colorInput').value = savedColor;
            }
        }
    </script>
</head>
<body>
    <h1>Fiszki</h1>

    <div>
    <h3>Zmień kolor tła strony</h3>
        <input type="color" id="colorInput">
        <button onclick="changeBodyColor()">Zastosuj</button>
    </div>

    <?php
        $allFlashcardsCount = $flashcardModel->getAllFlashcardsCount();
        $seenFlashcardsCount = $flashcardModel->getSeenFlashcardsCount();

        echo "<p>Liczba widzianych fiszek: (${seenFlashcardsCount}/${allFlashcardsCount})</p>";
    ?>

    <a href="index.php?action=showAvailableFlashcards">Zobacz dostępne fiszki</a>

    <?php if ($randomFlashcard): ?>
        <form action="./" method="POST">
            <label for="category">Wybrana kategoria:</label>
            <select name="category" id="category">
                <option value="">Wszystkie</option>
                <option value="favourites" <?php if ($selectedCategory === 'favourites') echo 'selected'; ?>>Ulubione</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>" <?php if ($selectedCategory == $category['id']) echo 'selected'; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Wylosuj kolejną fiszkę</button>
        </form>

        <h2>Wylosowana fiszka:</h2>
        <div>
            <p>Kategoria: <?php echo $randomFlashcard['category']; ?></p>

            <?php if ($randomFlashcard['favourite']): ?>
                <form action="" method="POST">
                    <input type="hidden" name="flashcardId" value="<?php echo $randomFlashcard['id']; ?>">
                    <input type="submit" name="removeFavorite" value="Usuń z ulubionych">
                </form>
            <?php else: ?>
                <form action="" method="POST">
                    <input type="hidden" name="flashcardId" value="<?php echo $randomFlashcard['id']; ?>">
                    <input type="submit" name="addFavorite" value="Dodaj do ulubionych">
                </form>
            <?php endif; ?>

        </div>
        <div class="flashcard">
            <div class="card">
                <div class="front">
                    <h3><?php echo $randomFlashcard['name']; ?></h3>
                </div>
                <div class="back">
                    <p><?php echo $randomFlashcard['description']; ?></p>
                </div>
            </div>
        </div>
        
    <?php else: ?>
        <p>Brak dostępnych fiszek!</p>

        <form action="./" method="POST">
            <button type="submit" name="resetSeen">Resetuj zestaw</button>
        </form>
    <?php endif; ?>
</body>
</html>
