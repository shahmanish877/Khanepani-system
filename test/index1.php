<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Webslesson Demo - Ajax Live Data Search using Jquery PHP MySql</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	</head>
	<body>
		<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center">Ajax Live Data Search using Jquery PHP MySql</h2><br />
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
				</div>
			</div>
			<br />

			<?php 
				$con = mysqli_connect("localhost", "root", "", "testing");
				 $sql = "SELECT * FROM tbl_customer ORDER BY CustomerID";
				$rs = mysqli_query($con, $sql);
				
				while($row = mysqli_fetch_assoc($rs))
				{					
			?>

			<div id="result">
				<?php echo $row['CustomerName']; ?>
			

		<?php } ?>
</div>

		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query,id)
	{
		$.ajax({
			url:"fetch.php",
			method:"get",
			data:{query:query,id:id},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search,2);
		}
		else
		{
			load_data();			
		}
	});
});
</script>




