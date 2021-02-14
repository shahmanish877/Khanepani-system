<h1 class="title">Payment History </h1>

<?php
if(isset($_GET['history_id']))
{
	$data = $payment->history($_GET['history_id']);
	
}

?>

<button class="btn print_btn pull-right"  onclick="printDiv()">Print</button> 
<div id="printableTable">

	<table border="1" width="100%" class="table">

		<tr>
			<th>Transaction <br> I.D.</th>
			<th>Client S.N.</th>
			<th>Client Name</th>
			<th>Recent Reading</th>
			<th>Amount</th>
			<th>Fee</th>
			<th>Discount</th>
			<th>Total Amount</th>
			<th>Paid Date</th>
			<th>Remarks</th>
<!-- 			<th class="no_print">Action</th>
 -->		</tr>

		<?php
		foreach($data as $d)
		{ ?>
			<tr>
				<td> <?php echo $d['pid']; ?> </td>
				<td> <?php echo $d['cid']; ?> </td>
				<td> <a href="payment_print.php?print_id=<?php echo $d['pid']; ?>"> <?php echo $d['name'];?> </a> </td>
				<td> <?php echo $d['cur_reading']; ?> </td>

				<td> <?php echo $d['amount']; ?> </td>
				<td> <?php echo $d['fee_rebate']; ?> </td>
				<td> <?php echo $d['discount']; ?> </td>
				<td> <?php echo $d['grand_total']; ?> </td>
				<td> <?php echo $d['paid_date']; ?> </td>
				<td> <?php echo $d['remark']; ?> </td>
				
				<!-- <td class="no_print">
					<a href="?page=payment_form&new=1&edit_id=<?php echo $d['pid']; ?>">
						Update
					</a> 
					
				</td> -->
			</tr>
		<?php 
		}
		?>

	</table>

	
</div>

<script type="text/javascript">
	function printDiv() {
		// alert('print');
  //        window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
  //        window.frames["print_frame"].window.focus();
  //        window.frames["print_frame"].window.print();


  		var divToPrint = document.getElementById('printableTable');
        newWin = window.open("");
        
        newWin.document.write('	<link rel="stylesheet" type="text/css" href="style.css">');
       


        newWin.document.write('<div class="title print js_print">		<p class="minititle">"फोहर पानी रोगको खानी, छोपेर राखौं खानेपानी"</p>		<p>पानवारी खानेपानी उपभोग्ता तथा सरसफाई समिति </p>		<p class="minititle border-bottom">धरान -६, पानवारी, सुनसरी </p>		');
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
       }
</script>