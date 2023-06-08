<?php
require_once '../models/FlashcardModel.php';

class FlashcardController {
    public function displayRandomFlashcard() {
        $flashcardModel = new FlashcardModel();

        // Handle reset button action
        if (isset($_POST['resetSeen'])) {
            $flashcardModel->resetFlashcardsSeenStatus();
        }
        
        $randomFlashcard = $flashcardModel->getRandomFlashcard();

        if ($randomFlashcard) {
            // Mark the flashcard as seen
            $flashcardModel->markFlashcardAsSeen($randomFlashcard['id']);
        }

        require '../views/flashcardView.php';
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
