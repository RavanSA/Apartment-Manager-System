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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
 #did {border: solid;width: 55%;border-radius: 7px;
		margin: 50px auto ; background: white;
		padding:70px;} 
.error {color: #FF0000;}
 #color45{
    background-color: #F5F5F5;
    }
    input[type=text], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
}
    input[type=password], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 80%;
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
  width: 80%;
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

<body id="color45"> <div>
<?php
include "config/header.php";
?>
<br><br>
<center>
 <h1><i class="far fa-building" style="font-size:40px"> 
 Apartment Manager</i></h1>
 <br>
<h3> Create the monthly due for the user</h3>
 </div>
 <center><br>   
 <div class="container">
  <div class="alert alert-info alert-dismissible" style="width: 65%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> This section is a form created to pay the user's monthly fee.
  </div>
</div>
</center>
 <?php
 
$host = "localhost";
$user = "root";
$pass = "";
$db = "mydb";
  $dbconnection = new mysqli($host, $user, $pass,$db);


	$nameErr = $emailErr = $genderErr = $passwordErr = $phonenumErr = $blcktypeErr = $aptnumbErr = " ";  

    $email = "";
	$userid = "";
    $username = "";
    $phonenumber = "";
    $blocktype = "";
    $apartmentnumber = "";
    $totaldebt = "";
    $submitdate = "";
    $feedescription ="";
    $formValid = true;
        $blccheck1 = "A";


    
if(isset($_POST['userid'])){
    $userid = $_POST['userid'];
 } 
 if(isset($_POST['username'])){
    $username = $_POST['username'];
 } 
 if(isset($_POST['email'])){
    $email = $_POST['email'];
 }
 if(isset($_POST['blocktype'])){
    $blocktype = $_POST['blocktype'];
 } 
 if(isset($_POST['phonenumber'])){
    $phonenumber = $_POST['phonenumber'];
 } 
  if(isset($_POST['apartmentnumber'])){
    $apartmentnumber = $_POST['apartmentnumber'];
 } 
  if(isset($_POST['totaldebt'])){
    $totaldebt = $_POST['totaldebt'];
 }
  if(isset($_POST['submitdate'])){
    $submitdate = $_POST['submitdate'];
 }
  if(isset($_POST['feedescription'])){
    $feedescription = $_POST['feedescription'];
 }
    
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["submit"])){

     if (empty($username)) {
    $nameErr = "Name is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
      $nameErr = "Only letters and <br> white space allowed";
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

 
$sql1 = "INSERT INTO feestransaction(userid, username, email, blocktype, phonenumber,
apartmentnumber, totaldebt, submitdate, feedescription) VALUES ('".$userid."', '".$username."', '".$email."',
'".$blocktype."', '".$phonenumber."', '".$apartmentnumber."', '".$totaldebt."', '".$submitdate."', '".$feedescription."')";
      $sql2 = "INSERT INTO totaldebtyear(totaldebt,submitdate) VALUES ('$totaldebt','$submitdate')";
       if($formValid == true){
       $dbconnection->query($sql2);
           if(mysqli_query($dbconnection, $sql1)){
           echo '<script language="javascript">';
            echo 'alert("User information added to the database successfully")';
             echo '</script>';
           } 
          } else {
           echo " User information has not been added to the database." ;

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
  	&nbsp;	&nbsp;<input type="text" name="userid" placeholder="Userid(e.g 1)" value="<?php if ( isset($userid) ) echo $userid; ?>" required> 

   	&nbsp;	&nbsp;<input type="text" name="username" placeholder="Username(e.g user bir)" value="<?php if ( isset($username) ) echo $username; ?>" required > 
         <span class="error">* <br>  <?php echo $nameErr;?></span> 

<br> 
	&nbsp;	&nbsp;<input type="text" name="email" placeholder="E-mail (e.g example@gmail.com)" value="<?php if ( isset($email) ) echo $email; ?>" required> 
      <span class="error">* <br> <?php echo  $emailErr;?></span> 

  <br>

&nbsp;	&nbsp; <input type="text" name="blocktype" placeholder="Block Type (e.g A)" value="<?php if ( isset($blocktype) ) echo $blocktype; ?>" required>
     <span class="error"> * <br> <?php echo  $blcktypeErr;?></span> 

<br>

 	&nbsp;	&nbsp;<input type="text" name="phonenumber" placeholder="Phone Number(e.g +912345678901)" value="<?php if ( isset($phonenumber) ) echo $phonenumber; ?>" required>
          <span class="error"> * <br> <?php echo $phonenumErr;?></span> 

     <br>
  	&nbsp;	&nbsp;<input type="text" name="apartmentnumber" placeholder="Apartment Number" value="<?php if ( isset($apartmentnumber) ) echo $apartmentnumber; ?>" required>
             <span class="error"> * <br> <?php echo  $aptnumbErr;?></span> 

     <br>
             
      &nbsp;&nbsp; <input type="text" name="totaldebt" placeholder="Total debt (e.g 1)" value="<?php if ( isset($totaldebt) ) echo $totaldebt; ?>" required>
      <br>
      &nbsp;&nbsp; <input type="text" name="feedescription" placeholder="feedescription (e.g dues)" value="<?php if ( isset($feedescription) ) echo $feedescription; ?>" required>
  <br>
            <label for="submitdate">Submit Date</label>
             <input type="date" name="submitdate" value="<?php if ( isset($submitdate) ) echo $submitdate; ?>"> <br>

  	&nbsp;	&nbsp;<input type="submit" name="submit" value="Submit"><br>

	&nbsp;	&nbsp;  <a href="HTMLPage2.php.php"> <input id="button" type="button" value="Go to Admin Dashboard" ></a>
</form>

</div>
</div>
<?php
include "config/footer.php";
?>
</body>
</html>