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
<style>
#footer-sec {
    background-color: #343a40;
    padding: 20px 50px;
    
    font-size: 12px;
}
input[type=password], select {
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
  border-radius: 40px;
  border-style: inset;
  background-color: #f2f2f2;
  padding: 20px;
  width : 40%;
  height: 40%;
  margin: 30px;
}
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #343a40;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: white;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #343a40;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #343a40;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

</style>
</style>
</head>
<body style="background-color:#F5F5F5">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<div> 
<div id="mySidebar" class="sidebar">
<center style="color:white;">
<h5>Apartment Manager</h5>
<h5>System</h5></center>
<center style="color:white;"><?php echo "Hi,"."  $_SESSION[login_user]"; ?></center><br>

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <hr style="background-color: #F5F5F5;">
  <a href="paymenthistory.php" style="font-size: 15px"><i class="fas fa-history"></i>   Payment History</a>
  <hr style="background-color: #F5F5F5;">
  <a href="usercheckowndue.php" style="font-size: 15px"><i class="fas fa-money-bill-wave"></i> Check how much you debt </a>
  <hr style="background-color: #F5F5F5;">
  <a href="transaction.php" style="font-size: 15px"><i class="fas fa-money-check-alt"></i>    ONLINE TRANSACTION</a>
  <hr style="background-color: #F5F5F5;">
  <a href="payothertransaction.php" style="font-size: 15px"> <i class="fas fa-money-bill-alt"></i>      Pay additional fares </a>
  <hr style="background-color: #F5F5F5;">
  <a href="userseeexpense.php" style="font-size: 15px"><i class="fas fa-comments-dollar"></i>      How much spent on what </a>
  <hr style="background-color: #F5F5F5;"> 
  <a href="settingsuser.php" style="font-size: 15px"><i class="fas fa-comments-dollar"></i>      Settings </a>
  <hr style="background-color: #F5F5F5;">

</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</div>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     <li class="nav-item" style="color: #FFFFFF;"> <b>User Page</b>
     </li>
    </ul>

     <div style="padding-left:800px">
    <a href="#" style="color: white;"> <i class="fas fa-home"> HOME</i></a>

    </div>

    <div style="padding-left:50px">
    <?php
    echo " <img  height=30 width=30 src='images/".$_SESSION['pic']."'>";
    ?>
   <a href="logout.php" style="color: white;"> <i class="fas fa-sign-out-alt">
   LOGOUT</i></a>
    </div>
   

  </div>  
</nav>

<center>
<br><br>
 <h1><i class="far fa-building" style="font-size:40px"> 
 Apartment Manager</i></h1><br>
 <h2>Change your password</h2>
 </div>

  <center><br>   
 <div class="container">
  <div class="alert alert-info alert-dismissible" style="width: 65%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> This section is use for changing passwords. Please be careful when changing your password.
  </div>
</div>
</center>

<center>
<div id="payment">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label for="expense">Old Password</label>
    <input type="password" id="expense" name="oldpassword" placeholder="Old Password" required>
        <label for="expense">New Password</label>
    <input type="password" id="expense" name="newpassword" placeholder="New Password" required>
    <label for="details">Confirm Password</label>
   <input type="password" id="details" name="confirmpassword" placeholder="Confirm Password" required>
    <input type="submit" value="Submit" name="submit">   
  </form>
</div>
</center>





<?php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "mydb";
   $dbconnection = new mysqli($host, $user, $pass,$db);
   $formValid = true;


if(isset($_POST['submit'])) {

$oldpassword = mysqli_real_escape_string($dbconnection,$_POST['oldpassword']);
$newpassword = mysqli_real_escape_string($dbconnection,$_POST['newpassword']);
$confirmpassword = mysqli_real_escape_string($dbconnection,$_POST['confirmpassword']);


 if (!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$^", $newpassword)) {
    echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> Password must contain  at least one number and  one uppercase and lowercase letter, 
      and at least 8 or more  characters
  </div>
</div>";
      $formValid = false;
    }
  
    error_reporting(0);

  if($newpassword != $confirmpassword){
            echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> new password must be equal confirm password.
  </div>
</div>";
  $formValid = false;
  }

$sql = "select * from user where username= '".$_SESSION['login_user']."' and password='".md5($oldpassword )."'";
$result = mysqli_query($dbconnection, $sql);
$row = mysqli_fetch_array($result);
$passwd = $row["password"];

if($row["password"]=null || empty($row)){
 echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> You mistyped your old password
  </div>
</div>";
  $formValid = false;
}

  if($formValid == true){
if(mysqli_num_rows($result) > 0) {
$sql = "update user set password = '".md5($newpassword)."' WHERE username = '".$_SESSION['login_user']."'";
$r = $dbconnection->query($sql);
  echo "<center><br>   
 <div class='container'>
  <div class='alert alert-info alert-dismissible' style='width: 50%'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   Password <strong>succesfully</strong> changed.
  </div>
</div>
</center>";

} 

}else{
            echo "<div class='container' style='width: 42%;'>
  <div class='alert alert-danger'>
    <strong>Error Occured!</strong> User information has not been added to the database. Please obey the rules.
  </div>
</div>";
}
}
?>



 <div id="footer-sec">
       <span style="color: white;">Apartment Manager System</span>
    </div>

</body>
</html>