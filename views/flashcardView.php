<!DOCTYPE html>
<html>
<head>
    <title>Fiszki | Strona główna</title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body>
    <h1>Fiszki</h1>

    



    <?php
        $allFlashcardsCount = $flashcardModel->getAllFlashcardsCount();
        $seenFlashcardsCount = $flashcardModel->getSeenFlashcardsCount();

        echo "<p>Liczba widzianych fiszek: (${seenFlashcardsCount}/${allFlashcardsCount})</p>";
    ?>

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
            <p>Czy ulubione:
            <?php if ($randomFlashcard['favourite']): ?>
                <a href="?remove_favorite=<?php echo $randomFlashcard['id']; ?>">Usuń z ulubionych</a>
            <?php else: ?>
                <a href="?add_favorite=<?php echo $randomFlashcard['id']; ?>">Dodaj do ulubionych</a>
            <?php endif; ?>
        </p>
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
