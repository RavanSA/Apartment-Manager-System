<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}	

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: 100%;
  background-color: #f44336;
}

.container {
  padding: 16px;
}
  #did {border: solid black 3px;width: 30%;border-radius: 7px;
		margin: 25px auto; background: white;
		padding:70px;}  
		.imgcontainer {
  text-align: center;
  margin: 15px 0 7px 0;
  position: relative;
}

img.avatar {
  width: 80%;
  border-radius: 80%;
}
</style>
</head>
<body style="background-color: #f5f5f5;">

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "mydb";
$dbconnection = new mysqli($host, $user, $pass,$db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	 
if(isset($_POST["username"])){
    $hashpasswd = md5($password);

	$sql = "SELECT username, password FROM user WHERE username = '$username' AND  password = '$hashpasswd'";
	$result = mysqli_query($dbconnection,$sql);
	$sql2 = mysqli_query($dbconnection, "SELECT * FROM user WHERE username = '$username' AND  password = '$hashpasswd'");

	$row = mysqli_fetch_assoc($sql2);

	if(mysqli_num_rows($result) > 0){
	$_SESSION['login_user'] = $username;
	$_SESSION['pic'] = $row['pic'];
		header("Location: user/userpage.php");
	} else {
		     echo '<script language="javascript">';
     echo 'alert("Your username or password is incorrect. Please try again.")';
     echo '</script>';;
	}
}
}


?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<div id="did">
<div class="col-sm-12 col-sm-offset-12 text-center">

  <div class="container">
     <div class="imgcontainer" >
      <img src="images/login.jpg" class="avatar">
    </div>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
  
   <a href="test.php"> <button type="button" class="cancelbtn" >Cancel</button></a>
  

</form>
</form>
</div>
</div>
</div>
</body>
</html>
