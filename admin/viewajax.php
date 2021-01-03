<?php
$connect = mysqli_connect("localhost", "root", "", "mydb");
$output = '';
if(isset($_POST["query"])){
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM feestransaction 
	WHERE username LIKE '%".$search."%'
	OR email LIKE '%".$search."%' 
	OR userid LIKE '%".$search."%' 
	OR phonenumber LIKE '%".$search."%' 
	OR blocktype LIKE '%".$search."%' 
	OR apartmentnumber LIKE '%".$search."%' 

	";
}else{
	$query = "SELECT * FROM feestransaction";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>User ID</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Block Type</th>
							<th>Phone Number</th>
							<th>Apartment Number</th>
							<th>Yearly Debt</th>
							<th>Date</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["userid"].'</td>
				<td>'.$row["username"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["blocktype"].'</td>
				<td>'.$row["phonenumber"].'</td>
				<td>'.$row["apartmentnumber"].'</td>
				<td>'.$row["totaldebt"].'</td>
				<td>'.$row["submitdate"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo "No results matched";
}
?>
