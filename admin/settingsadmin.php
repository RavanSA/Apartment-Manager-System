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


</style>
</style>
</head>
<body style="background-color:#F5F5F5">

<?php
 include "../config/header.php";
?>


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

$sql = "select * from admin where username= '".$_SESSION['login_user']."' and password='".md5($oldpassword )."'";
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
$sql = "update admin set password = '".md5($newpassword)."' WHERE username = '".$_SESSION['login_user']."'";
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
</center>

<?php
 include "../config/footer.php";
?>

</body>
</html>