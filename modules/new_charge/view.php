<h1 class="title">New Client's Charge</h1>

<?php 
$data = $new_charge->getAll();

global $pageno;
global $total_pages;

?>


<a href="?page=new_charge_form" class="btn">Add New Client's Charge</a>

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
			echo "<h4 class='danger'> New Client's charge successfully deleted </h4>";			
		}
	}
 ?>

<table border="1" width="100%" class="table" id="result">

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
		<th>Action</th>
	</tr>

	<?php
	foreach($data as $d)
	{ ?>
		<tr >

			<td> <?php echo $d['id']; ?> </td>
			<td> <a href="metercharge_print.php?print_id=<?php echo $d['id']; ?>"> <?php echo $d['name'];?> </a> </td>

			<td> <?php echo $d['meter']; ?> </td>
			<td> <?php echo $d['area']; ?> </td>
			<td> <?php echo $d['meter_charge']; ?> </td>

			<td> <?php echo $d['membership']; ?> </td>
			<td> <?php echo $d['filter']; ?> </td>
			<td> <?php echo $d['misc']; ?> </td>
			<td> <?php echo $d['paid_date']; ?> </td>
			<td> <?php echo $d['total']; ?> </td>
			
			<td>
				<a href="?page=new_charge_form&edit_id=<?php echo $d['id']; ?>">
					Update
				</a> 
				|
				<a href="?page=new_charge&del_id=<?php echo $d['id']; ?>" onclick="return confirm('Do you really want to delete?')">
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
		            <a href="<?php  echo "?page=new_charge&pageno=".$i;  ?>"><?php echo $i; ?></a>
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
				url:"modules/new_charge/search.php",
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
