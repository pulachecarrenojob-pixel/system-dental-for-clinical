  <?php 
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }

     $sql = "SELECT * FROM tblstocks WHERE ProductID='".$_GET['id']."'";
     $mydb->setQuery($sql);
     $res = $mydb->loadSingleResult(); 
?>
<style type="text/css"> 
	 .table-client {
 		width: 100%;  
 	}
 	.table-client tr td {
 		border-bottom: 1px solid #ddd;
 		padding: 10px 0px 0px 0px;
 	}

</style>
<div class="col-md-12">
	<table class="table-client">
		<tr>
			<td>Product ID</td>
			<td> <?php echo $res->ProductID ?></td>
		 
			<td>Product</td>
			<td><?php echo $res->Products; ?></td>
		</tr>
    <tr>
      <td>Brand</td>
      <td><?php echo $res->Brand; ?></td>
      <td>Category</td>
      <td><?php echo $res->Category; ?></td>
    
		</tr>
		<!-- <tr>
			<td>Description</td>
			<td colspan="3"> <?php echo $res->Description; ?></td>
		</tr> -->
	</table> 
</div> 
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

   <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr> 
				  		<th>Date</th> 
				  		<th>Sold</th>  
				  		<!-- <th>Status</th> 
				  		<th>Remarks</th>  --> 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	// SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, `Stocks`, `DateReceived`, `Sold`, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remark`, `Status` FROM `tblstocks` GROUP BY CONCAT(`Products`, `Brand`, `Category`)
				  		$mydb->setQuery("SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, sum(`Stocks`) as ST, `DateReceived`, sum(`Sold`) as sl, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remarks`, `Status` FROM `tblstocks` WHERE ProductID='".$res->ProductID."' AND Sold=1 GROUP BY DateSold");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) { 
				  		echo '<tr>';
				 // `Fullname`, `CompanyName`, `F_Address`, `S_Address`, `ContactNo`
				  			echo '<td>' . $result->DateSold.'</td>'; 
				  			echo '<td>' . $result->sl.'</td>'; 
				  			// echo '<td>' . $result->Status.'</td>';
				  			// echo '<td>' . $result->Remarks.'</td>'; 
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			