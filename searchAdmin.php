<?php
/**
 * Created by PhpStorm.
 * User: Genevieve
 * Date: 2018-08-08
 * Time: 13:05
 */

include('DB.php');

/*$adminUsername;
$_SESSION['username'] = $adminUsername;
$adminID = $con -> query("SELECT ID FROM user where $adminUsername=user.username");
*/
$adminID = 10034;
$adminUsername = 'admin1';

session_start();






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
<nav><table style = "width: 100%">
        <tr>
            <th style = "width: 25%"><a href = "adminEmployeeManagement.html">Employee Management</a></th>
            <th style = "width: 25%"><a href = "adminContractManagement.html">Contract Management</a></th>
            <th style = "width: 25%"><a href = "adminReports.html">Reports</a></th>
        </tr>
    </table></nav>
<fieldset>
    <legend><h3>Search by contract number and username</h3></legend>
    <form action ="searchAdmin.php" method = "POST">
     Contract Number: <br>
    <input type = "text" name = "contract_num" ><br>
    Client Username:<br>
    <input type ="text" name = "username" id = "username"><br><br>
    <input type = "submit" name = "searchButton" id = "searchButton" value = "Search"><br>
    </form>
    <?php

    if (isset($_POST['searchButton'])){
    $contractNum = $_POST['contract_num'];
    $username = $_POST['username'];
    $clientquery = "SELECT ID FROM user, client WHERE '$username'=user.username and client.client_ID=user.ID ";
    $resultclientID = mysqli_query($con, $clientquery);
    $resultCheckID = mysqli_num_rows($resultclientID);


    if($resultCheckID >0){

        $clientIDArray = $resultclientID->fetch_assoc();
        $clientID = $clientIDArray['ID'];
    }


    $contractID = "SELECT contract_ID FROM contract Where contract_number='$contractNum'";



    /*
    * Queries
    *
    * Queries for the First Result display
    * */
    $contractNum1 = "SELECT contract_number FROM contract where client_ID='$clientID' AND '$contractNum'=contract_number";
    $resultcontractNum1 = mysqli_query($con, $contractNum1);
    $resultCheckcontractNum1 = mysqli_num_rows($resultcontractNum1);
    $rowContract = $resultcontractNum1->fetch_assoc();

    $ACV1 = "SELECT ACV FROM contract where client_ID='$clientID' AND '$contractNum'=contract_number";
    $resultACV1 = mysqli_query($con, $ACV1);
    $resultCheckACV1 = mysqli_num_rows($resultACV1);

    $initialA1 = "SELECT initial_amount FROM contract where client_ID='$clientID' AND '$contractNum'=contract_number";
    $resultInitialA1 = mysqli_query($con, $initialA1);
    $resultCheckInitialA1 = mysqli_num_rows($resultInitialA1);

    $serviceType1 = "SELECT service_type FROM contract where client_ID='$clientID' AND '$contractNum'=contract_number";
    $resultServiceType1 = mysqli_query($con, $serviceType1);
    $resultCheckServiceType1 = mysqli_num_rows($resultServiceType1);


    $contractType1 = "SELECT contract_type FROM contract where client_ID='$clientID' AND '$contractNum'=contract_number";
    $resultContractType1 = mysqli_query($con, $contractType1);
    $resultCheckContractType1 = mysqli_num_rows($resultContractType1);

    $sqlMilestone = "SELECT milestone_number 
                              FROM deliverable,contract 
                              where '$clientID'=contract.client_ID AND deliverable.contract_ID=contract.contract_ID
                              and '$contractNum'=contract.contract_number ";
    $sqlDuration = "SELECT duration_days
                              FROM deliverable,contract 
                              where '$clientID'=contract.client_ID AND deliverable.contract_ID=contract.contract_ID
                              and '$contractNum'=contract.contract_number ";
    $sqlCompletionDate = "SELECT actual_completion_date
                              FROM deliverable,contract 
                              where '$clientID'=contract.client_ID AND deliverable.contract_ID=contract.contract_ID
                              and '$contractNum'=contract.contract_number ";
    $sqlStartDate1 = "SELECT start_date FROM contract, deliverable WHERE contract.contract_ID = deliverable.contract_ID AND '$contractNum'=contract.contract_number";
    $resultStartDate1 = mysqli_query($con, $sqlStartDate1);

    $resultMilestone = mysqli_query($con, $sqlMilestone);
    $resultDuration = mysqli_query($con, $sqlDuration);
    $resultCompletion = mysqli_query($con, $sqlCompletionDate);
    $resultCheckMilestone = mysqli_num_rows($resultMilestone);

    $leadManager = "SELECT lead_ID FROM contract where client_ID='$clientID' AND '$contractNum'=contract_number";
    $resultLeadManager = mysqli_query($con, $leadManager);
    $resultCheckLeadManager = mysqli_num_rows($resultLeadManager);

    $employees = "SELECT employee_ID, first_name, last_name FROM employee WHERE contract_ID = '$contractID' ";
    $resultEmployees = mysqli_query($con, $employees);





    $status = "
SELECT actual_completion_date
FROM deliverable, contract
WHERE deliverable.contract_ID = contract.contract_ID AND contract.contract_number='$contractNum' AND
((milestone_number = 3 AND contract_type != 'Silver') OR (milestone_number = 4 AND contract_type = 'Silver'))";

    $resultStatus = mysqli_query($con, $status);
    $resultCheckStatus = mysqli_num_rows($resultStatus);

    $score = "SELECT score FROM contract WHERE '$clientID'=client_ID AND contract_number = '$contractNum'";


    ?>

    <fieldset id="contractInfoField">
        <legend><h3>Contract Information</h3></legend>

        Contract Number:<br>
        <?php

        echo $contractNum;
        ?>
        <br>
        Annual Contract Value:<br>
        <?php

        if ($resultCheckACV1 > 0) {
            while ($row = $resultACV1->fetch_assoc()) {
                echo $row['ACV'];
            }
        }
        ?>
        <br>
        Initial Amount:<br>
        <?php
        if ($resultCheckInitialA1 > 0) {
            while ($row = $resultInitialA1->fetch_assoc()) {
                echo $row['initial_amount'];
            }
        }
        ?>
        <br>
        Service Type:<br>
        <?php
        if ($resultCheckServiceType1 > 0) {
            while ($row = $resultServiceType1->fetch_assoc()) {
                echo $row['service_type'];
            }
        }
        ?>
        <br>
        Contract Type: <br>
        <?php
        if ($resultCheckContractType1 > 0) {
            while ($row = $resultContractType1->fetch_assoc()) {
                echo $row['contract_type'];
            }
        }
        ?>
        <br>
        Deliverables:<br>
        <table border = "1">
            <tr>
                <th>Milestone Number</th>
                <th>Duration</th>
                <th>Completion Date</th>
                <th>Deadline</th>
            </tr>
            <?php

            /*
             *
            $startDateArray = $resultStartDate1->fetch_assoc();
            $startDate1 = array(count($startDateArray));
            $j=0;
            while ($j <count($startDateArray)){
                $startDate1[$j] = date_create($startDateArray[$j]);
            }

            $cellDuration = $resultDuration->fetch_assoc();
            $duration1 = array(count($cellDuration));
            $k=0;
            while ($j <count($cellDuration)){
                $durationDays[$k] = $cellDuration[$k];
            }

            $milestoneDeadlineArray =array(count($startDateArray));
            $i = 0;
            while ($i<count($milestoneDeadlineArray)){
                $milestoneDeadlineArray[$i] = date_add($startDate1[$i], date_interval_create_from_date_string("'$durationDays[$i]'days"));
            }
             * */
            $startDateArray = $resultStartDate1->fetch_assoc();
            $startDate1 = date_create($startDateArray['start_date']);
            $milestoneDeadline = date_add($startDate1, date_interval_create_from_date_string("'$sqlDuration'days"));
            $mdeadline = $milestoneDeadline -> format('y-m-d');

            if ($resultCheckMilestone > 0) {
                $cellDuration = $resultDuration->fetch_assoc();
                $cellCompletionDate = $resultCompletion->fetch_assoc();

                while ($row = $resultMilestone->fetch_assoc()) {
                    ?>
                    <tr>
                    <td><?php echo $row['milestone_number'] ?></td>
                    <td><?php echo $cellDuration['duration_days'] ?></td>
                    <td><?php echo $cellCompletionDate['actual_completion_date'] ?></td>
                    <td><?php echo $mdeadline ?></td>
                    </tr><?php }
            } ?>


        </table>
        <br>
        Lead Manager ID:<br>
        <?php
        if ($resultCheckLeadManager > 0) {
            while ($row = $resultLeadManager->fetch_assoc()) {
                echo $row['lead_ID'];
            }
        }
        ?>
        <br>
        Employees Working on the project:<br>
        <table style="border:1px ">

            <?php

            if($resultEmployees == false){
                echo "There are no employees working on this contract.";
            }

            else
            {

            $resultCheckEmployee = mysqli_num_rows($resultEmployees);
            ?>
            <table border="1">
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                <?php
                if ($resultCheckEmployee > 0) {
                    while ($row = $resultEmployees->fetch_assoc()) {

                        echo "<tr><td>" . $row['employee_ID'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td></tr>";
                    }
                }
                }
                ?>


            </table>}<?php
            ?>


        </table>
        <br>

        Status of Project:<br>
        <?php

        if ($resultStatus == null) {
            echo "In Process";
        } else {
            echo "Completed";
        }
        ?><br>
        Project Score:<br>
        <?php
        $resultScore = mysqli_query($con, $score);
        if ($resultScore == false) {
            $scoreResult = "Contract not scored yet";
                echo $scoreResult;
        } else {

        $resultCheckScore = mysqli_num_rows($resultScore);


        if ($resultCheckScore > 0) {
            while ($row = $resultScore->fetch_assoc()) {
                echo $row['score'];
            }
        }
        }
        ?>
        <br>

        <?php
        }
    ?>


</fieldset>

<fieldset>
    <legend><h3>Search by line of business</h3></legend>
    <form action ="" method = "POST">
    Select Line of business:<br>
    <select size="5" name = "selectedBusinessType[]">
        <?php
        $sqlLineBusiness = "SELECT business_type FROM lineofbusiness";
        $lineBusinessResult = mysqli_query($con, $sqlLineBusiness);
        $resultCheckLineBusiness = mysqli_num_rows($lineBusinessResult);

        if ($resultCheckLineBusiness>0){
            while ($row = mysqli_fetch_assoc($lineBusinessResult)){
                $businessType = $row['business_type'];
                ?><option name = "<?php echo $businessType?>"value = '<?php echo $businessType?>'><?php echo $businessType ?></option>;<?php
            }


        }

        ?>
    </select><br>
    <input type  = "submit" name = "lineBusiReport" value="search"><br>
    </form>
</fieldset>

    <?php
    if (isset($_POST['lineBusiReport'])){
        $selectedBusiType = $_POST['selectedBusinessType'];
        $businessType1 = $selectedBusiType[0];

        /*getting the business type ID in order to simplify the queries
         * */

        $sqlBusiID = "select lineOfBusiness_ID from lineofbusiness where business_type = '$businessType1'";
        $resultBusiID = mysqli_query($con, $sqlBusiID);
        $resultCheckBusiID = mysqli_num_rows($resultBusiID);

        if($resultCheckBusiID >0){
            $busiIDArray=$resultBusiID ->fetch_assoc();
            $bID = $busiIDArray['lineOfBusiness_ID'];
        }
        $sqlTableLB="select contract_number, company_name, username from lineofbusiness, contract, user, client 
                            where lineofbusiness.business_type = '$businessType1' 
                              and contract.lineOfBusiness_ID= $bID
                              and contract.client_ID=client.client_ID
                              and client.client_ID=ID";
        $resultTableLB = mysqli_query($con, $sqlTableLB);
        $resultCheckTableLB = mysqli_num_rows($resultTableLB);



        ?>
        <fieldset>
            <legend><h3>Contracts In Chosen Line Of Business</h3></legend>
            Chosen Line of Business: <?php echo $businessType1 ?><br>
            <table border = "1">
                <tr>
                    <th>Contract Number</th>
                    <th>Company Name</th>
                    <th>Client Username</th>
                </tr>
                <?php
                if($resultCheckTableLB >0) {
                    while ($row = $resultTableLB->fetch_assoc()) {

                        echo "<tr><td>".$row['contract_number']."</td><td>".$row['company_name']."</td><td>".$row['username']."</td></tr>";
                    }
                }

                ?>
          </table>
        </fieldset><?php
    }

    /*
     * queries for filling the contract specs
     * */
    $sqlContractTypeSpec= "SELECT distinct contract_type FROM contract";
    $contractTypeSpecResult = mysqli_query($con, $sqlContractTypeSpec);
    $resultCheckCTSpec = mysqli_num_rows($contractTypeSpecResult);


    $sqlInsurance= "SELECT distinct plan_name FROM empplan";
    $insuranceResult = mysqli_query($con, $sqlInsurance);
    $resultCheckInsurance = mysqli_num_rows($insuranceResult);

    ?>



<fieldset>
    <legend><h3>Search by Contract Specifications</h3></legend>

    <form action="" method = "POST">
    Select Completion Date: <br>
    <input type = "radio" value = "On time" name = "completionStatus">On time<br>
    <input type = "radio" value = "late" name = "completionStatus"> Late <br>
    <input type  = "radio" value = "null" name = "completionStatus"> NA <br>
    Select a contract type:<br>
    <select name = "contractTypeForm">
        <option name "null" value = "null"> Null</option>

        <?php

        if ($resultCheckCTSpec>0){
            while ($row = mysqli_fetch_assoc($contractTypeSpecResult)){
                $contract_type = $row['contract_type'];
                ?><option name = "<?php echo $contract_type ?>"value = '<?php echo $contract_type?>'><?php echo $contract_type?></option>;<?php
            }
        }
        ?>
    </select><br>
     Enter the duration of the project:<br>
        <input type = "text" name ="duration"><br>
    Select the number of employees working on the project:<br>
    <input type = ="number" name = "numberEmployee" ><br>

    Select Employee Insurance Plan Type:
    <br>
    <select  name = "insurancePlanEmp">
    <!--do not forget to add the option of not available in order to allow to seach without that particular criteria-->
        <option name = "null" value = "null">Null</option>
        <?php

        if ($resultCheckInsurance>0){
            while ($row = mysqli_fetch_assoc($insuranceResult)){
                $plan_name = $row['plan_name'];
                ?><option name = "<?php echo $plan_name ?>"value = '<?php echo $plan_name?>'><?php echo $plan_name?></option>;<?php
            }
        }
        ?></select><br>
    <input type = "submit"  name ="searchSpec" value = "search"><br>
    </form>
</fieldset>
<?php
    if (isset($_POST['searchSpec'])){

        $insuranceInput = $_POST['completionStatus'];
        $completionInput =$_POST['contractTypeForm'];
        $contractTypeInput = $_POST['insurancePlanEmp'];
        $employeeInput = $_POST['numberEmployee'];
        $durationInput = $_POST['duration'];

        /* #7 Number of Premium contracts delivered in more than 10 business days having more than 35 employees with “Silver Employee Plan”.*/

        $sqlOptionFullInfo = "SELECT COUNT(DISTINCT contract.contract_ID)
                              FROM contract, deliverable
                              WHERE DATEDIFF(actual_completion_date, start_date) >$durationInput AND contract.contract_type = '$contractTypeInput' AND
                              contract.contract_ID = deliverable.contract_ID AND milestone_number = 3 AND
                              $employeeInput < (SELECT COUNT(employee.employee_ID)
					          FROM employee, empPlan, worked_on
                              WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = '$insuranceInput' AND worked_on.employee_ID = employee.employee_ID AND
                              worked_on.contract_ID = contract.contract_ID)";


        /*#7B VARIATION FOR FINDING ALL CONTRACTS DELIVERED LATE ,*/
                $sqlOptionLate="SELECT COUNT(*)
                                FROM contract, deliverable
                                WHERE contract.contract_ID = deliverable.contract_ID AND ((DATEDIFF(actual_completion_date,start_date)>duration_days AND contract.contract_type != 'Silver' AND milestone_number = 3) OR
                                (DATEDIFF(actual_completion_date,start_date)>duration_days AND contract.contract_type = 'Silver' AND milestone_number = 4))";

        /* 7B1 VARIATION FOR FINDING ALL CONTRACTS DELIVERED LATE and Gold*/

        $sqlCompletionAndContractType="SELECT COUNT(*)
                                        FROM contract, deliverable
                                        WHERE contract.contract_ID = deliverable.contract_ID AND DATEDIFF(actual_completion_date,start_date) > duration_days AND
                                        contract.contract_type = '$contractTypeInput' AND milestone_number = 3";

#7B2 VARIATION FOR FINDING ALL CONTRACTS DELIVERED LATE and having more than 35 employees with “Silver Employee Plan”
        $sqlCompletionTimeAndEmployeeAndInsurance = "SELECT COUNT(*) FROM contract, deliverable
                      WHERE contract.contract_ID = deliverable.contract_ID AND ((DATEDIFF(actual_completion_date,start_date)>duration_days AND contract.contract_type != '$contractTypeInput' AND milestone_number = 3) OR
                      (DATEDIFF(actual_completion_date,start_date)>duration_days AND contract.contract_type = '$contractTypeInput' AND milestone_number = 4)) AND
                      $employeeInput < (SELECT COUNT(employee.employee_ID)
					  FROM employee, empPlan, worked_on
                      WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = '$insuranceInput' AND worked_on.employee_ID = employee.employee_ID AND
                      worked_on.contract_ID = contract.contract_ID)";

#7C VARIATION FOR FINDING ALL DELIVERED CONTRACTS having more than 35 employees with “Silver Employee Plan”
        $sqlCompleteEmployeeAndInsurance ="SELECT COUNT(*)
                                  FROM contract
                                  WHERE $employeeInput < (SELECT COUNT(employee.employee_ID)
					              FROM employee, empPlan, worked_on
                                  WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = '$insuranceInput' AND worked_on.employee_ID = employee.employee_ID AND
                                  worked_on.contract_ID = contract.contract_ID)";

#7C1 VARIATION FOR FINDING ALL DELIVERED CONTRACTS having more than 35 employees with “Silver Employee Plan” AND PREMIUM
        $sqlCompleteEmployeeInsuranceAndContractType="SELECT COUNT(*)
                                            FROM contract
                                            WHERE $employeeInput < (SELECT COUNT(employee.employee_ID)
					                        FROM employee, empPlan, worked_on
                                            WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = '$insuranceInput' AND worked_on.employee_ID = employee.employee_ID AND
                                            worked_on.contract_ID = contract.contract_ID) AND contract.contract_type = '$contractTypeInput'";
#7D VARIATION FOR FINDING ALL CONTRACTS DELIVERED ON TIME
       $sqlOntime= "SELECT COUNT(*)
                    FROM contract, deliverable
                    WHERE contract.contract_ID = deliverable.contract_ID AND ((DATEDIFF(actual_completion_date,start_date)<=duration_days AND contract.contract_type != 'Silver' AND milestone_number = 3) OR
                    (DATEDIFF(actual_completion_date,start_date)<=duration_days AND contract.contract_type = 'Silver' AND milestone_number = 4))";

#7D1 VARIATION FOR FINDING ALL CONTRACTS DELIVERED ON TIME and Gold
        $sqlOntimeAndCOntractType = "SELECT COUNT(*)
                                      FROM contract, deliverable
                                      WHERE contract.contract_ID = deliverable.contract_ID AND DATEDIFF(actual_completion_date,start_date) <= duration_days AND
                                      contract.contract_type = '$contractTypeInput' AND milestone_number = 3";

#7D2 VARIATION FOR FINDING ALL CONTRACTS DELIVERED ON TIME and having more than 35 employees with “Silver Employee Plan”
        $sqlOnTimeEmployeeInsurance ="    SELECT COUNT(*)
                                          FROM contract, deliverable
                                          WHERE contract.contract_ID = deliverable.contract_ID AND ((DATEDIFF(actual_completion_date,start_date)<=duration_days AND contract.contract_type != 'Silver' AND milestone_number = 3) OR
                                          (DATEDIFF(actual_completion_date,start_date)<=duration_days AND contract.contract_type = 'Silver' AND milestone_number = 4)) AND
                                          35 < (SELECT COUNT(employee.employee_ID)
					                      FROM employee, empPlan, worked_on
                                          WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = 'Silver' AND worked_on.employee_ID = employee.employee_ID AND
        worked_on.contract_ID = contract.contract_ID)";

#7D3 Number of Premium contracts delivered ON TIME having more than 35 employees with “Silver Employee Plan”.

        $sqlOntimeTypeEmployeeInsurance = "SELECT COUNT(DISTINCT contract.contract_ID)
                                            FROM contract, deliverable
                                            WHERE DATEDIFF(actual_completion_date, start_date) <=10 AND contract.contract_type = 'Premium' AND
                                            contract.contract_ID = deliverable.contract_ID AND milestone_number = 3 AND
                                            35 < (SELECT COUNT(employee.employee_ID)
					                        FROM employee, empPlan, worked_on
                                            WHERE employee.empPlanID = empPlan.empPlanID AND plan_name = 'Silver' AND worked_on.employee_ID = employee.employee_ID AND
                                            worked_on.contract_ID = contract.contract_ID)";



        $resultOptionFullInformation =mysqli_query($con, $sqlOptionFullInfo);
        $resultOptionLate = mysqli_query($con, $sqlOptionLate);
        $resultCompletionAndContractType = mysqli_query($con, $sqlCompletionAndContractType);
        $resultCompletionTimeAndEmployeeAndInsurance = mysqli_query($con, $sqlCompletionTimeAndEmployeeAndInsurance);
        $resultComppleteEmployeeAndInsurance = mysqli_query($con, $sqlCompleteEmployeeAndInsurance);
        $resultCompleteEmployeeInsuranceAndContractType = mysqli_query($con, $sqlCompleteEmployeeInsuranceAndContractType);

        /*
         * checking the results to see see if they have data and query works
         * */

        $resultCehckOptionFullInformation = mysqli_num_rows($resultOptionFullInformation);
        $resultCheckOptionLate =mysqli_num_rows($resultOptionLate);
        $resultCheckCompletionAndContractType =mysqli_num_rows($resultCompletionAndContractType);
        $resultCheckCompletionTimeAndEmployeeAndInsurance =mysqli_num_rows($resultCompletionTimeAndEmployeeAndInsurance);
        $resultCheckComppleteEmployeeAndInsurance =mysqli_num_rows($resultComppleteEmployeeAndInsurance);
        $resultCheckCompleteEmployeeInsuranceAndContractType =mysqli_num_rows($resultCompleteEmployeeInsuranceAndContractType);


        /*check the information in the inputs to assign the right query
         * */
        $insuranceInput;
        $completionInput;
        $contractTypeInput;
        $employeeInput;
        $durationInput;

        if($completionInput != "NA" && $insuranceInput!=null && $contractTypeInput != null && $employeeInput !=null && $durationInput!= null){
            if($resultCehckOptionFullInformation>0){

            }
        }elseif ($completionInput == "Late"){
            if ($resultCheckOptionLate > 0){

            }
        }elseif ($completionInput=="Late" && $contractTypeInput !=null){
            if($resultCheckCompletionAndContractType){

            }
        }elseif($completeInput =="NA" && $employeeInput!= null && $insuranceInput != null){

        }






        ?>
        <fieldset>



        </fieldset>
        <?php
    }
?>



<footer>
    Managed by AITS all rights reserved
</footer>
</body>

</html>