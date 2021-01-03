<?php
session_start();

if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:  ../error.php');
    exit;
}

include "../config/userheader.php";
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
 body{
         overflow: hidden;
  }
        table tr td:last-child a{
            margin-right: 15px;
        }


  </style>
      </head>  
      <body>  

      <br><br>
 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Payment History</h2>
 </div>           


 <br>
<?php  
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "mydb";
                        $dbconnection = new mysqli($host, $user, $pass,$db); 
      $sql = "SELECT * FROM otherexpenseshistory where username = '$_SESSION[login_user]'";  
if($result = mysqli_query($dbconnection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped' style='width: 50%;'>";
                                echo "<thead>";
                                    echo "<tr>";         
                                        echo "<th>Username</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Phone Number</th>";
                                        echo "<th>Block Type</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['transactionid'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['paidfee'] . "</td>";
                                        echo "<td>" . $row['submitdate'] . "</td>";
                                      echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<p><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute ";
                    }

 ?>  

 <div style="margin:254px auto;">
<?php
include "../config/userfooter.php";
?>
</div>
       </body>  
</html>