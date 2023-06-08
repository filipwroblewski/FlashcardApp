<?php
require '../controllers/FlashcardController.php';


$flashcardController = new FlashcardController();

if (isset($_GET['add_favorite'])) {
    $flashcardId = $_GET['add_favorite'];
    $flashcardController->addToFavorites($flashcardId);
}

if (isset($_GET['remove_favorite'])) {
    $flashcardId = $_GET['remove_favorite'];
    $flashcardController->removeFromFavorites($flashcardId);
}

$flashcardController->displayRandomFlashcard();
