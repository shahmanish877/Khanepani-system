<?php 
include( '../../include/connect.php');;

global $con;
global $pageno;
global $total_pages;

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 100;
$offset = ($pageno-1) * $no_of_records_per_page;	     

$total_pages_sql = "SELECT COUNT(*) FROM client_advance";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$output = '';
if(isset($_GET["status"]) && trim($_GET["status"]!=''))
{	

	$status = $_GET['status'];
	$search = mysqli_real_escape_string($con, $_GET["status"]);
	
	$query = "SELECT client_advance.*, client.name,client.meter
					FROM client_advance
					INNER JOIN client
					ON client_advance.cid=client.id  WHERE status = '$status'";
	

}else{
	//$query = "SELECT * FROM client_dues WHERE read_date ='".$_GET['date']."'";
	$query = "SELECT client_advance.*, client.name,client.meter
					FROM client_advance
					INNER JOIN client
					ON client_advance.cid=client.id LIMIT $offset, $no_of_records_per_page";

}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	$output .= '	<table border="1" width="100%" class="table second" >';
	while($d = mysqli_fetch_array($result))
	{	
		$id = $d['id'];
		
		$output .= '
			<tr>

				<td>'.$id.'</td>
				<td> '.$d["name"].' </a> </td>
				<td>'. $d['amount'].' </td>

				<td>'. $d['adv_date'].' </td>
				<td>'. $d['status'].' </td>
				
				<td>
					<a href="?page=adv_update&id='.$d['id'].'">
						Update
					</a> 
					
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
