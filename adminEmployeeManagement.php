<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Management</title>
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
<header><h1>Employee Management</h1></header>

<nav><table style = "width: 100%">
        <tr>
            <th style = "width: 25%"><a href = "adminMain.php">Personal Information</a></th>
            <th style = "width: 25%"><a href = "searchAdmin.php">Search Contracts</a></th>
            <th style = "width: 25%"><a href = "adminContractManagement.php">Contract Management</a></th>
            <th style = "width: 25%"><a href = "adminReports.php">Reports</a></th>
        </tr>
    </table></nav>
<fieldset>
    <legend><h3>Employee List</h3></legend>
    <select size = "10">
        <!--fill up the table with php to get the list of employees managed by that person-->

    </select><br>

    <input type = "submit" value  = "Select Employee" name = "selectEmployee">
    <input type = "submit" value = "Create New Employee" name = "createNewEmployee">

</fieldset>


<!--This will be how things should be displayed for the employee that is selected, display will be triggered by selecting the employee-->


<fieldset>
    <legend><h3>Employee Information</h3></legend>
    Contract Preference: <br>
    Working on contract number: <br>
    Has been working on contract for :___________ hours <br>
    Assign to new contract:<br>
    <select>
        <!--  will be a selection made with the curent contracts present in the db and that fits with the critereas from the preferences ex: if preference is diamond only active diamond contracts should be in the list-->
        <option>no assignment</option><!-- this would be to maintain an employee to no contract or to take them off from a contract without putting them on a new one-->
    </select>
    <br>
    <input type = "submit" value = "Change Assignment">
    <br>
    Insurance Plan:<br>
    <br>
    <select><!--put the available employee insurance plans--></select>
    <input type  = "submit" value ="Modify Plan" name = "modifyPlan"><br>
</fieldset>
<fieldset>
    <legend><h3>Create New Employee</h3></legend>
    First Name:<br>
    <input type  = "text" name = "first_name"><br>
    Middle Initial:<br>
    <input type = "text" name = "last_name"><br>
    Department:<br>
    <select>
        <!--populate with the list of departments in the database-->
    </select><br>
    Monthly hours:<br>
    <input type = "text" name = "monthly_hours"><br>
    Province:<br>
    <select size = "4">
        <!-- populate with php-->
    </select><br>
    City:<br>
    <select size = "4">
        <!--populate with php to fit with the information in the db-->
    </select><br>
    Username:<br>
    <input type = "text" name = "username"><br>
    Password:<br>
    <input type  = "text" name = "password"><br>
    <input type = "submit" name = "createEmployee" value = "Create New Employee"><br>

</fieldset>

<footer>
    Managed by AITS all rigths reserved
</footer>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Genevieve
 * Date: 2018-08-08
 * Time: 12:36
 */