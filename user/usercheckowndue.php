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
  
  </style>
</head>
<body>
<?php
include "../config/userheader.php";
?>
 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Check how much you have debt</h2>
  <h3>For the year <?php echo date("Y"); ?> </h3>
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
  <div class="alert alert-info alert-dismissible" style="width: 50%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> If you do not have debt for an proper month, 
    the record will not be shown. If you have debt for an proper month, the record will be shown
  </div>
</div>
</center>

<center>
<div class="container">
  <button type="button" class="btn btn-info btn-lg" id="myBtn" style="width: 50%;">January</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for January</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php
          

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'january' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for February</h4>
        </div>
        <div class="modal-body">
          <p>
          <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'february' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for March</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'march' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
       }
    echo"</table>";

    ?>
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for April</h4>
        </div>
        <div class="modal-body">
          <p>
          <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'april' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for May</h4>
        </div>
        <div class="modal-body">
          <p>
          <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'may' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for June</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'june' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
  <button type="button" class="btn btn-info btn-lg" id="myBtn7" style="width: 50%;">July</button>
  <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for July</h4>
        </div>
        <div class="modal-body">
          <p>
          <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'july' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for August</h4>
        </div>
        <div class="modal-body">
          <p>
         <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'august' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for September</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'september' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for November</h4>
        </div>
        <div class="modal-body">
          <p>
           <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'november' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for October</h4>
        </div>
        <div class="modal-body">
          <p>
          <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'october' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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
          <h4 class="modal-title" style="padding-right:200px">Check that you have debt for December</h4>
        </div>
        <div class="modal-body">
          <p>
        <?php

           $sql1 = "SELECT username,monthlydue,submitdate,ispay,feedescription
           FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
           WHERE userid='$_SESSION[id]' AND monthlydue > 0 AND MONTHNAME(submitdate) = 'december' AND YEAR(submitdate) = YEAR(CURDATE())";
           $result = mysqli_query($dbconnection, $sql1);

    echo "<table border=\"3\" bordercolor=\"grey\" style=\"background-color:white\" width=\"20%\" cellpadding=\"6\" cellspacing=\"2\">";
    echo"<tr>";
echo"<td>User Name</td>";
    echo"<td>Monthly Debt</td>";
    echo"<td>Submit Date</td>";
    echo"<td>Payment Status</td>";
    echo"<td>Fee Description</td>";

    echo"</tr>";
     while ($row = mysqli_fetch_array($result)) { 
  echo "<tr>"; 
         echo "<td>". $row['username']. "</td>";
          echo "<td>". $row['monthlydue']. "</td>";
         echo "<td>". $row['submitdate']. "</td>";
          echo "<td>". $row['ispay']. "</td>";
          echo "<td>". $row['feedescription']. "</td>"; 
        echo "</tr>";
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

<div>
<?php
include "../config/userfooter.php";
?>
</div>

</body>
</html>
