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

$total_pages_sql = "SELECT COUNT(*) FROM client_dues";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "SELECT client_dues.*, client.name,client.meter
					FROM client_dues
					INNER JOIN client
					ON client_dues.cid=client.id where client.name LIKE '%".$search."%' LIMIT $offset, $no_of_records_per_page ";

}else{
	$query = "SELECT client_dues.*, client.name,client.meter
					FROM client_dues
					INNER JOIN client
					ON client_dues.cid=client.id LIMIT $offset, $no_of_records_per_page";
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

				<td>'. $d['dues_date'].' </td>
				<td>'. $d['status'].' </td>
				
				<td>
					<a href="?page=dues_update&id='.$d['id'].'">
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