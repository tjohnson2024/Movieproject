<?php

use function pcov\waiting;

require_once 'app/models/User.php';

class Movie extends Controller {

public function search(){
if(!isset($_REQUEST['movie'])){

}

$movie = $_REQUEST['API'];
$movie_title = $_REQUEST['movie'];
$movie = api->search($movie_title);


echo "<pre>";
  print_r($movie);
  die;
  


$this->view->render('movie/results', ['movie' => $movie]);
}

public function review($rating = ''){
  
}

}

}
%>