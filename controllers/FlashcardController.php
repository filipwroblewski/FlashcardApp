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

    public function addToFavorites($flashcardId) {
        $flashcardModel = new FlashcardModel();
        $flashcardModel->addToFavorites($flashcardId);
        
        echo "<script>alert('Dodano do ulubionych');</script>";
    }

    public function removeFromFavorites($flashcardId) {
        $flashcardModel = new FlashcardModel();
        $flashcardModel->removeFromFavorites($flashcardId);
        
        echo "<script>alert('Usunięto z ulubionych');</script>";
    }
}
