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
      $sql = "SELECT user.username, feestransaction.submitdate, feestransaction.ispay,feestransaction.paiddate,
      feestransaction.feedescription
FROM feestransaction LEFT JOIN user ON feestransaction.userid= user.id
WHERE feestransaction.userid = user.id and ispay='PAID' and userid='$_SESSION[id]' ORDER BY submitdate DESC ";  
      $result = mysqli_query($dbconnection, $sql);  
      while($row = mysqli_fetch_array($result))  {       
      $output .= '<tr>  
                          <td>'.$row["username"].'</td>  
                            
                          <td>'.$row["submitdate"].'</td>  
                          <td>'.$row["ispay"].'</td>  
                          <td>'.$row["paiddate"].'</td>  
                          <td>'.$row["feedescription"].'</td>  
                     </tr>';  
      }  
      return $output;  
 }  
      require_once('../tcpdflibrary/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->SetTitle('Deluxe Apartments - Your Payment History');
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
            <h2 align="center">Deluxe Apartments <br> Your Payment History</h2><br /> 
            
      <table border="1" cellspacing="1" cellpadding="3" class="table table-bordered table-striped">  
           <tr>  
                               <th width="10%">Username</th>  
                               <th width="15%">Date of Due</th>  
                               <th width="20%">Payment Status</th>
                               <th width="20%">Paid Date</th>
                               <th width="20%">Fee Description</th>
           </tr>  
      ';  
      $content .= tablefunc();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('transactiondocument.pdf', 'I');  
  ?>  
