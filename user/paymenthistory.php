<?php
session_start();
?>
<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:  ../error.php');
    exit;
}
?>
<?php  
 function tablefunc() {               
 ob_start();
                        $output = "";
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "mydb";
                        $dbconnection = new mysqli($host, $user, $pass,$db); 
      $sql = "SELECT * FROM userhistory where username = '$_SESSION[login_user]'";  
      $result = mysqli_query($dbconnection, $sql);  
      while($row = mysqli_fetch_array($result))  {       
      $output .= '<tr>  
                          <td>'.$row["transactionid"].'</td>  
                          <td>'.$row["username"].'</td>  
                          <td>'.$row["paidfee"].'</td>  
                          <td>'.$row["submitdate"].'</td>  
                     </tr>';  
      }  
      return $output;  
 }  
 if(isset($_POST["pdf"]))  {  
      require_once('../tcpdflibrary/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <table border="1" cellspacing="0" cellpadding="3" class="table table-bordered table-striped">  
           <tr>  
                               <th width="10%">Transaction ID</th>  
                               <th width="20%">Username</th>  
                               <th width="15%">Paid Fee</th>  
                               <th width="20%">Submit Date</th>
           </tr>  
      ';  
      $content .= tablefunc();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('transactiondocument.pdf', 'I');  
 }  
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
   .btn {
  background-color: #555;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

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


  </style>
      </head>  
      <body>  
<?php
include "../config/userheader.php";
?>

 <center><h1><i class="fas fa-hotel" style="font-size:40px"> 
 Apartment Manager System</i></h1><br>
 <h2>Payment History</h2>
 </div>
           <div class="container">  
                     <form method="post">  
                       <button class="btn" name="pdf" style="background-color:#343a40;"><span style="color:white;"><i class="fa fa-download"></i> Download as PDF</span></button></center>
                     </form>  
                     <table class="table table-bordered table-striped">  
                          <tr>  
                               <th width="2%">Transaction ID</th>  
                               <th width="2%">Username</th>  
                               <th width="2%">Paid Fee</th>  
                               <th width="2%">Submit Date</th>  
                               </tr>  
                     <?php  
                     echo tablefunc();  
                     ?>  
                     </table>  
                
           </div>  
           <br><br><br><br><br><br><br>
 <div style="margin-top: 0px auto">    
<?php
include "../config/userfooter.php";
?>
</div>

      </body>  
</html>