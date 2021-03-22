<?php

include( '../../include/connect.php');
$date = $_GET['date'];

$output = '';
if(isset($_GET["query"]) && trim($_GET['query'])!='')
{	
	$search = mysqli_real_escape_string($con, $_GET["query"]);
	/*$query = "
	SELECT * FROM meter WHERE read_date='$date' AND cid = (SELECT id FROM client WHERE name LIKE '%".$search."%' ORDER BY name) ";*/

	$query = "SELECT meter.*, client.*
					FROM meter
					INNER JOIN client
					ON meter.cid=client.id  WHERE read_date = '$date' AND 
					client.name LIKE '%".$search."%' ORDER BY client.name  ";

}else {
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
		
		$output .= '
			<tr>

				<td  style="width: 10% !important;">'. $d['cid'].' </td>
				<td>'.$d['name'].' </a> </td>
				<td>'.$d['meter'].' </a> </td>
				<td>'. $d['reading'].' </td>
				<td>'. $d['read_date'].' </td>	
				<td>'. $d['status'].' </td>
				<td>';
		 if ($d['status']=='paid') {
						$output.= '<a href="#" onclick="return false;" class="disabled"> Update </a>';
					} else { 
						$output.= '<a href="?page=meter_update&mid='.$d['mid'].'&cid='.$d['cid'].'">
						Update |
						</a> 
						<a onclick="return confirm(\'Do you want to delete?\');" href="?page=meter&del_id='.$d['mid'].'">
							Delete
						</a> 		
						'; 
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