<?php
if(isset($_GET['edit_id']))
{
	
	$s = $ownership_transfer->getSingle($_GET['edit_id']);
	$c = $client->getSingle($_GET['cid']);
	
}

	$client = $client->get_for_reading();

?>

<div>
	<h1 class="title">Add/Edit Name</h1>
</div>


	<div class="form-box">
		<form method="post" action="?page=ownership_transfer_form">
			<input type="hidden" name="id" value="<?php echo $s['id']; ?>" />
			<input type="hidden" name="cid" value="<?php echo $s['cid']; ?>" />

			<h5>Note: * are the required fields.</h5> <br>
		
				<label>Customer Name* : </label>

				<?php if(isset($_GET['edit_id'])){ ?>
					<input type="text"  class="form-controlled" value="<?php echo $s['old_owner']; ?>" name="old_owner">
					
				<?php } else{?>

					<select class="form-controlled" name="cust_name" id="cust_name">
						<option> Select Customer </option>
						<?php

							foreach($client as $c)
							{ ?>
						<option value="<?php echo $c['id']; ?>" id="<?php echo $c['id']; ?>"> <?php echo $c['name'].' ('.$c['id'].')'; ?> </option>


							<?php } ?>
					</select>

				<?php } ?>


				

				<label >Date: </label>
				<input type="text" name="paid_date" autocomplete="off" id="nepaliDate5" class="nepali-calendar form-controlled" value="<?php echo $s['paid_date']; ?>" required>


				<label >New Name</label>
				<input type="text" name="new_owner" id="new_owner" class="form-controlled" value="<?php echo $s['name'] ?>" required>
				
				
				<div id="clientdetails">
					<label> Meter No. : </label>
					<input type="number" class="form-controlled" value="<?php echo $s['meter']; ?>" name="meter" id="meter" disabled/>
				

					<label> Area No. : </label>
					<input type="number" id="area" class="form-controlled" value="<?php echo $s['area']; ?>" name="area" disabled />

				</div>


				<label> Charge: </label>
				<input type="number"  class="form-controlled" value="<?php echo $s['charge']; ?>" name="charge" id="charge" />


				<label> Total : </label>
				<input type="number" class="form-controlled" value="<?php echo $s['charge']; ?>" name="total" id="total-disabled"   disabled/>
				<input type="hidden" class="form-controlled" value="<?php echo $s['charge']; ?>" name="total" id="total" />


				
				

			
			<input type="submit" class="btn btn-success btn-man" value="Save" />
			<a href="?page=ownership_transfer" class="btn btn-danger">Cancel</a>


		</form>
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript" src="nepalidate.js"></script>
    
<script>

	
	
	$("#charge").on("input",function(){	
		var charge = $(this).val();
		$('#total-disabled').val(charge);
		$('#total').val(charge);
	});	




	$(function () {
	    $(document).on("change", "#cust_name", function () {
	        $.ajax({
	            url: "modules/ownership_transfer/client_details.php",
	            type: 'GET',
	            dataType: 'json',
	            data: {id: $(this).val()},
	        })
	        .done(function(response) {
            if (response.status) {
                $("#clientdetails").html(response.html);
            } else {
                alert(status.message);
            }
        })
        .fail(function(data) {
            alert("Something went wrong please try again later.");
            console.log(data.responseText);
        });
	    });
	});
	
	

</script>