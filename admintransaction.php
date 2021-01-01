<?php
 session_start();
?>
<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:  error.php');
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
<body style="background-color:#F5F5F5">


<?php
 include "config/header.php";
?>
<br><br>

 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Pay residents dues</h2>
 </div></center>





 <?php
 

   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "mydb";
   $dbconnection = new mysqli($host, $user, $pass,$db);

$sql2 = "SELECT totaldebt FROM   totaldebtyear WHERE YEAR(submitdate) = YEAR(CURDATE())";
                      $resultt = mysqli_query($dbconnection, $sql2);
                      $roww = mysqli_fetch_assoc($resultt);
                        $totaldebtt= $roww["totaldebt"]; 
                        $monthlypayment=$totaldebtt/12;

 if(isset($_POST["submit"])){


    $pay = mysqli_real_escape_string($dbconnection,$_POST["pay"]);
    $username = mysqli_real_escape_string($dbconnection,$_POST["username"]);
    $submitdate = mysqli_real_escape_string($dbconnection,$_POST["submitdate"]);


    $sql = "SELECT * FROM feestransaction WHERE username = '$username'";
    $result = mysqli_query($dbconnection, $sql);
     $row = mysqli_fetch_assoc($result);
    $totalfee = $row["totaldebt"];
  $paidfee = 0;
       if($pay != $monthlypayment || $totalfee == 0){
    echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> You need to pay '$monthlypayment' tl or 
    you have already paid all due.
  </div>
</div>";
       
    } else {

 
   
    $paidfee = $totalfee - $pay; 

    $sql1 = "update feestransaction set totaldebt = '$paidfee' where username = '$username' and  YEAR(submitdate) = YEAR(CURDATE())";
$sql3 = "INSERT INTO userhistory ( username, paidfee, submitdate) VALUES ('$username', '$pay', '$submitdate')";

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
    <strong>Read before taking any action!</strong> The monthly fee for 1 month is <?php  echo $monthlypayment;?> TL. You cannot pay more than 
    <?php  echo $monthlypayment; ?>tl once a time.
  </div>
</div>
</center>

<center>
<div id="payment">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label for="username" style="color:white;">Username</label>
    <input type="text"  id="username" name="username" placeholder="Username" required>

    <label for="pay" style="color:white;"> Pay </label>
    <input type="text" id="pay" name="pay" placeholder="pay" required>
     <label for="submitdate" style="color:white;">Date</label>

        <input type="date" name="submitdate" required>
    <input type="submit" value="Submit" name="submit" >
        
  </form>
</div>
</center>

<?php
 include "config/footer.php";
?>

</body>
</html>
