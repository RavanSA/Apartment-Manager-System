<?php
 session_start();
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

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px auto;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 30%;
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
  height: 70%;
  margin: 30px;
} 
</style>
</head>
<body style="background-color:#F5F5F5">

<?php
 include "../config/header.php";
?>
<br><br>


 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2><strong>Write a message to the residents</strong></h2>
 </div></center>
 <br>

<center>
<div id="payment">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label for="message"><strong>Write a message</strong></label><br>
    <textarea name="message" style="width: 70%; height:100%"></textarea><br>
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


 if(isset($_POST['submit'])){
    $message = mysqli_real_escape_string($dbconnection,$_POST['message']);
    $sql2 = "INSERT INTO announcement (message) VALUES ('$message')";
    $dbconnection->query($sql2);
     echo '<script language="javascript">';
     echo 'alert("Message sent successfully")';
     echo '</script>';
    } 
 ?>

<div style= "margin-top: 104px;">
<?php
 include "../config/footer.php";
?>
</div>
</body>
</html>
