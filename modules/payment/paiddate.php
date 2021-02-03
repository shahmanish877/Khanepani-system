<?php 
include( '../../include/connect.php');
$uid = $_GET['id'];

global $con;

$sql = "SELECT read_date FROM meter where cid='{$uid}' AND status='unpaid' ORDER BY read_date ";

$rs = mysqli_query($con, $sql);


$row = mysqli_fetch_array($rs);

print_r($row[0]);

