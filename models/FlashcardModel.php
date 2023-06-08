<?php
require_once '../config/database.php';

class FlashcardModel {
    private $conn;

    public function __construct() {
        $this->conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    }

    public function getAllFlashcards() {
        $query = "SELECT f.*, c.name AS category
                FROM flashcards f
                LEFT JOIN categories c ON f.id_category = c.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRandomFlashcard() {
        $query = "SELECT f.*, c.name AS category
                  FROM flashcards f
                  LEFT JOIN categories c ON f.id_category = c.id
                  ORDER BY RAND() LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addToFavorites($flashcardId) {
        $query = "UPDATE flashcards SET favourite = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $flashcardId);
        return $stmt->execute();
    }
    
    public function removeFromFavorites($flashcardId) {
        $query = "UPDATE flashcards SET favourite = 0 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $flashcardId);
        return $stmt->execute();
    }
    
}
