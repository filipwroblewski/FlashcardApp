<?php
require_once '../models/FlashcardModel.php';
require_once '../models/FlashcardModel.php';
require_once 'FlashcardStatsController.php';

class FlashcardController {
    public function displayRandomFlashcard() {
        $flashcardModel = new FlashcardModel();
        $categoryModel = new CategoryModel();
    
        // Handle reset button action
        if (isset($_POST['resetSeen'])) {
            $flashcardModel->resetFlashcardsSeenStatus();
        }
    
        $selectedCategory = isset($_POST['category']) ? $_POST['category'] : '';
    
        if ($selectedCategory === 'favourites') {
            $randomFlashcard = $flashcardModel->getRandomFavoriteFlashcard();
        } else {
            $randomFlashcard = $flashcardModel->getRandomFlashcard($selectedCategory);
        }
    
        $categories = $categoryModel->getAllCategories();
    
        if ($randomFlashcard) {
            // Mark the flashcard as seen
            $flashcardModel->markFlashcardAsSeen($randomFlashcard['id']);

            // Update flashcard stats
            $flashcardStatsController = new FlashcardStatsController();
            $flashcardStatsController->updateFlashcardStats();
        }

        // Check if the flashcard was added/removed from favorites
        if (isset($_POST['addFavorite'])) {
            $flashcardId = $_POST['flashcardId'];
            $this->addToFavorites($flashcardId);
        } elseif (isset($_POST['removeFavorite'])) {
            $flashcardId = $_POST['flashcardId'];
            $this->removeFromFavorites($flashcardId);
        }
    
        require '../views/flashcardView.php';
    }

    public function addToFavorites() {
        if (isset($_POST['flashcardId'])) {
            $flashcardId = $_POST['flashcardId'];
            $flashcardModel = new FlashcardModel();
            $flashcardModel->addToFavorites($flashcardId);
        }
    }
    
    public function removeFromFavorites() {
        if (isset($_POST['flashcardId'])) {
            $flashcardId = $_POST['flashcardId'];
            $flashcardModel = new FlashcardModel();
            $flashcardModel->removeFromFavorites($flashcardId);
        }
    }
    

    public function showAvailableFlashcards() {
        $flashcardModel = new FlashcardModel();
        $flashcards = $flashcardModel->getAllFlashcards();
        $allFlashcardsCount = $flashcardModel->getAllFlashcardsCount();

        require '../views/displayFlashcardsView.php';
    }
    
}
