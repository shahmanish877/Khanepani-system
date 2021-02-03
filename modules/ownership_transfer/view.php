<h1 class="title">Ownership Transfer Charge</h1>

<?php 
$data = $ownership_transfer->getAll();

global $pageno;
global $total_pages;

?>


<a href="?page=ownership_transfer_form" class="btn">Change owner</a>

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
	}
 ?>

<table border="1" width="100%" class="table" id="result">

	<tr>
		<th>S.N.</th>
		<th>New Client Name</th>
		<th>Previous Client Name</th>
		<th>Meter No.</th>
		<th>Area No.</th>
		<th>Charge</th>
		<th>Date</th>
		<th>Total</th>
		<th>Action</th>
	</tr>

	<?php
	foreach($data as $d)
	{ ?>
		<tr >

			<td> <?php echo $d['id']; ?> </td>
			<td> <a href="ownership_transfer_print.php?print_id=<?php echo $d['id']; ?>"> <?php echo $d['new_owner'];?> </a> </td>

			<td> <?php echo $d['old_owner']; ?> </td>
			<td> <?php echo $d['meter']; ?> </td>

			<td> <?php echo $d['area']; ?> </td>
			<td> <?php echo $d['charge']; ?> </td>
			<td> <?php echo $d['paid_date']; ?> </td>
			<td> <?php echo $d['charge']; ?> </td>
			
			<td>
				<a href="?page=ownership_transfer_form&edit_id=<?php echo $d['id']; ?>&cid=<?php echo $d['cid']; ?>">
					Update
				</a> 
				
			</td>
		</tr>
	<?php 
	}
	?>
</table>
 <ul class="pagination">
 		<?php 
        	for ($i=1;$i<=$total_pages; $i=$i+1) { ?>

        		<li>
		            <a href="<?php  echo "?page=replace_charge&pageno=".$i;  ?>"><?php echo $i; ?></a>
		        </li>

        <?php	}
         ?>
    </ul>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>



<script>
	$(document).ready(function(){
		function load_data(query)
		{
			$.ajax({
				url:"modules/ownership_transfer/search.php",
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
