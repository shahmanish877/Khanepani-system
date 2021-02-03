<?php 
	class DonationModel{

	function getSingle($d)
		{
			global $con;
			$sql = "SELECT * From donation WHERE id = ".$d;

			
			$rs = mysqli_query($con, $sql);
			
			$row = mysqli_fetch_assoc($rs);
			return $row;
		}

		function getAll()
		{
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

	        $total_pages_sql = "SELECT COUNT(*) FROM donation";
	        $result = mysqli_query($con,$total_pages_sql);
	        $total_rows = mysqli_fetch_array($result)[0];
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

	        // $sql = "SELECT * FROM donation LIMIT $offset, $no_of_records_per_page";
	        // $res_data = mysqli_query($conn,$sql);
	        // while($row = mysqli_fetch_array($res_data)){
	        //     echo $row['name'].'<br';
	        // }

			
			$sql = "SELECT * FROM donation LIMIT $offset, $no_of_records_per_page";




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
			$name = $d['name'];
			$amount = $d['amount'];
			$date = $d['received_date'];
			$remarks = $d['remarks'];
			
			
			global $con;

			// $sql = "INSERT INTO new_charge(name, phone, joinned, gharnum, address, father, mother, remark) VALUES('".$d['name']."', ".$d['phone'].", '".$d['date']."', '".$d['gharnum']."',     '".$d['address']."', '".$d['father']."', '".$d['mother']."', '".$d['remark']."' )";

			$insert = "INSERT INTO donation(name,amount,received_date,remarks) VALUES('$name','$amount','$date','$remarks') ";
			
			
			if(mysqli_query($con, $insert)){
				$_SESSION['success_msg'] = "Donation successfully saved";
				echo "success";
			}else{
				echo "wrong";
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}			
			
		}


		function update($d)
		{
			$id = $d['id'];
			$name = $d['name'];
			$amount = $d['amount'];
			$date = $d['received_date'];
			$remarks = $d['remarks'];
			

			
			global $con;
			

			$update = "UPDATE donation SET  name='$name',received_date='$date', amount = '$amount', remarks='$remarks' WHERE id='$id' ";

			
			
			if(mysqli_query($con, $update)){
				$_SESSION['success_msg'] = "Donation successfully updated";
				
			}else{

                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}	
		}

		function delete($d)
		{
			global $con;
			$sql = "DELETE FROM donation WHERE id = ".$d;
		

			if(mysqli_query($con, $sql)){
				$_SESSION['success_msg'] = "Successfully deleted";
				echo "success";
			}else{
				echo "wrong";
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}				
		}
	}

?>