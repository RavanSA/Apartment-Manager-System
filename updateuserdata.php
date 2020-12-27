
<?php

 

$username = $email = $phonenumber = $blocktype = $apartnumber = $ifmoved = "";
$usernErr = $emailErr = $phonenErr = $blcktErr = $aptnErr = $ifmovErr = "";

  
     $host = "localhost";
     $user = "root";
     $pass = "";
     $db = "mydb";
     $dbconnection = new mysqli($host, $user, $pass,$db); 

if(isset($_POST["id"]) && !empty($_POST["id"])){
  
    $id = $_POST["id"];

       $username = trim($_POST["username"]);
       $email = trim($_POST["email"]);
       $phonenumber = trim($_POST["phonenumber"]);
        $blocktype = trim($_POST["blocktype"]);
    $apartnumber = trim($_POST["apartmentnumber"]);
    $ifmoved = trim($_POST["ifmoved"]);
    
        $sql = "UPDATE user SET username=?, email=?, phonenumber=?, blocktype=?, apartmentnumber=?, ifmoved=? WHERE id=?";
        if($stmt = mysqli_prepare($dbconnection, $sql)){

            mysqli_stmt_bind_param($stmt, "ssssssi", $param_name, $param_email, $param_phone, $param_blck, $param_aptn, $param_move, $param_id,);

            $param_name = $username;
            $param_email = $email;
            $param_phone = $phonenumber;
            $param_blck = $blocktype;
            $param_aptn = $apartnumber;
            $param_move = $ifmoved;
            $param_id = $id;
            

            if(mysqli_stmt_execute($stmt)){
 
                header("location: showinguserdata.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    

    mysqli_close($dbconnection);
} else{

    if(isset($_GET["id"])){

        $id =  trim($_GET["id"]);
 
        $sql = "SELECT * FROM user WHERE id = ?";
        if($stmt = mysqli_prepare($dbconnection, $sql)){
    
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    
                    $username = $row["username"];
                    $email= $row["email"];
                    $phonenumber = $row["phonenumber"];
                     $blocktype= $row["blocktype"];
                    $apartnumber = $row["apartmentnumber"];
                    $ifmoved = $row["ifmoved"];

                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($dbconnection);
    }  else{
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($usernErr)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $usernErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($emailErr)) ? 'has-error' : ''; ?>">
                            <label>E-mail</label>
                            <textarea name="email" class="form-control"><?php echo $email; ?></textarea>
                            <span class="help-block"><?php echo $emailErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty( $phonenErr)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="text" name="phonenumber" class="form-control" value="<?php echo $phonenumber; ?>">
                            <span class="help-block"><?php echo  $phonenErr;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty( $blcktErr)) ? 'has-error' : ''; ?>">
                            <label>Block Type</label>
                            <input type="text" name="blocktype" class="form-control" value="<?php echo $blocktype; ?>">
                            <span class="help-block"><?php echo  $blcktErr;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty( $aptnErr)) ? 'has-error' : ''; ?>">
                            <label>Apartment Number</label>
                            <input type="text" name="apartmentnumber" class="form-control" value="<?php echo $apartnumber; ?>">
                            <span class="help-block"><?php echo  $aptnErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty( $ifmovErr)) ? 'has-error' : ''; ?>">
                            <label>Living İnformation</label>
                            <input type="text" name="ifmoved" class="form-control" value="<?php echo $ifmoved; ?>">
                            <span class="help-block"><?php echo  $ifmovErr;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="showinguserdata.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>


                    <div id="footer-sec">
       <span style="color: white;">Apartment Manager System</span>
    </div>
</body>
</html>