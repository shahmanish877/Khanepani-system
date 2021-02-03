<?php 
include( '../../include/connect.php');

global $con;

if (empty($_GET['id'])) {
    echo json_encode(array("status" => false, "message" => "There is no User Selected."));
    exit;
}

$id = mysqli_real_escape_string($con, $_GET['id']);

$query = "SELECT name,area, meter FROM client WHERE id = '{$id}'";


$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $inputs = '

				<input type="hidden" class="form-controlled" value="'.$row['name'].'" name="old_owner" id="old_owner" />


        		<label> Meter No. : </label>
				<input type="number" class="form-controlled" value="'.$row['meter'].'" name="meter" id="meter" disabled/>


			

				<label> Area No. : </label>
				<input type="number" id="area" class="form-controlled" value="'.$row['area'].'" name="area" disabled />
		';

   echo json_encode(array("status" => true, "html" => $inputs));
    exit;
} else {
    echo json_encode(array("status" => false, "message" => "There is no user with that id."));
    exit;
}