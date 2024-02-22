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


$has_movie = false;
if (isset($movie_to_display) && is_array($movie_to_display)) {
    $has_movie = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Basic project demo</title>
    <link rel="stylesheet" href="/ProjectDemos/public/css/project.css">
    <script type="text/javascript" src="/ProjectDemos/public/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="/ProjectDemos/public/js/project.js"></script>
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
    <form id="movieManagement" action="/ProjectDemos/public/api.php" method="post">
        <input id="actionField" type="hidden" name="action" value="not_set" />
        
        <label for="movieIdField">Id: </label>
        <input id="movieIdField" type="number" name="id" min="1" step="1" <?= $has_movie ? 'value="'.$movie_to_display["id"].'" required' : "" ?> readonly >
        <br/>
        <label for="movieTitleField">Title: </label>
        <input id="movieTitleField" type="text" name="title" maxlength="256" <?= $has_movie ? 'value="'.$movie_to_display["title"].'"' : "" ?> required >
        <br/>
        <label for="movieYearField">Year: </label>
        <input id="movieYearField" type="number" name="year" min="1850" step="1" <?= $has_movie ? 'value="'.$movie_to_display["year"].'"' : "" ?> required >
        <br/>
        <label for="movieHoursField">Duration (hours): </label>
        <input id="movieHoursField" type="number" name="duration_hours" min="0" max="10" step="1" <?= $has_movie ? 'value="'.$movie_to_display["duration_hours"].'"' : "" ?> >
        <br/>
        <label for="movieMinutesField">Duration (minutes): </label>
        <input id="movieMinutesField" type="number" name="duration_minutes" min="0" max="59" step="1" <?= $has_movie ? 'value="'.$movie_to_display["duration_minutes"].'"' : "" ?> >
        <br/>
        <label for="movieBudgetField">Budget: </label>
        <input id="movieBudgetField" type="number" name="budget" min="0.0" step="0.01" <?= $has_movie ? 'value="'.$movie_to_display["budget"].'"' : "" ?> >
        <br/>
        
        <?php
        if ($has_movie) {
            echo <<<HEREDOC
        <button onclick="update_movie()">Save Changes</button>
        <button onclick="delete_movie()">Delete</button>
HEREDOC;

        } else {
            echo <<<HEREDOC
        <button onclick="create_movie()">Create new</button>
HEREDOC;
        
        }
        ?>
    </form>
    <h1>Movies Management (AJAX)</h1>
    <form id="movieNavigationAjax" action="/ProjectDemos/public/api.php" method="post">
        <input type="hidden" name="action" value="display_movie_async" />
        <label for="movie_selector">Select a movie to display:</label>
        <select id="movie_selector" name="movieId" required>
            <?php
            foreach ($all_movies as $movie_array) {
                echo "<option value='".$movie_array["id"]."'>".$movie_array["title"]."</option>";
            }
            ?>
        </select>
        <button id="displayMovieButton2" type="button" onclick="display_movie_ajax()" >Diplay movie!</button>
    </form>
    <form id="movieManagementAjax" action="/ProjectDemos/public/api.php" method="post">
        <input id="actionField2" type="hidden" name="action" value="not_set" />
        
        <label for="movieIdField2">Id: </label>
        <input id="movieIdField2" type="number" name="id" min="1" step="1" <?= $has_movie ? 'value="'.$movie_to_display["id"].'" required' : "" ?> readonly >
        <br/>
        <label for="movieTitleField2">Title: </label>
        <input id="movieTitleField2" type="text" name="title" maxlength="256" <?= $has_movie ? 'value="'.$movie_to_display["title"].'"' : "" ?> required >
        <br/>
        <label for="movieYearField2">Year: </label>
        <input id="movieYearField2" type="number" name="year" min="1850" step="1" <?= $has_movie ? 'value="'.$movie_to_display["year"].'"' : "" ?> required >
        <br/>
        <label for="movieHoursField2">Duration (hours): </label>
        <input id="movieHoursField2" type="number" name="duration_hours" min="0" max="10" step="1" <?= $has_movie ? 'value="'.$movie_to_display["duration_hours"].'"' : "" ?> >
        <br/>
        <label for="movieMinutesField2">Duration (minutes): </label>
        <input id="movieMinutesField2" type="number" name="duration_minutes" min="0" max="59" step="1" <?= $has_movie ? 'value="'.$movie_to_display["duration_minutes"].'"' : "" ?> >
        <br/>
        <label for="movieBudgetField2">Budget: </label>
        <input id="movieBudgetField2" type="number" name="budget" min="0.0" step="0.01" <?= $has_movie ? 'value="'.$movie_to_display["budget"].'"' : "" ?> >
        <br/>
        <button type="button" onclick="create_movie_ajax()">Create new</button>
        <button type="button" onclick="update_movie_ajax()">Save Changes</button>
        <button type="button" onclick="delete_movie_ajax()">Delete</button>
    </form>
</main>
<footer>

</footer>
</body>
</html>
