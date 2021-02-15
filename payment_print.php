
<?php
	include_once('include/connect.php');

	if(isset($_GET['print_id']))
	{		
		$pid = $_GET['print_id'];
		global $con;
		
		$sql = "SELECT payment.*, client.*, payment.remark AS payment_remark FROM payment INNER JOIN client
					ON payment.cid=client.id  where payment.pid='{$pid}'";
		$rs = mysqli_query($con, $sql);
		while($row = mysqli_fetch_assoc($rs))
			{
				$final[] = $row;
			}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Khanepani</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="nepali.datepicker.v2.2.min.css" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<button class="btn print_btn mt-5"  onclick="printDiv()">Print</button> 

	<div id="printableTable">
			<div class="title print">
				<div class="logo">
					<img src="images/logo.png" alt="">
				</div>
				<p class="minititle">"फोहर पानी रोगको खानी, छोपेर राखौं खानेपानी"</p>
				<p class="print_title">पानवारी खानेपानी उपभोग्ता तथा सरसफाई समिति </p>
				<p class="minititle">धरान -६, पानवारी, सुनसरी </p>
				
				<div class="right">					
					<span class="date"> Date: </span>
					<span class="date" id="date"></span>

					<p class="date"> Mobile No. : 9814307477 </p>
				</div>
				<div class="right">					
				</div>
			</div>


		<table border="1" width="100%" class="table">

			<tr>
				<th>S.N.</th>
				<th>Client Name</th>
				<th>Area No.</th>
				<th>Meter No.</th>
				<th>Current Reading</th>
				<th>Previous Reading</th>
				<th>Reading Difference</th>
				<th>Reading Date</th>
				<th>Paid Date</th>
				<th>Remarks</th>
			</tr>

			<?php
			foreach($final as $d)
			{ ?>
				<tr>

					<td> <?php echo $d['pid']; ?> </td>
					<td> <?php echo $d['name'];?> </td>

					<td> <?php echo $d['area'];?> </td>
					<td> <?php echo $d['meter'];?> </td>
					<td> <?php echo $d['cur_reading']; ?> </td>
					<td> <?php echo $d['prev_reading']; ?> </td>

					<td> <?php 
							$read_diff = $d['cur_reading'] - $d['prev_reading'];
							echo $read_diff;
						 ?>  
					</td>
					<td>  <?php echo $d['read_date']; ?> </td>
					<td> <?php echo $d['paid_date']; ?> </td>
					<td> <?php echo $d['payment_remark']; ?> </td>					
				</tr>
			<?php 
			}
			?>

		</table >


		<table border="1" width="100%" class="table amount">
			
			<?php
			foreach($final as $d)
			{ ?>

				<tr> 
					<th>Amount: </th>
					<td> <?php echo $d['amount']; ?> </td>
				</tr>

				<tr>
					<th>Fee/Rebate: </th>
					<td> 
						<?php 

							if($d['fee_rebate']>0)
								echo '+'.$d['fee_rebate'];
							else
								echo $d['fee_rebate'];
								

					 ?>

					  </td>			
				</tr>


				<tr> 
					<th> Previous return: </th>
					<td> <?php echo $d['previous_return']; ?> </td>
				</tr>


				<tr> 
					<th> Discount: </th>
					<td> <?php echo $d['discount']; ?> </td>
				</tr>



				<tr> 
					<th> Previous Dues: </th>
					<td> <?php echo $d['client_dues']; ?> </td>
				</tr>

				<tr> 
					<th> New Dues: </th>
					<td> <?php echo $d['new_dues']; ?> </td>
				</tr>
	

				<tr>
					<th>Amount to Return: </th>
					<td> <?php echo $d['dues_return']; ?> </td>
				</tr>



				<tr>
					<th>Total Amount: </th>
					<td> <b> <?php echo $d['grand_total']; ?> </b> </td>
				</tr>

				
			<?php 
			}
			?>
		</table>

		<div class="received_by">
		</div>

		


			<div class="title print">
				<div class="logo">
					<img src="images/logo.png" alt="">
				</div>
				
				<p class="minititle">"फोहर पानी रोगको खानी, छोपेर राखौं खानेपानी"</p>
				<p class="print_title">पानवारी खानेपानी उपभोग्ता तथा सरसफाई समिति </p>
				<p class="minititle">धरान -६, पानवारी, सुनसरी </p>
				
				<div class="right">					
					<span class="date"> Date: </span>
					<span class="date" id="date1"></span>

					<p class="date"> Mobile No. : 9814307477 </p>

				</div>
			</div>

		<table border="1" width="100%" class="table">

			<tr>
				<th>S.N.</th>
				<th>Client Name</th>
				<th>Area No.</th>
				<th>Meter No.</th>
				<th>Current Reading</th>
				<th>Previous Reading</th>
				<th>Reading Difference</th>
				<th>Reading Date</th>
				<th>Paid Date</th>
				<th>Remarks</th>
			</tr>

			<?php
			foreach($final as $d)
			{ ?>
				<tr>

					<td> <?php echo $d['pid']; ?> </td>
					<td> <?php echo $d['name'];?> </td>

					<td> <?php echo $d['area'];?> </td>
					<td> <?php echo $d['meter'];?> </td>
					<td> <?php echo $d['cur_reading']; ?> </td>
					<td> <?php echo $d['prev_reading']; ?> </td>

					<td> <?php 
							$read_diff = $d['cur_reading'] - $d['prev_reading'];
							echo $read_diff;
						 ?>  
					</td>
					<td>  <?php echo $d['read_date']; ?> </td>
					<td> <?php echo $d['paid_date']; ?> </td>
					<td> <?php echo $d['payment_remark']; ?> </td>					
				</tr>
			<?php 
			}
			?>

		</table >


		<table border="1" width="100%" class="table amount">
			
			<?php
			foreach($final as $d)
			{ ?>

				<tr> 
					<th>Amount: </th>
					<td> <?php echo $d['amount']; ?> </td>
				</tr>

				<tr>
					<th>Fee/Rebate: </th>
					<td> 
						<?php 

							if($d['fee_rebate']>0)
								echo '+'.$d['fee_rebate'];
							else
								echo $d['fee_rebate'];
								

					 ?>

					  </td>			
				</tr>


				<tr> 
					<th> Previous return: </th>
					<td> <?php echo $d['previous_return']; ?> </td>
				</tr>


				<tr> 
					<th> Discount: </th>
					<td> <?php echo $d['discount']; ?> </td>
				</tr>


				<tr> 
					<th> Previous Dues: </th>
					<td> <?php echo $d['client_dues']; ?> </td>
				</tr>

				<tr> 
					<th> New Dues: </th>
					<td> <?php echo $d['new_dues']; ?> </td>
				</tr>
				<tr>
					<th>Amount to Return: </th>
					<td> <?php echo $d['dues_return']; ?> </td>
				</tr>

				<tr>
					<th>Total Amount: </th>
					<td> <b> <?php echo $d['grand_total']; ?> </b> </td>
				</tr>

				
			<?php 
			}
			?>
		</table>

		<div class="received_by">
		</div>

	</div> <!-- printableTable ending -->


</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
	<script type="text/javascript" src="nepalidate.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>

<script type="text/javascript">
	

		var  end   = new Date(),    
	    year = end.getFullYear(), 
        month = end.getMonth()+1,
        date = end.getDate(),    

        formatedDate = year+'-'+month+'-'+date;

        todayDate = AD2BS(formatedDate);

       	$('#date').html(todayDate);
       	$('#date1').html(todayDate);
	
	function printDiv() {
  		var divToPrint = document.getElementById('printableTable');
        newWin = window.open("");

        newWin.document.write('	<link rel="stylesheet" type="text/css" href="style.css">');
        
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>




</html>