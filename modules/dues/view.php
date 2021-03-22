<h1 class="title">Client Dues</h1>

<?php 
session_start();
$data = $dues->getAll();

global $pageno;
global $total_pages;

?>

<a href="?page=dues_form" class="btn">Add Dues</a>
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
		else if($_GET['op']=='delete'){
			echo "<h4 class='danger'> Client Dues successfully deleted </h4>";			
		}
	}
 ?>

<table border="1" width="100%" class="table first" id="result">

	<tr>
		<th>S.N.</th>
		<th>Client Name</th>
		<th>Dues Amount</th>
		<th>Date</th>
		<th>
			<select name="status" id="status">
				<option value="">Status</option>
				<option value="paid">Paid</option>
				<option value="unpaid">Unpaid</option>

			</select>
		</th>
		<th>Action</th>
	</tr>
</table>
<div  id="result_meter">
	<table border="1" width="100%" class="table second" >

	<?php
	foreach($data as $d)
	{ ?>
		<tr >

			<td> <?php echo $d['id']; ?> </td>
			<td> <?php echo $d['name'];?> </a> </td>

			<td> <?php echo $d['amount']; ?> </td>

			<td> <?php echo $d['dues_date']; ?> </td>
			<td> <?php echo $d['status']; ?> </td>
			
			<td>
				<a href="?page=dues_update&id=<?php echo $d['id']; ?>">
					Update
				</a> 
				|
				<a href="?page=dues&del_id=<?php echo $d['id']; ?>" onclick="return confirm('Do you want to delete?');">
					Delete
				</a> 
			</td>
		</tr>
	<?php 
	}
	?>
</div>
</table>
 <ul class="pagination">
 		<?php 
        	for ($i=1;$i<=$total_pages; $i=$i+1) { ?>

        		<li>
		            <a href="<?php  echo "?page=dues&pageno=".$i;  ?>"><?php echo $i; ?></a>
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
				url:"modules/dues/search.php",
				method:"post",
				data:{query:query},
				success:function(data)
				{
					$('#result_meter').html(data);
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


	$("#status").on("change", function(){

			var xhttp = new XMLHttpRequest();	
			var status = $(this).val();
			xhttp.open("GET", "modules/dues/status.php?status="+status, true);

			xhttp.onload = function() {
			  if (this.status==200){
			  	var test= this.responseText;	
			  	$('#result_meter').html(test);	   	
			  }
			};

			xhttp.send();
	}
	);
</script>
