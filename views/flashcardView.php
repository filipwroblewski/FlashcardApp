<!DOCTYPE html>
<html>
<head>
    <title>Fiszki | Strona główna</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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

        function displayElapsedTime() {
            var startTime = localStorage.getItem('startTime');
            if (startTime) {
                var endTime = Date.now();
                var elapsedTime = Math.floor((endTime - startTime) / 1000);
                var minutes = Math.floor(elapsedTime / 60);
                var seconds = elapsedTime % 60;
                var previousSessionElement = document.getElementById('previousSession');
                previousSessionElement.innerHTML = 'Poprzednia sesja trwała: ' + minutes + ' minut ' + seconds + ' sekund';
            }
        }
    </script>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h1 class="mt-4"><i class="fas fa-book"></i> Fiszki</h1>

        <?php if (isset($dailyQuantityNumber)): ?>
            <h5 class="mt-4"><i class="fas fa-chart-line"></i> Dziś przejrzane (<?php echo $dailyQuantityNumber; ?>)</h5>
        <?php endif; ?>
        <p id="previousSession" class="mt-4"></p>

        <div class="mt-4">
            <h3 class="mb-3">Zmień kolor tła strony</h3>
            <div class="input-group">
                <input type="color" id="colorInput" class="form-control">
                <button onclick="changeBodyColor()" class="btn btn-primary">Zastosuj</button>
            </div>
        </div>


        <?php
            $allFlashcardsCount = $flashcardModel->getAllFlashcardsCount();
            $seenFlashcardsCount = $flashcardModel->getSeenFlashcardsCount();
        ?>
        <p class="mt-4"><i class="far fa-eye"></i> Liczba widzianych fiszek: (<?php echo $seenFlashcardsCount; ?>/<?php echo $allFlashcardsCount; ?>)</p>


        <div class="d-flex">
            <a href="index.php?action=showAvailableFlashcards" class="btn btn-primary mr-3">
                <i class="fas fa-list"></i> Zobacz dostępne fiszki
            </a>

            <a href="index.php?action=addFlashcard" class="btn btn-primary ml-3">
                <i class="fas fa-plus"></i> Dodaj nową fiszkę
            </a>
        </div>
        

        <?php if ($randomFlashcard): ?>
            <form action="./" method="POST" class="mt-4">
                <div class="form-group">
                    <label for="category">Wybrana kategoria:</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">Wszystkie</option>
                        <option value="favourites" <?php if ($selectedCategory === 'favourites') echo 'selected'; ?>>Ulubione</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>" <?php if ($selectedCategory == $category['id']) echo 'selected'; ?>>
                                <?php echo $category['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Wylosuj kolejną fiszkę</button>
            </form>

            <h2 class="mt-4">Wylosowana fiszka:</h2>
            <h5 class="card-title pb-2">Kategoria: <?php echo $randomFlashcard['category']; ?></h5>

            <form action="" method="POST">
                <input type="hidden" name="flashcardId" value="<?php echo $randomFlashcard['id']; ?>">
                <?php if ($randomFlashcard['favourite']): ?>
                    <input type="submit" name="removeFavorite" value="Usuń z ulubionych" class="btn btn-danger">
                <?php else: ?>
                    <input type="submit" name="addFavorite" value="Dodaj do ulubionych" class="btn btn-primary">
                <?php endif; ?>
            </form>

            <div class="flashcard card mt-4 mb-5">
                <div class="card text-center" style="width: 300px;">
                    <div class="card-body front d-flex justify-content-center align-items-center">
                        <h4 class="card-title"><?php echo $randomFlashcard['name']; ?></h4>
                        
                    </div>
                    <div class="card-body back d-flex justify-content-center align-items-center">
                        <h5 class="card-text"><?php echo $randomFlashcard['description']; ?></h5>
                    </div>
                    <div class="position-absolute p-2 top-0 start-0">
                        <i class="fa fa-reply"></i>
                    </div>
                </div>
            </div>
            

        <?php else: ?>
            <div class="text-center mt-4">
                <p>Brak dostępnych fiszek!</p>

                <form action="./" method="POST" class="mt-4">
                    <button type="submit" name="resetSeen" class="btn btn-primary">Resetuj zestaw</button>
                </form>
            </div>

        <?php endif; ?>

        <footer class="mt-4 text-center">
            <p>Jeśli chcesz się z nami skontaktować, pisz śmiało!</p>
            <a href="mailto:fiszki-contact@gmail.com">Napisz do nas</a>
        </footer>

        <script>
            if (!localStorage.getItem('startTime')) {
                localStorage.setItem('startTime', Date.now());
            }

            displayElapsedTime();
        </script>
    </div>
</body>
</html>
