<?php
require_once 'app/models/User.php';

class Home extends Controller {

    public function index() {
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve input values from form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Instantiate User model
            $user = $this->model('User');

            // Perform login attempt
            $login_result = $user->login($username, $password);

            // Check if login was successful
            if ($login_result === "Login successful") {
                // Redirect to home/index page
                header("Location: /home/index.php");
                exit(); // Ensure script execution stops after redirect
            } else {
                // Output the result for unsuccessful login (you might handle this differently)
                echo $login_result;
            }
        } else {
            // If form is not submitted, load the login form view
            $this->view('/app/views/home/index');
        }
    }

}
