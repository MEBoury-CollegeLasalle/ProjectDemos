<?php
declare(strict_types=1);

/*
 * ProjectDemos api.php
 * 
 * @author Marc-Eric Boury (MEbou)
 * @since 2024-02-13
 * (c) Copyright 2024 Marc-Eric Boury 
 */

require_once __DIR__."/../private/helpers/movies_db_functions.php";



try {
    
    if (isset($_REQUEST["action"])) {
        
        switch ($_REQUEST["action"]) {
            case "display_movie":
                if (empty($_REQUEST["movieId"]) || !is_numeric($_REQUEST["movieId"])) {
                    throw new Exception("bad request parameters.");
                }
                $movie_to_display = get_movie_by_id((int) $_REQUEST["movieId"]);
                include "movies.php";
                break;
            case "create_movie":
                if (empty($_REQUEST["title"]) || empty($_REQUEST["year"])) {
                    throw new Exception("bad request parameters.");
                }
                $duration_h = empty($_REQUEST["duration_hours"]) ? null : (int) $_REQUEST["duration_hours"];
                $duration_m = empty($_REQUEST["duration_minutes"]) ? null : (int) $_REQUEST["duration_minutes"];
                $budget = empty($_REQUEST["budget"]) ? null : (float) $_REQUEST["budget"];
                
                $movie_to_display = create_new_movie($_REQUEST["title"], (int) $_REQUEST["year"], $duration_h, $duration_m, $budget);
                include "movies.php";
                break;
            case "update_movie":
                if (empty($_REQUEST["id"]) || !is_numeric($_REQUEST["id"]) || empty($_REQUEST["title"]) || empty($_REQUEST["year"]) || !is_numeric($_REQUEST["year"])) {
                    throw new Exception("bad request parameters.");
                }
                $duration_h = empty($_REQUEST["duration_hours"]) ? null : (int) $_REQUEST["duration_hours"];
                $duration_m = empty($_REQUEST["duration_minutes"]) ? null : (int) $_REQUEST["duration_minutes"];
                $budget = empty($_REQUEST["budget"]) ? null : (float) $_REQUEST["budget"];
                
                $movie_to_display = update_movie((int) $_REQUEST["id"], $_REQUEST["title"], (int) $_REQUEST["year"], $duration_h, $duration_m, $budget);
                include "movies.php";
                break;
            case "delete_movie":
                if (empty($_REQUEST["id"]) || !is_numeric($_REQUEST["id"])) {
                    throw new Exception("bad request parameters.");
                }
                delete_movie((int) $_REQUEST["id"]);
                include "movies.php";
                break;
            default:
                // TODO unsupported action error
        }
        
    } else {
        echo "missing [action] parameter in request.";
        http_response_code(400);
        exit();
    }
    
} catch (Exception $ex) {
    echo '<span style="color: red;">' . $ex->getMessage() . "</span>";
    http_response_code(500);
    throw $ex;
}
