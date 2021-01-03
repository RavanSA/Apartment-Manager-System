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
<html>
<head>
<title></title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>


.main-box {
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    margin-bottom: 30px;
}

</style>
</head>
<body style="background-color: #F5F5F5;">

<?php
include "../config/userheader.php";
?>
 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>How much spent on what</h2>
 </div></center>

<center>
<div style="width: 70%;">
<?php
                      
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "mydb";
                        $dbconnection = new mysqli($host, $user, $pass,$db);

                        $sql2 = "SELECT MAX(totaldebt) as totaldebt FROM   totaldebtyear WHERE YEAR(submitdate) = YEAR(CURDATE())";
                      $resultt = mysqli_query($dbconnection, $sql2);
                      $roww = mysqli_fetch_assoc($resultt);
                        $totaldebtt= $roww["totaldebt"]; 
                        $totaldebtt*=12;
                        echo "  <center><br>   
 <div class='container'>
  <div class='alert alert-info alert-dismissible' style='width: 50%'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    Annual apartment income is $totaldebtt TL
  </div>
</div>
</center>";

                    $sql = "SELECT * FROM expensedetails";

                    if($result = mysqli_query($dbconnection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped' style='width:60%'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Expenseid</th>";
                                        echo "<th>Expense Amount</th>";
                                        echo "<th>Details</th>";
                                        echo "<th>Expense Date</th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['expenseid'] . "</td>";
                                        echo "<td>" . $row['expenseamount'] . "</td>";
                                        echo "<td>" . $row['details'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";

                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<p><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                    mysqli_close($dbconnection);
                    ?>
                    </div>
                    </center>

<?php
include "../config/userfooter.php";
?>
    </body>
    
</html>