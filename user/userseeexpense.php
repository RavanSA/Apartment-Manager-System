<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin Panel</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<style>
        table { border-collapse: collapse; font-size: 24px;}
tr { border: none;
font-size: 24px;
}
td {
font-size: 24px;
  border-right: solid 1px #555; 
  border-left: solid 1px #555;
}

#search {
  border-radius: 10px;
  background-color: white;
  padding: 40px;
  width : 94%;
  height: 19%;
  margin: 30px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  font-size:15px;
}
#document {
    list-style: none;
    width: 100%;
    height: 90px;
    margin: 0;
    padding: 0;
    white-space: nowrap;
    overflow-x: auto;
    overflow-y: hidden;
}
input[type=text], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px auto;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px auto;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px auto;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
#submit {
  width: 100%;
  background-color: #555;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#submit:hover {
  background-color: #45a049;
}
		</style>
	</head>
	<body>
    	<div style="font-size: 16px;">
	<?php
session_start();
include "../config/userheader.php";
?>
</div>
 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h1> Expense List</h1>
 </div></center>
	<br>

<div id="search">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

<div class="container">
     <div class="row" >
	 <div class="col-md-4">
<select name="month" id="month"   style="width:250px;" required>
              <option value="" disabled selected hidden>Choose the month you want to pay</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
	</div>

		 <div class="col-md-4">
    <input type="number" min="2010" max="2100" step="1" value="2021"  name="year" style="width:250px;" required>
		</div>

	
			 <div class="col-md-4">
    <button type="submit" id="submit" name="search" > <i class="fas fa-search"></i> Search</button>
	</div>
  </form>
  </div>
  </div>
  </div>



	<?php
	$host = "localhost";
$user = "root";
$pass = "";
$db = "mydb";

  $dbconnection = new mysqli($host, $user, $pass,$db);

	$month =  "";
	$submitdate = "";
    $year = "";
    $expectedincome ="";
    $netincome ="";
    $color ="";
    $icon="";
	if(isset($_POST['month'])){
    $month = $_POST['month'];
 } 
 if(isset($_POST['year'])){
  $year =  $_POST['year'];
 } 
 if(isset($_POST['submitdate'])){
    $submitdate = $_POST['submitdate'];
 } 

 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST["search"])){
   $sql5="SELECT (SUM(monthlydue)+SUM(paidamount)) as totalincome
   FROM feestransaction 
   WHERE YEAR(submitdate) = '$year' and MONTHNAME(submitdate)='$month'";
    $resultt  = mysqli_query($dbconnection, $sql5);
     $roww = mysqli_fetch_assoc($resultt);
     $expectedincome=$roww["totalincome"];
      $sql6="SELECT SUM(paidamount) as netincome 
   FROM feestransaction 
   WHERE YEAR(submitdate) = '$year' and MONTHNAME(submitdate)='$month'";
    $resulttt  = mysqli_query($dbconnection, $sql6);
     $rowww = mysqli_fetch_assoc($resulttt);
     $netincome=$rowww["netincome"];
     $sql7="SELECT (SUM(amount)) as outcome 
     FROM expensedetails 
     WHERE YEAR(expensesdate) = '$year' and MONTHNAME(expensesdate)='$month'";
    $res  = mysqli_query($dbconnection, $sql7);
         $rov = mysqli_fetch_assoc($res);
     $outcome=$rov["outcome"];
  if($outcome>=$expectedincome){
         $color="red";
                 $icon="<i class='fas fa-times'></i>";

  }else if($outcome<=$expectedincome){
        $color="green";
        $icon="<i class='far fa-check-circle'></i>";
  }

$sql = "SELECT * FROM expensedetails WHERE  MONTHNAME(expensesdate) = '$month' AND YEAR(expensesdate)='$year' ORDER BY amount DESC ";
                    if($result = mysqli_query($dbconnection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                        echo "<div style='font-size: 26px';>";
                              echo "<span style='padding-left:50px'>Year: $year </span> 
                              <span style='padding-left:250px'>Month: $month  </span><br><hr>";
                              echo "<span style='padding-left:50px'>Expected Income:$expectedincome </span>
                              <span style='padding-left:100px'>Net Income:$netincome </span>
                              <span style='padding-left:100px;color:$color;'>Outcome:$outcome $icon </span><br><hr>";
                              echo "<table>";
                              echo "<tr>";
                              echo "<td><span style='padding-left:200px'><strong>Expense Details</strong></span></td>";
                              echo "<td><span style='padding-left:100px'><strong>Amount</strong></span></td>";
                              echo "<td><span style='padding-left:100px'><strong>Added By</strong></span></td>";
                              echo "<td><span style='padding-left:100px'><strong>Expense Date</strong></span></td>";
                              echo "</tr>";
                                echo "</div><br>";
                                while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                         echo "<td><span style='padding-left:200px'>$row[details]</span></td>";
                             echo "<td><span style='padding-left:100px'>$row[amount]</span></td>";
                          echo "<td><span style='padding-left:100px'>$row[addedby]</span></td>";
                          echo "<td><span style='padding-left:100px'>$row[expensesdate]</span></td>";
                                        echo "</tr>";
                                }
                                echo "</table>";
                        } else{
                            echo "<p style='font-size:large;'><em><center>No records were found.</center></em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute ";
                    }
                   

  }
  }


?><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="footer">
    <footer>
<?php
include "../config/userfooter.php";
?>
</footer>
</div>

	</body>
</html>





