<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }

?> 
<style type="text/css">
	.table {
		white-space: nowrap;
	}
</style>
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">List of Products   <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Register New Product</a> </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 <div class="table-responsive">
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped table-bordered  table-hover  mytbl" style="font-size:12px" cellspacing="0"> 
							  <thead> 
						  	      <tr>
				                  <th>Product ID</th>
				                  <th>Product</th>
				                  <th>Description</th>
				                  <th>Supplier Cost</th>
				                  <th>Markup Price</th>
				                  <th>Unit</th> 
				                  <th>TaxRate</th> 
				                  <th>Supplier</th> 
				                  <th>Supplier Deal</th> 
				                  <th>Supplier Notes</th>  
				                  <th>Action</th>  
				                  </tr> 
							  </thead> 
							  <tbody>
							  	<?php   
// SELECT `SKU`, `ProductName`, `Description`, `OriginalPrice`, `MarkupPrice`, `Unit`, `SuplierID` FROM `tblproduct` WHERE 1
										 
							  		$sql ="SELECT * FROM `tblproduct`";
					 
							  		$mydb->setQuery($sql);
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) {  
							  		echo '<tr>'; 
							  		echo '<td>'. $result->SKU.'</td>';
							  		echo '<td>'. $result->ProductName.'</td>';
							  		echo '<td>' . $result->Description.'</a></td>';
							  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->OriginalPrice,2).'</td>'; 
							  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->MarkupPrice,2).'</td>'; 
							  		echo '<td>'. $result->Unit.'</td>';  
							  		echo '<td>'. $result->TaxRate.'%</td>';  
							  		echo '<td>'. $result->Suplier.'</td>';  
							  		echo '<td>'. $result->SupplierDeal.'</td>'; 
							  		echo '<td>'. $result->SupplierNotes.'</td>';  
 
					  				echo '<td align="center" >  
					  					  <a title="Set Bulk Pricing" href="index.php?view=bulk&id='.$result->SKU.'"  class="btn btn-success btn-xs  "><span class="fa fa-plus-circle fw-fa"></span> Bulk Pricing</a> 

					  		              <a title="Edit" href="index.php?view=edit&id='.$result->SKU.'"  class="btn btn-info btn-xs  "><span class="fa fa-edit fw-fa"></span>Edit</a>  
					  		             <a title="Remove" href="controller.php?action=delete&id='.$result->SKU.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span>Remove</a> 
					  					 </td>';
							  		echo '</tr>';

							  		 
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
</div>							 
							</form>
       
                 
 