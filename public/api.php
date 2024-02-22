<?php
declare(strict_types=1);

/*
 * ProjectDemos api.php
 * 
 * @author Marc-Eric Boury (MEbou)
 * @since 2024-02-13
 * (c) Copyright 2024 Marc-Eric Boury 
 */

require_once "../private/helpers/init.php";


function DoDisplayText(string $textToDisplay) : void {
    echo $textToDisplay;
    http_response_code(200);
    exit();
}

function DoDisplayTextRed(string $textToDisplay) : void {
    echo '<span style="color: red;">' . $textToDisplay . "</span>";
    http_response_code(200);
    exit();
}


try {
    
    if (isset($_REQUEST["action"])) {
        
        switch ($_REQUEST["action"]) {
            case "doDisplayText":
                if (!isset($_REQUEST["textToDisplay"])) {
                    http_response_code(400);
                    exit();
                }
                DoDisplayText($_REQUEST["textToDisplay"]);
                break;
            case "doDisplayTextRed":
                if (!isset($_REQUEST["textToDisplay"])) {
                    http_response_code(400);
                    exit();
                }
                DoDisplayTextRed($_REQUEST["textToDisplay"]);
                break;
            case "testStatusCode":
                if (!isset($_REQUEST["statusCode"]) || !is_numeric($_REQUEST["statusCode"])) {
                    http_response_code(400);
                    exit();
                }
                http_response_code($_REQUEST["statusCode"] + 0);
                exit();
            case "testException":
                throw new Exception("This is a test exception!");
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
