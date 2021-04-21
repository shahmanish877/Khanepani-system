<?php 
include( '../../include/connect.php');

global $con;

if (empty($_GET['id'])) {
    echo json_encode(array("status" => false, "message" => "There is no User Selected."));
    exit;
}

$id = mysqli_real_escape_string($con, $_GET['id']);

$date = $_GET['read_upto'];

$year = date('Y', strtotime($date));

$month = date('m', strtotime($date));

$read_upto = $year.'-'.$month;


$query = "SELECT * FROM meter WHERE cid = '{$id}' AND status='unpaid' order by read_date";



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

		$meter_date = $value['read_date'];

		$year1 = date('Y', strtotime($meter_date));

		$month1 = date('m', strtotime($meter_date));

		$sql_read_upto = $year1.'-'.$month1;



		if($count==$numResults){
			$reading.= '<input type="text" class="form-controlled" value="'.$value['reading'].'" disabled/>';
			$reading.= '<input type="hidden" class="form-controlled" value="'.$value['reading'].'" name="reading" id="reading'.$count.'"/>';
			$read_date.=  '<input type="hidden"  class="form-controlled" value="'.$value['read_date'].'" name="read_date'.$count.'" id="read_date'.$count.'" />';
		}
		else{
			
			if($read_upto==$sql_read_upto){

				$reading.= '<input type="text" class="form-controlled" value="'.$value['reading'].'" disabled/>';
			$reading.= '<input type="hidden" class="form-controlled" value="'.$value['reading'].'" name="reading" id="reading'.$count.'"/>';
				$read_date.=  '<input type="hidden" class="form-controlled" value="'.$value['read_date'].'" name="read_date'.$count.'" id="read_date'.$count.'" />';
				break;
				
			}else{
				$reading.=  '<input type="hidden" class="form-controlled" value="'.$value['reading'].'" id="reading'.$count.'" />';
				$read_date.=  '<input type="hidden" class="form-controlled" value="'.$value['read_date'].'" name="read_date'.$count.'" id="read_date'.$count.'" />';

			}


		}

	}
}else{
	$reading.=  '<input type="text" class="form-controlled" value="'.$value['reading'].'" id="reading'.$count.'" disabled/>';
}

	
$sql = "SELECT * FROM meter where cid='{$id}' AND status='unpaid' ORDER BY read_date";

$rs = mysqli_query($con, $sql);

$row = mysqli_fetch_array($rs);

$reading_from = $row['read_date'];



$sql = "SELECT * FROM client_dues where cid='{$id}' AND status='unpaid'";

$sql = "SELECT SUM(amount) as total_dues FROM client_dues WHERE status='unpaid' and cid=".$id;

$rs = mysqli_query($con, $sql);

$row = mysqli_fetch_array($rs);

if($row)
	$client_dues = $row['total_dues'];
else
	$client_dues = 0;


$sql = "SELECT * FROM client_advance where cid='{$id}' AND status='unpaid'";

$rs = mysqli_query($con, $sql);

$row = mysqli_fetch_array($rs);

if($row)
	$client_advance = $row['amount'];
else
	$client_advance = 0;



   echo json_encode(array("status" => true, 
						   	"reading" => $reading,
						   	"read_date"=>$read_date,
						   	"reading_from"=> $reading_from,
						   	"client_dues"=> $client_dues,
						   	"client_advance"=> $client_advance,
						   	"count"=>$count
						  )
					);
    exit();


?>

