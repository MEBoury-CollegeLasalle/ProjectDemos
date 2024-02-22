<?php
declare(strict_types=1);

/*
 * ProjectDemos demo_page.php
 * 
 * @author Marc-Eric Boury (MEbou)
 * @since 2024-02-13
 * (c) Copyright 2024 Marc-Eric Boury 
 */

use Normslabs\DemoProject\Dtos\TestDTO;

require_once "../private/helpers/init.php";



?>
<!DOCTYPE html>
<html lang="en">
<body>
    <h1>Dipplay text</h1>
    <form action="/ProjectCreationDemo/public/api.php" method="post">
        <input type="hidden" name="action" value="doDisplayText" />
        <div>
            <label for="textField">Enter Some Text:</label>
            <input id="textField" name="textToDisplay" type="text" maxlength="256" required>
        </div>
        <div>
            <input type="submit" value="SubmitText">
        </div>
    </form>
    <h1>Dipplay red text</h1>
    <form action="/ProjectCreationDemo/public/api.php" method="post">
        <input type="hidden" name="action" value="doDisplayTextRed" />
        <div>
            <label for="textField">Enter Some Text:</label>
            <input id="textField" name="textToDisplay" type="text" maxlength="256" required>
        </div>
        <div>
            <input type="submit" value="SubmitText">
        </div>
    </form>
    <h1>testStatusCodes</h1>
    <form action="/ProjectCreationDemo/public/api.php" method="post">
        <input type="hidden" name="action" value="testStatusCode" />
        <input type="hidden" name="statusCode" value="400" />
        <input type="submit" value="Test code 400" />
    </form>
    <form action="/ProjectCreationDemo/public/api.php" method="post">
        <input type="hidden" name="action" value="testStatusCode" />
        <input type="hidden" name="statusCode" value="401" />
        <input type="submit" value="Test code 401" />
    </form>
    <form action="/ProjectCreationDemo/public/api.php" method="post">
        <input type="hidden" name="action" value="testStatusCode" />
        <input type="hidden" name="statusCode" value="403" />
        <input type="submit" value="Test code 403" />
    </form>
    <h1>test exception</h1>
    <form action="/ProjectCreationDemo/public/api.php" method="post">
        <input type="hidden" name="action" value="testException" />
        <input type="submit" value="Test exception" />
    </form>
</body>
</html>
