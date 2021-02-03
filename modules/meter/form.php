<?php
	$client = $client->get_for_reading();
	global $con;
if(isset($_GET['edit_id']))
{
	
	$s = $meter->getSingle($_GET['edit_id']);
	
}

?>



<?php 
	if($_POST['read_date']!='' || $_GET['date']!=''){

		if($_POST['read_date']){
			$read_date = $_POST['read_date'];
		}
		else if($_GET['date'])
			$read_date = $_GET['date'];
		echo '<h1 class="title">Add Reading for '.$read_date.'</h1> <br>';

		echo '<table border="1" width="100%" class="table"  id="result">';
		echo "<tr>
				<th> Client I.D. </th>
				<th> Client Name </th>
				<th> Meter No. </th>
				<th> Reading </th>
				<th> Reading Date </th>
		<tr>
		";
		// $client_meter = $meter->getAll();
		// foreach ($client_meter as $meter) {
		// 		//echo $meter['reading']." ".$meter['cid']." ".$meter['read_date']."<br>";
		// 		$date = $meter['read_date'];
		// 		$d = date_parse_from_format("Y-m-d", $date);

		// 		$read_month = date_parse_from_format("Y-m-d", $_POST['read_date']);


				
		// 		$id = $meter['cid'];
		// 		if($d["month"] == $read_month["month"]){
					
		// 			$update = "UPDATE client SET meter_status = 1 where id=$id";
		// 			$up = mysqli_query($con, $update);	



		// 			if($up){
		// 				header("Refresh:0; url=?page=meter_form&date=".$_POST['read_date']);
		// 			}			

		// 		}
		// 		else{
		// 			$update = "UPDATE client SET meter_status = 0 where id=$id";
		// 			$up = mysqli_query($con, $update);
		// 			if($up){
		// 				header("Refresh:0; url=?page=meter_form&date=".$_POST['read_date']);

		// 			}					

		// 		}
		// }
		

		foreach ($client as $c) {
			
				$cid = $c['id'];
				$checkDate = $meter->dateCheck($read_date,$cid);
				if(!$checkDate){

				
			?>
				<form method="post" action="?page=meter_form">
					
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
							<input type="text" name="reading[<?php echo $c['id']; ?>]" > 
						</td>
						<td>  
							<?php echo $read_date; ?> 
							<input type="hidden" name="read_date" value="<?php echo $read_date; ?> ">
						</td>
					</tr>


			<?php
				
			}
		}  

			echo '</table>';

			echo '<input type="submit" class="btn btn-success btn-man" value="Submit" />';


			echo '<a href="?page=meter" class="btn btn-danger">Cancel</a> </form>' ;

	}
	else{
 ?>

<div>
	<h1 class="title">Select Date</h1>
</div>


<?php 
	if(isset($_GET['op'])){
		if($_GET['op']=='insert'){
			echo "<h4 class='success'> Reading successfully added </h4>";
		}else if($_GET['op']=='update'){
			echo "<h4 class='success'> Reading successfully updated </h4>";
		}else if($_GET['op']=='delete'){
			echo "<h4 class='danger'> Reading successfully deleted </h4>";			
		}
	}
 ?>

	<div class="form-box">
		<form method="post" action="">
			<!-- <input type="text" name="h" value="<?php echo $s['id']; ?>" /> -->

			<h5>Note: * are the required fields.</h5> <br> <br>
			
				
				<label>Select Date of Reading</label>
				<input type="text" autocomplete="off" id="nepaliDate5" name='read_date' class="nepali-calendar form-controlled" value="<?php echo $s['read_date']; ?>" required>


			<input type="submit" class="btn btn-success btn-man" value="Submit" />

			<a href="?page=meter" class="btn btn-danger">Cancel</a>


		</form>
	</div>

<?php } ?>


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

       	$('#to-picker').val(todayDate);
       	$('#to-picker1').val(todayDate);

</script>