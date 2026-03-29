<?php 
		 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
?>
  
           <div class="center ">
                 <h2 class="page-header">List of Autonumbers</h2> 
            </div>  
                	<div class="col-md-12">
                	   <form action="controller.php?action=delete" Method="POST">  	 
                	   <div class="table-responsive">
								<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
								
								  <thead>
								  	<tr> 
								  		<th> 
								  		 Autonumber</th> 
								  		  <th>Key</th>
								  		 <th width="5%" align="center">Action</th>
								  	</tr>	
								  </thead>  
								  <tbody>
								  	<?php 
								  		$mydb->setQuery("SELECT * FROM `tblautonumbers`");
								  		$cur = $mydb->loadResultList();

										foreach ($cur as $result) {
								  		echo '<tr>'; 
							  			echo '<td>' . $result->AUTOSTART.'' . $result->AUTOEND.'</td>';
							  			echo '<td>' . $result->AUTOKEY.'</td>';
								  		echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->AUTOID.'" class="btn btn-info btn-md  ">  <span class="fa fa-edit fw-fa"> Edit</a>
								  		  </td>'; 
								  		echo '</tr>';
								  	} 
								  	?>
								  </tbody>
									
								</table>
								  <!--   <div class="btn-group">-->
								  <!--<a href="index.php?view=add" class="btn btn-default">New</a>-->
							 </div>
								</div>
			
			
							</form> 
   					</div>  