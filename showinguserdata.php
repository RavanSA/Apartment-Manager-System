
<?php
 session_start();
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
        .sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #343a40;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}
#footer-sec {
    background-color: #343a40;
    padding: 20px 50px;
    
    font-size: 12px;
}
.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: white;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #343a40;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #343a40;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}



    </style>
</head>
<body style="background-color: #F5F5F5;">


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<div> 
<div id="mySidebar" class="sidebar">
<div style="color:white; padding-left:100px;">


</div>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="registeringasadmin.php" style="font-size: 15px"> <i class="fas fa-user-plus"></i> Register Users</a>
  <hr>
  <a href="useraddfare.php" style="font-size: 15px"><i class="fas fa-money-check-alt"></i> Create monthly due for the user</a>
  <hr>
  <a href="showinguserdata.php" style="font-size: 15px"><i class="fas fa-database"></i> User profile information</a>
  <hr>
  <a href="trackingowndue.php" style="font-size: 15px"><i class="fas fa-money-bill-wave"></i> Who not pay their due</a>
  <hr>
  <a href="addotherexpenseuser.php" style="font-size: 15px"><i class="fas fa-file-invoice-dollar"></i>Add other expenses to the user</a>
  <hr>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

</script>



</div>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     <li class="nav-item" style="color: #FFFFFF;"> <b>ADMIN PANEL 
    </b>
     </li>
    </ul>
     <div style="padding-left:900px">
    <a href="HTMLPage2.php.php" style="color: white;"> <i class="fas fa-home"> HOME</i></a>
    </div>
    <div style="padding-left:30px">
   <a href="test.php" style="color: white;"> <i class="fas fa-sign-out-alt">LOGOUT</i></a>
    </div>
  </div>  
</nav>
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
  </div>
</div>
</center>
<center>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix"> 
                    </div>
                    <?php
                      
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "mydb";
                        $dbconnection = new mysqli($host, $user, $pass,$db);

                    $sql = "SELECT * FROM user";
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
                                            echo "<a href='deleteuserdata.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fas fa-user-times fas-2x'></span></a>";
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
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                    mysqli_close($dbconnection);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</center>
     <div id="footer-sec">
       <span style="color: white;">Apartment Manager System</span>
    </div>
    
</body>
</html>