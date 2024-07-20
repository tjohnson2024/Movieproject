<?php
session_start();

//if (!isset($_SESSION['auth'])) {
 //header('Location: /login');
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="/favicon.png">
    <title>COSC 4806</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <style>
        /* Custom CSS for navbar */
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333; /* dark gray color */
        }
        .navbar-nav .nav-link {
            color: #333; /* dark gray color */
        }
        .navbar-nav .nav-link:hover {
            color: #555; /* darker gray color */
        }
        .navbar-toggler {
            border-color: #333; /* dark gray color */
        }
        .navbar-toggler-icon {
            background-color: #333; /* dark gray color */
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/app/views/home/index.php<?= !empty($username) ? '?username=' . urlencode($username) : '' ?>">COSC 4806</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/app/views/home/index.php<?= !empty($username) ? '?username=' . urlencode($username) : '' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/views/about/index.php<?= !empty($username) ? '?username=' . urlencode($username) : '' ?>">About Me</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="/reminders/index">Reminders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
</div>
</body>
</html>