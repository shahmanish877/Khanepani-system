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



$total_pages_sql = "SELECT COUNT(*) FROM client";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM client WHERE name LIKE '%".$search."%' ORDER BY name";
}else{
	$query = "SELECT * FROM client LIMIT $offset, $no_of_records_per_page";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>S.N.</th>
							<th>Name</th>
							<th>Address</th>
							<th>Ghar No.</th>
							<th>Meter No.</th>
							<th>Area No.</th>
							<th>Contact</th>
							<th>Father Name</th>
							<th>Mother Name</th>
							<th>Grandfather / Husband Name</th>
							<th>Join Date</th>
							<th>Remarks</th>
							<th>Action</th>
						</tr>';
	while($d = mysqli_fetch_array($result))
	{
		$id = $d['id'];
		$output .= '
			<tr>

				<td>'.$d['id'].'</td>
				<td>  <a href="?page=payment_history&history_id='.$id.'"> '.$d["name"].' </a> </td>
				<td>'. $d['address'].' </td>

				<td>'. $d['gharnum'].' </td>
				<td>'. $d['meter'].' </td>
				<td>'. $d['area'].' </td>
				<td>'. $d['phone'].' </td>
				<td>'. $d['father'].' </td>
				<td>'. $d['mother'].' </td>
				<td>'. $d['grandfather'].' </td>
				<td>'. $d['joinned'].' </td>
				<td>'. $d['remark'].' </td>
				
				<td>
					<a href="?page=client_form&edit_id='.$d['id'].'">
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