<!DOCTYPE html>
<html>
<head>
	<title>Khanepani</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="nepali.datepicker.v2.2.min.css" />
	
    <!--select2 css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
 
	<link rel="stylesheet" type="text/css" href="style.css">
        
<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: modules/login/login.php");
    exit;
}
?>



</head>
<body>
	<?php include('include/connect.php'); ?>

	<div class="page">
		<div class="sidebar">
			<?php include('include/sidebar.php'); ?>
		</div><!--  sidebar ending -->

		<div class="main">
			<div class="controller">
				<?php include('include/controller.php'); ?>	
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	
		
<div class="dropdown profile">
  <button class="btn btn-primary dropdown-toggle" type="button"  data-toggle="dropdown">Admin
  <span class="caret"></span></button>
  <ul class="dropdown-menu" style="left: -85px;" id="manual-toggle">
    <li><a href="modules/login/change.php">Change Password</a></li>
                        <div class="divider"></div>
    <li><a href="modules/login/logout.php" >Logout</a></li>
  </ul>
</div>






</body>




<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Select2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    	 $("#cust_name").select2();

    });
</script>
</html>