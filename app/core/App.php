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
        if (file_exists('app/controllers/' . $url[1] . '.php')) {
            $this->controller = $url[1];
            $_SESSION['controller'] = $this->controller;

            /* This is if we have a special URL in the index.
             * For example, our apply page is public and in the index method
             * We do not want the method to be login in this case, but instead index
             * 
             */
            if (in_array($this->controller, $this->special_url)) { 
              $this->method = 'index';
            }
            unset($url[1]);
        } else {
            // Redirect to the default home index page
            header('Location: app/views/home/index.php');
            exit;
        }

        // Require the controller file
        require_once 'app/controllers/' . $this->controller . '.php';

        // Instantiate the controller
        $this->controller = new $this->controller;

        // Check if method is passed in the URL
        if (isset($url[2]) && method_exists($this->controller, $url[2])) {
            $this->method = $url[2];
            $_SESSION['method'] = $this->method;
            unset($url[2]);
        }

        // Rebase the params array starting at index 0
        $this->params = $url ? array_values($url) : [];

        // Call the controller method with parameters
        call_user_func_array([$this->controller, $this->method], $this->params);      
    }


    public function parseUrl() {
        $u = "{$_SERVER['REQUEST_URI']}";
        //trims the trailing forward slash (rtrim), sanitizes URL, explode it by forward slash to get elements
        $url = explode('/', filter_var(rtrim($u, '/'), FILTER_SANITIZE_URL));
		unset($url[0]);
		return $url;
    }

}
