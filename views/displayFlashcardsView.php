<!DOCTYPE html>
<html>
<head>
    <title>Dostępne fiszki</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Wszystkie fiszki</h1>
        <?php echo "<h3>Ilość wszystkich fiszek: ${allFlashcardsCount}</h3>"; ?>

        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-primary mb-4">Powrót</a>

        <?php if (!empty($groupedFlashcards)): ?>
            <?php foreach ($groupedFlashcards as $category => $flashcardsInCategory): ?>
                <h2>Kategoria: <?php echo $category; ?></h2>
                <?php foreach ($flashcardsInCategory as $flashcard): ?>
                    <div class="flashcard card mb-4">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $flashcard['name']; ?></h3>
                            <p class="card-text">Kategoria: <?php echo $flashcard['category']; ?></p>
                            <p class="card-text">Opis: <?php echo $flashcard['description']; ?></p>
                            <p class="card-text">Czy ulubione: <?php echo $flashcard['favourite'] ? 'Tak' : 'Nie'; ?></p>
                            <p class="card-text">Czy widziana: <?php echo $flashcard['seen'] ? 'Tak' : 'Nie'; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <h4>Ilość elementów: <?php echo count($flashcardsInCategory); ?></h4>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Brak dostępnych fiszek.</p>
        <?php endif; ?>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
