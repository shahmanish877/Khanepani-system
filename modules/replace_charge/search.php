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

$total_pages_sql = "SELECT COUNT(*) FROM replace_charge";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "SELECT replace_charge.*, client.name,client.meter
					FROM replace_charge
					INNER JOIN client
					ON replace_charge.cid=client.id
					WHERE client.name LIKE '%".$search."%'";

}else{
	$query = "SELECT replace_charge.*, client.name,client.meter
					FROM replace_charge
					INNER JOIN client
					ON replace_charge.cid=client.id ";
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
						<th>Meter/Parts</th>
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
				<td>  <a href="meter_replacecharge_print.php?print_id='.$id.'"> '.$d["name"].' </a> </td>
				<td>'. $d['meter'].' </td>
				<td>'. $d['meter_charge'].' </td>

				<td>'. $d['filter'].' </td>
				<td>'. $d['misc'].' </td>
				<td>'. $d['paid_date'].' </td>
				<td>'. $d['total'].' </td>
				
				<td>
					<a href="?page=replace_charge_form&edit_id='.$d['id'].'">
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