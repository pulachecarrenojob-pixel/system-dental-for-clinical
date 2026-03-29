<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."index.php");

     }  
unset($_SESSION['admin_gcCart']);
unset($_SESSION['Patients']); 
unset($_SESSION['invno']);


$autonum = New Autonumber();
$res = $autonum->set_autonumber('INVOICENO');
$invno = $res->AUTO;

?>

<style type="text/css">
	#stretch a > img{
		width: 100%;
		/*height: 20px;*/
	}
</style>
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header"><a href="index.php?view=add&invno=<?php echo $invno;?>" id="createinvoice" class="btn btn-primary btn-md  ">  <i class="fa fa-plus-circle fw-fa"></i> Create New Invoice</a>
            <!-- 	<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modaladdinvoice">
				  Launch demo modal
				</button> --> 
  			</h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
		<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
			  <div class="table-responsive">					
				<table id="dash-tables" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr> 
				  	<th>Invoice Number</th> 
					<th>Patient</th> 
				  	<th>Date</th> 
					<th>Due Date</th>  
					<th>TotalAmount</th> 
					<th>Status</th> 
					<th width="14%" >Action</th> 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
 

				  	if ($_SESSION['ADMIN_ROLE']=='Administrator') {
				  		# code...
				  		$sql = "SELECT * FROM `tblpayments` WHERE Class='Invoice' ORDER BY PaymentID Desc";
				  	}else{
				  		$sql = "SELECT * FROM  `tblpayments`  WHERE  date(`InvoiceDate`) = date(now()) AND UserID='".$_SESSION['ADMIN_USERID']."' AND Class='Invoice' ORDER BY PaymentID Desc";
				  	}

 

				  		$mydb->setQuery($sql);
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {

							if ($result->Patients == "") {
								# code...
								$Patients = "None";
							}else{
								$Patients = $result->Patients;
							}

							if ($result->Status=="") {
								# code...
								$status = "Pending";
							}else{
								$status = "Paid";
							}
 

					  		echo '<tr>'; 
							echo '<td>'. $result->InvoiceNo.'</td>'; 
							echo '<td>'. $Patients.'</td>';
							echo '<td>'. $result->InvoiceDate.'</td>';
							echo '<td>'. $result->DateDue.'</td>';    
							echo '<td>'.$setDefault->default_currency(). ' '. number_format($result->TotalAmount,2).'</td>';  
							echo '<td>'. $status.'</td>';

							if ($_SESSION['ADMIN_ROLE']=='Administrator') {
								# code...
								if ($status=='Pending') {
									# code...
										echo '<td> 
									<a href="controller.php?action=payemnt&id='. $result->InvoiceNo.'" class="btn btn-md btn-success"><i class="fa fa-money"></i> Payment</a>
									<a href="index.php?view=view&id='. $result->InvoiceNo.'" class="btn btn-md btn-info"><i class="fa fa-info"></i> View</a>
									<a href="index.php?view=add&invno='. $result->InvoiceNo.'" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
									<a href="controller.php?action=delete&id='. $result->InvoiceNo.'" class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Delete</a></td>'; 
								}else{
										echo '<td>  
									<a href="index.php?view=view&id='. $result->InvoiceNo.'" class="btn btn-md btn-info"><i class="fa fa-info"></i> View</a>
									<a href="index.php?view=add&invno='. $result->InvoiceNo.'" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
									<a href="controller.php?action=delete&id='. $result->InvoiceNo.'" class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Delete</a></td>'; 
								}
								
							}else{
								if ($status=='Pending') {
									# code...
										echo '<td>  
											<a href="index.php?view=view&id='. $result->InvoiceNo.'" class="btn btn-md btn-info"><i class="fa fa-info"></i> View</a>
											<a href="index.php?view=add&invno='. $result->InvoiceNo.'" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
											<a href="controller.php?action=delete&id='. $result->InvoiceNo.'" class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Delete</a></td>'; 
								}else{
										echo '<td>  
									<a href="index.php?view=view&id='. $result->InvoiceNo.'" class="btn btn-md btn-info"><i class="fa fa-info"></i> View</a>'; 
								}
							}
						
							echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			</div>
 
							 
							</form> 
