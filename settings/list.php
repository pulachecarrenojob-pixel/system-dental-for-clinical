<?php 
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Supliers  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Add Suplier</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th>Supplier</th>
				  	<!-- 	<th>Deal</th> 
				  		<th>Notes</th>  --> 
				  		 <th width="20%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	
				  		$mydb->setQuery("SELECT * FROM `tblsuplier`");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				 // `Fullname`, `CompanyName`, `F_Address`, `S_Address`, `ContactNo`
				  			echo '<td>' . $result->Suplier.'</td>';
				  			// echo '<td>' . $result->SuplierDeal.'</td>';
				  			// echo '<td>' . $result->SuplierNotes.'</td>'; 
				  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->SuplierID.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id='.$result->SuplierID.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash fw-fa "></a></td>';
				  	 
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			
				</form>
	
 <div class="table-responsive">	 