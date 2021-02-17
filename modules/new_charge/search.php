<?php

include( '../../include/connect.php');

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

$total_pages_sql = "SELECT COUNT(*) FROM new_charge";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "SELECT new_charge.*, client.name,client.meter,client.area
					FROM new_charge
					INNER JOIN client
					ON new_charge.cid=client.id
					WHERE client.name LIKE '%".$search."%'";

}else{
	$query = "SELECT new_charge.*, client.name,client.meter,client.area
					FROM new_charge
					INNER JOIN client
					ON new_charge.cid=client.id ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
						<th>S.N.</th>
						<th>Client Name</th>
						<th>Meter No.</th>
						<th>Area No.</th>
						<th>Meter</th>
						<th>Membership</th>
						<th>Filter</th>
						<th>Misc.</th>
						<th>Paid Date</th>
						<th>Total</th>
						<th>Action</th>
					</tr>';
	while($d = mysqli_fetch_array($result))
	{
		$id = $d['id'];
		$output .= '
			<tr>

				<td>'.$id.'</td>
				<td>  <a href="metercharge_print.php?print_id='.$id.'"> '.$d["name"].' </a> </td>
				<td>'. $d['meter'].' </td>
				<td>'. $d['area'].' </td>
				<td>'. $d['meter_charge'].' </td>

				<td>'. $d['membership'].' </td>
				<td>'. $d['filter'].' </td>
				<td>'. $d['misc'].' </td>
				<td>'. $d['paid_date'].' </td>
				<td>'. $d['total'].' </td>
				
				<td>
					<a href="?page=new_charge_form&edit_id='.$d['id'].'">
						Update
					</a> 
					|
					<a href="?page=new_charge&del_id='. $d['id'].'" onclick="return confirm(\'Do you really want to delete?\')">
						Delete
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