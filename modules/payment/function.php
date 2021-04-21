<?php 
	class PaymentModel{

	function getSingle($d)
		{
			global $con;
			$sql = "SELECT payment.*, client.*, payment.remark AS payment_remark
					FROM payment
					INNER JOIN client
					ON payment.cid=client.id  WHERE pid = ".$d;
			$rs = mysqli_query($con, $sql);
			$row = mysqli_fetch_assoc($rs);
			return $row;
		}

		function getAll()
		{
			// global $con;
			// $sql = "SELECT * FROM payment ORDER BY paid_date desc";
			// $rs = mysqli_query($con, $sql);
			// $final = array();
			// while($row = mysqli_fetch_assoc($rs))
			// {
			// 	$final[] = $row;
			// }

			// return $final;

			global $con;
			global $pageno;
			global $total_pages;

			if (isset($_GET['pageno'])) {
	            $pageno = $_GET['pageno'];
	        } else {
	            $pageno = 1;
	        }
	        $no_of_records_per_page = 100;
	        $offset = ($pageno-1) * $no_of_records_per_page;

	     

	        $total_pages_sql = "SELECT COUNT(*) FROM payment";
	        $result = mysqli_query($con,$total_pages_sql);
	        $total_rows = mysqli_fetch_array($result)[0];
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

	        // $sql = "SELECT * FROM client LIMIT $offset, $no_of_records_per_page";
	        // $res_data = mysqli_query($conn,$sql);
	        // while($row = mysqli_fetch_array($res_data)){
	        //     echo $row['name'].'<br';
	        // }

			$sql = "SELECT payment.*, client.*, payment.remark AS payment_remark
					FROM payment
					INNER JOIN client
					ON payment.cid=client.id  ORDER BY pid desc  LIMIT $offset, $no_of_records_per_page";
			$rs = mysqli_query($con, $sql);
			$final = array();
			while($row = mysqli_fetch_assoc($rs))
			{
				$final[] = $row;
			}

			return $final;
		}

		function insert($d)
		{
			global $con;
			$cid = $d['cid'];

			$prev_reading = $d['previous_reading1'];
			$cur_reading = $d['reading'];

			$count = $d['count'];

			for($i=1;$i<=$count;$i++){
				if($i==$count){					
					$read_date = $read_date. $d['read_date'.$i];
				}else{

					$read_date = $read_date. $d['read_date'.$i].', ';
				}
			}

			$paid_date = $d['paid_date1'];
			$fee = $d['fee1'];
			$amount = $d['amount1'];
			$discount = $d['discount'];
			$total = $d['total1'];

			$previous_return = $d['dues_return'];
			
			$remaining_return = $d['remaining_return'];
			$remark = trim($d['remark']);

			
			$new_dues = $d['new_dues'];

			if($d['dues_clear']=='yes'){
				$gtotal = $d['gtotal1'] + $remaining_return - $new_dues;
				$dues = $d['client_dues'];

			}else  if($d['dues_clear']=='no'){
				$gtotal = $total + $remaining_return  - $new_dues;
				$dues = 0;
			}

			// echo "Cid=".$cid."<br>"."Cust name=".$cust_name."<br>"."Prev reading=".$prev_reading."<br>"."Read date =".$read_date."<br>"."Current reading = ".$cur_reading."<br>"."Today date=".$paid_date."<br>Fee=".$fee."<br>"."Amount=".$amount."<br>"."discount = ".$discount."<br>"."Total = ".$total."<br>"."G total=".$gtotal."<br>"."Remark=".$remark."<br>";

			$sql = "INSERT INTO payment(cid, prev_reading, cur_reading, read_date, paid_date, fee_rebate, discount, remark, amount, client_dues, total, grand_total, dues_return, previous_return, new_dues) VALUES($cid,$prev_reading,$cur_reading,'$read_date','$paid_date',$fee,$discount,'$remark',$amount,$dues,$total,$gtotal,$remaining_return,$previous_return, $new_dues)";
			

			$dues_insert ="INSERT INTO client_dues(cid, amount,dues_date,status) VALUE( $cid, $new_dues,'$paid_date','unpaid' )";
			
			$advance_insert ="INSERT INTO client_advance(cid, amount, adv_date,status) VALUE( $cid, $remaining_return,'$paid_date','unpaid' )";

			$advance_clear = "UPDATE client_advance SET status='paid' WHERE cid=$cid AND status='unpaid' AND amount=".$previous_return;

			if(mysqli_query($con, $sql)){
				
				for($i=1;$i<=$count;$i++){
					$meter_read_date = $d['read_date'.$i];
					$meter_paid = "UPDATE meter SET status='paid' WHERE read_date ='$meter_read_date' AND cid=$cid" ;
					
					mysqli_query($con, $meter_paid);
				}

				if($d['dues_clear']=='yes'){
					$dues_cleared = "UPDATE client_dues SET status='paid' WHERE cid=$cid" ;
					
					if(mysqli_query($con, $dues_cleared)){

						$_SESSION['success_msg'] = "Payment successfully saved and dues cleared.";
					}else{
                        $_SESSION['error_msg'] = "Error during clearing dues : " . $con->error ;
					}

				}else if($d['dues_clear']=='no'){
						$_SESSION['success_msg'] = "Payment successfully saved";
					}
				
				if($new_dues!=0){
					mysqli_query($con, $dues_insert);
				}
				if($remaining_return!=0){
					mysqli_query($con, $advance_insert);
				}
				if($previous_return!=0){
					mysqli_query($con, $advance_clear);
				}

			
			}else{
                $_SESSION['error_msg'] = "Error during payment : " . $con->error ;
			}
		}


		function update($d)
		{
			global $con;
			$pid = $d['pid'];
			$cid = $d['cid'];

			$prev_reading = $d['previous_reading1'];
			$cur_reading = $d['current_reading1'];
			$read_date = $d['read_date1'];
			$paid_date = $d['paid_date1'];
			$fee = $d['fee1'];
			$amount = $d['amount1'];
			$discount = $d['discount'];
			$total = $d['total1'];
			$gtotal = $d['gtotal1'];
			$remark = $d['remark'];

			$sql = "UPDATE payment SET cid=$cid,prev_reading=$prev_reading, cur_reading=$cur_reading, read_date='$read_date', paid_date='$paid_date', fee_rebate=$fee, discount=$discount, remark='$remark', amount=$amount, total=$total, grand_total=$gtotal  WHERE pid = ".$pid;
			
			if(mysqli_query($con, $sql)){
				$_SESSION['success_msg'] = "Payment successfully updated";
				mysqli_query($con, $meter_paid);
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}
			
		}

		function delete($d)
		{
			global $con;

			$payment_details = $this->getSingle($d);

			$read_date = $payment_details['read_date'];  
			$str_arr = preg_split ("/\,/", $read_date);  
			// print_r($str_arr); 


			$sql = "DELETE FROM payment WHERE pid = ".$d;



			if(mysqli_query($con, $sql)){
					
				//setting meter status to unpaid after delete

				foreach ($str_arr as $key => $read_date) {
					$meter_unpaid_update = "UPDATE meter SET status='unpaid' WHERE read_date = '".trim($read_date)."' AND cid=".$payment_details['cid'];

					mysqli_query($con, $meter_unpaid_update);
				}

				

				
				$_SESSION['success_msg'] = "Payment successfully deleted";
				

				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}		
		}

		function history($cid){
			global $con;
			$sql = "SELECT * FROM payment WHERE cid=$cid ORDER BY paid_date desc";		
			$sql = "SELECT payment.*, client.name
					FROM payment
					INNER JOIN client
					ON payment.cid=client.id WHERE cid = $cid ORDER BY payment.paid_date desc";	
			$rs = mysqli_query($con, $sql);
			$final = array();
			while($row = mysqli_fetch_assoc($rs))
			{
				$final[] = $row;
			}

			return $final;	
		}

	

	}



?>