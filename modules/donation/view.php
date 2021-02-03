<h1 class="title">Donation</h1>

<?php 
session_start();
$data = $donation->getAll();

global $pageno;
global $total_pages;

?>


<a href="?page=donation_form" class="btn">Add New Donation</a>

<input type="text" class="form-control search" name="search" id="search" placeholder="Search with name">

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
		<th>Organization Name</th>
		<th>Amount</th>
		<th>Received Date</th>
		<th>Remarks</th>
		<th>Action</th>
	</tr>

	<?php
	foreach($data as $d)
	{ ?>
		<tr >

			<td> <?php echo $d['id']; ?> </td>
			<td> <a href="donation_print.php?print_id=<?php echo $d['id']; ?>"> <?php echo $d['name'];?> </a> </td>

			<td> <?php echo $d['amount']; ?> </td>

			<td> <?php echo $d['received_date']; ?> </td>
			<td> <?php echo $d['remarks']; ?> </td>
			
			<td>
				<a href="?page=donation_form&edit_id=<?php echo $d['id']; ?>">
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
		            <a href="<?php  echo "?page=donation&pageno=".$i;  ?>"><?php echo $i; ?></a>
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
				url:"modules/donation/search.php",
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
