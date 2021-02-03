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

$total_pages_sql = "SELECT COUNT(*) FROM owner_transfer";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "SELECT owner_transfer.*, client.name,client.meter, client.area
					FROM owner_transfer
					INNER JOIN client
					ON owner_transfer.cid=client.id
					WHERE owner_transfer.old_owner LIKE '%".$search."%' OR owner_transfer.new_owner LIKE '%".$search."%'";

}else{
	$query = "SELECT owner_transfer.*, client.name,client.meter, client.area
					FROM owner_transfer
					INNER JOIN client
					ON owner_transfer.cid=client.id ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>S.N.</th>
							<th>New Client Name</th>
							<th>Previous Client Name</th>
							<th>Meter No.</th>
							<th>Area No.</th>
							<th>Charge</th>
							<th>Date</th>
							<th>Total</th>
							<th>Action</th>
						</tr>';
	while($d = mysqli_fetch_array($result))
	{
		$id = $d['id'];
		$output .= '
			<tr>

				<td>'.$id.'</td>
				<td>  <a href="ownership_transfer_print.php?print_id='.$id.'"> '.$d["new_owner"].' </a> </td>
				<td>'. $d['old_owner'].' </td>
				<td>'. $d['meter'].' </td>

				<td>'. $d['area'].' </td>
				<td>'. $d['charge'].' </td>
				<td>'. $d['paid_date'].' </td>
				<td>'. $d['charge'].' </td>
				
				<td>
					<a href="?page=ownership_transfer_form&edit_id='.$d['id'].'&cid='.$d['cid'].'">
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