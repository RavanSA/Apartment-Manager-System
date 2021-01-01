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
  padding-top: 50px;
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
  right: 0px;
  font-size: 35px;
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
  padding: 5px;
}
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 10px;}
  .sidebar a {font-size: 18px;}
}


    </style>
</head>
<html>
<body style="background-color: #F5F5F5;">
<!-- navbar -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-top: -25px;">
<div> 
<div id="mySidebar" class="sidebar">
<center style="color:white;">
<h5>Apartment Manager</h5>
<h5>System</h5></center>
<div style="color:white; padding-left:100px;">
<?php echo "Hi,"."  $_SESSION[login_user]"; ?>

</div>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <hr style="background-color: #F5F5F5;">

  <a href="registeringasadmin.php" style="font-size: 15px"> <i class="fas fa-user-plus"></i> Register Users</a>
  <hr style="background-color: #F5F5F5;">
  <a href="useraddfare.php" style="font-size: 15px"><i class="fas fa-money-check-alt"></i> Create monthly due for the user</a>
  <hr style="background-color: #F5F5F5;">
  <a href="showinguserdata.php" style="font-size: 15px"><i class="fas fa-database"></i> User profile information</a>
    <hr style="background-color: #F5F5F5;">
  <a href="trackingowndue.php" style="font-size: 15px"><i class="fas fa-money-bill-wave"></i> Who not pay their due</a>
   <hr style="background-color: #F5F5F5;">
  <a href="addotherexpenseuser.php" style="font-size: 15px"><i class="fas fa-file-invoice-dollar"></i>  Add other expenses to the user</a>
    <hr style="background-color: #F5F5F5;">
  <a href="admintransaction.php" style="font-size: 15px"><i class="far fa-money-bill-alt"></i>  Pay residents fare</a>
    <hr style="background-color: #F5F5F5;">
      <a href="admincontact.php" style="font-size: 15px"><i class="fas fa-sms"></i>  Incoming Messages</a>
    <hr style="background-color: #F5F5F5;">      
        <a href="addannounce.php" style="font-size: 15px"><i class="fas fa-bullhorn"></i>  Add announce to the residents</a>
    <hr style="background-color: #F5F5F5;">
    <a href="settingsadmin.php" style="font-size: 15px"><i class="fas fa-user-cog"></i>  Settings</a>
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
  <div class="collapse navbar-collapse" id="collapsibleNavbar" >
    <ul class="navbar-nav">
     <li class="nav-item" style="color: #FFFFFF;"> <b>ADMIN PANEL 
    </b>
     </li>
    </ul>
     <div style="padding-left:900px">
    <a href="HTMLPage2.php.php" style="color: white;"> <i class="fas fa-home"> HOME</i></a>
    </div>
    <div style="padding-left:30px">
   <a href="logout.php" style="color: white;"> <i class="fas fa-sign-out-alt">LOGOUT</i></a>
    </div>
  </div>  
</nav>

</body>
</html>