<?php
 session_start();
?>
<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:  ../error.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>

input[type=text], select {
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

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

#payment {
  border-radius: 10px;
  background-color: grey;
  padding: 20px;
  width : 40%;
  height: 40%;
  margin: 30px;
}
</style>
</head>
<body style="background-color:#F5F5F5">
<?php
include "../config/userheader.php";
?>
<br><br>

 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Pay your due</h2>
 </div></center>





 <?php
 

   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "mydb";
   $dbconnection = new mysqli($host, $user, $pass,$db);

   $month = "";
   $pay = "";
   $formvalid = TRUE;

    if(isset($_POST['month'])){
    $month=  $_POST['month'];
 } 
     if(isset($_POST['pay'])){
    $pay=  $_POST['pay'];
 } 

 if(isset($_POST["submit"])){

    $sql = "SELECT * FROM feestransaction WHERE userid = '$_SESSION[id]' AND MONTHNAME(submitdate) = '$month'  ";
    $result = mysqli_query($dbconnection, $sql);
                      $row = mysqli_fetch_assoc($result);
    $monthlydebt = $row["monthlydue"];
    if($monthlydebt <= 0){
    echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> You haven't any debt'
  </div>
</div>";
$formvalid = FALSE;
    } elseif($pay!=$monthlydebt){
    echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> You need to pay EXACTLY $monthlydebt tl,
    not more or less than $monthlydebt tl
  </div>
</div>";
$formvalid = FALSE;
    } else {
     $monthlydebt -= $pay;
    }

    if($formvalid){
   $sql1 = "update feestransaction set monthlydue = '$monthlydebt', ispay='PAID' where userid = '$_SESSION[id]' AND MONTHNAME(submitdate) = '$month' ";
//$sql3 = "INSERT INTO userhistory ( username, paidfee, submitdate) VALUES ('$username', '$pay', '$submitdate')";
$dbconnection->query($sql1); 
}
 }
 

 ?>


 <!--  <center><br>   
 <div class="container">
  <div class="alert alert-info alert-dismissible" style="width: 48%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> The monthly fee for 1 month is <?php  echo $monthlypayment;?> TL. You cannot pay more than 
    <?php  echo $monthlypayment; ?>tl.
  </div>
</div>
</center>-->

<center>
<div id="payment">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <label for="pay" style="color:white;"> Pay </label>
    <input type="text" id="pay" name="pay" placeholder="pay" required>
     <label for="submitdate" style="color:white;">Date</label>

              <select name="month" id="month">
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
    <input type="submit" value="Pay" name="submit" onclick="return confirm('Are you sure you  to pay?')" >
        
  </form>
</div>
</center>

<?php
include "../config/userfooter.php";
?>

</body>
</html>
