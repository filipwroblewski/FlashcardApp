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
        $flashcards = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $flashcards;
    }

    public function getRandomFlashcard($category = null) {
        $query = "SELECT f.*, c.name AS category
                FROM flashcards f
                LEFT JOIN categories c ON f.id_category = c.id
                WHERE f.seen = FALSE";

        if (!empty($category)) {
            $query .= " AND (f.id_category = :category OR :category = '')";
        }

        $query .= " ORDER BY RAND() LIMIT 1";

        $stmt = $this->conn->prepare($query);

        if (!empty($category)) {
            $stmt->bindParam(':category', $category);
        }

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function markFlashcardAsSeen($flashcardId) {
        $query = "UPDATE flashcards SET seen = TRUE WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $flashcardId);
        return $stmt->execute();
    }

    public function resetFlashcardsSeenStatus() {
        $query = "UPDATE flashcards SET seen = FALSE";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }

    public function getAllFlashcardsCount() {
        $query = "SELECT COUNT(*) FROM flashcards";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    public function getSeenFlashcardsCount() {
        $query = "SELECT COUNT(*) FROM flashcards WHERE seen = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
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

    public function getRandomFavoriteFlashcard() {
        $query = "SELECT f.*, c.name AS category
            FROM flashcards f
            LEFT JOIN categories c ON f.id_category = c.id
            WHERE f.favourite = 1 AND f.seen = FALSE
            ORDER BY RAND()
            LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addFlashcard($category, $name, $description)
    {
        $query = "INSERT INTO flashcards (name, description, id_category, favourite) 
                VALUES (:name, :description, :id_category, :favourite)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':id_category', $category);
        $stmt->bindValue(':favourite', 0);
        return $stmt->execute();
    }


}
