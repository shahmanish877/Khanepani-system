<?php 
$data = $reports->getAll();

?>

<h1 class="title">Reports 
	<?php 
	if($_GET['date']!=''){
		echo "of ".$_GET['date'];
	}
 	?>

</h1>




<a href="?page=reports_form" class="btn">View by Date</a>



<?php 
	if($_GET['date']!=''){

 ?>


<button class="btn print_btn pull-right" onclick="printDiv()">Print</button> 
<div id="printableTable">
	<div class="print_only">
		<h4>Daily Report of <?php echo $_GET['date'] ?></h4>
		
	</div>
	<table border="1" width="100%" class="table"  id="result">

		<tr>
			<th width="25%">Type</th>
			<th width="15%">Transaction  I.D.</th>
			<th> Name</th>
			<th>Total Amount</th>
		</tr>

		<?php
		foreach($data as $d)
		{ ?>
			<tr>
				<td> <?php echo $d['type']; ?> </td>
				<td> <?php echo $d['id']; ?> </td>
				<td>
					
					<?php 
						if($d['type']=='Ownership Transfer Charge'){
							echo $d['name'].' (New Owner)';	
						}else{
							echo $d['name'];
						}

					?>

				</td>
				<td> <?php echo $d['amount'];
						$total = $total + $d['amount'] ;
					 ?> 
				</td>
			</tr>
		<?php 
		}
		?>

		<tr >

			<td> </td>
			<td> </td> 
			<td></td>
			<td> <b>Total: </b> 
			<?php echo $total; ?>
			</td>
		</tr>

	</table>


</div>
 	
<?php 
}else{	
	$dataa = $reports->getDate();
 ?>


<table border="1" width="100%" class="table left"  id="result">

	<tr>
		
		<th>Reading Date</th>
	</tr>

	<?php
	foreach($dataa as $d)
	{ ?>
		<tr>

			<td>


			 <a href="?page=reports&date=<?php echo $d['paid_date'];?>"> <?php echo $d['paid_date']; ?> </a>



			</td>
		</tr>
	<?php 
	}
	?>

</table>


 <?php
}
?>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		function load_data(query)
		{
			$.ajax({
				url:"modules/meter/search.php",
				method:"post",
				data:{query:query},
				success:function(data)
				{
					$('#result').html(data);
				}
			});
		}
		
		$('#search').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				load_data(search);
			}else
			{
				load_data();			
			}
		});
	});
</script>


<script type="text/javascript">
	function printDiv() {
		// alert('print');
  //        window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
  //        window.frames["print_frame"].window.focus();
  //        window.frames["print_frame"].window.print();


  		var divToPrint = document.getElementById('printableTable');
        newWin = window.open("");
        
        newWin.document.write('	<link rel="stylesheet" type="text/css" href="style.css">');
       


        newWin.document.write('<div class="title print js_print">		<p class="minititle">"फोहर पानी रोगको खानी, छोपेर राखौं खानेपानी"</p>		<p>पानवारी खानेपानी उपभोग्ता तथा सरसफाई समिति </p>		<p class="minititle">धरान -६, पानवारी, सुनसरी </p>		');
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
       }
</script>