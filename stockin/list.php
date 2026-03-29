<?php 
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header"><a href="index.php?view=add" class="btn btn-primary btn-md  ">  <i class="fa fa-plus-circle fw-fa"></i> Add Product</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr> 
				  		<th>ProductID</th> 
				  		<th>Products</th> 
				  		<!-- <th>Brand</th>  -->
				  		<th>Category</th> 
				  		<th>Stocks</th>  
				  		<th>Sold</th>  
				  		<th>Remaining</th> 
				  		<!-- <th>Status</th> 
				  		<th>Remarks</th>  -->

				  		 <th width="5%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	$bal=0;
				  	// SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, `Stocks`, `DateReceived`, `Sold`, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remark`, `Status` FROM `tblstocks` GROUP BY CONCAT(`Products`, `Brand`, `Category`)
				  		$mydb->setQuery("SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, sum(`Stocks`) as ST, `DateReceived`, sum(`Sold`) as sl, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remarks`, `Status` FROM `tblstocks` GROUP BY ProductID");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				 // `Fullname`, `CompanyName`, `F_Address`, `S_Address`, `ContactNo`

				  		$bal = $result->ST-$result->sl;

				  			echo '<td>' . $result->ProductID.'</td>';
				  			echo '<td>' . $result->Products.'</td>';
				  			// echo '<td>' . $result->Brand.'</td>';
				  			echo '<td>' . $result->Category.'</td>'; 
				  			echo '<td>' . $result->ST.'</td>'; 
				  			echo '<td>' . $result->sl.'</td>'; 
				  			echo '<td>' . $bal.'</td>'; 
				  			// echo '<td>' . $result->Status.'</td>';
				  			// echo '<td>' . $result->Remarks.'</td>';
				  		echo '<td align="center"> 
				  			<a title="Deduct Qty" href="index.php?view=sold&id='.$result->ProductID.'" class="btn btn-info btn-md  ">  <span class="fa fa-shopping-cart fw-fa"> Add Medicine to Patient</a>

				  		<a title="View" href="index.php?view=view&id='.$result->ProductID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-plus fw-fa"> Add Qty</a>
				  		<a title="Modify" href="index.php?view=edit&id='.$result->ProductID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-edit fw-fa">Modify</a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->ProductID.'" class="btn btn-danger btn-md  ">  <span class="fa  fa-trash fw-fa "></a></td>';
				  	 
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			
				</form>
	
 <div class="table-responsive">	 