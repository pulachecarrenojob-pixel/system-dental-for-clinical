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
            <h1 class="page-header"><a href="index.php?view=add" class="btn btn-primary btn-md  ">  <i class="fa fa-plus-circle fw-fa"></i> Add New Service</a> </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 <div class="table-responsive">
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped table-bordered  table-hover  mytbl" style="font-size:12px" cellspacing="0"> 
							  <thead> 
						  	      <tr>
				                  <th>Services ID</th>
				                  <th>Tooth Number</th>
				                  <th>Services</th>
				                  <th>Description</th>
				                  <th>Price</th>   
				                  <th>Action</th>  
				                  </tr> 
							  </thead> 
							  <tbody>
							  	<?php   
// SELECT `SKU`, `ProductName`, `Description`, `OriginalPrice`, `MarkupPrice`, `Unit`, `SuplierID` FROM `tblproduct` WHERE 1
										 
							  		$sql ="SELECT * FROM `tblservices`";
					 
							  		$mydb->setQuery($sql);
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) {  
							  		echo '<tr>'; 
							  		echo '<td>'. $result->SKU.'</td>';
							  		echo '<td>'. $result->ToothNumber.'</td>';
							  		echo '<td>'. $result->Services.'</td>';
							  		echo '<td>' . $result->Description.'</a></td>';
							  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->OriginalPrice,2).'</td>';   
							  			echo '<td align="center" >   
					  		              <a title="Edit" href="index.php?view=edit&id='.$result->SKU.'"  class="btn btn-info btn-md  "><span class="fa fa-edit fw-fa"></span>Edit</a>  
					  		             <a title="Remove" href="controller.php?action=delete&id='.$result->SKU.'"  class="btn btn-danger btn-md  ">
					  		             <span class="fa fa-trash-o fw-fa"></span>Remove</a> 
					  					 </td>';
 
					  				// echo '<td align="center" >  
					  				// 	  <a title="Set Bulk Pricing" href="index.php?view=bulk&id='.$result->SKU.'"  class="btn btn-success btn-md  "><span class="fa fa-plus-circle fw-fa"></span> Bulk Pricing</a> 

					  		  //             <a title="Edit" href="index.php?view=edit&id='.$result->SKU.'"  class="btn btn-info btn-md  "><span class="fa fa-edit fw-fa"></span>Edit</a>  
					  		  //            <a title="Remove" href="controller.php?action=delete&id='.$result->SKU.'"  class="btn btn-danger btn-md  ">
					  		  //            <span class="fa fa-trash-o fw-fa"></span>Remove</a> 
					  				// 	 </td>';
							  		echo '</tr>';

							  		 
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
</div>							 
							</form>
       
                 
 