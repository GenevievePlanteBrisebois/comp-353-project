<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contract Management</title><style>
        footer {
            position:absolute;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
<header><h1>Contract Management</h1></header>
<nav><table style = "width: 100%">
        <tr>
            <th style = "width: 25%"><a href = "adminMain.php">Personal Information</a></th>
            <th style = "width: 25%"><a href = "searchAdmin.php">Search Existing Contracts</a></th>
            <th style = "width: 25%"><a href = "adminEmployeeManagement.php">Employee Management</a></th>
            <th style = "width: 25%"><a href = "adminReports.php">Reports</a></th>
        </tr>
    </table></nav>

<fieldset>
    <legend><h3>Contracts</h3></legend>
    List of contracts in the company:<br>
    <select size  = "10">
        <!-- populate with the php-->
    </select>
    <input type = "submit" value = "View Information">

</fieldset>
<!--fieldset that gets displayed once a contract has been selected-->
<fieldset>
    <legend><h3>Contract Information</h3></legend>
    <strong>Contract Number <!--get number from the selection above--></strong><br><br>
    Contract Type:<br>
    <br>
    Service Type:<br>
    <br>
    Lead Manager:<br>
    <br>
    Statisfaction Score:
    <br>
    <br>
    Deliverables:<br>
    <table>
        <!--populate with the information from the database, show the deadlines and when they were completed-->
    </table>
    Employees working on the contract:<br>
    <table>
        <!--fill with php, idea-->
    </table>
    <br>
    <strong>Client Information:</strong><br>
    Company name:<br>
    <br>
    Signatory Name:<br>
    <br><!--get the first name and last name from the db-->
    Email:<br>
    <br>
    Phone Number:<br>
    <br>

    <input type = "button" name = "modify" value = "Modify Information">
    <!--Make it so that the fields can then be edited when the admin clicks on the button to modify the information-->

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