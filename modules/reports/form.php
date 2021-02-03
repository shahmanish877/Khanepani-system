<?php 
$total = 0;
	if($_POST['paid_date']!='' || $_GET['date']!=''){

		if($_GET['reports']!='monthly'){
			$data = $reports->daily($_POST);

			
			echo '<h1 class="title">Reports of '.$_POST["paid_date"].'</h1>';


			if($data){


				echo '<button class="btn print_btn pull-right"  onclick="printDiv()">Print</button> ';
				echo '<div id="printableTable">';
				echo '<div class="print_only">
					<p>Daily Report of '.$_POST['paid_date'].'</p>
					
				</div>';
				echo '<table border="1" width="100%" class="table"  id="result">';
				echo "<tr>
						<th width='25%'>Type</th>
						<th width='15%'>Transaction  I.D.</th>
						<th>Client Name</th>
						<th>Total Amount</th>
					</tr>
				";
				foreach ($data as $d) {
					?>
						<tr>
							<td> <?php echo $d['type']; ?> </td>
							<td> <?php echo $d['id']; ?> </td>
							<td>
								<?php 
									if($d['type']=='Ownership Transfer Charge'){
										echo $d['name'].' (New Owner)';	
									}else{
										echo $d['name'];
									}

								?>
							</td>
							<td> <?php echo $d['amount'];
									$total = $total + $d['amount'] ;
								 ?> 
							</td>
						</tr>

						

				<?php
				}
					echo "<tr >

							<td> </td>
							<td> </td>
							<td> </td>
							<td> <b>Total: </b> ". $total."
							</td>
						</tr>";
					echo '</table> </div>';
			}else
					echo "<h4> No Data Found....  </h4>";

		}
		else{
			//$date = $_POST["paid_date"];


			$array = ['','BAISAKH','JESTHA','ASAR', 'SHRAWAN', 'BHADRA', 'ASOJ', 'KARTIK', 'MANGSIR',  'POUSH', 'MAGH', 'FALGUN', 'CHAITRA'];

			// $get_month = date('n',strtotime($date));  //in numeric form
			// $month = $array[$get_month]; //in string form like baisakh
			// $year = date('Y',strtotime($date)); 

			$month = $_POST['paid_date'];

			

			$year = $_POST['year'];

			if($month<10){			
				$month_string = $year.'-0'.$month.'-';  //in format of 2076-01- to search in sql with LIKE query
			}else{
				$month_string = $year.'-'.$month.'-'; //in format of 2076-11- to search in sql with LIKE query
			}

			//echo $month_string; 

			$data = $reports->monthly($month_string);
			
			echo '<h1 class="title">Reports of '.$year." ".$array[$month].'</h1>';

			if($data){	

				echo '<button class="btn print_btn pull-right"  onclick="printDiv()">Print</button> ';
				echo '<div id="printableTable">';
				echo '<div class="print_only">
					<p>Monthly Report of '.$year." ".$array[$month].'</p>
					
				</div>';
				echo '<table border="1" width="100%" class="table"  id="result">';
				echo "<tr>
						<th width='25%'>Type</th>
						<th width='15%'>Transaction  I.D.</th>
						<th>Client Name</th>
						<th>Received Date</th>
						<th>Total Amount</th>
					</tr>
				";
			
				foreach ($data as $d) {
					?>
						<tr>
							<td> <?php echo $d['type']; ?> </td>
							<td> <?php echo $d['id']; ?> </td>
							<td>
								<?php 
									if($d['type']=='Ownership Transfer Charge'){
										echo $d['name'].' (New Owner)';	
									} else{
										echo $d['name'];
									}

								?>
							</td>
							<td> <?php echo $d['received_date']; ?> </td>
							<td> <?php echo $d['amount'];
									$total = $total + $d['amount'] ;
								 ?> 
							</td>
						</tr>			
					

					<?php
					}
					echo 	"<tr >

							<td> </td>
							<td> </td>
							<td> </td>

							<td> </td>
							<td> <b>Total: </b> ". $total."
							</td>
						</tr>";
					echo '</table> </div>';
					
				}
				else
					echo "<h4> No Data Found....  </h4>";

		

		}

	}
	else{

		if($_GET['reports']!='monthly'){
 ?>

		<div>
			<h1 class="title">Select Date</h1>
		</div>


			<div class="form-box">
				<form method="post" action="">
					<!-- <input type="text" name="h" value="<?php echo $s['id']; ?>" /> -->

					<h5>Note: * are the required fields.</h5> <br> <br>
					
						
						<label>Select Date </label>
						<input type="text" autocomplete="off" id="nepaliDate5" name='paid_date' class="nepali-calendar form-controlled" required>


					<input type="submit" class="btn btn-success btn-man" value="Submit" />

					<a href="?page=reports" class="btn btn-danger">Cancel</a>


				</form>
			</div>

<?php } else {  ?>

		<div>
			<h1 class="title"> Select Year &  Month  </h1>
		</div>


			<div class="form-box">
				<form method="post" action="">
					<!-- <input type="text" name="h" value="<?php echo $s['id']; ?>" /> -->

					<h5>Note: * are the required fields.</h5> <br> <br>
					
						
						<label>Select Year & Month </label>
						
						<select class="form-controlled" name="year" required>
							<option value=""> -- Year --	</option>

							<?php for($i=2076;$i<2100;$i++){ ?>
								<option value="<?php echo $i; ?>">
									<?php echo $i; ?>
								</option>
							<?php } ?>
						</select>

						<select class="form-controlled" name="paid_date" required>
							<option value=""> -- Month --	</option>

							<?php 
							$array = ['','BAISAKH','JESTHA','ASAR', 'SHRAWAN', 'BHADRA', 'ASOJ', 'KARTIK', 'MANGSIR',  'POUSH', 'MAGH', 'FALGUN', 'CHAITRA'];

							for($i=1;$i<13;$i++){ ?>
								<option value="<?php echo $i; ?>">
									<?php echo $array[$i]; ?>
								</option>
							<?php } ?>
						</select>

					<input type="submit" class="btn btn-success btn-man" value="Submit" />

					<a href="?page=reports" class="btn btn-danger">Cancel</a>


				</form>
			</div>
<?php 
 } 


} ?>


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


<script type="text/javascript">
	function printDiv() {
  		var divToPrint = document.getElementById('printableTable');
        newWin = window.open("");

        newWin.document.write('	<link rel="stylesheet" type="text/css" href="style.css">');
        
        newWin.document.write('<div class="title print js_print">		<p class="minititle">"फोहर पानी रोगको खानी, छोपेर राखौं खानेपानी"</p>		<p>पानवारी खानेपानी उपभोग्ता तथा सरसफाई समिति </p>		<p class="minititle">धरान -६, पानवारी, सुनसरी </p>		');
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>