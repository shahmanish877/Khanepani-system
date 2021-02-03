<?php 
	class MeterModel{

	function getSingle($d)
		{
			global $con;
			$sql = "SELECT meter.*, client.*
					FROM meter
					INNER JOIN client
					ON meter.cid=client.id  WHERE mid = ".$d;
			$rs = mysqli_query($con, $sql);
			$row = mysqli_fetch_assoc($rs);
			return $row;
		}

	function dateCheck($date,$cid){
		global $con;
		

		$year = date('Y', strtotime($date));

		$month = date('m', strtotime($date));

		$read_date = $year.'-'.$month;
		$sql = "SELECT read_date FROM meter WHERE cid='$cid' AND read_date LIKE '$read_date%'";
		
		$rs = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($rs);
		return $row;



	}

		function getAll()
		{
			// global $con;
			// $sql = "SELECT * FROM meter";
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

	     

	        $total_pages_sql = "SELECT COUNT(*) FROM meter WHERE read_date='".$_GET['date']."'";
	        $result = mysqli_query($con,$total_pages_sql);
	        $total_rows = mysqli_fetch_array($result)[0];
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

	     
			if (isset($_GET['date'])){
				$date = $_GET['date'];
				$sql = "SELECT meter.*, client.*
					FROM meter
					INNER JOIN client
					ON meter.cid=client.id WHERE read_date='$date' LIMIT $offset, $no_of_records_per_page";
			}else{

				//$sql = "SELECT * FROM meter LIMIT $offset, $no_of_records_per_page";
				$sql = "SELECT meter.*, client.*
					FROM meter
					INNER JOIN client
					ON meter.cid=client.id LIMIT $offset, $no_of_records_per_page";
				
			}
			$rs = mysqli_query($con, $sql);
			$final = array();
			while($row = mysqli_fetch_assoc($rs))
			{
				$final[] = $row;
			}

			return $final;
		}



		function getDate()
		{
			// global $con;
			// $sql = "SELECT * FROM meter";
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

	     

	        $total_pages_sql = "SELECT COUNT(distinct(read_date)) FROM meter";
	        $result = mysqli_query($con,$total_pages_sql);
	        $total_rows = mysqli_fetch_array($result)[0];
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

	     
			$sql = "SELECT read_date FROM meter GROUP BY read_date ORDER BY read_date desc LIMIT $offset, $no_of_records_per_page ";
			
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
			$reading = $d['reading'];
			$read_date = $d['read_date'];

			global $con;

			foreach( $reading as $client_id => $read) {
				if($read !=''){
					$sql= "INSERT INTO meter(cid, reading,read_date) VALUE( $client_id,$read,'$read_date' )";
					if(mysqli_query($con, $sql)){
						$_SESSION['success_msg'] = "Meter reading successfully saved";
					
					}else{
	                    $_SESSION['error_msg'] = "Error : " . $con->error;

					}
				}else{					
	                $_SESSION['error_msg'] = "Error : Please insert some values.";
				}
				
			}
			
		}

		
		function update($d)
		{
			global $con;
			$mid = $d['mid'];
			$reading = $d['reading'];
			$read_date = $d['read_date'];
			

			$sql = "UPDATE meter SET  reading=$reading, read_date = '$read_date'  WHERE mid = $mid";

			if(mysqli_query($con, $sql)){
				$_SESSION['success_msg'] = "Meter reading successfully updated";
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}
			
		}

		function delete($d)
		{
			global $con;


			$sql = "DELETE FROM meter WHERE mid = ".$d;

			echo $sql;
			if(mysqli_query($con, $sql)){
				$_SESSION['success_msg'] = "Meter reading successfully deleted";
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}

		}



		
	}



?>