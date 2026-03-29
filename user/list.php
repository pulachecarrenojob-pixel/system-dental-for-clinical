<?php
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
       	 <div class="col-lg">
            <h1 class="page-header">List of Users  <a href="index.php?view=add" class="btn btn-primary btn-md  ">  <i class="fa fa-plus-circle fw-fa"></i> Add User</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 --> 
   		 	<div class="col-lg-12"> 
   		 	<div class="table-responsive">
				<table id="dash-table" class="table  table-bordered table-hover " style="font-size:12px;" cellspacing="0"> 
				  <thead>
				  	<tr>
				  		<th>Account ID</th>
				  		<th> Account Name</th>
				  		<th>Username</th>
				  		<th>Role</th>
				  		<th width="5%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * 
											FROM  `tblusers`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->UserID.'</a></td>';
				  		echo '<td>' . $result->FullName.'</a></td>';
				  		echo '<td>'. $result->Username.'</td>';
				  		echo '<td>'. $result->Role.'</td>';
				  		If($result->UserID==$_SESSION['ADMIN_USERID'] || $result->Role=='MainAdministrator' || $result->Role=='Administrator') {
				  			$active = "Disabled";

				  		}else{
				  			$active = "";

				  		}

				  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->UserID.'"  class="btn btn-primary btn-md  ">  <span class="fa fa-edit fw-fa"></span></a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->UserID.'" class="btn btn-danger btn-md" '.$active.'><span class="fa fa-trash fw-fa"></span> </a>
				  					 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  
				</div>
			</div> 
 