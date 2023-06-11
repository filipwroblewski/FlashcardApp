<?php
require_once '../models/FlashcardModel.php';
require_once '../controllers/FlashcardStatsController.php';
require_once '../models/CategoryModel.php';


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

            // Get the seen flashcards quantity for the current day
            $flashcardStatsModel = new FlashcardStatsModel();
            $dailyQuantityNumber = $flashcardStatsModel->getDailyStats();
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

    public function addFlashcard() {
        $flashcardModel = new FlashcardModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->getAllCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = $_POST['category'];
            $name = $_POST['name'];
            $description = $_POST['description'];
    
            $flashcardModel->addFlashcard($category, $name, $description);
    
            header('Location: index.php');
            exit();
        }
    
        require '../views/addFlashcardView.php';
    }
    
    
}
