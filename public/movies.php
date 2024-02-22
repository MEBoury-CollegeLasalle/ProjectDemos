<?php
declare(strict_types=1);

/*
 * ProjectDemos movies.php
 * 
 * @author Marc-Eric Boury (MEbou)
 * @since 2024-02-13
 * (c) Copyright 2024 Marc-Eric Boury 
 */


#require_once "../private/helpers/init.php";

require_once __DIR__."/../private/helpers/movies_db_functions.php";

try {
    $all_movies = get_all_movies();
} catch (Exception $e) {

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Basic project demo</title>
    <link rel="stylesheet" href="/ProjectDemos/public/css/project.css">
    <script type="text/javascript" source="/ProjectDemos/public/js/project.js"></script>
</head>
<body>
<header>

</header>
<main>
    <h1>Movies Management</h1>
    <form id="movieNavigation" action="/ProjectDemos/public/api.php" method="post">
        <input type="hidden" name="action" value="display_movie" />
        <label for="movie_selector">Select a movie to display:</label>
        <select id="movie_selector" name="movieId" required>
            <?php
            foreach ($all_movies as $movie_array) {
                echo "<option value='".$movie_array["id"]."'>".$movie_array["title"]."</option>";
            }
            ?>
        </select>
        <input type="submit" value="diplay movie!" />
    </form>
</main>
<footer>

</footer>
</body>
</html>
