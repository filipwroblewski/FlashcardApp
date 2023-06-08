<!DOCTYPE html>
<html>
<head>
    <title>Fiszki | Strona główna</title>
</head>
<body>
    <h1>Fiszki</h1>
    <h2>Wszystkie fiszki:</h2>
    <?php foreach ($flashcards as $flashcard): ?>
        <div>
            <h3>Przód: <?php echo $flashcard['name']; ?></h3>
            <p>Tył: <?php echo $flashcard['description']; ?></p>
            <p>Kategoria: <?php echo $flashcard['id_category']; ?></p>
            <p>Czy ulubione: <?php echo ($flashcard['favourite'] ? 'Tak' : 'Nie'); ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
