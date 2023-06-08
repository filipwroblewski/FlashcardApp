<?php
require_once '../models/FlashcardModel.php';

class FlashcardController {
    public function displayRandomFlashcard() {
        $flashcardModel = new FlashcardModel();
        $randomFlashcard = $flashcardModel->getRandomFlashcard();

        if ($randomFlashcard) {
            require '../views/flashcardView.php';
        } else {
            echo "No flashcards available.";
        }
    }
}


$flashcardController = new FlashcardController();
$flashcardController->displayRandomFlashcard();

