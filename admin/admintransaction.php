<?php
 session_start();
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<style>
.ui-datepicker-calendar {
   display: none;
}


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
input[type=number], select {
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
  background-color: white;
  padding: 20px;
  width : 40%;
  height: 40%;
  margin: 30px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}
</style>
</head>
<body style="background-color:#F5F5F5">
<?php
include "../config/header.php";
?>
<br><br>

 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Pay your due</h2>
 </div></center>





 <?php
 error_reporting(0);
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "mydb";
   $dbconnection = new mysqli($host, $user, $pass,$db);

   $month = "";
   $pay = "";
   $years = "";
   $formvalid = TRUE;
   $username ="";

    if(isset($_POST['month'])){
    $month=  $_POST['month'];
 } 
     if(isset($_POST['pay'])){
    $pay=  $_POST['pay'];
 } 
      if(isset($_POST['years'])){
    $years=  $_POST['years'];
 } 
       if(isset($_POST['username'])){
    $username =  $_POST['username'];
 } 

 if(isset($_POST["submit"])){

    $sql = "SELECT user.username, feestransaction.submitdate, feestransaction.monthlydue,feestransaction.ispay, feestransaction.paiddate, feestransaction.feedescription,feestransaction.userid
FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id 
WHERE username = '$username' AND MONTHNAME(submitdate) = '$month' AND YEAR(submitdate)='$years' ";
    $result = mysqli_query($dbconnection, $sql);
                      $row = mysqli_fetch_assoc($result);
                      $monthlydebt = $row["monthlydue"]; 
    $monthlydebt = $row["monthlydue"];      
        $paidamount = $row["monthlydue"];

    $userid = $row["userid"];                
    if($monthlydebt <= 0){
    echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> You haven't any debt for $month,$years
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
    } elseif(mysqli_num_rows($resultt) <= 0){
    echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> There are no user that name
  </div>
</div>";
$formvalid = FALSE;
    }
    else {
     $monthlydebt -= $pay;
    echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-success'>
    Payment completed  successfully for $month 
  </div>
</div>";

    }

    if($formvalid){
  
    $sql1 = "update feestransaction set monthlydue = '$monthlydebt', ispay='PAID', paiddate=NOW(),paidamount='$paidamount' where userid = '$userid' AND MONTHNAME(submitdate) = '$month' AND YEAR(submitdate)='$years'";

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
<script>
$(function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy'});
});​
</script>
<center>
<div id="payment">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

  <div class="row" >
  <div class="col-md-6">
    <label for="pay" style="color:white;"> Pay </label>
    <input type="text" id="pay" name="pay"  style="width: 250px;" placeholder="Amount" required>
    </div>
    <div class="col-md-6">
    <label for="pay" style="color:white;"> Pay </label>
    <input type="text" id="pay" name="username" placeholder="Username" style="width:250px;" required>
    </div>
    </div>
     <label for="submitdate" style="color:white;">Date</label>
     <div class="row" >
     <div class="col-md-6">
     <div  style="display:inline-block">
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
    </div>
    <div class="col-md-6">
   <div style=" ">
    <input type="number" min="2010" max="2100" step="1" value="2021"  name="years" style="width:250px;" required>
    </div>
    </div>
    </div>
    <input type="submit" value="Pay" name="submit" onclick="return confirm('Before continue, please check again which month you would like to pay')" >
        
  </form>
</div>
</center>
<br><br>
<?php
include "../config/footer.php";
?>

</body>
</html>
