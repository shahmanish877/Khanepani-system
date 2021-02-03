<h1 class="title">Payment Details</h1>

<?php 
$data = $payment->getAll();
global $pageno;
global $total_pages;
?>


<a href="?page=payment_form" class="btn">Add New Payment</a>
<a href="?page=payment_form&new=1" class="btn">Add Client's First Payment</a>


<input type="text" class="form-control search" name="search" id="search" placeholder="Search with client name">

<?php 
	if( isset($_SESSION) ){
		if($_SESSION['success_msg']){
			echo "<h4 class='success'> ".$_SESSION['success_msg']." </h4>";
			unset($_SESSION['success_msg']);
			unset($_SESSION['error_msg']);
		}else if ($_SESSION['error_msg'] ){
			echo "<h4 class='danger'> ".$_SESSION['error_msg'] ."</h4>";
			
			unset($_SESSION['success_msg']);
			unset($_SESSION['error_msg']);
		}
	
 		else if($_GET['op']=='delete'){
			echo "<h4 class='danger'> Payment successfully deleted </h4>";			
		}
	}
 ?>

<table border="1" width="100%" class="table"  id="result">

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
		<th>To Return</th>
		<th>New Dues</th>
		<th>Remarks</th>
	</tr>

	<?php
	foreach($data as $d)
	{ ?>
		<tr>

			<td> <?php echo $d['pid']; ?> </td>
			<td> <a href="payment_print.php?print_id=<?php echo $d['pid']; ?>"> <?php echo $d['name'];?> </a> </td>
			<td> <?php echo $d['meter']; ?> </td>
			<td> <?php echo $d['cur_reading']; ?> </td>

			<td> <?php echo $d['amount']; ?> </td>
			<td> <?php 
					if ($d['fee_rebate']>0)
						echo "+".$d['fee_rebate'];
					else if ($d['fee_rebate']<0)
						echo "".$d['fee_rebate'];
					else 
						echo 0.00;
					?>
			</td>
			<td> <?php echo $d['discount']; ?> </td>
			<td> <?php echo $d['grand_total']; ?> </td>
			<td> <?php echo $d['paid_date']; ?> </td>
			<td> <?php echo $d['dues_return']; ?> </td>
			<td> <?php echo $d['new_dues']; ?> </td>
			<td> <?php echo $d['payment_remark']; ?> </td>
			
			<!-- <td>
				<a href="?page=payment_form&new=1&edit_id=<?php echo $d['pid']; ?>">
					Update
				</a> 
				|
				<a onclick="return confirm('Do you want to delete?');" href="?page=payment&del_id=<?php echo $d['pid']; ?>">
					Delete
				</a>
				
			</td> -->
		</tr>
	<?php 
	}
	?>

</table>

<ul class="pagination">
 		<?php 
        	for ($i=1;$i<=$total_pages; $i=$i+1) { ?>

        		<li>
		            <a href="<?php  echo "?page=payment&pageno=".$i;  ?>"><?php echo $i; ?></a>
		        </li>

        <?php	}
         ?>
    </ul>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		function load_data(query)
		{
			$.ajax({
				url:"modules/payment/search.php",
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
