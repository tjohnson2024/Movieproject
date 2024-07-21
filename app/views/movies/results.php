
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .movie {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .movie h2 {
            margin-top: 0;
        }
        .movie p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <h1>Movie Search Results</h1>

    <?php foreach ($data['movies'] as $movie): ?>
        <div class="movie">
            <h2><?php echo htmlspecialchars($movie['Title']); ?> (<?php echo $movie['Year']; ?>)</h2>
            <p><strong>Genre:</strong> <?php echo htmlspecialchars($movie['Genre']); ?></p>
            <p><strong>Director:</strong> <?php echo htmlspecialchars($movie['Director']); ?></p>
            <p><strong>Rating:</strong> <?php echo htmlspecialchars($movie['Rating']); ?></p>
            <p><strong>IMDB ID:</strong> <?php echo htmlspecialchars($movie['imdbID']); ?></p>
            <p><strong>Plot:</strong> <?php echo htmlspecialchars($movie['Plot']); ?></p>
            <img src="<?php echo htmlspecialchars($movie['Poster']); ?>" alt="<?php echo htmlspecialchars($movie['Title']); ?> Poster">
        </div>
    <?php endforeach; ?>

</body>
</html>
