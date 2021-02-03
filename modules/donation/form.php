<?php
if(isset($_GET['edit_id']))
{
	
	$s = $donation->getSingle($_GET['edit_id']);
	
}


?>

<div>
	<h1 class="title">Add/Edit Donation</h1>
</div>


	<div class="form-box">
		<form method="post" action="?page=donation_form">
			<input type="hidden" name="id" value="<?php echo $s['id']; ?>" />

			<h5>Note: * are the required fields.</h5> <br>
		
				<label>Organization Name* : </label>

				<input type="text" class="form-controlled" value="<?php echo $s['name']; ?>" name="name" required>
			
				<label >Date: </label>
				<input type="text" name="received_date" autocomplete="off" id="nepaliDate5" class="nepali-calendar form-controlled" value="<?php echo $s['received_date']; ?>" required>

				<label> Amount : </label>
				<input type="number" class="form-controlled" value="<?php echo $s['amount']; ?>" name="amount"/>
			
	
				<label> Remarks: </label>
				<textarea class="form-controlled" rows="5" name="remarks" cols="80"><?php echo $s['remarks']; ?></textarea>

				

			
			<input type="submit" class="btn btn-success btn-man" value="Save" />
			<a href="?page=donation" class="btn btn-danger">Cancel</a>


		</form>
	</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript" src="nepalidate.js"></script>
    