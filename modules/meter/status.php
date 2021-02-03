<?php 
include( '../../include/connect.php');;


$output = '';
if(isset($_GET["status"]) && trim($_GET["status"]!=''))
{	

	$date = $_GET['date'];
	$status = $_GET['status'];
	$search = mysqli_real_escape_string($con, $_GET["status"]);
	$query = "
	SELECT * FROM meter WHERE read_date='".$_GET['date']."' AND status = '".$_GET["status"]."'";

	$query = "SELECT meter.*, client.*
					FROM meter
					INNER JOIN client
					ON meter.cid=client.id  WHERE read_date = '$date' AND status = '$status'";
	

}else{
	$date = $_GET['date'];
	//$query = "SELECT * FROM meter WHERE read_date ='".$_GET['date']."'";
	$query = "SELECT meter.*, client.*
					FROM meter
					INNER JOIN client
					ON meter.cid=client.id  WHERE read_date = '$date'";

}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	$output .= '	<table border="1" width="100%" class="table second" >';
	while($d = mysqli_fetch_array($result))
	{	
		$id = $d['cid'];
		$client_sql = "SELECT  * FROM client WHERE id = $id";
		$client_rs = mysqli_query($con, $client_sql);
		$client_row = mysqli_fetch_assoc($client_rs); 
		$output .= '
			<tr>

				<td>'. $d['cid'].' </td>
				<td>'. $d['name'].' </td>
				<td>'. $d['meter'].' </td>
				<td>'. $d['reading'].' </td>
				<td>'. $d['read_date'].' </td>	
				<td>'. $d['status'].' </td>
				<td>';
		 if ($d['status']=='paid') {
						$output.= '<a href="#" onclick="return false;" class="disabled"> Update </a>';
					} else { 
						$output.= '<a href="?page=meter_update&mid='.$d['mid'].'&cid='.$d['cid'].'">
						Update
					</a> '; 
				}			
		$output.='	 
			</td>

			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
