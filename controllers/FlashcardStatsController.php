<?php
require_once '../models/FlashcardStatsModel.php';

class FlashcardStatsController
{
    public function updateFlashcardStats()
    {
        $flashcardStatsModel = new FlashcardStatsModel();
        $today = date('Y-m-d');

        $flashcardStats = $flashcardStatsModel->getFlashcardStatsByDate($today);

        if (!$flashcardStats) {
            // If today's date doesn't exist, create a new record with seen_flashcards_quantity = 0
            $flashcardStatsModel->createFlashcardStats($today);
        } else {
            // If today's date exists, increment seen_flashcards_quantity by 1
            $flashcardStatsModel->incrementSeenFlashcardsQuantity($today);
        }
    }
}
