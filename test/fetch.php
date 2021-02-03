<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_GET["query"]))
{
	$search = mysqli_real_escape_string($connect, $_GET["query"]);
	$query = "
	SELECT * FROM tbl_customer 
	WHERE CustomerName LIKE '%".$search."%'
	OR Address LIKE '%".$search."%' 
	OR City LIKE '%".$search."%' 
	OR PostalCode LIKE '%".$search."%' 
	OR Country LIKE '%".$search."%'
	";
}else{
	$query='SELECT * FROM tbl_customer';
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Customer Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Postal Code</th>
							<th>Country</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["CustomerName"].'</td>
				<td>'.$row["Address"].'</td>
				<td>'.$row["City"].'</td>
				<td>'.$row["PostalCode"].'</td>
				<td>'.$row["Country"].'</td>
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