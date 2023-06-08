<!DOCTYPE html>
<html>
<head>
    <title>Fiszki | Strona główna</title>
</head>
<body>
    <h1>Fiszki</h1>
    <h2>Wylosowana fiszka:</h2>
    <?php if ($randomFlashcard): ?>
        <div>
            <h3>Przód: <?php echo $randomFlashcard['name']; ?></h3>
            <p>Tył: <?php echo $randomFlashcard['description']; ?></p>
            <p>Kategoria: <?php echo $randomFlashcard['category']; ?></p>
            <p>Czy ulubione: <?php echo ($randomFlashcard['favourite'] ? 'Tak' : 'Nie'); ?></p>
        </div>
    <?php else: ?>
        <p>No flashcards available.</p>
    <?php endif; ?>
</body>
</html>
