<?php
if(isset($_GET['edit_id']))
{
	
	$s = $payment->getSingle($_GET['edit_id']);
	
}

$client = $client->getAll();	

?>

<div>
	<h1 class="title">Add/Edit Payment</h1>
</div>

	<div id="mass_reading"></div>


	<div class="form-box payment-form">
		<form onsubmit="return date_check();" action="?page=payment_form" method="post" >
			<input type="hidden" name="pid" id="pid" value="<?php echo $s['pid']; ?>" />			
			<input type="hidden" name="cid" id="cid" value="<?php echo $s['cid']; ?>" />

			<!-- <h5>Note: * are the required fields.</h5>  <br>

 -->
		<div class="space-between"> 


			<div  id="form_left">
				<label>Customer Name* : </label>

				<?php if(isset($_GET['edit_id'])){ ?>
					<input type="text"  class="form-controlled" value="<?php echo $s['name']; ?>" name="cust_name" disabled>
				<?php } else{?>

		<select class="form-controlled" name="cust_name" id="cust_name">
				<option> Select Customer </option>
				<?php
		
					foreach($client as $c)
					{ ?>
				<option value="<?php echo $c['id']; ?>" id="<?php echo $c['id']; ?>"> <?php echo $c['name'].' ('.$c['id'].')'; ?> </option>
		
				<?php } ?>
			</select>

				<!-- <input type="text" list="cust_name" class="form-controlled" name="cust_name"  placeholder="Select Customer "/>
				<datalist id="cust_name">	
					<?php

						foreach($client as $c)
						{ ?>
					<option value="<?php echo $c['id']; ?>" id="<?php echo $c['id']; ?>"> <?php echo $c['name'].' ('.$c['id'].')'; ?> </option>

					<?php } ?>
				</datalist> -->

			<?php } ?>


				<label>Reading Date</label> 

				<?php if ($_GET['new']==1) { ?>
					<input type="text" name="read_date1" autocomplete="off" id="nepaliDate5" class="nepali-calendar form-controlled" value="<?php echo $s['read_date']; ?>" required>
				<?php }else{ ?>
				<input type="text" name="read_date" id="nepaliDate5" class="nepali-calendar form-controlled" value="<?php echo $s['read_date']; ?>" disabled>
				<input type="hidden" name="read_date1" id="nepaliDate51" class="nepali-calendar form-controlled" value="<?php echo $s['read_date']; ?>">
				<?php } ?>

				<label>Today's Date</label>
				<input type="text" name="paid_date" id="to-picker" class="form-controlled" disabled>
				<input type="hidden" name="paid_date1" id="to-picker1" class="form-controlled">
				


				<label>Current Reading</label>

				<?php if ($_GET['new']==1) { ?>
					<input type="number"  id="cur_read1" class="form-controlled" value="<?php echo $s['cur_reading']; ?>" name="current_reading1">

				<?php }else{  ?>
				<input type="number"  id="cur_read" class="form-controlled" value="<?php echo $s['cur_reading']; ?>" name="current_reading" disabled>
				<input type="hidden"  id="cur_read1" class="form-controlled" value="<?php echo $s['cur_reading']; ?>" name="current_reading1"hidden>
				<?php } ?>
				
				<label>Previous Reading : </label>

				<?php if ($_GET['new']==1) { ?>
					<input type="number" id="prev_read1" class="form-controlled" value="<?php echo $s['prev_reading']; ?>" name="previous_reading1" />	
				<?php }else{ ?>

				<input type="number" id="prev_read" class="form-controlled" value="<?php echo $s['prev_reading']; ?>" name="previous_reading" disabled/>	
				<input type="hidden" id="prev_read1" class="form-controlled" value="<?php echo $s['prev_reading']; ?>" name="previous_reading1"/>		

				<?php } ?>	

				<label>Reading Difference: </label>
				<input type="text" id="read_diff" class="form-controlled" name="read_diff" disabled/>
			</div> <!-- left ending -->

			<div class="form_center">
				


						
				
				<label>Discount* : </label>
				<input type="number" id="discount" class="form-controlled" value="<?php echo $s['discount']; ?>" name="discount" autocomplete="off" required/>

				<label>Fine / Rebate : </label>
				<input type="text" id="fee" class="form-controlled" value="<?php echo $s['fee_rebate']; ?>" name="fee" disabled/>
				<input type="hidden" id="fee1" class="form-controlled" value="<?php echo $s['fee_rebate']; ?>" name="fee1" />
				
								
				<label>Amount : </label>
				<input type="number" id="amount" class="form-controlled" value="<?php echo $s['amount']; ?>" name="amount" disabled/>
				<input type="hidden" id="amount1" class="form-controlled" value="<?php echo $s['amount']; ?>" name="amount1"/>

				

				<label>Total (without Discount) : </label>
				<input type="text" id="total" class="form-controlled" value="<?php echo $s['total']; ?>" name="total" disabled/>
				<input type="hidden" id="total1" class="form-controlled" value="<?php echo $s['total']; ?>" name="total1" />
				

				
				<label>Previous Return Dues: </label>
				<input type="text" name="dues_return" id="dues_return" class="form-controlled" disabled>

				
				<label>Grand Total (with Discount & Return) : </label>
				<input type="text" id="gtotal" class="form-controlled" value="<?php echo $s['grand_total']; ?>" name="gtotal" disabled/>
				<input type="hidden" id="gtotal1" class="form-controlled" value="<?php echo $s['grand_total']; ?>" name="gtotal1" />				
				

			</div> <!-- center ending -->
	

	
			<div class="form_right">


				<label>Amount Received: </label>
				<input type="number" name="received" id="received" class="form-controlled">

				<label>To Return: </label>
				<input type="text" name="to_return" id="to_return" class="form-controlled" disabled>

				<label>Return Remaining: </label>
				<input type="number" name="remaining_return" id="remaining_return" class="form-controlled">

				<label>Remarks : </label>
				<textarea id="remark" class="form-controlled" rows="5" name="remark" cols="80" value="<?php echo $s['remark']; ?>"><?php echo $s['remark']; ?></textarea>
			

				<input type="submit" class="btn btn-success btn-man" value="Next" />
				<a href="?page=payment" class="btn btn-danger">Cancel</a>


				</div> <!-- right ending -->
				

		</div> <!-- space between ending -->
				
				
	


		</form>
	</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Nepali Calendar links -->

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
	<script type="text/javascript" src="nepalidate.js"></script>


<script type="text/javascript">


	var total = $('#total').val();
	var gtotal = $('#gtotal').val();
	var received = $('#received').val();
	var to_return = $('#to_return').val();
	var dues_return = $('#dues_return').val();
    
	$("#cust_name").on("change", function(){
  		var cid = $(this).val();
  		$("#read").show();
  		$("#cid").val(cid);

  		

  		
		  	var xhttp = new XMLHttpRequest();

			xhttp.open("GET", "modules/payment/prevread.php?id="+cid, true);

			xhttp.onload = function() {
			  if (this.status==200){
			  	var test= this.responseText;	
			  	$('#prev_read').val(test);	  	
			  	$('#prev_read1').val(test);	  	
			  }
			};

			xhttp.send();

			var xhttp = new XMLHttpRequest();	
			xhttp.open("GET", "modules/payment/paiddate.php?id="+cid, true);

			xhttp.onload = function() {
			  if (this.status==200){
			  	var testr= this.responseText;	
			  	$('#nepaliDate5').val(testr);	
			  	$('#nepaliDate51').val(testr);	   	
			  }
			};

			xhttp.send();

			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "modules/payment/reading.php?id="+cid, true);

			xhttp.onload = function() {
			  if (this.status==200){
			  	var teset= this.responseText;	
			  	$('#cur_read').val(teset);	  	
			  	$('#cur_read1').val(teset);	  	
			  }
			};

			xhttp.send();

			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "modules/payment/return.php?id="+cid, true);

			xhttp.onload = function() {
			  if (this.status==200){
			  	var teset= this.responseText;	
			  	$('#dues_return').val(teset); 	
			  }
			};

			xhttp.send();





	})

 
	   	var  end   = new Date(),    
	    year = end.getFullYear(), 
        month = end.getMonth()+1,
        date = end.getDate(),    

        formatedDate = year+'-'+month+'-'+date;

        todayDate = AD2BS(formatedDate);

       	$('#to-picker').val(todayDate);
       	$('#to-picker1').val(todayDate);

        
       

		




	$("#discount").on("input",function(){	

		var prev_read = $('#prev_read1').val();
		var cur_read = $('#cur_read1').val();
		$("#remaining_return").val(0);

		var read_diff = cur_read - prev_read;
		var amount = 0;
		
		console.log("Real reading: "+read_diff);

		if(read_diff <=15){
			amount = 50;
			$("#read_diff").val(read_diff);
		}else{
			$("#read_diff").val(read_diff);
			read_diff = read_diff - 15;
			amount = 50 + (read_diff * 7);
			console.log("reading after -15: "+read_diff);

		}

		

		var read_date =$('#nepaliDate5').val();

		var input_date =new Date(read_date),  
	    todayDate   = new Date(),    
	    year = input_date.getFullYear(), 
        month = input_date.getMonth()+1,
        date = input_date.getDate(),    


        //Converting input date of Nepali Calendar to English date and calculating date difference in AD date.

        formatedDate = year+'-'+month+'-'+date;

     	engdate =  BS2AD(formatedDate);
       	eng_read_date = new Date(engdate);

       	// Calculating date difference
        diff  = new Date(todayDate - eng_read_date),
    	date_diff  = Math.round(diff/1000/60/60/24);
   		
   		
     	
     	console.log('Date difference is: ' + date_diff);
       	console.log('\n Current reading: '+cur_read);
       	console.log('\n Reading difference amount: '+amount);

		var fee = 0;


		if(date_diff>0 && date_diff<=15 ){
			fee = amount * 4 / 100;
			total = amount - fee;
			console.log('date<15');
			$('#fee').val('-'+fee);
			$('#fee1').val('-'+fee);
		}
		else if(date_diff>15 && date_diff<=30) {
			fee = 0;
			total = amount + fee;
			console.log('date<30');
			$('#fee').val(fee);
			$('#fee1').val(fee);
		}
		else if (date_diff>30 && date_diff<=60) {
			fee = amount * 8 / 100;
			total = amount + fee;

			console.log('date<60');
			$('#fee').val('+'+fee);
			$('#fee1').val('+'+fee);
		}
		else if(date_diff>60 && date_diff<=90) {
			fee = amount * 20 / 100;
			total = amount + fee;
			console.log('date<90');
			$('#fee').val('+'+fee);
			$('#fee1').val('+'+fee);
		}
		else if(date_diff>90 && date_diff<=120) {
			fee = amount * 40 / 100;
			total = amount + fee;
			console.log('date<120');
			$('#fee').val('+'+fee);
			$('#fee1').val('+'+fee);
		}
		else if(date_diff>120) {
			fee = amount * 100 / 100;
			total = amount + fee;
			console.log('date>120');
			$('#fee').val('+'+fee);
			$('#fee1').val('+'+fee);
		}

		$('#amount').val(amount );
		$('#amount1').val(amount );

		$('#total').val(total);
		$('#total1').val(total);

		var dues_return = $('#dues_return').val();

		var discount = $(this).val();	
		console.log('Dues: '+dues_return);
		gtotal = total - discount - dues_return;
		$('#gtotal').val(gtotal);
		$('#gtotal1').val(gtotal);

	})

	$('#received').on('input',function(){

		var received = $('#received').val();
		to_return = (received - gtotal).toFixed(2);
		$('#to_return').val(to_return);
		console.log(to_return);

	})
	
		

function date_check(date){
	
	var read_date =$('#nepaliDate5').val();

		var input_date =new Date(read_date),  
	    todayDate   = new Date(),    
	    year = input_date.getFullYear(), 
        month = input_date.getMonth()+1,
        date = input_date.getDate(),    


        //Converting input date of Nepali Calendar to English date and calculating date difference in AD date.

        formatedDate = year+'-'+month+'-'+date;

     	engdate =  BS2AD(formatedDate);
       	eng_read_date = new Date(engdate);

       	// Calculating date difference
        diff  = new Date(todayDate - eng_read_date),
    	date_diff  = Math.round(diff/1000/60/60/24);

    	if(date_diff <= 0){
    		alert('Reading Date cannot be future date.');
    		return false;
    	}

    	var prev_read = $('#prev_read1').val();
		var cur_read = $('#cur_read1').val();
		var read_diff = cur_read - prev_read;

		if(read_diff <0){
			alert("Meter Reading calculation error");
			return false;
		}


}


</script>



