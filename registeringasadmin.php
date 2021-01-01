<?php
session_start();
?>
<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:  error.php');
    exit;
}
?>
<html>
<head>
<title>Register User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>

 #did {border: solid black;width: 70%;border-radius: 4px;
		margin: 70px auto ; background: white;
		padding:70px;} 
.error {color: #FF0000;}
 #color45{
    background-color: #F5F5F5;
    }
    input[type=text], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
}
    input[type=password], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 70%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 10px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
#button {
  width: 70%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 10px;
  cursor: pointer;
}

#logg {
  border-radius: 5px;
  background-color: white;
  padding: 20px;

}
.blocktype-css {
	font-size: 16px;
	font-weight: 700;
	padding: .6em 1.4em .5em .8em;
	width: 100%;
	border-radius: .5em;
}
.blocktype-css::-ms-expand {
	display: none;
}
</style>
</head>

<body id="color45"> 
<?php
include "config/header.php";
?>
<center>
<br><br>
 <h1><i class="far fa-building" style="font-size:40px"> 
 Apartment Manager</i></h1><br>
 <h2>Create the new resident</h2>
 </div>

  <center><br>   
 <div class="container">
  <div class="alert alert-info alert-dismissible" style="width: 65%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> This section is a form for creating a new resident.
  </div>
</div>
</center>


 <?php
 
$host = "localhost";
$user = "root";
$pass = "";
$db = "mydb";
$formValid = true;
$dbconnection = "";

$nameErr = $emailErr = $genderErr = $passwordErr = $phonenumErr = $blcktypeErr = $aptnumbErr = " ";  
	$password =  false;
    $email = false;
	$gender = false;
    $name = false;
    $phonenumber = false;
    $blocktype = false;
    $apartmentnumber = false;
    $blccheck1 = "A";
    $blccheck2 = "B";
    $blccheck3 = "C";
    $blccheck4 = "D";
    $startdate = "";


if(isset($_POST['username'])){
    $name = $_POST['username'];
 } 
 if(isset($_POST['password'])){
    $password = $_POST['password'];
 } 
 if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
 } if(isset($_POST['email'])){
    $email = $_POST['email'];
 } 
 if(isset($_POST['phonenumber'])){
    $phonenumber = $_POST['phonenumber'];
 } 
  if(isset($_POST['blocktype'])){
    $blocktype = $_POST['blocktype'];
 } 
  if(isset($_POST['apartmentnumber'])){
    $apartmentnumber = $_POST['apartmentnumber'];
 }
  if(isset($_POST['movedin'])){
    $startdate = $_POST['movedin'];
 }

 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["username"])){

  if (empty($name)) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and <br> white space allowed";
      $formValid = false;
    }
  }

    if (empty($password)) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
   if (!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$^", $password)) {
      $passwordErr = "<br> Password must contain  at least one number and  one uppercase and lowercase letter, 
      and at least 8 or more  characters";
      $formValid = false;
    }
  }

   if (empty($phonenumber)) {
    $phonenumErr = "Phone Number is required";
  } else {
    $phonenumber = test_input($_POST["phonenumber"]);
   if (!preg_match("/\+?([0-9]{2})-?([0-9]{3})-?([0-9]{6,7})/ ", $phonenumber)) {
      $phonenumErr = "Invalid Phone Number!!!";
      $formValid = false;
    }
  }
  
  if (empty($email)) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email  format";
      $formValid = false;
    }
  }

    
    

  if (empty($gender)) {
    $genderErr = "Gender is required";

  } else {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($blocktype)) {
    $blcktypeErr = "Block number is required";
  } else {
    $blocktype = test_input($_POST["blocktype"]);
   
    if (substr_compare($blocktype,$blccheck1,0) != 0) {
      $blcktypeErr = "Please write A (Only block A available)";
      $formValid = false;
    }
  }
      
  if (empty($apartmentnumber)) {
    $aptnumbErr = "Apartment number is required";
  } else {
  
    $apartmentnumber = $_POST["apartmentnumber"];
    
    if ($apartmentnumber < 0 || $apartmentnumber > 51) {
      $aptnumbErr = "Available Apartment between 0 and 50";
      $formValid = false;
    }
  }
 
  $hashpasswd=md5($password);

$sql = "INSERT INTO user ( username, password, email, gender, phonenumber, blocktype, apartmentnumber, pic, dstart) VALUES ('$name', '$hashpasswd', '$email', '$gender', '$phonenumber',
'$blocktype','$apartmentnumber','profile.jpg', '$startdate' )";
         if($formValid){

           $dbconnection = new mysqli($host, $user, $pass,$db);
           if(mysqli_query($dbconnection, $sql)){
           echo '<script language="javascript">';
            echo 'alert("User information added to the database successfully")';
             echo '</script>';
           } else {
           echo " User information has not been added to the database. Please obey the rules." ;

        }
     }
   }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
<div id="did">
<div id="logg">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  	&nbsp;	&nbsp;<input type="text" name="username" placeholder="Username(e.g John Doe)" value="<?php if ( isset($name) ) echo $name; ?>" required> 
  <span class="error">* <br>  <?php echo $nameErr;?></span> 
  <br>
   	&nbsp;	&nbsp;<input type="password" name="password" placeholder="Password(e.g User1234)" value="<?php if ( isset($password) ) echo $password; ?>" required > 
  <span class="error">*  <?php echo  $passwordErr;?></span> 
<br> <br>
	&nbsp;	&nbsp;<input type="text" name="email" placeholder="E-mail (e.g example@gmail.com)" value="<?php if ( isset($email) ) echo $email; ?>" required> 
  <span class="error">* <br> <?php echo  $emailErr;?></span> 
  <br>
 	&nbsp;	&nbsp;<input type="text" name="phonenumber" placeholder="Phone Number(e.g +912345678901)" value="<?php if ( isset($phonenumber) ) echo $phonenumber; ?>" required>
     <span class="error"> * <br> <?php echo $phonenumErr;?></span> 


     <br>
 &nbsp;	&nbsp; <input type="text" name="blocktype" placeholder="Block Type (e.g A)" value="<?php if ( isset($blocktype) ) echo $blocktype; ?>" required>
     <span class="error"> * <br> <?php echo  $blcktypeErr;?></span> 

     <br>
  	&nbsp;	&nbsp;<input type="text" name="apartmentnumber" placeholder="Apartment Number" value="<?php if ( isset($apartmentnumber) ) echo $apartmentnumber; ?>" required>
       <span class="error"> * <br> <?php echo  $aptnumbErr;?></span> 
     <br>	<br>
  	&nbsp;	&nbsp;<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  	&nbsp;	&nbsp;<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  	&nbsp;	&nbsp;<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other   
  	&nbsp;	&nbsp;<span class="error">* <?php echo  $genderErr;?></span>
  <br>
   
       &nbsp;	&nbsp;   <label for="movedin">Moved in</label>

         &nbsp;	&nbsp; <input type="date" name="movedin" required><br>
  
    
   
  &nbsp;	&nbsp;<input type="submit" name="submit" value="Submit"><br>
&nbsp;	<a href="HTMLPage2.php.php"> <input id="button" type="button" value="Go to Admin Dashboard" ></a>
</form>


</div>
</div>
</center>
<div style="margin-top:-50px;">
<?php
include "config/footer.php"
?>
</div>
</body>
</html>
