<!DOCTYPE html>
<html>
<head>
  <title>DELUXE Apartments</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap and icons links-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
  .navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
  .myfont {
  font-family: "Comic Sans MS", cursive, sans-serif;
    }
 .volor{
     background-color: #F5F5F5;
    }
   #myid {
  background-color: #F5F5F5;
    }
    .carousel-inner img {
    width: 1600px;;
    height: 500px;
  }
  #deluxe:visited {
  color: black;
}
#deluxe:hover {
  color: grey;
}
.button {
  background-color: #4CAF50;
  color:white;
  padding: 8px 10px;
  text-decoration: none;
  font-size: 16px;
}

</style>
</head>
<body>


<!--logo and title-->
<div class="jumbotron text-black " id="myid" style="margin-bottom:0">
  <div class="row">
    <div class="col-sm-4">
  <h1 class="myfont"><span id="deluxe"><b>Deluxe Apartments<b></span></h1>
</div>
  
  <h5><div class="myfont" style="padding-left:950px">Differents types of apartments
</div></h5>

  <div>
  </div>
</div>

<!--navbar-->
<div class="navbar">
  <a class="active" href="main1.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="test.php"><i class="fa fa-fw fa-user"></i> Login</a>
</div>

 <center><h1><i class="far fa-building" style="font-size:40px"> 
 Apartment Manager</i></h1><br> 
 <h2>Contact with the apartment manager</h2>
</center><br>

<center>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="fname">First Name</label><br>
    <input type="text" id="fname" name="firstname" placeholder="Your name.."><br>

    <label for="lname">Last Name</label><br>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>

    <label for="lname">Phone Number</label><br>
    <input type="text" id="lname" name="phonenumber" placeholder="Your phone number.."><br>

    <label for="subject">Short message</label><br>
    <textarea id="subject" name="message" placeholder="Write short message" style="height:200px"></textarea><br>

    <input type="submit" value="Submit" name="submit">
  </form>
  </center>

  <br><br><br>
<?php
         $host = "localhost";
          $user = "root";
           $pass = "";
           $db = "mydb";
          $dbconnection = new mysqli($host, $user, $pass,$db);

    if(isset($_POST["submit"])){
    $firstname = mysqli_real_escape_string($dbconnection,$_POST["firstname"]);
    $lastname = mysqli_real_escape_string($dbconnection,$_POST["lastname"]);
    $phonenumber = mysqli_real_escape_string($dbconnection,$_POST["phonenumber"]);
    $message = mysqli_real_escape_string($dbconnection,$_POST["message"]);

    $sql = "INSERT INTO contactus (firstname, lastname, phonenumber, subject, submitdate)
    VALUES ('$firstname','$lastname', '$phonenumber', '$message', NOW())";
    $dbconnection->query($sql);
     echo '<script language="javascript">';
     echo 'alert("Your message added succesfully")';
     echo '</script>';
    } 


?>


    <footer>
<div class="jumbotron text-center"  style="background-color:#F5F5F5"
    style="margin-bottom:0">
      <a href="#"><i class="fab fa-facebook-f"></i></a> 
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a> 
      <a href="#"><i class="fab fa-instagram"></i></a>
   <h6>Copyright © 2020 Apartment Managers. All rights reserved.<a target="_blank" href="..."> Terms of Use</a> -
   <a target="_blank" href="...">Privacy Policy </a>- Powered by Ravan.</h6>
   </div>
</footer>


</body>
</html>
