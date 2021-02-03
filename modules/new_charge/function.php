<?php 
	class NewChargeModel{

	function getSingle($d)
		{
			global $con;
			$sql = "SELECT new_charge.*, client.name,client.meter,client.area
					FROM new_charge
					INNER JOIN client
					ON new_charge.cid=client.id WHERE new_charge.id = ".$d;

			
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

	     

	        $total_pages_sql = "SELECT COUNT(*) FROM new_charge";
	        $result = mysqli_query($con,$total_pages_sql);
	        $total_rows = mysqli_fetch_array($result)[0];
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

	        // $sql = "SELECT * FROM new_charge LIMIT $offset, $no_of_records_per_page";
	        // $res_data = mysqli_query($conn,$sql);
	        // while($row = mysqli_fetch_array($res_data)){
	        //     echo $row['name'].'<br';
	        // }

			//$sql = "SELECT * FROM new_charge LIMIT $offset, $no_of_records_per_page";

			$sql = "SELECT new_charge.*, client.name,client.meter,client.area
					FROM new_charge
					INNER JOIN client
					ON new_charge.cid=client.id LIMIT $offset, $no_of_records_per_page";




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
			$cid = $d['cust_name'];
			$meter = $d['meter'];
			$filter = $d['filter'];
			$date = $d['paid_date'];
			$membership = $d['membership'];
			$misc = $d['misc'];
			$total = $d['total'];
			
			global $con;

			// $sql = "INSERT INTO new_charge(name, phone, joinned, gharnum, address, father, mother, remark) VALUES('".$d['name']."', ".$d['phone'].", '".$d['date']."', '".$d['gharnum']."',     '".$d['address']."', '".$d['father']."', '".$d['mother']."', '".$d['remark']."' )";

			$insert = "INSERT INTO new_charge(cid,meter_charge,filter,membership,misc,paid_date,total) VALUES('$cid','$meter','$filter','$membership','$misc','$date','$total') ";
			
			
			if(mysqli_query($con, $insert)){
				$_SESSION['success_msg'] = "New Client's charge successfully saved";
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}			
			
		}


		function update($d)
		{
			$id = $d['id'];
			$meter = $d['meter'];
			$filter = $d['filter'];
			$membership = $d['membership'];
			$misc = $d['misc'];
			$date = $d['paid_date'];
			$total = $d['total'];

			
			global $con;
			

			$update = "UPDATE new_charge SET  total = '$total', meter_charge='$meter',paid_date='$date', filter = '$filter', membership ='$membership', misc = '$misc' WHERE id='$id' ";

			
			
			if(mysqli_query($con, $update)){
				$_SESSION['success_msg'] = "New Client's charge successfully updated";
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}	
		}

		function delete($d)
		{
			global $con;
			$sql = "DELETE FROM new_charge WHERE id = ".$d;
		

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