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

$total_pages_sql = "SELECT COUNT(*) FROM donation";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "SELECT * from donation where name LIKE '%".$search."%'";

}else{
	$query = "SELECT * from donation LIMIT $offset, $no_of_records_per_page ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>S.N.</th>
							<th>Organization Name</th>
							<th>Amount</th>
							<th>Received Date</th>
							<th>Remarks</th>
							<th>Action</th>
						</tr>';
	while($d = mysqli_fetch_array($result))
	{
		$id = $d['id'];
		$output .= '
			<tr>

				<td>'.$id.'</td>
				<td>  <a href="donation_print.php?print_id='.$id.'"> '.$d["name"].' </a> </td>
				<td>'. $d['amount'].' </td>

				<td>'. $d['received_date'].' </td>
				<td>'. $d['remarks'].' </td>
				
				<td>
					<a href="?page=donation_form&edit_id='.$d['id'].'">
						Update
					</a> 
					|
					<a href="?page=donation&del_id='.$d['id'].'" onclick="return confirm(\'Do you really want to delete?\')">
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