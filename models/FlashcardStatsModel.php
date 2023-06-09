<?php
require_once '../config/database.php';

class FlashcardStatsModel
{
    private $conn;

    public function __construct() {
        $this->conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    }

    public function getFlashcardStatsByDate($date)
    {
        $query = "SELECT * FROM flashcard_stats WHERE date = :date";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createFlashcardStats($date)
    {
        $query = "INSERT INTO flashcard_stats (date, seen_flashcards_quantity) VALUES (:date, 0)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }

    public function incrementSeenFlashcardsQuantity($date)
    {
        $query = "UPDATE flashcard_stats SET seen_flashcards_quantity = seen_flashcards_quantity + 1 WHERE date = :date";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }
}
