<?php 
	class ReportsModel{

	
		function getAll()
		{
			global $con;
			

	    	if (isset($_GET['date'])){
				$date = $_GET['date'];
				$sql = "SELECT 'Donation' as type,id,name,received_date,amount from donation WHERE received_date = '$date' 
					UNION
					SELECT 'New Client Charge',new_charge.id, client.name,new_charge.paid_date,new_charge.total FROM new_charge INNER JOIN client ON client.id=new_charge.cid WHERE paid_date='$date'
					UNION
					SELECT 'Meter/Parts Replace Charge',replace_charge.id, client.name,replace_charge.paid_date,replace_charge.total FROM replace_charge INNER JOIN client ON client.id=replace_charge.cid WHERE paid_date='$date'
					UNION
					SELECT 'Ownership Transfer Charge',owner_transfer.id, client.name,owner_transfer.paid_date,owner_transfer.charge FROM owner_transfer INNER JOIN client ON client.id=owner_transfer.cid WHERE paid_date='$date'
					UNION
					SELECT 'Regular Payment', payment.pid,client.name,payment.paid_date,payment.grand_total FROM payment INNER JOIN client ON client.id=payment.cid where payment.paid_date='$date'		";
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

			global $con;
			global $pageno;
			global $total_pages;

			
			$sql = "SELECT paid_date FROM payment 
					UNION 
					SELECT paid_date FROM new_charge 
					UNION
					SELECT paid_date FROM replace_charge 
					UNION 
					SELECT paid_date FROM owner_transfer 
					UNION 
					SELECT received_date FROM donation ";
			
			$rs = mysqli_query($con, $sql);
			$final = array();
			while($row = mysqli_fetch_assoc($rs))
			{
				$final[] = $row;
			}

			return $final;
		}



		function daily($d)
		{
			global $con;
			$date = $d['paid_date'];
			$sql = "SELECT 'Donation' as type,id,name,received_date,amount from donation WHERE received_date = '$date' 
					UNION
					SELECT 'New Client Charge',new_charge.id, client.name,new_charge.paid_date,new_charge.total FROM new_charge INNER JOIN client ON client.id=new_charge.cid WHERE paid_date='$date'
					UNION
					SELECT 'Meter/Parts Replace Charge',replace_charge.id, client.name,replace_charge.paid_date,replace_charge.total FROM replace_charge INNER JOIN client ON client.id=replace_charge.cid WHERE paid_date='$date'
					UNION
					SELECT 'Ownership Transfer Charge',owner_transfer.id, client.name,owner_transfer.paid_date,owner_transfer.charge FROM owner_transfer INNER JOIN client ON client.id=owner_transfer.cid WHERE paid_date='$date'
					
					UNION
					SELECT 'Regular Payment', payment.pid,client.name,payment.paid_date,payment.grand_total FROM payment INNER JOIN client ON client.id=payment.cid where payment.paid_date='$date'		";
			$rs = mysqli_query($con, $sql);
			
			$final = array();
			while($row = mysqli_fetch_assoc($rs))
			{
				$final[] = $row;
			}
		
			return $final;
		}

		function monthly($d)
		{
			global $con;
		

			$sql = "SELECT 'Donation' as type,id,name,received_date,amount from donation WHERE received_date LIKE '$d%' 
					UNION
					SELECT 'New Client Charge',new_charge.id, client.name,new_charge.paid_date,new_charge.total FROM new_charge INNER JOIN client ON client.id=new_charge.cid WHERE paid_date  LIKE '$d%'
					UNION
					SELECT 'Meter/Parts Replace Charge',replace_charge.id, client.name,replace_charge.paid_date,replace_charge.total FROM replace_charge INNER JOIN client ON client.id=replace_charge.cid WHERE paid_date  LIKE '$d%'
					UNION
					SELECT 'Ownership Transfer Charge',owner_transfer.id, client.name,owner_transfer.paid_date,owner_transfer.charge FROM owner_transfer INNER JOIN client ON client.id=owner_transfer.cid WHERE paid_date  LIKE '$d%' 
					UNION
					SELECT 'Regular Payment', payment.pid,client.name,payment.paid_date,payment.grand_total FROM payment INNER JOIN client ON client.id=payment.cid where payment.paid_date  LIKE '$d%' 		";


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