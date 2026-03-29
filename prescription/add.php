<?php 
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."index.php");
     } 
unset($_SESSION['Patients']); 
unset($_SESSION['invno']);
unset($_SESSION['admin_gcCart']);


  
	  // $autonum = New Autonumber();
	  // $INV = $autonum->set_autonumber('INVOICENO');

 $invno = isset($_GET['invno']) ? $_GET['invno'] : "";

$_SESSION['invno'] =  $invno;

 if ($invno=="") {
 	# code...
 	 redirect("index.php");
 }



		$TotalQTY =0;
		$TotalTax  =0;
		$TotalAmount  =0;

		// $autonum = New Autonumber();
		// $res = $autonum->set_autonumber('INVOICENO');
		// $invno = $res->AUTO;
		  

		$sql = "SELECT * FROM tblpayments WHERE InvoiceNo='{$invno}'";
		$mydb->setQuery($sql); 
		$res = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($res);

		$maxrow;

		if ($maxrow == 0) {
			# code...

			$UserID = $_SESSION['ADMIN_USERID'];


			$sql = "INSERT INTO tblpayments (InvoiceDate,DateDue,InvoiceNo, TotalQTY, TotalAmount, Patients, UserID,Class)  VALUES(NOW(),NOW(),'{$invno}','{$TotalQTY}','{$TotalAmount}','NONE','{$UserID}','Invoice')";
			$mydb->setQuery($sql);
			$mydb->executeQuery();


			$autonum = New Autonumber(); 
			$autonum->auto_update('INVOICENO');

		}


			$sql = "SELECT * FROM tblpayments WHERE InvoiceNo='{$invno}'";
			$mydb->setQuery($sql);
		    $res = $mydb->loadSingleResult();

			if ($res->Patients != "") {
				# code...
				$_SESSION['Patients'] = $res->Patients;
			} 


if (empty($_SESSION['admin_gcCart'])){   
 
		$sql = "SELECT * FROM tblinvoice i,tblservices p WHERE   i.SKU=p.SKU  AND InvoiceNo='{$invno}'";
		$mydb->setQuery($sql);
		$row = $mydb->executeQuery();
		$max = $mydb->num_rows($row);

		if ($max > 0) {
			# code... 
			$row = $mydb->loadResultList(); 
			foreach ($row as $result) {
				# code...
				$pid = $result->SKU;
				$toothnumber=$result->ToothNumber;
				$product=$result->Services;
				$price=$result->Price;
				$q=$result->QTY;
				$subtotal=$result->SubTotal;
				$taxrate=0;
				$discountrate=0; 
			   	admin_addtocart($pid,$toothnumber,$product,$price,$q,$subtotal,$taxrate,$discountrate);
			}

				
		}


}



         

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

#loading-client img{
	width: 100%;
	height: 150px;
}

 </style>
<?php 
 // if(isset($_POST['save'])){
 // 	echo "<script>alert(".$_POST['ClientID'].")</script>";
 // }
 ?>
 	 <style type="text/css">
  .search { 
    margin-bottom: 10px; 
  }

  .search label, 
  .search input, 
  .search a{
      display: inline-block;
    }
  .search input{
    width: 300px;
  }


</style> 
<!-- <form action="controller.php?action=add" method="POST"> -->
<div id="loading-client" class="col-md-12" style="text-align: center;">
  	<p><img  src="<?php echo web_root;?>dist/img/loading2.gif" /> Please Wait</p>
</div>

<div id="invoicing-body">
 <div class="row">
 	<div class="col-md-6">
 		<div class="col-md-12"> 
 			<div id="searchclient">
 				
 			</div>   
 		</div>
 	</div>
 	<div class="col-md-6">
 		<div class="col-md-12">
 			<label>Invoice # : </label> 
	 		<div> 
	 			<input type="text" name="InvoiceNo" id="InvoiceNo" value="<?php echo $invno;?>" readonly="true" class="form-control">
	 		</div>
	 		<label>Invoice Date : </label> 
	 		<div> 
		 		 <div class="input-group date  " data-provide="datepicker" data-date="2012-12-21T15:25:00Z">
					<input type="input" class="form-control input-sm date_picker date_inv" id="DateInvoiced" name="DateInvoiced" placeholder="mm/dd/yyyy"   autocomplete="off" required value="<?php echo date_format(date_create($res->InvoiceDate),'m/d/Y');?>" /> 
					<span class="input-group-addon"><i class="fa fa-th"></i></span>
				</div>
	 		</div>
	 		 <label>Due Date : </label> 
	 		<div> 
		 		 <div class="input-group date  " data-provide="datepicker" data-date="2012-12-21T15:25:00Z">
					<input type="input" class="form-control input-sm date_picker date_inv" id="DueDate" name="DueDate" placeholder="mm/dd/yyyy"   autocomplete="off" required value="<?php echo date_format(date_create($res->DateDue),'m/d/Y');?>" /> 
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
	 		</div>
 		</div>
 	</div>
 </div> 
 <div class="row">
 	<div class="col-md-12" style="margin-top: 9px">
 	 <div class="col-md-12 table-responsive">
 	 <div class="autocomplete search">
 	 	 <label>Find Services</label>
 	 	  <input type="text" name="SKU" id="SKU" class="form-control" placeholder="Input the first letter.." autocomplete="off">   <a href="#" class="btn btn-md btn-primary" id="addtoinvoice" name="addinvoice">Add to Invoice</a>
 	 	  <a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalproducts">List of Services</a>
 	 </div>  
 	 <div id="loadcart">
 	 	
 	 </div>
	 	

	 </div>
 	</div>
 </div>
</div>
<div class="col-md-12">
	<a  href="printinvoice.php?id=<?php echo $invno;?>" class="btn btn-lg btn-primary"><i class="fa fa-print"></i> Preview Print</a> 
</div>
</form>
 <?php
  include("addModal.php");
  include("modalsearchproduct.php");
 ?>

<script type="text/javascript">
	 	  $(function(){
     $('.select2').select2();
  }); 

</script>
