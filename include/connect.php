<?php

ob_start();

error_reporting(0);
error_reporting(E_ERROR);

$db="localhost";
$user="root";
$pass="";
$dbname="khanepani";
$con=mysqli_connect($db,$user,$pass,$dbname) or die();

?>