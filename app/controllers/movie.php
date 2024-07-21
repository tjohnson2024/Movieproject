<?php

require_once 'app/core/Controller.php';
require_once 'app/models/Omdb.php'; // Adjust the path if necessary

class Movie extends Controller {

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
            $this->view->render('movie/results', ['movies' => $movies]);
        } else {
            // No movies found
            echo "No movies found for '{$movie_title}'.";
        }
    }

    public function review($rating = '') {
        // Placeholder for handling movie reviews (not implemented in your provided code)

        // Example of returning a value, though not necessary in this context
        return $rating;
    }

}

?>
