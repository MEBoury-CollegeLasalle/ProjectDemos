<?php
declare(strict_types=1);

/*
 * ProjectDemos database.php
 * 
 * @author Marc-Eric Boury (MEbou)
 * @since 2024-02-22
 * (c) Copyright 2024 Marc-Eric Boury 
 */

const DATABASE_NAME = "dw3_basic_project_demo";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/**
 * @return mysqli
 *
 * @author Marc-Eric Boury
 * @since  2024-02-22
 */
function getDbConnection() : mysqli {
    static $existing_connection;
    if (!($existing_connection instanceof mysqli)) {
        $existing_connection = new mysqli("localhost", "root", "", DATABASE_NAME, 3306);
        $existing_connection->options(MYSQLI_OPT_CONNECT_TIMEOUT, 15);
    }
    return $existing_connection;
}