<?php
require '../controllers/FlashcardController.php';
require '../controllers/CategoryController.php';

$flashcardController = new FlashcardController();
$categoryController = new CategoryController();

if (isset($_POST['addFavorite'])) {
    $flashcardId = $_POST['flashcardId'];
    $flashcardController->addToFavorites($flashcardId);
}

if (isset($_POST['removeFavorite'])) {
    $flashcardId = $_POST['flashcardId'];
    $flashcardController->removeFromFavorites($flashcardId);
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'showAvailableFlashcards':
        $flashcardController->showAvailableFlashcards();
        break;
    case 'addFlashcard':
        $flashcardController->addFlashcard();
        break;
    default:
        $flashcardController->displayRandomFlashcard();
        break;
}
