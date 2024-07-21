<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            padding: 8px;
            font-size: 16px;
            width: 300px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        #searchResults {
            /* Styles for search results container */
        }
    </style>
</head>
<body>

    <h1>Welcome to the Movie Search Homepage</h1>

    <form action="/movie/index" method="GET">
        <label for="movie">Enter movie title:</label>
        <input type="text" id="movie" name="movie" required>
        <button type="submit">Search</button>
    </form>

    <!-- Placeholder for displaying search results -->
    <div id="searchResults">
        <!-- Results will be rendered here -->
    </div>

</body>
</html>
