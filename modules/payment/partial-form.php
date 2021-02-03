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



	<div class="form-box payment-form">
		<form onsubmit="return date_check();" action="?page=payment_form" method="post" >
			<input type="hidden" name="pid" id="pid" value="<?php echo $s['pid']; ?>" />			
			<input type="hidden" name="cid" id="cid" value="<?php echo $s['cid']; ?>" />
			<input type="hidden" name="count" id="count" value="<?php echo $s['cid']; ?>" />



			<!-- <h5>Note: * are the requigreen fields.</h5>  <br>

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

				<label >Reading From</label>
					<input type="text" name="reading_from" class="form-controlled" id="reading_from" disabled>

				<label>Reading Upto</label> 

										
						<input type="text" name="read_date" id="nepali-datepicker" class="nepali-calendar form-controlled" value="<?php echo $s['read_date']; ?>">
					
					<div id="read_date"></div>

				<label>Today's Date</label>
				<input type="text" name="paid_date" id="to-picker" class="form-controlled" disabled>
				<input type="hidden" name="paid_date1" id="to-picker1" class="form-controlled">
				


				<label>Current Reading</label>
			

				<?php if ($_GET['new']==1) { ?>
					<div id="reading">
						
						<input type="number"  id="reading" class="form-controlled" name="reading" disabled>
					</div>

				<?php }else{  ?>
					<div id="reading">
						
						<input type="number"  id="reading" class="form-controlled" name="reading" disabled>
					</div>
				<?php } ?>
				
				<label>Previous Reading : </label>

				<?php if ($_GET['new']==1) { ?>
					<input type="number" id="prev_read1" class="form-controlled" value="<?php echo $s['prev_reading']; ?>" name="previous_reading1" />	
				<?php }else{ ?>

				<input type="number" id="prev_read" class="form-controlled" value="<?php echo $s['prev_reading']; ?>" name="previous_reading"/>	
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

				

			
				
				<label>Previous Return: </label>
				<input type="text" name="dues_return" id="dues_return" class="form-controlled" disabled>

				<div>
					<label class="total">Total (with Discount & Return) : </label>
					<input type="text" id="total" class="form-controlled total" value="<?php echo $s['total']; ?>" name="total" disabled/>
					<input type="hidden" id="total1" class="form-controlled" value="<?php echo $s['total']; ?>" name="total1" />
				</div>

				<label>Previous Dues: </label>
				<input type="text" id="client_dues" class="form-controlled" disabled>
				<input type="hidden" name="client_dues" id="client_dues1" class="form-controlled">

				<div >
					<label class="gtotal">Grand Total (with Dues) : </label>
					<input type="text" id="gtotal" class="form-controlled gtotal" value="<?php echo $s['grand_total']; ?>" name="gtotal" disabled/>
					<input type="hidden" id="gtotal1" class="form-controlled" value="<?php echo $s['grand_total']; ?>" name="gtotal1" />
				</div>				
				

			</div> <!-- center ending -->
	

	
			<div class="form_right">
				
				<label >Clear client's dues?</label><br>
				<input type="radio" id="yes" name="dues_clear" class="dues_clear" value="yes" required> <label for="yes">Yes</label> <br>
				<input type="radio" id="no" name="dues_clear" class="dues_clear" value="no" required> <label for="no">No</label>

	<br><br>
				<label>Amount Received: </label>
				<input type="number" name="received" id="received" class="form-controlled">

				<label>To Return: </label>
				<input type="text" name="to_return" id="to_return" class="form-controlled" disabled>

				<label>Return Remaining: </label>
				<input type="number" name="remaining_return" id="remaining_return" class="form-controlled" step="any">

				<label>Remarks : </label>
				<textarea id="remark" class="form-controlled" rows="5" name="remark" cols="80" value="<?php echo $s['remark']; ?>"><?php echo $s['remark']; ?></textarea>
			
				
				<input type="submit" class="btn btn-success btn-man" value="Submit" />
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
<script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.min.js" type="text/javascript"></script>

           



<script type="text/javascript">



var mainInput = document.getElementById("nepali-datepicker");
 
/* Initialize Datepicker with options */
mainInput.nepaliDatePicker({
    onChange: function() {
        ajax_function();
    }
});



		var  end   = new Date(),    
	    year = end.getFullYear(), 
        month = end.getMonth()+1,
        date = end.getDate(),    

        formatedDate = year+'-'+month+'-'+date;

        todayDate = AD2BS(formatedDate);

       	$('#to-picker').val(todayDate);
       	$('#to-picker1').val(todayDate);
       	$('#read_upto').val(todayDate);


function date_check(date){
	
	var read_date =$('#nepali-datepicker').val();

	var count = $('#count').val();

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

    	console.log('.............DATE Diff '+todayDate+'......'+eng_read_date );

    	if(date_diff < 0){
    		alert('Reading Date cannot be future date.');
    		return false;
    	}

    	var prev_read = $('#prev_read1').val();
		var cur_read = $('#reading'+count).val();
		var read_diff = cur_read - prev_read;

		if(read_diff <0){
			alert("Meter Reading calculation error");
			return false;
		}


}



function ajax_function(){
			var cid = $('#cust_name').val();
			var read_upto = $('#nepali-datepicker').val();
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
		xhttp.open("GET", "modules/payment/return.php?id="+cid, true);

		xhttp.onload = function() {
		  if (this.status==200){
		  	var teset= this.responseText;	
		  	$('#dues_return').val(teset); 	
		  }
		};

		xhttp.send();


        $.ajax({
            url: "modules/payment/all_reading_test.php",
            type: 'GET',
            dataType: 'json',
            data: {id: cid, read_upto: read_upto },
        })
        .done(function(response) {
            if (response.status) {
                $("#reading").html(response.reading);
                $("#read_date").html(response.read_date);
                $("#count").val(response.count);

                $("#reading_from").val(response.reading_from);
                $("#client_dues").val(response.client_dues);
                $("#client_dues1").val(response.client_dues);
            } else {
                alert(status.message);
            }
        })
        .fail(function(data) {
            alert("Something went wrong please try again later.");
            console.log(data.responseText);
        });


		setTimeout('read_upto()',50);
	}

$(document).on("change", "#cust_name", function () {

	ajax_function();

});

function monthDiff(dt2, dt1) {
    var diff =(dt2.getTime() - dt1.getTime()) / 1000;
  	diff /= (60 * 60 * 24 * 7 * 4);
  	return Math.abs(Math.round(diff));
}

function read_upto(){
	var count = $('#count').val();

	var reading_from = $('#reading_from').val();
	var read_upto = $('#read_date'+count).val();

	console.log('====='+reading_from+'----------'+read_upto);


	var d1 = new Date(reading_from);
	var d2 = new Date(read_upto);

	var month_diff = monthDiff(d1,d2) + 1;

    $('#nepali-datepicker').val(read_upto + ' ('+ month_diff +' months) ');
}



// Mass reading calculation 


	$(document).on("input", "#discount", function () {
		date_check();
			var reading= [''];
			var read_date= [''];
			var date_diff= [''];
			var read_diff= [''];
			var fee= [''];
			var amount= [''];
			var total= [''];
			var count = $('#count').val();
			var i;
			var total_fine =0;
			var total_total =0;
			var total_amount= 0;
			var total_with_fine =0;
			var client_dues = $('#client_dues').val();

			var prev_read = $('#prev_read1').val();


			for(i=1;i<=count;i++){
				reading.push($('#reading'+i).val());
				read_date.push($('#read_date'+i).val());
				console.log(reading[i]);
				console.log(read_date[i]);


			}



			for(i=1;i<=count;i++){
				if(i==1){
					read_diff.push(reading[i]-prev_read);
					console.log(i+" Diff: "+ read_diff[i]);

				}else{
					read_diff.push(reading[i] - reading[i-1]);
					console.log(i+" Diff: "+read_diff[i]);
				}	


				// read_diff[i] = read_diff[i] - 15;
				// amount[i] = 50 + (read_diff[i] * 7);

				// console.log('amount = '+amount[i]);

				if(read_diff[i] <=15){
					amount[i] = 50;
				}else{
					read_diff[i] = read_diff[i] - 15;
					amount[i] = 50 + (read_diff[i] * 7);
					console.log("reading after -15: "+read_diff[i]);

				}

				total_amount = total_amount + amount[i];

			}	


			var total_read_diff = reading[count] - prev_read ;
			$('#read_diff').val(total_read_diff);



		for(i=1;i<=count;i++){




			var reading_date = new Date(read_date[i]), 
		    todayDate   = new Date(),    
		    year = reading_date.getFullYear(), 
	        month = reading_date.getMonth()+1,
	        date = reading_date.getDate(),    



	        //Converting input date of Nepali Calendar to English date and calculating date difference in AD date.

	        formatedDate = year+'-'+month+'-'+date;

	     	engdate =  BS2AD(formatedDate);
	       	eng_read_date = new Date(engdate);

	       	// Calculating date difference
	        diff  = new Date(todayDate - eng_read_date),
	    	date_diff.push(Math.round(diff/1000/60/60/24));

	     	console.log('Date difference is: ' + date_diff[i]);

	     }



	     for(i=1;i<=count;i++){
	     	if(date_diff[i]>=0 && date_diff[i]<=15 ){
				fee[i] = -(amount[i] * 4 / 100);
				console.log('date<15');
				var fee_type ='rebate';
			}
			else if(date_diff[i]>15 && date_diff[i]<=30) {
				fee[i] = 0;
				console.log('date<30');
			}
			else if (date_diff[i]>30 && date_diff[i]<=60) {
				fee[i] = amount[i] * 8 / 100;

				console.log('date<60');
			}
			else if(date_diff[i]>60 && date_diff[i]<=90) {
				fee[i] = amount[i] * 20 / 100;
				console.log('date<90');
			}
			else if(date_diff[i]>90 && date_diff[i]<=120) {
				fee[i] = amount[i] * 40 / 100;
				console.log('date<120');
			}
			else if(date_diff[i]>120) {
				fee[i] = amount[i] * 100 / 100;
				console.log('date>120');
			}


			total[i] = amount[i] + fee[i];
			console.log('Fee = '+fee[i]);
			console.log('Total = ' + total[i]);

			total_fine =  total_fine + fee[i];
			total_with_fine =  total_with_fine + total[i];
	     }


			console.log('Total fee = ' + total_fine);
			console.log('Total total = ' + total_with_fine);

			$('#fee').val(total_fine);
			$('#fee1').val(total_fine);


			$('#amount').val(total_amount);
			$('#amount1').val(total_amount);

			total_with_fine = total_with_fine - $('#discount').val();
			$('#total').val(total_with_fine);
			$('#total1').val(total_with_fine);


			var grand_total = total_with_fine  - $('#dues_return').val() + (+client_dues);

			$('#gtotal').val(grand_total);
			$('#gtotal1').val(grand_total);

			
	    });



	$('#received').on('input',function(){
		toreturn();	

	});

	$('.dues_clear').on('input',function(){
		toreturn();	

	});


	function toreturn(){
		var atLeastOneChecked = false;

		var dues_clear = $('input[type=radio][name=dues_clear]:checked').val();

		console.log('Dues clear = '+dues_clear);


		$("#remaining_return").val(0);
		var received = $('#received').val();

		 $("input[type=radio][name=dues_clear]").each(function() {
            if ($(this).attr("checked") == "checked") {
                atLeastOneChecked = true;
            }
        });


		if(atLeastOneChecked){
		 	if(dues_clear=='yes'){

				to_return = (received - $('#gtotal').val()).toFixed(2);

				 $(".gtotal").css("color", "red");
				 $(".total").css("color", "#6e707e");

			}else if(dues_clear=='no'){			

				to_return = (received - $('#total').val()).toFixed(2);

				 $(".total").css("color", "red");
				 $(".gtotal").css("color", "#6e707e");
			}
		}
		else{
			alert("Please select the dues clear box.");
			to_return = 0;
		}


		$('#to_return').val(to_return);
		console.log(to_return);
	}
	


</script>