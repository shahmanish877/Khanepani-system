<h1 class="title">Meter Reading</h1>

<?php 
$data = $meter->getAll();
global $pageno;
global $total_pages;
?>


<a href="?page=meter_form" class="btn">Add Meter Reading</a>



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
			echo "<h4 class='danger'> Reading successfully deleted </h4>";			
		}
	}
 ?>

<?php 
	if($_GET['date']!=''){


 ?>


<input type="text" class="form-control search  meter" name="search" id="search" placeholder="Search with client name">



<table border="1" width="100%" class="table first" >
	<tr>
		<th style="width: 10% !important;">Client I.D.</th>
		<th>Client Name</th>
		<th>Meter No.</th>
		<th>Recent Reading</th>
		<th>Reading Date</th>
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
		<tr>

			<td  style="width: 10% !important;"> <?php echo $d['cid']; ?> </td>
			<td>
				<?php 
					echo $d['name'];
				 ?>
			</td>

			<td> <?php echo $d['meter']; ?> </td>
			<td> <?php echo $d['reading']; ?> </td>
			<td id="read_date"> <?php echo $d['read_date']; ?> </td>
			<td> 

				<?php echo $d['status']; ?>

			</td>
			
			<td>
				<?php if ($d['status']=='paid') {
					echo '<a href="#" onclick="return false;" class="disabled"> Update </a>';
				} else { ?>
					<a href="?page=meter_update&mid=<?php echo $d['mid']; ?>&cid=<?php echo $d['cid']; ?>">
						Update |
					</a> 	
					<a onclick="return confirm('Do you want to delete?');" href="?page=meter&del_id=<?php echo $d['mid']; ?>">
					Delete
				</a> 			
				<?php } ?>
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
		            <a href="<?php  echo "?page=meter&date=".$_GET['date']."&pageno=".$i;  ?>"><?php echo $i; ?></a>
		        </li>

        <?php	}
         ?>
    </ul>

<?php 
}else{	
	$dataa = $meter->getDate();
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


			 <a href="?page=meter&date=<?php echo $d['read_date'];?>"> <?php echo $d['read_date']; ?> </a>



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
		            <a href="<?php  echo "?page=meter&pageno=".$i;  ?>"><?php echo $i; ?></a>
		        </li>

        <?php	}
         ?>
    </ul>
 <?php
}
?>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>


		var date = $('#read_date').html();
	$(document).ready(function(){


		function load_data(date,query='')
		{
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "modules/meter/search.php?query="+query+"&date="+date.trim(), true);

			xhttp.onload = function() {
				if (this.status==200){
					var test= this.responseText
					$('#result_meter').html(test);
				}
			};

			xhttp.send();
		};
		
		
		$('#search').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				load_data(date,search);
			}else
			{
				load_data(date);			
			}
		});

	});



	$("#status").on("change", function(){

			var xhttp = new XMLHttpRequest();	
			var status = $(this).val();
			xhttp.open("GET", "modules/meter/status.php?status="+status+"&date="+date.trim(), true);

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
