<!DOCTYPE html>
<html>
<head>
    <title>Dostępne fiszki</title>
</head>
<body>
    <h1>Wszystkie fiszki</h1>

    <?php if (!empty($flashcards)): ?>
        <?php foreach ($flashcards as $flashcard): ?>
            <div class="flashcard">
                <h3><?php echo $flashcard['name']; ?></h3>
                <p>Kategoria: <?php echo $flashcard['category']; ?></p>
                <!-- Other flashcard details -->
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Brak dostępnych fiszek.</p>
    <?php endif; ?>

    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Powrót</a>
</body>
</html>
