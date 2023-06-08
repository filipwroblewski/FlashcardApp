<!DOCTYPE html>
<html>
<head>
    <title>Fiszki | Strona główna</title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body>
    <h1>Fiszki</h1>

    <form action="./" method="POST">
        <button type="submit">Wylosuj kolejną fiszkę</button>
    </form>

    <h2>Wylosowana fiszka:</h2>
    <?php if ($randomFlashcard): ?>
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
        <p>Brak dostępnych fiszek.</p>
    <?php endif; ?>
</body>
</html>
