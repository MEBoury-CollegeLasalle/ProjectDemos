<?php
declare(strict_types=1);

/*
 * ProjectDemos movies_db_functions.php
 * 
 * @author Marc-Eric Boury (MEbou)
 * @since 2024-02-22
 * (c) Copyright 2024 Marc-Eric Boury 
 */

require_once "database.php";

/**
 * @return array
 * @throws Exception
 *
 * @author Marc-Eric Boury
 * @since  2024-02-22
 */
function get_all_movies() : array {
    try {
        $connection = getDbConnection();
        $result_set = $connection->query("SELECT * FROM `movies`;");
        
        $movies_array = [];
        foreach ($result_set as $movie_result) {
            $movies_array[] = $movie_result;
        }
        
        return $movies_array;
        
    } catch (Exception $previous) {
        throw new Exception("Error while retrieving all movies from the database.", 0, $previous);
    }
}

/**
 * @param int $movieId
 * @return array|null
 * @throws Exception
 *
 * @author Marc-Eric Boury
 * @since  2024-02-22
 */
function get_movie_by_id(int $movieId) : ?array {
    try {
        $connection = getDbConnection();
        $statement = $connection->prepare("SELECT * FROM `movies` WHERE id = ? ;");
        
        $statement->bind_param("i", $movieId);
        $statement->execute();
        
        $result_set = $statement->get_result();
        if ($result_set->num_rows < 1) {
            // mo results for the specified ID
            return null;
        } elseif ($result_set->num_rows > 1) {
            // more than 1 movie for specified ID... what have you done!???
            throw new Exception("More than one movie entry for id #$movieId.");
        }
        
        return $result_set->fetch_assoc();
        
    } catch (Exception $previous) {
        throw new Exception("Error while retrieving movie id #$movieId from the database.", 0, $previous);
    }
}

/**
 * @param string     $title
 * @param int        $year
 * @param int|null   $duration_hours
 * @param int|null   $duration_minutes
 * @param float|null $budget
 * @return array
 * @throws Exception
 *
 * @author Marc-Eric Boury
 * @since  2024-02-22
 */
function create_new_movie(string $title, int $year, ?int $duration_hours = null, ?int $duration_minutes = null, ?float $budget = null) : array {
    
    try {
        $connection = getDbConnection();
        $statement = $connection->prepare("INSERT INTO `movies` (`title`, `year`, `duration_hours`, `duration_minutes`, `budget`) VALUES (?, ?, ?, ?, ?);");
        
        $statement->bind_param("siiid", $title, $year, $duration_hours, $duration_minutes, $budget);
        $statement->execute();
        
        $inserted_id = $connection->insert_id;
        
        return get_movie_by_id($inserted_id);
        
    } catch (Exception $previous) {
        throw new Exception("Exception while creating a new movie in the database.", 0, $previous);
    }
    
}

/**
 * @param int        $id
 * @param string     $title
 * @param int        $year
 * @param int|null   $duration_hours
 * @param int|null   $duration_minutes
 * @param float|null $budget
 * @return array
 * @throws Exception
 *
 * @author Marc-Eric Boury
 * @since  2024-02-22
 */
function update_movie(int $id, string $title, int $year, ?int $duration_hours = null, ?int $duration_minutes = null, ?float $budget = null) : array {
    
    try {
        $connection = getDbConnection();
        $statement = $connection->prepare("UPDATE `movies` SET `title` = ?, `year` = ?, `duration_hours` = ?, `duration_minutes` = ?, `budget` = ? WHERE `id` = ? ;");
        
        $statement->bind_param("siiidi", $title, $year, $duration_hours, $duration_minutes, $budget, $id);
        $statement->execute();
        
        return get_movie_by_id($id);
        
    } catch (Exception $previous) {
        throw new Exception("Exception while updating movie #$id in the database.", 0, $previous);
    }
}

/**
 * @param int $id
 * @return void
 * @throws Exception
 *
 * @author Marc-Eric Boury
 * @since  2024-02-22
 */
function delete_movie(int $id) : void {
    try {
        $connection = getDbConnection();
        $statement = $connection->prepare("DELETE FROM `movies` WHERE `id` = ? ;");
        
        $statement->bind_param("i", $id);
        $statement->execute();
        
    } catch (Exception $previous) {
        throw new Exception("Exception while deleting movie #$id in the database.", 0, $previous);
    }
}