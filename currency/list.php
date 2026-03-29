<?php 
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Currency <a href="index.php?view=add" class="btn btn-primary btn-md  ">  <i class="fa fa-plus-circle fw-fa"></i> Add New Currency</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr> 
				  		<th>Currency</th> 
				  		<th>Status</th>  
				  		 <th width="5%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	// SELECT  `CurrencyID`, `CurrencySymbol`, `ActiveCurrency` FROM `tblcurrency` WHERE 1
				  		$mydb->setQuery("SELECT * FROM `tblcurrency`");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>'; 

				  		if ($result->ActiveCurrency==1) {
				  			# code...
				  			$status = "Active";
				  		}else{
				  			$status = "None";
				  		}

				  			echo '<td>' . $result->CurrencySymbol.'</td>';
				  			echo '<td>' . $status.'</td>'; 
				  		echo '<td align="center">
				  		</a><a title="Activate" href="controller.php?action=confirm&id='.$result->CurrencyID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-check fw-fa"></a>
				  		<a title="Edit" href="index.php?view=edit&id='.$result->CurrencyID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-edit fw-fa"></span></a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->CurrencyID.'" class="btn btn-danger btn-md  ">  <span class="fa  fa-trash fw-fa "></a></td>';
				  	 
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			
				</form>
	
 <div class="table-responsive">	 