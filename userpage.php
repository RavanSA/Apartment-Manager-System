<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .vl {
  border-left: 2px solid #00CA79;
  height: 513px;
  position: absolute;
  left: 16%;
  margin-left: -3px;
  top: 100px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
.v2 {
  border-left: 2px solid #00CA79;
  height: 513px;
  position: absolute;
  left: 93%;
  margin-left: -3px;
  top: 100px;
}
  .mb-pink {
    background-color: #005a8c;
}
.mb-green {
    background-color: #52b864;
}
.mb-red {
    background-color: #dc3545;
}
.mb-color1 {
    background-color: #4c7c8f;
}
.mb-blue {
    background-color: #27a7df;
}
#footer-sec {
    background-color: #343a40;
    padding: 20px 50px;
    font-size: 12px;
}
.main-box {
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    margin-bottom: 30px;
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
.info {
    font-size: 13px;
    text-transform: uppercase;
    color: #000;
    font-weight: 800;
}
.page-head-line {
    font-size: 30px;
    text-transform: uppercase;
    color: #000;
    font-weight: 800;
    padding-bottom: 20px;
    border-bottom: 2px solid #00CA79;
    margin-bottom: 10px;
    border-left: 2px solid #00CA79;
}
.page-head-line2 {
    font-size: 25px;
    text-transform: uppercase;
    color: #000;
    font-weight: 800;
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
</head>
<html>
<body >

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


<?php
    
 
     
    
     $host = "localhost";
     $user = "root";
     $pass = "";
     $db = "mydb";
     $dbconnection = new mysqli($host, $user, $pass,$db);
?>

<div class="vl"></div>
<div class="v2"></div>

<div class="row">
         <div class="col-md-12">
       <h1 class="page-head-line"style="padding-left:230px" >User Page</h1>
           </div>
       </div>
<div class="row">
<div class="col-md-2">
</div>
 <div class="col-md-3">
        <div class="main-box mb-pink">
        <a href="transaction.php">
      <i class="fas fa-money-check-alt fa-5x" style="color:white;"></i>
       <h5 style="color:white;">Online Transaction</h5>
      </a>
   </div>
   </div>
 <div class="col-md-3">
     <div class="main-box mb-green">
      <a href="usercheckowndue.php">
      <i class="fas fa-search-dollar fa-5x" style="color:white;"></i>
      <h5 style="color:white;">Check how much you have debt</h5>
                            </a>
                           
                        </div>

                    </div>
 <div class="col-md-3">
                        <div class="main-box mb-blue">
                        
                            <a href="paymenthistory.php">

                                <i class="fas fa-history fa-5x" style="color:white;"></i>
                                <h5 style="color:white;">Payment History</h5>
                            </a>
                           
                        </div>

                    </div>
                    <div class="col-md-2">
</div>
</div>
<?php
    
     $host = "localhost";
     $user = "root";
     $pass = "";
     $db = "mydb";
     $dbconnection = new mysqli($host, $user, $pass,$db);
     $q = mysqli_query($dbconnection," SELECT * FROM user WHERE username = '$_SESSION[login_user]';");
     $row = mysqli_fetch_assoc($q);
?>

        </div><br><br>
                    <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line2" style="padding-left:250px" >Your Profile Information</h1><br>
                        <p class="info" style="padding-left:250px"> User ID: <?php echo $row["id"] ?></p>
                        <p class="info" style="padding-left:250px"> Username: <?php echo $row["username"] ?> </p>
                            <p class="info" style="padding-left:250px"> Blocktype: <?php echo $row["blocktype"] ?> </p>
                                <p class="info" style="padding-left:250px"> Apartment Number: <?php echo $row["apartmentnumber"] ?> </p>
                                    <p class="info" style="padding-left:250px"> Email: <?php echo $row["email"] ?> </p>
                    </div>
                </div>



                <div id="footer-sec">
       <span style="color: white;">Apartment Manager System</span>
    </div>   
     
</center>
</body>
</html>
