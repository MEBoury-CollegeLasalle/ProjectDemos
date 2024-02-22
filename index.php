<?php
declare(strict_types=1);

require_once "private/helpers/init.php";

echo PRJ_ROOT_DIR . PHP_EOL;
echo is_dir(PRJ_ROOT_DIR) . PHP_EOL;
$testDir = dir(PRJ_ROOT_DIR);
echo $testDir->path . PHP_EOL;
die();

/*
 * ProjectDemos index.php
 * 
 * @author Marc-Eric Boury (MEbou)
 * @since 2024-02-01
 * (c) Copyright 2024 Marc-Eric Boury 
 */

// FIXME @Marc this file is all messed up!

debug($_SERVER);
echo "<br/><br/><br/><br/>";
debug($_REQUEST);


/**
 * This is an example function, it outputs the value of the string parameter
 * to the standard output.
 *
 * @param string $textToEcho The string to send to the standard output.
 * @return void
 *
 * @author Marc-Eric Boury
 * @since  2024-02-01
 */
function helloWorld(string $textToEcho) : void {
    // TODO complete this function
    // echo $textToEcho.PHP_EOL;
}

helloWorld("hello there, says kenobi");


?>