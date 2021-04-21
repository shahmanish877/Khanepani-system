<?php
if(isset($_GET['id']))
{
	
	$s = $advance->getSingle($_GET['id']);	
}

?>

<div>
	<h1 class="title">Update Clients Advance</h1>
</div>


	<div class="form-box">
		<form method="post" action="?page=advance_update">

			<h5>Note: * are the required fields.</h5> <br> <br>
			
				<label>Client ID : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['cid']; ?>" disabled />

				<input type="hidden" class="form-controlled" value="<?php echo $s['cid']; ?>" name="cid" />

				<input type="hidden" class="form-controlled" value="<?php echo $s['id']; ?>" name="id" />

			
				<label>Client Name : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['name']; ?>" name="cust_name" disabled/>
			
		
				<label>Status (Paid or Unpaid) : </label>
				<select name="status" class="form-controlled" >
					<?php 
						if ($s['status']=='paid') {							
							echo '<option value="paid" selected>Paid</option>
							<option value="unpaid">Unpaid</option>';
						}
						else if ($s['status']=='unpaid') {							
							echo '<option value="paid" >Paid</option>
							<option value="unpaid" selected>Unpaid</option>';
						}
					?>
				<select>
			
				<label>Advance Amount* : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['amount']; ?>" name="amount" required/>



				<label>Reading Date</label>
				<input type="text" name="adv_date" autocomplete="off" id="nepaliDate5" class="nepali-calendar form-controlled" value="<?php echo $s['adv_date']; ?>" required>


			<input type="submit" class="btn btn-success btn-man" value="Save" />
			<a href="?page=meter" class="btn btn-danger">Cancel</a>


		</form>
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript" src="nepalidate.js"></script>
    