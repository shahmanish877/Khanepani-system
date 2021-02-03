<?php
if(isset($_GET['edit_id']))
{
	
	$s = $client->getSingle($_GET['edit_id']);
	
}

?>

<div>
	<h1 class="title">Add/Edit Client</h1>
</div>


	<div class="form-box payment-form client_form">
		<form method="post" action="?page=client_form">
			<input type="hidden" name="h" value="<?php echo $s['id']; ?>" />

			<h5>Note: * are the required fields.</h5> <br>
			
			<div class="space-between client_space"> 

	
			<div id="form_left" class="client">


				<label>Name* : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['name']; ?>" name="name" required />
			
				<label>Contact* : </label>
				<input type="number" class="form-controlled" value="<?php echo $s['phone']; ?>" name="phone" required/>
			
	
				<label>Joinned Date</label>
				<input type="text"  id="nepaliDate5" autocomplete="off" class="nepali-calendar form-controlled" value="<?php echo $s['joinned']; ?>" name="joinned">

				<label>Ghar No. : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['gharnum']; ?>"  autocomplete="off" name="gharnum" />

				<label>Neighbor's Area No.* : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['area']; ?>" name="area"  autocomplete="off" required/>

				<label>Meter No.* : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['meter']; ?>" name="meter"  autocomplete="off" required/>

			</div> <!-- left form ending -->

	
	
			<div class="form_right client">


				<label>Address* : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['address']; ?>" name="address" required/>

				<label>Father Name : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['father']; ?>" name="father" />

				<label>Mother Name : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['mother']; ?>" name="mother" />

				<label>Grandfather / Husband Name : </label>
				<input type="text" class="form-controlled" value="<?php echo $s['grandfather']; ?>" name="grandfather" />

				<label>Remarks : </label>
				<textarea class="form-controlled" rows="5" name="remark" cols="80"><?php echo $s['remark']; ?></textarea>
			

			<input type="submit" class="btn btn-success btn-man" value="Save" />
			<a href="?page=client" class="btn btn-danger">Cancel</a>

			</div> <!-- right ending -->
				

		</div> <!-- space between ending -->
				
				
	

		</form>
	</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript" src="nepalidate.js"></script>
    