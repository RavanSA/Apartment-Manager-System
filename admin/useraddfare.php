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
    input[type=date], select {
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
  width: 50%;
  height: 50%;
  border-radius: 5px;
  background-color: white;
  padding: 20px;
  text-align: center 

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
 <br>
<h3> Create the monthly due for the user</h3>
 </div><!--
 <center><br>   
 <div class="container">
  <div class="alert alert-info alert-dismissible" style="width: 35%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> This section is a form created to pay the user's monthly fee.
  </div>
</div>
</center>-->
 <?php
 
$host = "localhost";
$user = "root";
$pass = "";
$db = "mydb";
  $dbconnection = new mysqli($host, $user, $pass,$db);



	$userid = "";
    $monthlydue= "";
    $submitdate = "";
    $ispay= "";
    $paiddate = "";
    $feedescription= "";

    

 if(isset($_POST['monthlydue'])){
    $monthlydue=  $_POST['monthlydue'];
 } 

 if(isset($_POST['submitdate'])){
    $submitdate = $_POST['submitdate'];
 }  
 if(isset($_POST['feedescription'])){
    $feedescription = $_POST['feedescription'];
 } 

    
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["submit"])){
 $sql = "SELECT id FROM user WHERE moveddate IS NULL";
 $result = mysqli_query($dbconnection, $sql);
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_array($result)) {
      $sql1 = "INSERT INTO feestransaction (userid,monthlydue,submitdate,feedescription) 
      VALUES('$row[id]','$monthlydue','$submitdate','$feedescription')";
       $dbconnection->query($sql1);     
  }
}
    echo "<div class='container' style='width: 34%;'>
  <div class='alert alert-success'>
    Completed succesfully
  </div>
</div>";
}
}

?>
<script type="text/javascript">
    function clicked() {
       if (confirm('Do you want to submit?')) {
           clicked.submit();
       } else {
           return false;
       }
    }

</script>



<div class="logg">
<center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width: 550px;" >               
     <input type="text" name="monthlydue" placeholder="Monthly amount" required>
      <br><input type="text" name="feedescription" placeholder="Fee description" required>
  <br>


            <label for="submitdate"></label>
             <input type="date" name="submitdate" required> <br>

  <input type="submit" onclick="return confirm('Are you sure you want to add a new payment?')" name="submit" value="Submit"><br>

	 <a href="HTMLPage2.php.php"> <input id="button" type="button" value="Go to Admin Dashboard" ></a>
</form>
</center>
</div>
<br><br>


<?php
include "../config/footer.php";
?>

</body>
</html>
