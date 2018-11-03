<?php
/**
 * Created with PhpStorm.
 * User: Genevieve Plante-Brisebois 40003112
 * Date: 2018-08-08
 * Time: 13:04
 */include('DB.php');


$salesUsername='empl_6';
/*$_SESSION['username'] = $salesUsername;*/
$salesIDR = $con -> query("SELECT ID FROM user where '$salesUsername'=user.username");
$salesIDA = $salesIDR ->fetch_assoc();
$salesID = $salesIDA['ID'];

session_start();



$sqlLineBusiness = "SELECT distinct business_type FROM lineofbusiness";
$resultLineBusiness = mysqli_query($con, $sqlLineBusiness);

$sqlContractService = "SELECT distinct contract_type, service_type FROM contract order by service_type";
$resultContractService = mysqli_query($con, $sqlContractService);

$sqlProvince = "SELECT distinct province_name FROM province";
$resultProvince = mysqli_query($con, $sqlProvince);

$sqlCity = "SELECT distinct city_name FROM city";
$resultCity = mysqli_query($con, $sqlCity);


?>




<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> sales associate</title>
    <style>
        footer {
            position:relative;
            right: 0%;
            bottom: 0%;
            left: 0%;
            background: white;
        }
    </style>
</head>

<body>
<header>
    <h1> New Contract </h1>
    <!--make the sales assistant ID pop up from their log in information-->

</header>
<nav>
  <h4> <a href = "searchSales.php">Search Existing Contracts</a></h4>
</nav>


<section>
   <h3> Sales Assistant ID: <?php echo $salesID ?> </h3>
    <!-- list of business fields-->
    <form>

        <fieldset>
            <legend> <b>Line of Business </b></legend>
            <!-- populate with the db and php-->
            <form action = "" method ="POST">
            <select size ="5" name = "lineBusiness" >
                <?php
                while ($lineBusinessArray = $resultLineBusiness ->fetch_assoc()){
                    $lineBusiness = $lineBusinessArray['business_type'];
                    ?><option name = '<?php echo $lineBusiness?>' value = '<?php echo $lineBusiness ?>'><?php echo $lineBusiness ?></option>;<?php
                }
                ?>

            </select>

        <!-- contract types that the sales associate can choose from-->

            <legend><b>Contract and Service Type </b></legend>
            <select size = "5" name = "contractService">
                <?php
                while ($contractServiceArray = $resultContractService ->fetch_assoc()){
                    $ContractService = $contractServiceArray['contract_type']. ",".$contractServiceArray['service_type'];
                    ?><option name = '<?php echo $ContractService?>' value = '<?php echo $ContractService ?>'><?php echo $ContractService ?></option>;<?php
                }
                ?>

            </select>


            <legend><b>Company and Contact Information </b></legend>
                Company Name: <br>
                    <input type = "text" name = "company_name" ><br>
                <b>Contact Information of Signatory of Contract: </b><br>
                First Name:<br>
                    <input type = "text" name = "client_f_name"><br>

                Last Name: <br>
                    <input type = "text" name = "client_l_name" ><br>
                Initials:<br>
                <input type = "text" name = "initial" ><br>
                Contact Number:<br>
                    <input type = "number" name = "client_phone_num" ><br>
                Email:<br>
                    <input type = "email" name = "client_email" ><br>
                Street Address:<br>
                    <input type = "text" name = "street_address"><br>
                Province: <br>
                <!--populate with db-->
                <select size = "5" name  = "province">
                <?php
                while ($provinceArray = $resultProvince ->fetch_assoc()){
                    $province = $provinceArray['province_name'];
                    ?><option name = '<?php echo $province?>' value = '<?php echo $province ?>'><?php echo $province ?></option>;<?php
                }
                ?>
                </select>

                <br>
                City:<br>
            <br>
            <!--populate with DB-->
                <select size = "5" name  = "city">
                    <?php
                    while ($cityArray = $resultCity ->fetch_assoc()){
                        $city = $cityArray['city_name'];
                        ?><option name = '<?php echo $city?>' value = '<?php echo $city ?>'><?php echo $city ?></option>;<?php
                    }
                    ?>
                </select><br>

            Postal Code: <br>
            <input type ="text" name = "postal_code"><br>




            <legend> <b> Contract Information </b></legend>

            <!-- have to look into the automation of the contract IDs and how to display the infor with the php-->
            Contract Number:<br>
                <input type = "text" name = "contractNumber"><br>
            Annual Contract Value:<br>
                <input type = "number" name = "ACV"><br>
            Initial Amount:<br>
                <input type = "number" name = "initial_amount"><br>
            Start Date:<br>
                <input type = "date" name = "start_date"><br>

        </fieldset>
        <br><br>
        <input type  = "submit" name = "NewContract" value = "Create New Contract"><br><br>
    </form>

</section>
<?php
    if(isset($_POST['NewContract'])){
        $lineBusinessInput = $_POST['lineBusiness'];
        $contractServiceInput = $_POST['contractService'];
        $contractServiceInputArray = explode(" ", $contractServiceInput);
        $contractType = $contractServiceArray[0];
        $serviceType = $contractServiceArray[1];
        $companyName = $_POST['company_name'];
        $firstName = $_POST['client_f_name'];
        $lastName = $_POST['client_l_name'];
        $initials = $_POST['initial'];
        $phone = $_POST['client_phone_num'];
        $email = $_POST['client_email'];
        $street = $_POST['street_address'];
        $prov = $_POST['province'];
        $cityInput = $_POST['city'];
        $postalCode = $_POST['postal_code'];
        $contractNumInput = $_POST['contractNumber'];
        $ACVInput = $_POST['ACV'];
        $initAmount = $_POST['initial_amount'];
        $startDate = $_POST['start_date'];

        $sqlNewClient = "INSERT INTO client ";


    }



?>

<footer>
    Managed by AITS all rights reserved
</footer>





</body>



</html>