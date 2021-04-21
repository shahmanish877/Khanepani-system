<?php 
	class AdvModel{

	function getSingle($d)
		{
			global $con;
			$sql = "SELECT client_advance.*, client.name,client.meter
					FROM client_advance
					INNER JOIN client
					ON client_advance.cid=client.id WHERE client_advance.id = ".$d;

			// $sql = "SELECT * FROM client_advance where cid=".$d;

			$rs = mysqli_query($con, $sql);
			$row = mysqli_fetch_assoc($rs);
			return $row;
		}

	function get_sum($d){
		global $con;
			
			$sql = "SELECT SUM(amount) as total_advance FROM client_advance WHERE status='unpaid' and cid=".$d;

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

	        $total_pages_sql = "SELECT COUNT(*) FROM client_advance";
	        $result = mysqli_query($con,$total_pages_sql);
	        $total_rows = mysqli_fetch_array($result)[0];
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

	        // $sql = "SELECT * FROM client_client_advance LIMIT $offset, $no_of_records_per_page";
	        // $res_data = mysqli_query($conn,$sql);
	        // while($row = mysqli_fetch_array($res_data)){
	        //     echo $row['name'].'<br';
	        // }

			$sql = "SELECT client_advance.*, client.name,client.meter
					FROM client_advance
					INNER JOIN client
					ON client_advance.cid=client.id LIMIT $offset, $no_of_records_per_page";

			

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
			$cid = $d['cid'];
			$amount = $d['amount'];
			$adv_date = $d['adv_date'];
			
			
			global $con;

			// $sql = "INSERT INTO advance(name, phone, joinned, gharnum, address, father, mother, remark) VALUES('".$d['name']."', ".$d['phone'].", '".$d['date']."', '".$d['gharnum']."',     '".$d['address']."', '".$d['father']."', '".$d['mother']."', '".$d['remark']."' )";

			foreach($amount as $client_id => $advance) {
				$sql= "INSERT INTO client_advance(cid, amount,adv_date,status) VALUE( $client_id,$advance,'$adv_date','unpaid' )";

				if(mysqli_query($con, $sql)){
					$_SESSION['success_msg'] = "Client advance successfully saved";
				
				}else{
                    $_SESSION['error_msg'] = "Error : " . $con->error ;
				}
			}
		
			
		}


		function update($d)
		{
			$id = $d['id'];
			$cid = $d['cid'];
			$amount = $d['amount'];
			$adv_date = $d['adv_date'];
			$status = $d['status'];
			
			global $con;
			

			$update = "UPDATE client_advance SET  cid='$cid',adv_date='$adv_date', amount = '$amount', status='$status' WHERE id='$id' ";

			
			
			if(mysqli_query($con, $update)){
				$_SESSION['success_msg'] = "Client advance successfully updated";
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}	
		}

		function delete($d)
		{
			global $con;
			$sql = "DELETE FROM client_advance WHERE id = ".$d;
		
			
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