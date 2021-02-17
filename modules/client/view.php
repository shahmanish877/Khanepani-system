<h1 class="title">Clients</h1>

<?php 
$data = $client->getAll();

global $pageno;
global $total_pages;

?>


<a href="?page=client_form" class="btn">Add New Client</a>

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
			echo "<h4 class='danger'> Client successfully deleted </h4>";			
		}
	}
 ?>

<table border="1" width="100%" class="table" id="result">

	<tr>
		<th>S.N.</th>
		<th>Name</th>
		<th>Address</th>
		<th>Ghar No.</th>
		<th>Meter No.</th>
		<th>Area No.</th>
		<th>Contact</th>
		<th>Father Name</th>
		<th>Mother Name</th>
		<th>Grandfather / Husband Name</th>
		<th>Join Date</th>
		<th>Remarks</th>
		<th width="10%">Action</th>
	</tr>

	<?php
	foreach($data as $d)
	{ ?>
		<tr >

			<td> <?php echo $d['id']; ?> </td>
			<td> <a href="?page=payment_history&history_id=<?php echo $d['id']; ?>">	<?php echo $d['name'];?> </a> </td> 
			<td> <?php echo $d['address']; ?> </td>

			<td> <?php echo $d['gharnum']; ?> </td>
			<td> <?php echo $d['meter']; ?> </td>
			<td> <?php echo $d['area']; ?> </td>
			<td> <?php echo $d['phone']; ?> </td>
			<td> <?php echo $d['father']; ?> </td>
			<td> <?php echo $d['mother']; ?> </td>
			<td> <?php echo $d['grandfather']; ?> </td>
			<td> <?php echo $d['joinned']; ?> </td>
			<td> <?php echo $d['remark']; ?> </td>
			
			<td>
				<a href="?page=client_form&edit_id=<?php echo $d['id']; ?>">
					Update
				</a> 
				|
				<a href="?page=client&del_id=<?php echo $d['id']; ?>" onclick="return confirm('Do you really want to delete?')">
					Delete
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
		            <a href="<?php  echo "?page=client&pageno=".$i;  ?>"><?php echo $i; ?></a>
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
				url:"modules/client/search.php",
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
