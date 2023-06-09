<!DOCTYPE html>
<html>
<head>
    <title>Dostępne fiszki</title>
</head>
<body>
    <h1>Wszystkie fiszki</h1>
    <?php echo "<h3>Ilość wszystkich fiszek: ${allFlashcardsCount}</h3>"; ?>

    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Powrót</a>

    <?php if (!empty($flashcards)): ?>
        <?php $currentCategory = ''; ?>
        <?php foreach ($flashcards as $flashcard): ?>
            <?php if ($flashcard['category'] !== $currentCategory): ?>
                <h2>Kategoria: <?php echo $flashcard['category']; ?></h2>
                <?php $currentCategory = $flashcard['category']; ?>
            <?php endif; ?>
            <div class="flashcard">
                <h3><?php echo $flashcard['name']; ?></h3>
                <p>Kategoria: <?php echo $flashcard['category']; ?></p>
                <p>Opis: <?php echo $flashcard['description']; ?></p>
                <p>Czy ulubione: <?php echo $flashcard['favourite'] ? 'Tak' : 'Nie'; ?></p>
                <p>Czy widziana: <?php echo $flashcard['seen'] ? 'Tak' : 'Nie'; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Brak dostępnych fiszek.</p>
    <?php endif; ?>
</body>
</html>
