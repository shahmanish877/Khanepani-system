
<?php
	include_once('include/connect.php');

	if(isset($_GET['print_id']))
	{		
		$pid = $_GET['print_id'];
		global $con;
		$sql = "SELECT new_charge.*, client.*
					FROM new_charge
					INNER JOIN client
					ON new_charge.cid=client.id WHERE new_charge.id=".$pid;


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
			</div>


		<table border="1" width="100%" class="table">

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
	</tr>


			<?php
			foreach($final as $d)
			{ ?>
				<tr>

					<td> <?php echo $d['id']; ?> </td>
					<td> <?php echo $d['name'];?> </td>

				
					<td> <?php echo $d['meter']; ?> </td>
					<td> <?php echo $d['area']; ?> </td>
					<td> <?php echo $d['meter_charge']; ?> </td>
					<td> <?php echo $d['membership']; ?> </td>

					<td> <?php echo $d['filter']; ?>  </td>
					<td>  <?php echo $d['misc']; ?> </td>
					<td> <?php echo $d['paid_date']; ?> </td>			
					<td> <?php echo $d['total'];
					 ?> </td>			
				</tr>
			<?php 
			}
			?>

		</table >



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

					<p class="date"> Mobile: 9818191919 </p>

				</div>
			</div>


		<table border="1" width="100%" class="table">

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
	</tr>


			<?php
			foreach($final as $d)
			{ ?>
				<tr>

					<td> <?php echo $d['id']; ?> </td>
					<td> <?php echo $d['name'];?> </td>

				
					<td> <?php echo $d['meter']; ?> </td>
					<td> <?php echo $d['area']; ?> </td>
					<td> <?php echo $d['meter_charge']; ?> </td>
					<td> <?php echo $d['membership']; ?> </td>

					<td> <?php echo $d['filter']; ?>  </td>
					<td>  <?php echo $d['misc']; ?> </td>
					<td> <?php echo $d['paid_date']; ?> </td>			
					<td> <?php echo $d['total'];
					 ?> </td>			
				</tr>
			<?php 
			}
			?>

		</table >



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