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
<html lang="en">
<head>
  <title>Who nat pay their dues</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>

  </style>
</head>
<body>
<?php
include "../config/header.php"
?>
<br>
 <center><h1><i class="far fa-building" style="font-size:40px"> 
 Apartment Manager</i></h1><br> 
 <h2>Who not pay their dues</h2>
</center>

  <center><br>   
 <div class="container">
  <div class="alert alert-info alert-dismissible" style="width: 50%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> This section is used for tracking those who do not pay their dues.
    If you want to find out who has not paid due for the proper month, you can know it by clicking proper month.
    For example, you can click January to find out who has not paid due for January. For example, you click January and user records shown,
    it means that user not pay January.
  </div>
</div>
</center>


<?php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "mydb";
   $dbconnection = new mysqli($host, $user, $pass,$db);
?>
<br><br>
<center>
<div class="container">
  <button type="button" class="btn btn-info btn-lg" id="myBtn" style="width: 50%;">January</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for January</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php


                      $sql2 = "SELECT MAX(totaldebt) as totaldebt FROM   totaldebtyear WHERE YEAR(submitdate) = YEAR(CURDATE())";
                      $resultt = mysqli_query($dbconnection, $sql2);
                      $roww = mysqli_fetch_assoc($resultt);
                        $totaldebtt= $roww["totaldebt"]; 
                        $monthlypayment=$totaldebtt/12;

           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$totaldebtt' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";
          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>
<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn1" style="width: 50%;" >February</button>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for February</h4>
        </div>
        <div class="modal-body">
          <p>
          <?php
          $february=$totaldebtt -  $monthlypayment;
                     $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >=  '$february' and  YEAR(submitdate) = YEAR(CURDATE()) ;";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

    ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn1").click(function(){
    $("#myModal1").modal();
  });
});
</script>
<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn3" style="width: 50%;">March</button>
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for March</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $march = $totaldebtt -  2*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$march' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn3").click(function(){
    $("#myModal3").modal();
  });
});
</script>
<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn4" style="width: 50%;">April</button>
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for April</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $april = $totaldebtt -  3*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$april' and YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn4").click(function(){
    $("#myModal4").modal();
  });
});
</script>
<br> <br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn5" style="width: 50%;">May</button>
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for May</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $may = $totaldebtt -  4*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$may' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn5").click(function(){
    $("#myModal5").modal();
  });
});
</script>

<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn6" style="width: 50%;">June</button>
  <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for June</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $june = $totaldebtt -  5*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$june' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn6").click(function(){
    $("#myModal6").modal();
  });
});
</script>

<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn7" style="width: 50%;">Jule</button>
  <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for March</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $jule = $totaldebtt -  6*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt  >= '$jule' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn7").click(function(){
    $("#myModal7").modal();
  });
});
</script>

<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn8" style="width: 50%;">August</button>
  <div class="modal fade" id="myModal8" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for August</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $august = $totaldebtt -  7*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$august' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn8").click(function(){
    $("#myModal8").modal();
  });
});
</script>
<br><br>

  <button type="button" class="btn btn-info btn-lg" id="myBtn9" style="width: 50%;">September</button>
  <div class="modal fade" id="myModal9" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for March</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $september = $totaldebtt -  8*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$september' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn9").click(function(){
    $("#myModal9").modal();
  });
});
</script>

<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn10" style="width: 50%;">November</button>
  <div class="modal fade" id="myModal10" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for November</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $november = $totaldebtt -  9*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$november' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn10").click(function(){
    $("#myModal10").modal();
  });
});
</script>

<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn11" style="width: 50%;">October</button>
  <div class="modal fade" id="myModal11" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for March</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $october = $totaldebtt -  10*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$october' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn11").click(function(){
    $("#myModal11").modal();
  });
});
</script>

<br><br>
  <button type="button" class="btn btn-info btn-lg" id="myBtn12" style="width: 50%;">December</button>
  <div class="modal fade" id="myModal12" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Who not pay due for March</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
           $december = $totaldebtt -  11*$monthlypayment;
           $sql1 = "SELECT * FROM feestransaction WHERE totaldebt >= '$december' and  YEAR(submitdate) = YEAR(CURDATE());";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
    echo"<td>Fee ID</td>";
    echo"<td>User ID</td>";
    echo"<td>Username</td>";
    echo"<td>Email</td>";
    echo"<td>Block Type</td>";
    echo"<td>Phone Number</td>";
    echo"<td>Apartment Number</td>";
    echo"</tr>";

        while ($row = mysqli_fetch_array($result)) { 
          $feeID= $row["feeid"]; 
          $userID= $row["userid"]; 
          $username= $row["username"]; 
          $email = $row["email"]; 
          $block= $row["blocktype"]; 
          $phonenumber= $row["phonenumber"]; 
          $apartmentnumber= $row["apartmentnumber"]; 
          echo"<tr>"; 
         for ($i=0; $i<7; $i++){
            echo"<td> $row[$i]</td>";
        }
        echo"</tr>";
       }
    echo"</table>";

          ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
  $("#myBtn12").click(function(){
    $("#myModal12").modal();
  });
});
</script>
</center>
<br><br>
</div>

<?php
 include "../config/footer.php";
?>
</body>
</html>
