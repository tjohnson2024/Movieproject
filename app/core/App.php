<?php

class App {

    protected $controller = 'home';
    protected $method = 'index';
    protected $special_url = ['apply'];
    protected $params = [];

    public function __construct() {
        // Check if the user is authenticated
        if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
            $this->controller = 'home'; // Set default controller to 'home'

        } 

        // Parse the URL
        $url = $this->parseUrl();

        // Check if the controller exists in the URL
        if (isset($url[1]) && file_exists('app/controllers/' . $url[1] . '.php')) {
            $this->controller = $url[1];
            $_SESSION['controller'] = $this->controller;

            // Check if it's a special URL
            if (in_array($this->controller, $this->special_url)) { 
                $this->method = 'index';
            }
            unset($url[1]);
        } else {
            // Redirect to the default home index page
            header('Location: /app/views/home/index.php');
            exit;
        }

        // Require the controller file
        require_once 'app/controllers/' . $this->controller . '.php';

        // Check if the controller class exists
        if (!class_exists($this->controller)) {
            // Handle controller class not found error
            http_response_code(500);
            echo "Controller class not found";
            exit;
        }

        // Instantiate the controller
        $this->controller = new $this->controller;

        // Check if method is passed in the URL
        if (isset($url[2]) && method_exists($this->controller, $url[2])) {
            $this->method = $url[2];
            $_SESSION['method'] = $this->method;
            unset($url[2]);
        }

        // Rebase the params array starting at index 0
        $this->params = array_values($url);

        // Call the controller method with parameters, if method exists
        if (method_exists($this->controller, $this->method)) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            // Handle method not found error
            http_response_code(404);
            echo "Method not found";
            exit;
        }
    }

    public function parseUrl() {
        $url = explode('/', filter_var(trim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
        array_shift($url); // Remove the first element (usually empty)
        return $url;
    }

}
