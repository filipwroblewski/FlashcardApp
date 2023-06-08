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

}
