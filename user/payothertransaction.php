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
<body>

<?php
include "../config/userheader.php";
?>
<br><br>

 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Pay other dues</h2>
 </div></center>





 <?php


   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "mydb";
   $dbconnection = new mysqli($host, $user, $pass,$db);


   

 if(isset($_POST['submit'])){

  $pay = mysqli_real_escape_string($dbconnection,$_POST['pay']);
    $username = mysqli_real_escape_string($dbconnection,$_POST['username']);
    $submitdate = mysqli_real_escape_string($dbconnection,$_POST['submitdate']);
  
     $sql =mysqli_query( $dbconnection, "select *  from otherexpenses where username = '$username' and DATE(submitdate) = CURDATE()");
     $row = mysqli_fetch_assoc($sql);
  $totalfee = $row["totaldebt"];
  $paidfee = 0;

        if( $username != $_SESSION['login_user'] || $totalfee == 0 || $pay != $totalfee ){



    echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> You are trying to pay for another user or you have already paid all your fees 
  </div>
</div>";
       
    } else {

    $paidfee = $totalfee - $pay; 

    $sql1 = "update otherexpenses set totaldebt = '$paidfee' where username = '$username' and  YEAR(submitdate) = YEAR(CURDATE())";
$sql3 = "INSERT INTO otherexpenseshistory ( username, paidfee, submitdate) VALUES ('$username', '$pay', '$submitdate')";

    $dbconnection->query($sql1);
    $dbconnection->query($sql3);
               echo '<script language="javascript">';
            echo 'alert("Your fee has been successfully paid")';
             echo '</script>';
        }
 }

 ?>

  
   <center><br>   
 <div class="container">    
  <div class="alert alert-info alert-dismissible" style="width: 48%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> This section is used for paying additional dues, <strong> NOT FOR THE MONTHLY DUE</strong>
    and your debt is <?php
     error_reporting(0);
         $sql4 =mysqli_query( $dbconnection, "select *  from otherexpenses where username =  '$_SESSION[login_user]' and DATE(submitdate) = CURDATE() ");
       $roww = mysqli_fetch_assoc($sql4);
      $totalfeee = $roww["totaldebt"];
   
    echo $totalfeee; 
    ?>
  </div>
</div>
</center>

   <center><br>   
 <div class="container">    
  <div class="alert alert-info alert-dismissible" style="width: 48%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    If you want to know your paymeny history <a href="additionalpaymenthistory.php">click here</a>
  </div>
</div>
</center>

<center>
<div id="payment">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label for="username" style="color:white;">Username</label>
    <input type="text" id="username" name="username" placeholder="Username" value="<?php echo $_SESSION['login_user']; ?>">

    <label for="pay" style="color:white;"> Pay </label>
    <input type="text" id="pay" name="pay" placeholder="pay">
     <label for="submitdate" style="color:white;">Date</label>

        <input type="date" name="submitdate">
    <input type="submit" value="Submit" name="submit">
        
  </form>
</div>
</center>

 
<?php
include "../config/userfooter.php";
?> 

</body>
</html>
