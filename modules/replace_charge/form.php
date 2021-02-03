<?php
if(isset($_GET['edit_id']))
{
	
	$s = $replace_charge->getSingle($_GET['edit_id']);
	
}

	$client = $client->get_for_reading();

?>

<div>
	<h1 class="title">Add/Edit Client's Charge</h1>
</div>


	<div class="form-box">
		<form method="post" action="?page=replace_charge_form">
			<input type="hidden" name="id" value="<?php echo $s['id']; ?>" />

			<h5>Note: * are the required fields.</h5> <br>
		
				<label>Customer Name* : </label>

				<?php if(isset($_GET['edit_id'])){ ?>
					<input type="text"  class="form-controlled" value="<?php echo $s['name']; ?>" name="cust_name" disabled>
					<input type="hidden"  class="form-controlled" value="<?php echo $s['name']; ?>" name="cust_name">
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

				<label> Meter/Parts : </label>
				<input type="number" class="form-controlled" value="<?php echo $s['meter_charge']; ?>" name="meter" id="meter"/>
			

				<label> Filter : </label>
				<input type="number" id="filter" class="form-controlled" value="<?php echo $s['filter']; ?>" name="filter" />

				<label> Misc. : </label>
				<input type="number"  class="form-controlled" value="<?php echo $s['misc']; ?>" name="misc" id="misc" />

				<label> Total : </label>
				<input type="number" class="form-controlled" value="<?php echo $s['total']; ?>" name="total" id="total-disabled"   disabled/>
				<input type="hidden" class="form-controlled" value="<?php echo $s['total']; ?>" name="total" id="total" />


				
				

			
			<input type="submit" class="btn btn-success btn-man" value="Save" />
			<a href="?page=replace_charge" class="btn btn-danger">Cancel</a>


		</form>
	</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript" src="nepalidate.js"></script>
    
<script>

	function total_sum(){
		var meter = $('#meter').val();
		var filter = $('#filter').val();
		var misc = $('#misc').val();
		
		var total = (+meter) + (+misc) + (+filter) ;
		$('#total-disabled').val(total);
		$('#total').val(total);
	}

	
	$("#meter").on("input",function(){	
		total_sum();
	});	
	$("#filter").on("input",function(){	
		total_sum();
	});	
	
	$("#misc").on("input",function(){	
		total_sum();
	});	




	
	

</script>