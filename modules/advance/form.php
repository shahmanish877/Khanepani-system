<?php

	$client = $client->get_for_reading();
	global $con;
if(isset($_GET['edit_id']))
{
	
	$s = $advance->getSingle($_GET['edit_id']);
	
}


?>

<div>
	<h1 class="title">Add/Edit Advance</h1>
</div>


	<?php 

		echo '<table border="1" width="100%" class="table"  id="result">';
		echo "<tr>
				<th> Client I.D. </th>
				<th> Client Name </th>
				<th> Meter No. </th>
				<th> Advance Amount </th>
				<th> Date </th>
		<tr>
		";

		foreach ($client as $c) {
			
				$cid = $c['id'];

				$query = "SELECT cid FROM client_advance WHERE cid=".$cid;
				$rs = mysqli_query($con, $query);
				$row = mysqli_fetch_assoc($rs);
				

				if(!$row){

				
			?>
				<form method="post" action="?page=advance_form">
					
					<tr>
						<td> 
							<?php echo $c['id']; ?> 
							<input type="hidden" name="cid" value="<?php echo $c['id']; ?> ">
						</td>
						<td> 
							<?php echo $c['name']; ?> 
						</td>
						<td> 
							<?php echo $c['meter']; ?> 
						</td>
						<td> 
							<input type="text" name="amount[<?php echo $c['id']; ?>]" > 
						</td>
						<td>  
							<p class="to-picker"></p>
							<input type="hidden" name="adv_date" class="adv_date" id="to-picker1" class="form-controlled">
							
							
						</td>
					</tr>



			<?php
				
			}
		}  

			echo '</table>';

			echo '<input type="submit" class="btn btn-success btn-man" value="Submit" />';


			echo '<a href="?page=advance" class="btn btn-danger">Cancel</a> </form>' ;

	 ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript" src="nepalidate.js"></script>
    

<script type="text/javascript">

		var  end   = new Date(),    
	    year = end.getFullYear(), 
        month = end.getMonth()+1,
        date = end.getDate(),    

        formatedDate = year+'-'+month+'-'+date;

        todayDate = AD2BS(formatedDate);

       	$('.to-picker').html(todayDate);
       	$('.adv_date').val(todayDate);
</script>