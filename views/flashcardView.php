<!DOCTYPE html>
<html>
<head>
    <title>Fiszki | Strona główna</title>
    <style>
        .flashcard {
            position: relative;
            width: 300px;
            height: 200px;
            perspective: 1000px;
        }

        .card {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: transform 0.5s;
            transform-style: preserve-3d;
        }

        .front, .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .front {
            background-color: #eee;
            transform: rotateY(0deg);
        }

        .back {
            background-color: #e1e1e1;
            transform: rotateY(180deg);
        }

        .flashcard:hover .card {
            transform: rotateY(180deg);
        }

        .flashcard h3, .flashcard p {
            margin: 0;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Fiszki</h1>
    <h2>Wylosowana fiszka:</h2>
    <?php if ($randomFlashcard): ?>
        <div>
            <p>Kategoria: <?php echo $randomFlashcard['category']; ?></p>
            <p>Czy ulubione: <?php echo ($randomFlashcard['favourite'] ? 'Tak' : 'Nie'); ?></p>
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
