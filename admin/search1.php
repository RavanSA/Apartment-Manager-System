<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin Panel</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<style>

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
include "../config/header.php";
?>
</div>
 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Yearly Report</h2>
 </div></center>
	<br>

<div id="search">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

<div class="container">
     <div class="row" >
	 <div class="col-md-3">
    <select name="paystatus" id="paystatus"   style="width: 95%;" required>
              <option value="" disabled selected hidden>Choose payment status</option>
        <option value="paid">PAID</option>
        <option value="not paid">NOT PAID</option>
    </select>
	</div>

		 <div class="col-md-3">
    <input type="date"  value= "2015-01-01" name="from" style="width:250px;"required>
		</div>
		
		<div class="col-md-3">
    <input type="date" value= "2025-01-01" name="to" required>
	</div>
	
			 <div class="col-md-3">
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
$results_per_page = 10; 

  $dbconnection = new mysqli($host, $user, $pass,$db);

	$paystatus =  "";
    $debt = "";
	$submitdate = "";
    $ispay = "";
    $feedescription = "";
	$from ="";
	$to="";
    $datatable = "feestransaction";
    $username = "";

	if(isset($_POST['paystatus'])){
    $paystatus = $_POST['paystatus'];
 } 
 if(isset($_POST['from'])){
  $from =  $_POST['from'];
 } 
 if(isset($_POST['to'])){
    $to = $_POST['to'];
 } 

 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST["search"])){
    if(strcmp($paystatus, "not paid") == 0){
  
$sql = "SELECT user.username, feestransaction.monthlydue, feestransaction.submitdate, feestransaction.ispay
FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
WHERE feestransaction.userid = user.id and submitdate between '$from' and 
'$to' and ispay='$paystatus' ORDER BY submitdate DESC ";
                    if($result = mysqli_query($dbconnection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                               echo "<center>";
                            echo "<table class='table table-bordered table-striped' style='width:65%;'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th style='width:10%;'>Username</th>";
                                        echo "<th style='width:10%;'>Monthly Due</th>";
                                        echo "<th style='width:10%;'>Submit Date</th>";
                                        echo "<th style='width:10%;'>Payment Status</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['monthlydue'] . "</td>";
                                        echo "<td>" . $row['submitdate'] . "</td>";
                                        echo "<td>" . $row['ispay'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            echo "</center>";
                        } else{
                            echo "<p style='font-size:large;'><em><center>No records were found.</center></em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute ";
                    }
                    } else  if(strcmp($paystatus, "paid") == 0){
                    $sql1 = "SELECT user.username, feestransaction.submitdate, feestransaction.ispay, feestransaction.paiddate, feestransaction.feedescription
FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
WHERE feestransaction.userid = user.id and ispay='$paystatus' and userid='$_SESSION[id]' ORDER BY submitdate DESC ";
                    if($resultt = mysqli_query($dbconnection, $sql1)or die(mysqli_error($dbconnection))){
                        if(mysqli_num_rows($resultt) > 0){
                               echo "<center>";
                            echo "<table class='table table-bordered table-striped' style='width:65%;'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th style='width:10%;'>Username</th>";
                                        echo "<th style='width:10%;'>Submit Date</th>";
                                        echo "<th style='width:10%;'>Payment Status</th>";
                                        echo "<th style='width:10%;'>Paid Date</th>";
                                        echo "<th style='width:10%;'>Fee Description</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($roww = mysqli_fetch_array($resultt)){
                                    echo "<tr>";
                                        echo "<td>" . $roww['username'] . "</td>";
                                        echo "<td>" . $roww['submitdate'] . "</td>";
                                        echo "<td>" . $roww['ispay'] . "</td>";
                                        echo "<td>" . $roww['paiddate'] . "</td>";
                                        echo "<td>" . $roww['feedescription'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            echo "</center>";
                        } else{
                            echo "<p style='font-size:large;'><em><center>No records were found.</center></em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute ";
                    }
                    }
                    else{
                        ;
                    }

  }
  }


?><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="footer">
    <footer>
<?php
include "../config/footer.php";
?>
</footer>
</div>

	</body>
</html>





