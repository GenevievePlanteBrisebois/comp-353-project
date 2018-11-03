<?php
/**
 * Created with PhpStorm.
 * User: Genevieve Plante-Brisebois 40003112
 * Date: 2018-08-08
 * Time: 13:04
 */include('DB.php');
$clientUsername='client_7';
$_SESSION['username'] = $clientUsername;
$clientIDR = $con -> query("SELECT ID FROM user where '$clientUsername'=user.username");
$clientIDA = $clientIDR ->fetch_assoc();
$clientID = $clientIDA['ID'];

session_start();
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;}

/*
 * Queries for the information of the client
 * */

$sql1 = "SELECT f_name FROM client WHERE '$clientID'=client.client_ID ";
$result1 = mysqli_query($con, $sql1);
$resultCheck1 = mysqli_num_rows($result1);

$sql2 = "SELECT l_name FROM client WHERE '$clientID'=client.client_ID ";
$result2 = mysqli_query($con, $sql2);
$resultCheck2 = mysqli_num_rows($result2);

$sql3 = "SELECT initials FROM client WHERE '$clientID'=client.client_ID ";
$result3 = mysqli_query($con, $sql3);
$resultCheck3 = mysqli_num_rows($result3);

$sql4 = "SELECT city_name FROM client, city WHERE '$clientID'=client.client_ID AND city.city_ID=client.city_ID";
$result4 = mysqli_query($con, $sql4);
$resultCheck4 = mysqli_num_rows($result4);

$sql5 = "SELECT province_name FROM client,province WHERE '$clientID'=client.client_ID AND province.province_ID=client.province_ID ";
$result5 = mysqli_query($con, $sql5);
$resultCheck5 = mysqli_num_rows($result5);

$sql6 = "SELECT postal_code FROM client WHERE '$clientID'=client.client_ID ";
$result6 = mysqli_query($con, $sql6);
$resultCheck6 = mysqli_num_rows($result6);

$sql7 = "SELECT phone_number FROM client WHERE '$clientID'=client.client_ID ";
$result7 = mysqli_query($con, $sql7);
$resultCheck7 = mysqli_num_rows($result7);

$sql8 = "SELECT email FROM client WHERE '$clientID'=client.client_ID ";
$result8 = mysqli_query($con, $sql8);
$resultCheck8 = mysqli_num_rows($result8);
/*query for contract numbers in the form
 * */
$sql9= "SELECT contract_number FROM contract WHERE contract.client_ID = '$clientID'";
$result9 = mysqli_query($con, $sql9);
$resultCheck9 = mysqli_num_rows($result9);

/*Contract Information queries
 * */



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Information</title><style>

        footer {
            clear: both;
            position:relative;
            right: 0;
            bottom: 0;
            left: 0;
            height: 50px;
        }
    </style>
</head>
<body>
<h1>Client Information</h1>

<fieldset>
    <!-- will need to be populated using php-->
    <legend><h3>Personal Information</h3></legend>
    First Name:<br>
    <?php
    if ($resultCheck1 >0){
        while ($row = $result1->fetch_assoc()){
        echo $row['f_name'];
    }
    }
    ?>

    <br>

    <br>
    Last Name: <br>
    <?php
    if ($resultCheck2 >0){
        while ($row = $result2->fetch_assoc()){
            echo $row['l_name'];
        }
    }
    ?> <br>
    Initial: <br>
    <?php
    if ($resultCheck3 >0){
        while ($row = $result3->fetch_assoc()){
            echo $row['initials'];
        }
    }
    ?><br>
    Username:<br>
    <?php
    echo $clientUsername;
    ?><br>
    City:<br>
    <?php
    if ($resultCheck4 >0){
        while ($row = $result4->fetch_assoc()){
            echo $row['city_name'];
        }
    }
    ?>
    <br>
    Province: <br>
    <?php
    if ($resultCheck5 >0){
        while ($row = $result5->fetch_assoc()){
            echo $row['province_name'];
        }
    }
    ?>
    <br>
    Postal Code:<br>
    <?php
    if ($resultCheck6 >0){
        while ($row = $result6->fetch_assoc()){
            echo $row['postal_code'];
        }
    }
    ?>
    <br>
    Phone Number:<br>
    <?php
    if ($resultCheck7 >0){
        while ($row = $result7->fetch_assoc()){
            echo $row['phone_number'];
        }
    }
    ?>
    <br>
    Email:<br>
    <?php
    if ($resultCheck8 >0){
        while ($row = $result8->fetch_assoc()){
            echo $row['email'];
        }
    }
    ?>
    <br>

</fieldset>

<fieldset>
    <legend><h3>Contract List</h3></legend>
    List of all contracts that have been signed with the company:<br>
    <form  method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       <!-- <table border = "1px">
        <tr>
            <th width = "16.67%">Contract Number</th>
            <th width = "16.67%">Lead Manager</th>
            <th width = "16.67%">Start Date</th>
            <th width = "16.67%">Status</th>
        </tr>
        --><select name = "contractNumber" >
         <?php
         if ($resultCheck9>0){
             while ($row = $result9->fetch_assoc()){
                 $contractNum = $row['contract_number'];
                 ?><option name = '<?php echo $contractNum?>' value = '<?php echo $contractNum ?>'><?php echo $contractNum ?></option>;<?php
             }
         }
         ?>
        </select>

           <!-- <tr>
                <td><a href="#" value = "" id="123" onclick="document.getElementById('contractInfoField').style.display='block" >Option1</a></td>
            </tr>
        <!--populate with php, make the contract numbers clickables so that when we click
        on it it leads to either another page or makes the following fieldset appear-->

        <br>
        <input type = "submit" name = "submit" value = "Get Information">
    </form>


</fieldset>

<?php


if (isset($_POST['submit']) ){
   $selectedContractNum = $_POST["contractNumber"];

    ?>

    <fieldset  id="contractInfoField">
        <legend><h3>Contract Information</h3></legend>
        Contract Number:<br>
        <?php
        $sql10 = "SELECT contract_number FROM contract where client_ID='$clientID' AND '$selectedContractNum'=contract_number";
        $result10 = mysqli_query($con, $sql10);
        $resultCheck10 = mysqli_num_rows($result10);

        if ($resultCheck10 >0){
            while ($row = $result10->fetch_assoc()){
                echo $row['contract_number'];
            }
        }
        ?>
        <br>
        Annual Contract Value:<br>
        <?php
        $sql11 = "SELECT ACV FROM contract where client_ID='$clientID' AND '$selectedContractNum'=contract_number";
        $result11 = mysqli_query($con, $sql11);
        $resultCheck11 = mysqli_num_rows($result11);

        if ($resultCheck11 >0){
            while ($row = $result11->fetch_assoc()){
                echo $row['ACV'];
            }
        }
        ?>
        <br>
        Initial Amount:<br>
        <?php
        $sql12 = "SELECT initial_amount FROM contract where client_ID='$clientID' AND '$selectedContractNum'=contract_number";
        $result12= mysqli_query($con, $sql12);
        $resultCheck12 = mysqli_num_rows($result12);

        if ($resultCheck12 >0){
            while ($row = $result12->fetch_assoc()){
                echo $row['initial_amount'];
            }
        }
        ?>
        <br>
        Service Type:<br>
        <?php
        $sql13 = "SELECT service_type FROM contract where client_ID='$clientID' AND '$selectedContractNum'=contract_number";
        $result13 = mysqli_query($con, $sql13);
        $resultCheck13 = mysqli_num_rows($result13);

        if ($resultCheck13 >0){
            while ($row = $result13->fetch_assoc()){
                echo $row['service_type'];
            }
        }
        ?>
        <br>
        Contract Type: <br> <?php
        $sql10 = "SELECT contract_type FROM contract where client_ID='$clientID' AND '$selectedContractNum'=contract_number";
        $result10 = mysqli_query($con, $sql10);
        $resultCheck10 = mysqli_num_rows($result10);

        if ($resultCheck10 >0){
            while ($row = $result10->fetch_assoc()){
                echo $row['contract_type'];
            }
        }
        ?>
        <br>
        Deliverables:<br>
        <table border = "1">
            <?php

            $sqlMilestones = "SELECT milestone_number, duration_days, actual_completion_date FROM deliverable, contract
                              WHERE '$clientID'=contract.client_ID AND deliverable.contract_ID=contract.contract_ID
                              and '$selectedContractNum'=contract.contract_number ";
            $resultMilestones = mysqli_query($con, $sqlMilestones);

            $resultCheckMilestone = mysqli_num_rows($resultMilestones);

            if ($resultCheckMilestone >0){
                ?>
                <tr>
                    <th>Milestone Number</th>
                    <th>Duration</th>
                    <th>Completion Date</th>
                </tr>
                <?php
                while ($row = $resultMilestones->fetch_assoc()){
                    ?><tr>
                        <td><?php echo $row['milestone_number']?></td>
                        <td><?php echo $row['duration_days']?></td>
                        <td><?php echo $row['actual_completion_date']?></td>
            </tr><?php }}?>



        </table>
        <br>
        Lead Manager:<br>
        <?php
        $sql11 = "SELECT lead_ID FROM contract where client_ID='$clientID' AND '$selectedContractNum'=contract_number";
        $result11 = mysqli_query($con, $sql11);
        $resultCheck11 = mysqli_num_rows($result11);

        if ($resultCheck11 >0){
            while ($row = $result11->fetch_assoc()){
                echo $row['lead_ID'];
            }
        }
        ?>
        <br>
        Average Score of Lead Manager:<br>
        <?php
            $scoreQuery = "SELECT AVG(score) from contract where lead_ID = 'result11'";
            $resultSCore = mysqli_query($con, $scoreQuery);

        if($resultSCore == false){
            echo "Manager not scored yet";
        }else{
            $resultCheckScore = mysqli_num_rows($resultSCore);
        if ($resultCheckScore>0){
            while ($row = $resultSCore->fetch_assoc()){
                echo $row['score'];
            }
        }}
        ?>
        <br>
        Status of Project:<br>
        <?php
        $status = "
SELECT actual_completion_date
FROM deliverable, contract
WHERE deliverable.contract_ID = contract.contract_ID AND contract.contract_number='$selectedContractNum' AND
((milestone_number = 3 AND contract_type != 'Silver') OR (milestone_number = 4 AND contract_type = 'Silver'))";

        $resultStatus = mysqli_query($con, $status);
        $resultCheck13 = mysqli_num_rows($resultStatus);

        if($resultStatus==null){
            echo "In Process";
        }else {
        echo "Completed";

        ?><br>
        <!--make it so that the client can only rate if the completion status is set to be completed-->
        <?php
        $contractIDquery = "SELECT contract_ID FROM contract WHERE contract_number='$selectedContractNum'";
        $CID = mysqli_query($con, $contractIDquery);
        $contractIDA = $CID->fetch_assoc();
        $contractID = $contractIDA['contract_ID'];
        $scoreValue = "SELECT score_value From score where contract_ID='$contractID'";
        $scoreVquery = mysqli_query($con, $scoreValue);
        $scoreVA = $scoreVquery->fetch_assoc();
        $score = $scoreVA['score_value'];
        if ($score != false) {
            ?>
            Project Score:<br>

            <?php

            echo $score;

        }else{
             ?>    Rate this project:<br>
         <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
        <input type = "number" name = "score" max = "10"><br>
        <input type  = "submit" name  = "Rate" value ="Rate"><br>
         </form>
        <?php



                if (isset($_POST['Rate'])){
                    $scoreInput = $_POST['score'];
                   echo $scoreInput;
                    $sqlScoreUpdate = "UPDATE score SET score_value=$scoreInput WHERE contract_ID = $selectedContractNum";


                    if($con ->query($sqlScoreUpdate)){

                        echo "Score Updated";
                    }else{
                        echo "Update Failed";
                    }

                }
            }
        }


        ?>



    </fieldset>
<?php
} ?>




<footer>
    Managed by AITS all rights reserved
</footer>
</body>
</html>