<?php

include( '../../include/connect.php');

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM meter WHERE cust_name LIKE '%".$search."%' ORDER BY cust_name";
}else{
	$query = "SELECT * FROM meter ORDER BY cust_name";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Client <br> I.D.</th>
							<th>Client Name</th>
							<th>Recent Reading</th>
							<th>Reading Date</th>
							<th>Action</th>
						</tr>';
	while($d = mysqli_fetch_array($result))
	{
		$id = $d['cid'];
		$output .= '
			<tr>

				<td>'. $d['cid'].' </td>
				<td>'. $d['cust_name'].' </a> </td>
				<td>'. $d['reading'].' </td>
				<td>'. $d['read_date'].' </td>
				
				<td>
					<a href="?page=meter_form&edit_id='.$id.'">
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