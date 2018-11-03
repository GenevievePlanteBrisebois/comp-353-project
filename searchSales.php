<?php
/**
 * Created by PhpStorm.
 * User: Genevieve
 * Date: 2018-08-08
 * Time: 13:06
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <style>
        footer {
            position:relative;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
<h1>Search for existing contract</h1>

<fieldset>
    <legend><h3>Search by contract number and username</h3></legend>
    Contract Number: <br>
    <input type = "number" name = "contract_num" ><br>
    Username:<br>
    <input type ="text" name = "username"><br><br>


    <input type = "submit" name = "searchButton" value = "Search"><br>
</fieldset>

<fieldset>
    <legend><h3>Search by line of business</h3></legend>


    <input type  = "submit" name = "lineBusiReport" value="Generate Report"><br>
</fieldset>
<fieldset>
    <legend><h3>Search Result</h3></legend>
    Contract Number:<br>
    <br>
    Lead Manager:<br>
    <br>
    List of managers on the project:<br>
    <select size =" 5">

    </select>
    ACV:<br>
    <br>
    Initial Amount: <br>
    <br>
    Client Information:<br>
</fieldset>


<a href = "salesAssistantWindow.php">Create New Contract</a>

<footer>
    Managed by AITS all rights reserved
</footer>
</body>
</html>
