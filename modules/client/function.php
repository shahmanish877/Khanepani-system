<?php 
	class ClientModel{

	function getSingle($d)
		{
			global $con;
			$sql = "SELECT  * FROM client WHERE id = ".$d;
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

	     

	        $total_pages_sql = "SELECT COUNT(*) FROM client";
	        $result = mysqli_query($con,$total_pages_sql);
	        $total_rows = mysqli_fetch_array($result)[0];
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

	        // $sql = "SELECT * FROM client LIMIT $offset, $no_of_records_per_page";
	        // $res_data = mysqli_query($conn,$sql);
	        // while($row = mysqli_fetch_array($res_data)){
	        //     echo $row['name'].'<br';
	        // }

			$sql = "SELECT * FROM client LIMIT $offset, $no_of_records_per_page";
			$rs = mysqli_query($con, $sql);
			$final = array();
			while($row = mysqli_fetch_assoc($rs))
			{
				$final[] = $row;
			}

			return $final;
		}

		function get_for_reading(){
			global $con;

			$sql = "SELECT * FROM client";
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
			$phone = $d['phone'];
			$joinned = $d['joinned'];
			$gharnum = $d['gharnum'];
			$meter = $d['meter'];
			$area = $d['area'];
			$address = $d['address'];
			$father = $d['father'];
			$mother = $d['mother'];
			$grandfather = $d['grandfather'];
			$remark = $d['remark'];

			global $con;

			$date1= date_create($joinned);
			$date =  date_format($date1,'Y-m-d'); 

			
			$insert = "INSERT INTO client(name,phone,joinned,gharnum, meter, area, address,father,mother,grandfather, remark) VALUES('$name',$phone,'$date','$gharnum','$meter', '$area', '$address','$father','$mother','$grandfather', '$remark') ";

			
			$res = mysqli_query($con, $insert);
			if($res){
				$_SESSION['success_msg'] = "Client successfully saved";
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}
			
		}


		function update($d)
		{
			$id = $d['h'];
			$name = $d['name'];
			$phone = $d['phone'];
			$joinned = $d['joinned'];
			$gharnum = $d['gharnum'];
			$meter = $d['meter'];
			$area = $d['area'];
			$address = $d['address'];
			$father = $d['father'];
			$mother = $d['mother'];
			$remark = $d['remark'];

			$date1= date_create($joinned);
			$date =  date_format($date1,'Y-m-d'); 

			global $con;
			
			$update = "UPDATE client SET name='$name', phone=$phone, joinned='$date', gharnum ='$gharnum', meter = '$meter', area=$area, address ='$address', father ='$father', mother='$mother',remark='$remark' WHERE id=$id ";

			if(mysqli_query($con, $update)){
				$_SESSION['success_msg'] = "Client successfully updated";
				
			}else{
                $_SESSION['error_msg'] = "Error : " . $con->error ;
			}
		}

		function delete($d)
		{
			global $con;
			$sql = "DELETE FROM client WHERE id = ".$d;


		}
	}

?>