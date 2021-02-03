<?php 
	class OwnerModel{

	function getSingle($d)
		{
			global $con;
			$sql = "SELECT owner_transfer.*, client.name,client.meter,client.area
					FROM owner_transfer
					INNER JOIN client
					ON owner_transfer.cid=client.id WHERE owner_transfer.id = ".$d;

			
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

	     

	        $total_pages_sql = "SELECT COUNT(*) FROM owner_transfer";
	        $result = mysqli_query($con,$total_pages_sql);
	        $total_rows = mysqli_fetch_array($result)[0];
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

	        // $sql = "SELECT * FROM owner_transfer LIMIT $offset, $no_of_records_per_page";
	        // $res_data = mysqli_query($conn,$sql);
	        // while($row = mysqli_fetch_array($res_data)){
	        //     echo $row['name'].'<br';
	        // }

			//$sql = "SELECT * FROM owner_transfer LIMIT $offset, $no_of_records_per_page";

			$sql = "SELECT owner_transfer.*, client.name,client.meter,client.area
					FROM owner_transfer
					INNER JOIN client
					ON owner_transfer.cid=client.id LIMIT $offset, $no_of_records_per_page";




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
			$old_owner = $d['old_owner'];
			$new_owner = $d['new_owner'];
			$charge = $d['charge'];
			$paid_date = $d['paid_date'];
			
			global $con;

			// $sql = "INSERT INTO owner_transfer(name, phone, joinned, gharnum, address, father, mother, remark) VALUES('".$d['name']."', ".$d['phone'].", '".$d['date']."', '".$d['gharnum']."',     '".$d['address']."', '".$d['father']."', '".$d['mother']."', '".$d['remark']."' )";

			$insert = "INSERT INTO owner_transfer(cid,old_owner,new_owner,charge,paid_date) VALUES('$cid','$old_owner','$new_owner','$charge','$paid_date') ";


			$client_update = "UPDATE client SET name='$new_owner' WHERE id=$cid";
			
			if(mysqli_query($con, $insert)){
				$_SESSION['success_msg'] = "Client's name successfully changed";
				mysqli_query($con,$client_update);
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}			
			
		}


		function update($d)
		{
			$id = $d['id'];
			$cid = $d['cid'];
			$old_owner = $d['old_owner'];
			$new_owner = $d['new_owner'];
			$charge = $d['charge'];
			$paid_date = $d['paid_date'];

			
			global $con;
			

			$update = "UPDATE owner_transfer SET  old_owner='$old_owner',new_owner='$new_owner', charge='$charge', paid_date='$paid_date' WHERE id='$id' ";

			$client_update = "UPDATE client SET name='$new_owner' WHERE id=$cid";
			
			if(mysqli_query($con, $update)){
				$_SESSION['success_msg'] = "Client's name successfully updated";
				mysqli_query($con,$client_update);
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}	
		}

		function delete($d)
		{
			global $con;
			$sql = "DELETE FROM owner_transfer WHERE id = ".$d;
		

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