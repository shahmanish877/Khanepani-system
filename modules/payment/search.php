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



$total_pages_sql = "SELECT COUNT(*) FROM payment";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);

	$query = "
				SELECT payment.*, client.*, payment.remark AS payment_remark
				FROM payment
				INNER JOIN client
				ON payment.cid=client.id WHERE client.name LIKE '%".$search."%' ORDER BY pid desc";
}else{
	$query = "SELECT payment.*, client.*, payment.remark AS payment_remark
					FROM payment
					INNER JOIN client
					ON payment.cid=client.id ORDER BY pid desc LIMIT $offset, $no_of_records_per_page";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{

	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Transaction <br> I.D.</th>
							<th>Client Name</th>
							<th>Meter No.</th>
							<th>Recent Reading</th>
							<th>Amount</th>
							<th>Fine/Rebate</th>
							<th>Discount</th>
							<th>Total Amount</th>
							<th>Paid Date</th>
							<th>Return Due</th>
							<th>Remarks</th>						</tr>';
	while($d = mysqli_fetch_array($result))
	{
		$id = $d['pid'];

			if ($d['fee_rebate']>0)
				$d['fee_rebate'] = "+".$d['fee_rebate'];
			else if ($d['fee_rebate']<0)
				$d['fee_rebate'] = "".$d['fee_rebate'];
			else 
				$d['fee_rebate'] = 0.00;

		$output .= '
			<tr>

				<td>'.$d['pid'].'</td>
				<td> <a href="payment_print.php?print_id='.$id.'">'.$d['name'].'</a> </td>
				<td>'. $d['meter'].' </td>
				<td>'. $d['cur_reading'].' </td>

				<td>'.$d['amount'].' </td>
				<td>'.$d['fee_rebate'].' </td>
				<td>'.$d['discount'].' </td>
				<td>'.$d['grand_total'].' </td>
				<td>'.$d['paid_date'].' </td>
				<td>'.$d['dues_return'].' </td>
				<td>'.$d['payment_remark'].' </td>
				
			

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