<?php

require_once 'app/core/Controller.php';
require_once 'app/models/Omdb.php'; // Adjust the path if necessary
require_once 'app/models/Rating.php'; // Assuming you have a Rating model
require_once 'app/services/AIReviewService.php'; // AI Review service

class Movie extends Controller {

    protected $ratingModel;
    protected $aiReviewService;

    public function __construct() {
        $this->ratingModel = new Rating(); // Instantiate Rating model
        //$this->aiReviewService = new AIReviewService(); // Instantiate AI Review service
    }

    public function index() {
        // Check if 'movie' parameter is set in the request
        if (!isset($_GET['movie'])) {
            // Handle case where 'movie' parameter is not provided
            echo "Please provide a movie title.";
            return; // Exit the function
        }

        // Instantiate Omdb model (assuming 'Omdb' model exists)
        $omdb = new Omdb($_ENV['omdb_key']); // Assuming $_ENV['omdb_key'] holds your OMDB API key

        // Get the movie title from the request
        $movie_title = $_GET['movie'];

        // Call the search method on the Omdb model
        $movies = $omdb->search($movie_title);

        // Check if search results are found
        if (!empty($movies)) {
            // Render the results view with the movies data
            $this->view->render('movies/index', ['movies' => $movies]);
        } else {
            // No movies found
            echo "No movies found for '{$movie_title}'.";
        }
    }

    public function rateMovie() {
        // Check if 'id' and 'rating' parameters are set in the request
        if (!isset($_POST['id']) || !isset($_POST['rating'])) {
            echo "Invalid request.";
            return;
        }

        // Get data from POST request
        $movie_id = $_POST['id'];
        $rating = $_POST['rating'];

        // Save rating to database (assuming Rating model has appropriate methods)
        $result = $this->ratingModel->saveRating($movie_id, $rating);

        if ($result) {
            echo "Rating of {$rating}/5 saved successfully for movie with ID {$movie_id}.";
        } else {
            echo "Failed to save rating.";
        }
    }

    public function getReviews($movie_id) {
        // Retrieve reviews for a specific movie ID using AI-generated service
        $review = $this->aiReviewService->generateReview($movie_id);

        if ($review) {
            echo "AI-generated review: {$review}";
        } else {
            echo "No reviews available.";
        }
    }

}

?>
<?php

class AIReviewService {

    public function generateReview($movie_id) {
        // Mock implementation: Generate a simple review based on movie ID
        $reviews = [
            1 => "A thrilling adventure! Highly recommended.",
            2 => "An emotional rollercoaster that you won't forget.",
            3 => "A must-watch masterpiece."
            // Add more reviews as needed
        ];

        // Return a random review based on movie ID (for demonstration)
        return isset($reviews[$movie_id]) ? $reviews[$movie_id] : null;
    }

}

?>
