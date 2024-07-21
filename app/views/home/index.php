<!-- Homepage (index.php) -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search Homepage</title>
</head>
<body>

    <h1>Welcome to the Movie Search Homepage</h1>

    <form action="/movie/search" method="GET">
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
