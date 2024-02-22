<?php
declare(strict_types=1);

/*
 * ProjectDemos constants.php
 * 
 * @author Marc-Eric Boury (MEbou)
 * @since 2024-02-08
 * (c) Copyright 2024 Marc-Eric Boury 
 */

/**
 * Represents the absolute path to the project's root directory
 * @const
 */
const PRJ_ROOT_DIR = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;

/**
 * TODO: documentation
 * @const
 */
const PRJ_PUBLIC_DIR = PRJ_ROOT_DIR . "public" . DIRECTORY_SEPARATOR;

/**
 * TODO: documentation
 * @const
 */
const PRJ_PRIVATE_DIR = PRJ_ROOT_DIR . "private" . DIRECTORY_SEPARATOR;

/**
 * TODO: documentation
 * @const
 */
const PRJ_SRC_DIR = PRJ_PRIVATE_DIR . "src" .DIRECTORY_SEPARATOR;