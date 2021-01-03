<?php
 session_start();

if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:  ../error.php');
    exit;
}

     $host = "localhost";
     $user = "root";
     $pass = "";
     $db = "mydb";
     $dbconnection = new mysqli($host, $user, $pass,$db);
     $sql5="SELECT * FROM announcement WHERE username = '$_SESSION[login_user]'";

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
  height: 556px;
  position: absolute;
  left: 16%;
  margin-left: -3px;
  top: 76px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
.v2 {
  border-left: 2px solid #00CA79;
  height: 556px;
  position: absolute;
  left: 93%;
  margin-left: -3px;
  top: 76px;
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
.fixing{
padding-bottom:10px;
}

  </style>
</head>
<html>
<body class="fixing">

<?php
include "../config/userheader.php";
?>

 <?php 

if($results = mysqli_query($dbconnection, $sql5)){
if(mysqli_num_rows($results) > 0){

while($row = mysqli_fetch_array($results)){
if (!is_null($row["message"])){
  echo "<script>
	$(document).ready(function(){
		$('#myModal').modal('show');
	});
</script>

<div id='myModal' class='modal fade'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'><i class='fas fa-bullhorn'></i> Announcement</h5>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
            </div>
            <div class='modal-body'>
            " .  $row['message']. " <br>
            </div>
        </div>
    </div>
</div>
";
}
}
}
}

$sql6="DELETE FROM announcement WHERE username= '$_SESSION[login_user]' ";
$dbconnection->query($sql6);

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

     $q = mysqli_query($dbconnection," SELECT * FROM user WHERE username = '$_SESSION[login_user]';");
     $row = mysqli_fetch_assoc($q);
?>

        </div>
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

     
</center>
<div style="margin-top: 65px;">
<?php
include "../config/userfooter.php";
?>
</div>
</body>
</html>
