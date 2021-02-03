<?php 
include( '../../include/connect.php');
$uid = $_GET['id'];

global $con;

$sql = "SELECT cur_reading FROM payment where cid='{$uid}' ORDER BY paid_date desc";

$rs = mysqli_query($con, $sql);


$row = mysqli_fetch_array($rs);

print_r($row[0]);

