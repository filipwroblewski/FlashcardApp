<?php
require_once '../models/FlashcardModel.php';

class FlashcardController {
    public function displayFlashcards() {
        $flashcardModel = new FlashcardModel();
        $flashcards = $flashcardModel->getAllFlashcards();
        require '../views/flashcardView.php';
    }
}

$flashcardController = new FlashcardController();
$flashcardController->displayFlashcards();
