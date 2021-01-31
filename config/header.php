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
  ::-webkit-scrollbar {
  width: 13px;
}
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 5px;
}
::-webkit-scrollbar-thumb {
  background: grey; 
  border-radius: 20px;
}
::-webkit-scrollbar-thumb:hover {
  background: #555; 
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
<?php     $host = "localhost";
     $user = "root";
     $pass = "";
     $db = "mydb";
     $dbconnection = new mysqli($host, $user, $pass,$db);
     $sql8="SELECT message,announcementid FROM announcement WHERE username = 'NULL' AND sentto='everyone' ORDER BY announcementid  DESC LIMIT 4";
     $results = mysqli_query($dbconnection, $sql8);
          $sql10="SELECT message,sentto FROM announcement WHERE username = 'admin' ORDER BY announcementid  DESC LIMIT 4";
     $result = mysqli_query($dbconnection, $sql10);
             $sql9="SELECT message,announcementid FROM announcement WHERE username = 'admin'";
    $resultt = mysqli_query($dbconnection, $sql9);
    $num_rowss = mysqli_num_rows($resultt);
if(!isset($_SESSION["last"])) {    
        $check = $_SESSION['last'] = $num_rowss;
    } else {
        $check = $_SESSION['last'];
    }

     if($num_rowss > $check ) { 
        $check = $_SESSION['last'] = $num_rowss;
        $announcecount=1;
     } else {
        $announcecount=0;
     }
     
     
?>
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
  <a href="admintransaction.php" style="font-size: 15px"><i class="far fa-money-bill-alt"></i>  Pay residents fare</a>
    <hr style="background-color: #F5F5F5;">
      <a href="admincontact.php" style="font-size: 15px"><i class="fas fa-sms"></i>  Incoming Messages</a>
    <hr style="background-color: #F5F5F5;">      
        <a href="addannounce.php" style="font-size: 15px"><i class="fas fa-bullhorn"></i>  Add announce to the residents</a>
    <hr style="background-color: #F5F5F5;">
            <a href="search1.php" style="font-size: 15px"><i class="fa fa-file"></i>  Yearly Report</a>
    <hr style="background-color: #F5F5F5;">
                <a href="expenselist.php" style="font-size: 15px"><i class="fa fa-file"></i>  Expense List</a>
    <hr style="background-color: #F5F5F5;">
    <a href="settingsadmin.php" style="font-size: 15px"><i class="fas fa-user-cog"></i>  Settings</a>
    <hr style="background-color: #F5F5F5;">
        <a href="../logout.php" style="font-size: 15px"><i class="fa fa-power-off "></i>     Logout </a>
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
    <a href="HTMLPage2.php.php" style="color: white;"> <i class="fas fa-home"></i></a>
         <span style="padding-left:12px;color:white;">
    <i class="fas fa-bullhorn" data-toggle="modal" data-target="#exampleModalLong" onclick="javascript: return false;" ></i>
    </span></a>
    <span style="padding-left:12px; color: white;">
    <i class="fas fa-sms" data-toggle="modal" data-target="#Modal" onclick="javascript: return false;" >
        <span class="badge badge-danger" style="font-size:10px;"><?php echo $announcecount; ?></span>

    </i>
    </span>
    </div>
    <div style="padding-left:30px">
   <a href="../logout.php" style="color: white;"> <i class="fas fa-sign-out-alt">LOGOUT</i></a>
    </div>
  </div>  
</nav>
 <div class="modal fade" id="exampleModalLong" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px"><i class="fas fa-bullhorn"></i>Announcements</h4>
        </div>
        <div class="modal-body">
          <p> <?php  
          while($row = mysqli_fetch_array($results)){
          echo "<strong> Announcement: </strong><br>";
          echo  $row["message"];
          echo "<br><hr>";
          }
          
          ?> </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Modal" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px"><i class="fas fa-sms"></i>Private message</h4>
        </div>
        <div class="modal-body">
          <p> <?php  
          while($roww = mysqli_fetch_array($result)){
          echo "<strong> Message from:$roww[sentto]  </strong><br>";
          echo  $roww["message"];
          echo "<br><hr>";
          }
          ?> </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>



</body>
</html>
