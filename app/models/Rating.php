<?php

class Rating {

    protected $db; // Database connection

    public function __construct() {
        // Example database connection using PDO
        $dsn = 'mysql:host=localhost;dbname=your_database_name';
        $username = 'your_database_username';
        $password = 'your_database_password';

        try {
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function saveRating($movie_id, $rating) {
        // Prepare SQL statement to insert rating into database
        $stmt = $this->db->prepare("INSERT INTO ratings (movie_id, rating) VALUES (:movie_id, :rating)");
        $stmt->bindParam(':movie_id', $movie_id);
        $stmt->bindParam(':rating', $rating);

        // Execute SQL statement
        try {
            $stmt->execute();
            return true; // Rating saved successfully
        } catch (PDOException $e) {
            return false; // Failed to save rating
        }
    }

    // Add additional methods as needed, such as retrieving average ratings, etc.
}

?>
