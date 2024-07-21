<?php



class Omdb {

    protected $base_url = 'http://www.omdbapi.com/';
    protected $api_key;

    public function __construct($api_key) {
        $this->api_key = $api_key;
    }

    public function search($movieTitle) {
        $query_url = $this->base_url . '?apikey=' . $this->api_key . '&s=' . urlencode($movieTitle);

        // Perform the HTTP request to OMDB API
        $json = file_get_contents($query_url);

        // Decode JSON response into an associative array
        $data = json_decode($json, true);

        // Check if the response is successful ('Response' => 'True')
        if (isset($data['Response']) && $data['Response'] == 'True') {
            // Return movie title to indicate success
            return $movieTitle;
        } else {
            $this->view('movies/results', ['movies' => $movie]);
            // Return null if no results or error
            return null;
            header("Location: /results.php");
            exit;
        }
    }

    public function getMovieDetails($imdbID) {
        $query_url = $this->base_url . '?apikey=' . $this->api_key . '&i=' . $imdbID;

        // Perform the HTTP request to OMDB API
        $json = file_get_contents($query_url);

        // Decode JSON response into an associative array
        $data = json_decode($json, true);

        // Check if the response is successful ('Response' => 'True')
        if (isset($data['Response']) && $data['Response'] == 'True') {
            return $data; // Return movie details as associative array
            header("Location: /results.php");
            exit;
        } else {
            return null; // Return null if movie details not found or error
        }
    }

}

?>
