<?php 
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."index.php");
     } 

  unset($_SESSION['admin_gcCart']);

 $invno = isset($_GET['id']) ? $_GET['id'] : "";    

if ($invno=="") { 
   redirect("index.php");
} 

$sql = "SELECT * FROM `tblinvoice`  WHERE `InvoiceNo`='{$invno}'";
$mydb->setQuery($sql);
$inv = $mydb->loadResultList();
foreach ($inv as $result) {
  # code...
  $pid = $result->SKU;
  $product = $result->Services;
  $price = $result->Price;
  $q = $result->QTY;
  $subtotal = $result->SubTotal;
  $taxrate = 0;
  $discountrate=0;
  $toothnumber = $result->ToothNumber;

  admin_addtocart($pid,$toothnumber,$product,$price,$q,$subtotal,$taxrate,$discountrate);
 
 
}

$sql = "SELECT * FROM `tblpayments` WHERE Class='Invoice' AND InvoiceNo='{$invno}'";
$mydb->setQuery($sql);
$payment = $mydb->loadSingleResult();
 $Patients = $payment->Patients;

$DateInvoiced = date_format(date_create($payment->InvoiceDate),"m/d/Y");
$DueDate = date_format(date_create($payment->DateDue),"m/d/Y");

?>
 <style type="text/css">
  .table-summary {
    width: 100%; 
    font-size: 15px;
    font-weight: bold;
  }
  .table-summary tr td {
    border-bottom: 1px solid #ddd;
    padding: 10px 0px 0px 0px;
  }
  .right {
    text-align: right;
  }
 
  #loading-client {
    display: none;
    /*visibility: hidden;*/
  }


  .header  {
    display: inline-block;
  }

@media print {
  @page { size 8.5in 11in; margin: -30px 0px 1cm 0px; }
  body { margin: 0cm;border: 0px;} 

  .tables{
    font-size: 11px;

  }
  .tables tr td {
    padding: 0px 0px 0px 10px;
    margin:0px;
  }
 
 thead {
  display: table-header-group;
 }
 .page-break {
  /*page-break-after:  always;*/
   page-break-before: always;
  break-before: always;
 }

 .tables tr:nth-child(even) {
    background-color: #f2f2f2 !important;
    -webkit-print-color-adjust: exact; 
  }
/*  td:nth-child(even) {
    background-color: blue !important;
    -webkit-print-color-adjust: exact; 
  }*/

 
}

 
 
.tables {
  font-size: 11px;
  width: 100%; 
}

.tables tr th {
  padding: 10px;
  border-bottom: 1px #ddd solid;
}
 .tables tbody {
     border-bottom: 1px #ddd solid;
  }
@media screen {

  .tables tr td {
    padding: 10px;

  }
}
  
.firstline {
  text-align: center;
  font-size: 20px;
  font-weight: bolder;
  text-transform: uppercase;
}

.secondline{
  text-align: center;
  font-size: 12px;
  font-weight: bolder;
  text-transform: uppercase;
}

.thirdline{
  text-align: center;
  font-size: 12px;
  font-weight: bolder;
  text-transform: uppercase;

}

.clearfix:after {
   content: " "; /* Older browser do not support empty content */
   visibility: hidden;
   display: block;
   height: 0;
   clear: both;
}
 </style>  
<div class="col-md-12 no-print"> 
  <div class="">
  <button  type="button" onclick="print_invoice()" name="save" class="btn btn-primary"><i class="fa fa-print"></i> PRINT</button> 
  <a  href="export.php?id=<?php echo $invno ?>" name="save" class="btn btn-primary"><i class="fa fa-upload"></i> Export to Excel</a> 
  </div>
</div>  

<?php
  $sql = "SELECT * FROM `tblprintheader`";
      $mydb->setQuery($sql);
      $cur = $mydb->executeQuery(); 
      @$heads = $mydb->loadSingleResult();

  ?>
<div id="p">
<div class="col-md-12" style="margin-top: 40px">
  <div class="firstline"><?php echo isset($heads->FirstLine) ? $heads->FirstLine : "None" ?></div>
  <div class="secondline"><?php echo isset($heads->SecondLine) ? $heads->SecondLine : "None" ?></div>
  <div class="thirdline"><?php echo isset($heads->ThirdLine) ? $heads->ThirdLine : "None" ?></div>
</div>
 <hr>

<?php 
// $sql = "SELECT * FROM `tblpayments` WHERE Class='Invoice' AND InvoiceNo = '{$invno}'";
// $mydb->setQuery($sql);
// $cur = $mydb->loadSingleResult(); 

// $sql ="SELECT * FROM `tblclient` WHERE  `ClientID`=".$cur->ClientID;
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
<style type="text/css"> 
   .table-client {
    width: 100%;  
  }
  .table-client tr td {
    border-bottom: 1px solid #ddd;
    padding: 5px 3px 5px 3px;
  }
#tablecontiner {
  width: 100%;
}
#tablecontiner tr td {
  padding:0px 5px;
}
 

</style>
 <!-- <p>Bill to :</p>  -->
<div class="col-md-6 col-sm-6 col-xs-6 pull-left">
  <table class="table-client">
    <tr>
      <td>Patient Name</td>
      <td> <?php echo $Patients; ?></td>
    </tr>
   <!--  <tr>
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
  </table>
</div>

<div class="col-md-6 col-sm-6 col-xs-6 pull-rigt">
  <table class="table-client" >
    <tr style="margin-top: -20px">
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
  </table>
</div> 
<!-- end bill toi -->


 <!-- <h4>Product Details</h4> -->
 
 
 
   <?php
      $from = 0;
      $to = 40;
      productList($invno,$from,$to); 
    ?>
 
 
  

<!-- end products -->



<!-- summary calculation -->
<?php
    $totalamount = 0; 
    $subtotal = 0;
    $totaltax=0;
    $taxrate=0;

    $sql = "SELECT * FROM `tblinvoice` 
            WHERE `InvoiceNo`='{$invno}'";
    $mydb->setQuery($sql);
    $inv = $mydb->loadResultList();
    foreach ($inv as $result) {
      # code... 
      $linetotal = $result->SubTotal; 


      $subtotal += $linetotal; 
      $totalamount += $result->Price; 
    }

?>


 <div class="row"> 
   <div class="table-responsive">   
	 	<div class="col-md-6 pull-right">
	 		<table class="table-summary" style="font-size: 12px"> 
	 			<tr> 
	 				<td id="summary-name" width="18%">Total</td>
	 				<td class="right"><?php echo $setDefault->default_currency(); ?> <span style="color: red;font-size:12px;"><?php echo number_format($totalamount,2); ?> </span> </td>
	 			</tr> 
	 		</table>
	 	</div> 
   </div>  
 </div>
</div>
<!-- end summary -->

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


 <?php
  include("addModal.php");
 ?>

<script> 
  function print_invoice(){ 
    window.print(); 
    
  } 
</script> 


  <?php  
    function productList($invno,$from,$to){ 
    global $mydb;
    global $setDefault;
  ?> 
   <table class="tables"  >
    <thead>  
      <tr>
        <th width="12%">Tooth Number</th>  
        <th>Services</th> 
        <th width="18%">Price</th>  
        <!-- <th width="18%" class="right">Line Total</th>   -->
      </tr> 
    </thead>
    <tbody >
      <?php  
      $count =1;
      $sql = "SELECT * FROM `tblinvoice`  
              WHERE  `InvoiceNo`='{$invno}' LIMIT $from,$to";
      $mydb->setQuery($sql);
      $inv = $mydb->loadResultList();
      $TotalNoOfRecords = count($inv);
      foreach ($inv as $result) {
        # code...
        $pid = $result->SKU;
        $product = $result->Services ;
        $price = $result->Price;
        $q = $result->ToothNumber;
        $linetotal = $result->SubTotal; 
        $discountrate=0; 
 

        // break page after 6 rows
        // if($count % 20 == 0 && $count != $TotalNoOfRecords)
        // {
        //     echo '<tr >'; 
        //     echo '<td><div class="page-break"></div'.$q.' | '.$result->Unit.'</td> 
        //     <td>'.$product.'</td>
        //     <td>'.$setDefault->default_currency(). ' '.number_format($price,2).' </td>
        //     <td>'.$checkbox.'</td>
        //     <td class="right" >'.$setDefault->default_currency(). ' '.number_format($linetotal,2).'</td> 
        //    </tr>'; 
        

        // }else{
              echo '<tr>';
            echo '<td>'.$q.'</td>';
            echo '<td>'.$product.'</td>';
            echo '<td>'.$setDefault->default_currency(). ' '.number_format($price,2).' </td>'; 
            // echo '<td class="right" >'.$setDefault->default_currency(). ' '.number_format($linetotal,2).'</td>';
            
           echo '</tr>'; 

        // }

         
      // $count++;

     

}
      ?>
       
    </tbody>   
  </table>  

 <?php } ?>
</div>
