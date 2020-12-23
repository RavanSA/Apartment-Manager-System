<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
   #did {border: solid;width: 5000px;border-radius: 7px;
		margin: 50px auto ; background: white; height: 1000px ;
		padding:70px;} 
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
#footer-sec {
    background-color: #343a40;
    padding: 20px 50px;
    
    font-size: 12px;
}
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
.mb-pink {
    background-color: #005a8c;
}
.mb-green {
    background-color: #52b864;
}
.mb-red {
    background-color: #121e2d;
}
.mb-color1 {
    background-color: #4c7c8f;
}
.mb-color3 {
    background-color: #812638;
}
.mb-blue {
    background-color: #27a7df;
}
.main-box {
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    margin-bottom: 30px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
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
.info {
    font-size: 13px;
    text-transform: uppercase;
    color: #000;
    font-weight: 800;
}
.vl {
  border-left: 2px solid #00CA79;
  height: 570px;
  position: absolute;
  left: 16%;
  margin-left: -3px;
  top: 100px;
}
.v2 {
  border-left: 2px solid #00CA79;
  height: 570px;
  position: absolute;
  left: 93%;
  margin-left: -3px;
  top: 100px;
}
  </style>
</head>
<html>
<body style="background-color: #F5F5F5;">
<!-- navbar -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<div> 
<div id="mySidebar" class="sidebar">
<div style="color:white; padding-left:100px;">
<?php echo "Hi,"."  $_SESSION[login_user]"; ?>

</div>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="registeringasadmin.php" style="font-size: 15px"> <i class="fas fa-user-plus"></i> Register Users</a>
  <hr>
  <a href="useraddfare.php" style="font-size: 15px"><i class="fas fa-money-check-alt"></i> Create monthly due for the user</a>
  <hr>
  <a href="showinguserdata.php" style="font-size: 15px"><i class="fas fa-database"></i> User profile information</a>
  <hr>
  <a href="trackingowndue.php" style="font-size: 15px"><i class="fas fa-money-bill-wave"></i> Who not pay their due</a>
  <hr>
  <a href="addotherexpenseuser.php" style="font-size: 15px"><i class="fas fa-file-invoice-dollar"></i>Add other expenses to the user</a>
  <hr>
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
     <li class="nav-item" style="color: #FFFFFF;"> <b>ADMIN PANEL 
    </b>
     </li>
    </ul>
     <div style="padding-left:900px">
    <a href="HTMLPage2.php.php" style="color: white;"> <i class="fas fa-home"> HOME</i></a>
    </div>
    <div style="padding-left:30px">
   <a href="test.php" style="color: white;"> <i class="fas fa-sign-out-alt">LOGOUT</i></a>
    </div>
  </div>  
</nav>


<!-- shortcuts-->
<div class="vl"></div>
<div class="v2"></div>

<div class="row">
         <div class="col-md-12">
       <h1 class="page-head-line"style="padding-left:230px" >DASHBOARD</h1>
           </div>
       </div>
<div class="row">
<div class="col-md-2">
</div>
 <div class="col-md-3">
        <div class="main-box mb-pink">
        <a href="registeringasadmin.php">
      <i class="fas fa-user-plus fa-5x" style="color:white;"></i>
       <h5 style="color:white;">Create new resident</h5>
      </a>
   </div>
   </div>
 <div class="col-md-3">
     <div class="main-box mb-green">
      <a href="useraddfare.php">
      <i class="fas fa-money-check-alt fa-5x" style="color:white;"></i>
      <h5 style="color:white;">Add fare to the resident</h5>
                            </a>
                           
                        </div>

                    </div>
 <div class="col-md-3">
                        <div class="main-box mb-blue">
                        
                            <a href="showinguserdata.php">

                                <i class="fas fa-database fa-5x" style="color:white;"></i>
                                <h5 style="color:white;">Residents Information</h5>
                            </a>
                           
                        </div>

                    </div>
                    <div class="col-md-2">
</div>
                     <div class="col-md-3">
                        <div class="main-box mb-color1">
                        
                            <a href="trackingowndue.php">

                                <i class="fas fa-money-bill-wave fa-5x" style="color:white;"></i>
                                <h5 style="color:white;">Who not pay their due</h5>
                            </a>
                           
                        </div>

                    </div>
                                         <div class="col-md-3">
                        <div class="main-box mb-color3">
                        
                            <a href="addotherexpenseuser.php">

                                <i class="fas fa-file-invoice-dollar fa-5x" style="color:white;"></i>
                                <h5 style="color:white;font-size:19.5px;">Add other payments to residents</h5>
                            </a>
                           
                        </div>

                    </div>
                                         <div class="col-md-3">

                        <div class="main-box mb-red">
                        
                                <a href="expensedetails.php">

                                <i class="fas fa-plus fa-5x" style="color:white;"></i>
                                <h5 style="color:white;">Add expense details</h5>
                            </a>
                           
                        </div>

            

</div>
      <?php
    
     $host = "localhost";
     $user = "root";
     $pass = "";
     $db = "mydb";
     $dbconnection = new mysqli($host, $user, $pass,$db);
     $q = mysqli_query($dbconnection," SELECT * FROM admin WHERE username = '$_SESSION[login_user]';");
     $row = mysqli_fetch_assoc($q);
?>

        </div><br><br>
                    <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line2" style="padding-left:250px" >Admin's Profile Information</h1><br>
                        <p class="info" style="padding-left:250px"> Username: <?php echo $row["username"] ?></p>
                        <p class="info" style="padding-left:250px"> Email: <?php echo $row["email"] ?> </p>

                    </div>
                </div>

                <div id="footer-sec">
       <span style="color: white;">Apartment Manager System</span>
    </div>
</body>
</html>
