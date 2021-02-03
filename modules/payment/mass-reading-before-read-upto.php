<?php 
include( '../../include/connect.php');

global $con;

if (empty($_GET['id'])) {
    echo json_encode(array("status" => false, "message" => "There is no User Selected."));
    exit;
}

$id = mysqli_real_escape_string($con, $_GET['id']);

$query = "SELECT * FROM meter WHERE cid = '{$id}' AND status='unpaid'";



$result = mysqli_query($con, $query);

$reading='';
$read_date='';
$numResults = mysqli_num_rows($result);

$result = mysqli_query($con, $query);
$count = 0;

if (mysqli_num_rows($result) > 0) {

	foreach ($result as $value) {
		//echo 'Reading of '.$value['read_date'].' is '.$value['reading'].'<br>';

		$count = $count +1;
		if($count==$numResults){
			$reading.= '<input type="text" class="form-controlled" value="'.$value['reading'].'" disabled/>';
			$reading.= '<input type="hidden" class="form-controlled" value="'.$value['reading'].'" name="reading" id="reading'.$count.'"/>';
			$read_date.=  '<input type="text" id="nepaliDate5" class="form-controlled" value="'.$value['read_date'].'" disabled />';
			$read_date.=  '<input type="hidden" class="form-controlled" value="'.$value['read_date'].'" name="read_date'.$count.'" id="read_date'.$count.'" />';
		}
		else{

			$reading.=  '<input type="hidden" class="form-controlled" value="'.$value['reading'].'" id="reading'.$count.'" />';
			$read_date.=  '<input type="hidden" class="form-controlled" value="'.$value['read_date'].'" name="read_date'.$count.'" id="read_date'.$count.'" />';

		}
	}
}else{
	$reading.=  '<input type="text" class="form-controlled" value="'.$value['reading'].'" id="reading'.$count.'" disabled/>';
	$read_date.=  '<input type="text" class="form-controlled" value="'.$value['read_date'].'" name="read_date'.$count.'" id="read_date'.$count.'" disabled/>';
}

	
$sql = "SELECT * FROM meter where cid='{$id}' AND status='unpaid' ORDER BY read_date";

$rs = mysqli_query($con, $sql);

$row = mysqli_fetch_array($rs);

$reading_from = $row['read_date'];



$sql = "SELECT * FROM client_dues where cid='{$id}' AND status='unpaid'";

$rs = mysqli_query($con, $sql);

$row = mysqli_fetch_array($rs);

$client_dues = $row['amount'];

   echo json_encode(array("status" => true, 
						   	"reading" => $reading,
						   	"read_date"=>$read_date,
						   	"reading_from"=> $reading_from,
						   	"client_dues"=> $client_dues,
						   	"count"=>$count
						  )
					);
    exit;


?>