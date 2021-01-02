<?php
session_start();
?>
<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:  ../error.php');
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
 include "../config/header.php";
?>
<br><br>
  <center>
 <h1><i class="far fa-building" style="font-size:40px"> 
 Apartment Manager</i></h1>
 <h2> Add other dues to the residents</h2>

 </div>

<br>   
 <div class="container" style="padding-left:230px;">
  <div class="alert alert-info alert-dismissible" style="width: 85%;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> This section is used to create additional payments for residents, except monthly due.
    For example, if you need to collect fees from residents for COVID-19 cleanup,
    you can collect them here.
  </div>
</div>
</center>

 <?php
 
$host = "localhost";
$user = "root";
$pass = "";
$db = "mydb";


	
    $email = "";
	$userid = "";
    $username = "";
    $phonenumber = "";
    $blocktype = "";
    $apartmentnumber = "";
    $totaldebt = "";
    $submitdate = "";
    $feedescription ="";
    
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["submit"])){

  
    $userid = test_input($_POST['userid']);

    $username = test_input($_POST['username']);
 
    $email = test_input($_POST['email']);


    $blocktype = test_input($_POST['blocktype']);

    $phonenumber = test_input($_POST['phonenumber']);
 
    $apartmentnumber = test_input($_POST['apartmentnumber']);
 
    $totaldebt = test_input($_POST['totaldebt']);
 
    $submitdate = $_POST['submitdate'];
 
    $feedescription = test_input($_POST['feedescription']);
 
  $dbconnection = new mysqli($host, $user, $pass,$db);

$sql10 = "INSERT INTO otherexpenses(userid, username, email, blocktype, apartmentnumber, totaldebt, submitdate, feedescription)
VALUES ('".$userid."', '".$username."', '".$email."', '".$blocktype."', '".$apartmentnumber."',
'".$totaldebt."', '".$submitdate."', '".$feedescription."')";
      
           if(mysqli_query($dbconnection, $sql10)){
           echo '<script language="javascript">';
            echo 'alert("User information added to the database successfully")';
             echo '</script>';
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
<br> 
	&nbsp;	&nbsp;<input type="text" name="email" placeholder="E-mail (e.g example@gmail.com)" value="<?php if ( isset($email) ) echo $email; ?>" required> 

  <br>

&nbsp;	&nbsp; <input type="text" name="blocktype" placeholder="Block Type (e.g A)" value="<?php if ( isset($blocktype) ) echo $blocktype; ?>" required>

<br>

 	&nbsp;	&nbsp;<input type="text" name="phonenumber" placeholder="Phone Number(e.g +912345678901)" value="<?php if ( isset($phonenumber) ) echo $phonenumber; ?>" required>

     <br>
  	&nbsp;	&nbsp;<input type="text" name="apartmentnumber" placeholder="Apartment Number" value="<?php if ( isset($apartmentnumber) ) echo $apartmentnumber; ?>" required>

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

</center>

<?php
 include "../config/footer.php";
?>
</body>
</html>