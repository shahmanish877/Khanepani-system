<?php
if(isset($_GET['mid']))
{
	
	$s = $meter->getSingle($_GET['mid']);	
}

?>

<div>
	<h1 class="title">Update Meter Reading</h1>
</div>


	<div class="form-box">
		<form method="post" action="?page=meter_update">

			<h5>Note: * are the required fields.</h5> <br> <br>
			
				<label>Client ID : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['cid']; ?>" disabled />

				<input type="hidden" class="form-controlled" value="<?php echo $s['cid']; ?>" name="cid" />

				<input type="hidden" class="form-controlled" value="<?php echo $s['mid']; ?>" name="mid" />

			
				<label>Client Name : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['name']; ?>" name="cust_name" disabled/>
			
	
			
				<label>Meter Reading* : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['reading']; ?>" name="reading" required/>



				<label>Reading Date</label>
				<input type="text" name="read_date"  class="form-controlled" value="<?php echo $s['read_date']; ?>" >
				

			<input type="submit" class="btn btn-success btn-man" value="Save" />
			<a href="?page=meter" class="btn btn-danger">Cancel</a>


		</form>
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript" src="nepalidate.js"></script>
    