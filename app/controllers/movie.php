<?php

require_once 'app/models/User.php';

class Movie extends Controller {

    public function search(){
        // Check if 'movie' parameter is set in the request
        if(!isset($_REQUEST['movie'])){
            // Handle case where 'movie' parameter is not provided
            echo "Please provide a movie title.";
            return; // Exit the function
        }

        // Instantiate Api model
        $api = $this->model('Api');

        // Get the movie title from the request
        $movie_title = $_REQUEST['movie'];

        // Call the search method on the Api model
        $movies = $api->search($movie_title);

        // Output the result for debugging
        echo "<pre>";
        print_r($movies);
        echo "</pre>";

        // Render a view with the search results (assuming 'view' property is available)
        $this->view->render('movie/results', ['movies' => $movies]);
    }

    public function review($rating = ''){
        // Placeholder for handling movie reviews (not implemented in your provided code)
    }

}

?>
