<?php 
include( '../../include/connect.php');
$uid = $_GET['id'];

global $con;

$sql = "SELECT dues_return FROM payment WHERE cid=$uid ORDER BY paid_date desc";

$rs = mysqli_query($con, $sql);


	$row = mysqli_fetch_array($rs);
if($row){

	print_r($row[0]);
}else
	echo 0;
