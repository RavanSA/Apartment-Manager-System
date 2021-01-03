<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin Panel</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<style>
		    #fixing {
    }
    
		</style>
	</head>
	<body>
	
	<div style="font-size: 16px;">
	<?php
session_start();
include "../config/header.php";
?>
</div>
 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Yearly Report</h2>
 </div></center>
	<br>

		<div class="container">
	<div class="form-group">
		<div class="input-group">
		<input type="text"  id="search" placeholder="Search by Resident Details" class="form-control" style="font-size:15px">
	</div>
	</div>
	<div id="result">
	</div>
</div>

<script>
$(document).ready(function(){
	load_data();
	function load_data(query){
		$.ajax({
			url:"viewajax.php",
			method:"post",
			data:{query:query},
			success:function(data){$('#result').html(data);}});
	}
	
	$('#search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
<div style="bottom:0;">
<?php
include "../config/footer.php";
?>
</div>

	</body>
</html>





