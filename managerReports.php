<?php
/**
 * Created by PhpStorm.
 * User: Genevieve
 * Date: 2018-08-12
 * Time: 20:42
 */


include('DB.php');
session_start();


/*$managerUsername;
$_SESSION['username'] = $managerUsername;
$managerID = $con -> query("SELECT ID FROM user where $managerUsername=user.username");
*/
$managerID = 10000;
$managerUsername = 'empl_1';



/*queries for populating the fields
 * */

$sqlDeliverableNum = "SELECT distinct milestone_number from deliverable";
$sqlLineBusiness = "SELECT distinct business_type FROM lineofbusiness";
$sqlContractType = "SELECT distinct contract_type FROM contract";
$sqlProvince = "SELECT distinct province_name FROM province";


/*getting the results for the queries in order to be able to populate the selection menus
 * */

$resultDeliverableNum = mysqli_query($con, $sqlDeliverableNum);
$resultLineBusiness = mysqli_query($con, $sqlLineBusiness);
$resultContractType = mysqli_query($con, $sqlContractType);
$resultProvince = mysqli_query($con, $sqlProvince);



?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
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
<header><h1>Report Generator</h1></header>
<nav><table style = "width: 100%">
    <tr>
        <th style = "width: 25%"><a href = "managerMain.php">Personal Information</a></th>
        <th style = "width: 25%"><a href = "searchMana.php">Search Existing Contracts</a></th>
        <th style = "width: 25%"><a href = "managerEmployeeManagement.php">Employee Management</a></th>
        <th style = "width: 25%"><a href = "managerContractManagement.php">Contract Management</a></th>
    </tr>
</table></nav>
<fieldset>
    <legend><h3>Deliverable Analysis</h3></legend>
    <form action = "" method="POST">
        Deliverable to Analyse:<br>
        <select name = "deliverableNum">
            <!--fill with php the deliverable number, 1, 2, 3, final deliverable-->
            <?php

            while ($deliverableNumArray = $resultDeliverableNum ->fetch_assoc()){
                $deliverableNum = $deliverableNumArray['milestone_number'];
                ?><option name = '<?php echo $deliverableNum?>' value = '<?php echo $deliverableNum ?>'><?php echo $deliverableNum ?></option>;<?php
            }
            ?>
        </select><br>
        Year:<br>
        <input type  = "text" size  = "5" name = "year" ><br>
        <input type = "submit" value ="Generate Report" name = "generateR1"><br>
    </form>
</fieldset>

<fieldset>
    <legend><h3>Contract Updates</h3></legend>
    <form action ="" method ="POST">
        Information on the contracts recorded in the last
        <input type = "number" name ="days"> days <br>
        Contracts recorded by:<br>
        <input type = "text" name = "salesID" value  = "Sales Associate ID"><br>
        <input type = "submit" value ="Generate Report" name = "generateR2"><br>
    </form>
</fieldset>
<fieldset>
    <legend><h3>Line Of Business</h3></legend>
    <form action = "" method  = "POST">
        Select Line Of Business:<br>
        <select size  = "4" name = "lineBusiness"><!--get the different types of lines of business-->
            <?php
            while ($lineBusinessArray = $resultLineBusiness ->fetch_assoc()){
                $lineBusiness = $lineBusinessArray['business_type'];
                ?><option name = '<?php echo $lineBusiness?>' value = '<?php echo $lineBusiness ?>'><?php echo $lineBusiness ?></option>;<?php
            }
            ?>
        </select>
        <br>
        <input type = "submit" value = "Generate Report" name ="generateR3"><!--generate report #client with highest # of contract in tjat line of business-->
    </form>
</fieldset>
<?php
/*deliverable analysis
 * */
if (isset($_POST['generateR1'])){
    $deliverableNumber = $_POST['deliverableNum'];
    $year = $_POST['year'];

    $sqlDeliverableAnalysis = "SELECT distinct contract.contract_ID, MONTH(actual_completion_date) AS month, contract_type, duration_days, DATEDIFF(actual_completion_date, start_date) AS difference
                                FROM contract, deliverable, employee
                                WHERE contract.contract_ID = deliverable.contract_ID AND milestone_number = $deliverableNumber AND YEAR(actual_completion_date) = '$year' ";

    $deliverableAnalysisResult = mysqli_query($con, $sqlDeliverableAnalysis);
    if($deliverableAnalysisResult != false){
        $deliverableAnalysisArray = $deliverableAnalysisResult->fetch_assoc();
        ?>


            <table border="1">

            <tr>
                <th>Contract ID</th>
                <th>Month Of Completion Date</th>
                <th>Contract Type</th>
                <th>Duration</th>
                <th>Difference Between Duration and Execution Time</th>
            </tr>
                <?php

                     while ($row = $deliverableAnalysisResult->fetch_assoc()) {

                        echo "<tr><td>" . $row['contract_ID'] . "</td><td>" . $row['month'] . "</td><td>" . $row['contract_type'] . "</td>
                        <td>".$row['duration_days']."</td><td>".$row['difference']."</td></tr>";
                    }
                }

                ?>

        </table>
<?php
    }




/*contract updates report
 * */
elseif(isset($_POST['generateR2'])){
    $salesID = $_POST['salesID'];
    $duration = $_POST['days'];

    $sql1 ="SELECT contract.contract_ID, start_date, client_ID, service_type, ACV, contract_type, initial_amount, lead_ID, lineOfBusiness_ID
            FROM contract, employee
            WHERE DATEDIFF(CURRENT_TIMESTAMP, start_date) <= $duration AND $salesID = employee_ID AND employee.contract_ID = contract.contract_ID";

    $result1 = mysqli_query($con, $sql1);

if($result1 != false){

?>


<table border="1">

    <tr>
        <th>Contract ID</th>
        <th>Start Date</th>
        <th>Client ID</th>
        <th>Service Type</th>
        <th>ACV</th>
        <th>Contract Type</th>
        <th>Initial Amount</th>
        <th>Lead ID</th>
        <th>Line Of Business ID</th>
    </tr>
    <?php

    while ($row = $result1->fetch_assoc()) {

        ?><tr>
                <td><?php echo $row['contract_ID'] ?></td>
                <td><?php echo $row['start_date'] ?></td>
                <td><?php echo $row['client_ID'] ?></td>
                <td><?php echo $row['service_type']?></td>
                <td><?php echo $row['ACV']?></td>
                <td><?php echo $row['contract_type']?></td>
                <td><?php echo $row['initial_amount']?></td>
                <td><?php echo $row['lead_ID']?></td>
                <td><?php echo $row['lineOfBusiness_ID']?></td></tr>
        <?php

    }
    }else {
    echo "No Contract Entered By '$salesID' in the last '$duration' days";
}
    ?>
</table>
<?php

}
/*
 * line of business report*/
elseif(isset($_POST['generateR3'])){
$lineOfBusiness = $_POST['lineBusiness'];



   $sql2=" SELECT company_name
          FROM client, contract, lineOfBusiness
          WHERE lineOfBusiness.lineOfBusiness_ID = contract.lineOfBusiness_ID AND contract.client_ID = client.client_ID AND business_type = '$lineOfBusiness'
          GROUP by company_name
          ORDER BY COUNT(contract.client_ID) DESC
          LIMIT 1";

$result2 = mysqli_query($con, $sql2);

if($result2 != false){

?>
<fieldset>
Client with the highest number of contracts in the chosen line of business:<br>
<?php echo $lineOfBusiness ?>
<table border="1">

    <tr>
        <th>Company Name</th>

    </tr>
    <?php

    while ($row = $result2->fetch_assoc()) {

        ?><tr>
        <td><?php echo $row['company_name'] ?></td>
        </tr>
        <?php

    }
    }else {
        echo "No clients for '$lineOfBusiness' .";
    }
    ?>
</table></fieldset>
<?php
}?>

<footer>
Managed by AITS all rigths reserved
</footer>
</body>
</html>
