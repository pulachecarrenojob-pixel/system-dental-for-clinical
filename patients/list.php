<?php 
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header"><a href="index.php?view=add" class="btn btn-primary btn-md  ">  <i class="fa fa-plus-circle fw-fa"></i> Add Patient</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr> 
				  		<th>PatientID</th> 
				  		<th>Patient Name</th> 
				  		<th>Address</th> 
				  		<th>Sex</th> 
				  		<th>Age</th> 
				  		<th>Contact No.</th> 
				  		 <th width="5%" align="center">Action</th>
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tblpatients`");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				 // `Fullname`, `CompanyName`, `F_Address`, `S_Address`, `ContactNo`
				  			echo '<td>' . $result->PatientID.'</td>';
				  			 echo '<td>' . $result->Lname.', ' . $result->Fname.' ' . $result->Mname.'</td>';
				  			echo '<td>' . $result->F_Address.'</td>';
				  			echo '<td>' . $result->Sex.'</td>';
				  			echo '<td>' . $result->Age.'</td>';
				  			echo '<td>' . $result->ContactNo.'</td>';
				  		// echo '<td align="center"> 
				  		// <a title="View" href="index.php?view=view&id='.$result->PatientID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-info fw-fa"> View Records</a>
				  		// <a title="Edit" href="index.php?view=edit&id='.$result->PatientID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-edit fw-fa"></a>
				  		//      <a title="Delete" href="controller.php?action=delete&id='.$result->PatientID.'" class="btn btn-danger btn-md  ">  <span class="fa  fa-trash fw-fa "></a></td>';
				  				echo '<td align="center"> 
				  		<a title="View" href="index.php?view=view&id='.$result->PatientID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-info fw-fa"> View Records</a>
				  		<a title="Edit" href="index.php?view=edit&id='.$result->PatientID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-edit fw-fa"></a> </td>';
				  	 
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			
				</form>
	
 <div class="table-responsive">	 