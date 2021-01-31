
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        #footer {
   position:fixed;
   left:0px;
   bottom:0px;
   height:30px;
   width:100%;
}
* html #footer {
   position:absolute;
   top:expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
}
       
    </style>
</head>
<body style="background-color: #F5F5F5;">

<?php
include "../config/header.php";
                      
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "mydb";
                        $dbconnection = new mysqli($host, $user, $pass,$db);
?>
<br> <br>
 <center><h1><i class="far fa-building" style="font-size:40px"> 
 Apartment Manager</i></h1><br> 
 <h2>User Information</h2>
</center>
 <center><br>   
 <div class="container" style="padding-left:230px;">
  <div class="alert alert-info alert-dismissible" style="width: 93%;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Read before taking any action!</strong> This section is used for track user information.
    If the "Moved Date" column shows "0000-00-00" or empty, it means the resident <strong> not moved </strong>.
    Otherwise, the resident moved out of the apartment. To see old users <a data-toggle="modal" href="#myModal"> click here</a>
  </div>
</div>
</center>
<div class="container">
<div class="modal fade bd-example-modal-lg" id ="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h4 class="modal-title" style="padding-right:200px">Old Users</h4>
        </div>
        <div class="modal-body">
          <p>
                      <?php


$sql1 = "SELECT * FROM user WHERE moveddate IS NOT NULL OR moveddate <> '0000-00-00'";  
$resultt = mysqli_query($dbconnection, $sql1);
           echo "";
       echo "<table border=\"1\" bordercolor=\"grey\" style=\"background-color:white;width:30%;\"  cellpadding=\"2\" cellspacing=\"1\">";
    echo"<tr>";
                                            echo "<th>Username</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Phone Number</th>";
                                        echo "<th>Block Type</th>";
                                        echo "<th>Apartment Number</th>";
                                        echo "<th>Start Date</th>";
                                        echo "<th>End Date</th>";
                                        echo "<th>Delete</th>";

    echo"</tr>";
     while ($roww = mysqli_fetch_array($resultt)) { 
echo"<tr>"; 
          echo "<td>". $roww['username'] ."</td>";
          echo "<td>". $roww['email'] ."</td>";
          echo "<td>". $roww['phonenumber'] ."</td>";
          echo "<td>". $roww['blocktype'] ."</td>";
          echo "<td>". $roww['apartmentnumber'] ."</td>";
          echo "<td>". $roww['dstart'] ."</td>";
          echo "<td>". $roww['moveddate'] ."</td>";
                                                 echo "<td>";
                                            echo "<a href='deleteuserdata.php?id=". $roww['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fas fa-user-times fas-2x'></span></a>";
                                        echo "</td>";
            
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
<center>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix"> 
                    </div>
                    <?php


                    $sql = "SELECT * FROM user WHERE moveddate IS NULL OR moveddate='0000-00-00' ";
                    if($result = mysqli_query($dbconnection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th>Username</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Phone Number</th>";
                                        echo "<th>Block Type</th>";
                                        echo "<th>Apartment Number</th>";
                                        echo "<th>Moved in</th>";
                                        echo "<th>If moved</th>";
                                        echo "<th>Update, Delete</th>";
                                       

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phonenumber'] . "</td>";
                                        echo "<td>" . $row['blocktype'] . "</td>";
                                        echo "<td>" . $row['apartmentnumber'] . "</td>";
                                        echo "<td>" . $row['dstart'] . "</td>";

                                        echo "<td>" . $row['ifmoved'] . "</td>";

                                       echo "<td>";
                                         echo "<a href='updateuserdata.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fas fa-pencil-alt fas-2x'></span></a>";
                                        echo "</td>";
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<p><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute  " ;
                    }
                    mysqli_close($dbconnection);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</center>

<br><br><br>
<footer id="footer">
<?php
include "../config/footer.php";
?>
</footer>

</body>
</html>
