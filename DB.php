<?php
//Connect to DB
//$db_host = 'localhost';  //'https://name_group.encs.concordia.ca/';
//$db_user = 'root';
//$db_pass = 'Jojoruru1!';
//$db_name = 'final_prj';

//Create mysqli Objects
//$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); //or die($mysqli->error);

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="Jojoruru1!";
$dbname="final_prj";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$con->close();

//Error Handler
if(mysqli_connect_errno()){
	echo 'The Connection Failed'.mysqli1_connect_error();
	die();
}
?>
