<?php require_once("../include/initialize.php");


  $invno = isset($_GET['id']) ? $_GET['id'] : "";    

 header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' .Date('Y-m-d').'-' .$invno.'-Invoice.xls');

# code...

$sql = "SELECT * FROM `tblinvoice`  WHERE  `InvoiceNo`='{$invno}'";
$mydb->setQuery($sql);
$inv = $mydb->loadResultList();
foreach ($inv as $result) {
  # code...
  $pid = $result->SKU;
  $product = $result->Services;
  $price = $result->Price;
  $q = $result->ToothNumber;
  $subtotal = $result->SubTotal;
  $taxrate =0;
  $discountrate=0;
  
}

 
$sql = "SELECT * FROM `tblpayments` WHERE  InvoiceNo='{$invno}'";
$mydb->setQuery($sql);
$payment = $mydb->loadSingleResult(); 
 $Patients = $payment->Patients;

$DateInvoiced = date_format(date_create($payment->InvoiceDate),"m/d/Y");
$DueDate = date_format(date_create($payment->DateDue),"m/d/Y");

// $sql ="SELECT * FROM `tblclient` WHERE  `ClientID`=".$payment->ClientID;
//  $mydb->setQuery($sql);
//  $res = $mydb->executeQuery();
//  $max = $mydb->num_rows($res);
//  if ($max >0) {
//   # code...
//    $row = $mydb->loadSingleResult(); 
//    $Patients = $row->Fullname;
//    $company = $row->CompanyName;
//    $address = $row->S_Address;
//    $phone = $row->ContactNo;
//  }else{
//    $Patients = 'None';
//    $company =  'None';
//    $address =  'None';
//    $phone =  'None';
//  }
?>    
   <?php
  $sql = "SELECT * FROM `tblprintheader`";
      $mydb->setQuery($sql);
      $cur = $mydb->executeQuery(); 
      @$heads = $mydb->loadSingleResult();

  ?> 
  <style type="text/css">
      
.firstline {
  text-align: center;
  font-size: 20px;
  font-weight: bolder;
  text-transform: uppercase;
}

.secondline{
  text-align: center;
  font-size: 8px;
  font-weight: bolder;
  text-transform: uppercase;
}

.thirdline{
  text-align: center;
  font-size: 8px;
  font-weight: bolder;
  text-transform: uppercase;

}

 </style>   
<div class="col-md-12" style="margin-top: 40px">
  <div class="firstline"><?php echo isset($heads->FirstLine) ? $heads->FirstLine : "None" ?></div>
  <div class="secondline"><?php echo isset($heads->SecondLine) ? $heads->SecondLine : "None" ?></div>
  <div class="thirdline"><?php echo isset($heads->ThirdLine) ? $heads->ThirdLine : "None" ?></div>
</div>
 <hr>
 <table>
     <tr>
         <td><table class="table-client">
    <tr>
      <td>Client Name</td>
      <td> <?php echo $Patients; ?></td>
    </tr>
    <!-- <tr>
      <td>Company</td>
      <td><?php echo $company; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td> <?php echo $address; ?></td>
    </tr>
    <tr>
      <td>Phone #</td>
      <td align="left"><?php echo $phone; ?></td>
    </tr> -->
  </table> </td>  
         <td><table class="table-client" >
    <tr>
      <td colspan="2">Invoice Number</td>
      <td> <?php echo $invno; ?></td>
    </tr>
    <tr>
      <td colspan="2">Date Invoiced</td>
      <td><?php echo $DateInvoiced; ?></td>
    </tr>
    <tr>
      <td colspan="2">Due Date</td>
      <td> <?php echo $DueDate; ?></td>
    </tr> 
  </table>  </td>
     </tr>
 </table> 

    
  <table id="table_search"  border="1" class="table table-bordered table-hover table-responsive e"  style="font-size:12px;" cellspacing="0" > 
            <thead>   
            <th width="12%">Tooth Number</th>  
            <th width="90%">Services</th> 
            <th width="10%">Price</th>  
            <!-- <th width="15%">Line Total</th>  -->
        </thead>
        <tbody> 

        <?php
            $totalamount = 0;
            $totaldiscount=0;
            $subtotal = 0;
            $totaltax=0;

            $sql = "SELECT * FROM `tblinvoice`  WHERE  `InvoiceNo`='{$invno}'";
            $mydb->setQuery($sql);
            $inv = $mydb->loadResultList();

            foreach ($inv as $result) {
              # code...
              $pid = $result->SKU;
              $product = $result->Services;
              $price = $result->Price;
              $q = $result->ToothNumber;
              $linetotal = $result->SubTotal; 
              $discountrate=0;  

              // echo '<tr>  
              //           <td>'.$q.'</td> 
              //           <td>'.$product.'</td>
              //           <td>'.$setDefault->default_currency(). ' '.number_format($price,2).' </td> 
              //           <td>'.$setDefault->default_currency(). ' '.number_format($linetotal,2).'</td>
                        
              //        </tr>';
                        echo '<tr>  
                        <td>'.$q.'</td> 
                        <td>'.$product.'</td>
                        <td>'.$setDefault->default_currency(). ' '.number_format($price,2).' </td>  
                        
                     </tr>';
                $subtotal += $linetotal;
                
                 // $totaldiscount += ($_SESSION['admin_gcCart'][$i]['discountrate'] / 100) * $_SESSION['admin_gcCart'][$i]['subtotal'];

                 // $totalamount += $linetotal - $totaldiscount; 
                $totalamount += $price;
            }


            ?>
        
            </tbody>
        </table>  

       <table class="table-summary">
 
                <tr> 
                    <td colspan=""></td>
                    <td colspan="">Total Amount</td>
                    <td class="right"><?php echo $setDefault->default_currency(); ?> <span style="color: red;font-size:25px;"><?php echo number_format($totalamount,2); ?> </span> </td>
                </tr> 
            </table>

            <?php
  $sql = "SELECT * FROM `tblprintfooter`";
      $mydb->setQuery($sql);
      $cur = $mydb->executeQuery(); 
      @$heads = $mydb->loadSingleResult();

  ?>
 <hr> 
<div class="container">
  <div style="text-transform: uppercase;text-align: center;font-size: 12px"><?php echo isset($heads->FirstLine) ? $heads->FirstLine : "None" ?></div>
  <div style="text-transform: uppercase;text-align: center;font-size: 12px"><?php echo isset($heads->SecondLine) ? $heads->SecondLine : "None" ?></div>
  <div style="text-transform: uppercase;text-align: center;font-size: 12px"><?php echo isset($heads->ThirdLine) ? $heads->ThirdLine : "None" ?></div>
</div> 