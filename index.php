<?php
declare(strict_types=1);

#require_once "private/helpers/init.php";

include "public/movies.php";

/*

require_once "private/helpers/movies_db_functions.php";

try {
    create_new_movie("Dune Part II", 2024, null, null, 250000000.0);
} catch (Exception $exception) {
    echo $exception->getTraceAsString()."<br/>";
    echo $exception->getMessage()."<br/>";
    while ($exception->getPrevious() instanceof Throwable) {
        $exception = $exception->getPrevious();
        echo $exception->getMessage()."<br/>";
    }
}
*/

?>