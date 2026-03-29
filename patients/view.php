<?php 
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }

     $sql = "SELECT * FROM tblpatients WHERE PatientID=".$_GET['id'];
     $mydb->setQuery($sql);
     $res = $mydb->loadSingleResult();

     $Patients = $res->Lname.', '.$res->Fname.' '.$res->Mname;
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
			<td>Patient Name</td>
			<td> <?php echo $res->Lname.', '.$res->Fname.' ' .$res->Mname; ?></td>
		 
			<td>Sex</td>
			<td><?php echo $res->Sex; ?></td>
		</tr>
    <tr>
      <td>Age</td>
      <td><?php echo $res->Age; ?></td>
   
			<td>Phone #</td>
			<td><?php echo $res->ContactNo; ?></td>
			
		</tr>
		<tr>
			<td>Address</td>
			<td colspan="3"> <?php echo $res->F_Address; ?></td>
		</tr>
	</table> 
</div> 
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Patient History</h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr> 
				  		<th>Date</th> 
				  		<th>Services</th> 
				  		<th>Price</th> 
				  		<th>Number of Teeth</th> 
				  		<!-- <th>Total</th>  -->
				  		<th>Remarks</th> 
				  		 <!-- <th width="5%" align="center">Action</th> -->
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	// SELECT `InvoiceID`, `InvoiceNo`, `SKU`, `Services`, `Price`, `QTY`, `SubTotal`, `Remarks`, `UserID`, `Class` FROM `tblinvoice` WHERE 1
				  		$mydb->setQuery("SELECT * FROM `tblinvoice` i,`tblpayments` p WHERE i.`InvoiceNo`=p.`InvoiceNo` AND Patients='{$Patients}'");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		echo '<tr>';
				 // `Fullname`, `CompanyName`, `F_Address`, `S_Address`, `ContactNo`
				  			echo '<td>' . $result->InvoiceDate.'</td>';
				  			 echo '<td>'. $result->Services.'</td>';
				  			echo '<td>' . number_format($result->Price,2).'</td>';
				  			echo '<td>' . $result->ToothNumber.'</td>';
				  			// echo '<td>' . $result->SubTotal.'</td>';
				  			echo '<td>' . $result->Remarks.'</td>';
				  		// echo '<td align="center"> 
				  		// <a title="View" href="index.php?view=edit&id='.$result->InvoiceID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-info fw-fa"> View Records</a>
				  		// <a title="Edit" href="index.php?view=edit&id='.$result->InvoiceID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-edit fw-fa"></a>
				  		//      <a title="Delete" href="controller.php?action=delete&id='.$result->InvoiceID.'" class="btn btn-danger btn-md  ">  <span class="fa  fa-trash fw-fa "></a></td>';
				  	 
				  		echo '</tr>';

				  		// $tooth[] =  $result->QTY;


				  // 		for ($i=1; $i < 17; $i++) { 
						// 		# code...
				  // 			if ($result->QTY==$i) {
				  // 				# code...
						// 		echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:red">'.$i.'</span>	</a>';
				  // 			}else{

						// 		echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:blue">'.$i.'</span>	</a>';
				  // 			}
						// }
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			
				</form>
				<style type="text/css">
					.teeth-chart{
						margin-top: 30px;
					}
					.teeth-chart  a{
						text-align: center;
						padding: 5px;
					}
					.number {
						font-size: 20px;
						margin-left: -30px;
						margin-top: 0px;
						position: absolute;
						font-weight: bold;
						color: red;
					}
				</style>

<div class="col-md-12 teeth-chart"> 


	<?php 
for ($i=1; $i < 17; $i++) {  

	$mydb->setQuery("SELECT * FROM `tblinvoice` i,`tblpayments` p WHERE i.`InvoiceNo`=p.`InvoiceNo` AND Patients='{$Patients}' AND ToothNumber = '{$i}' GROUP BY ToothNumber");
	$r = $mydb->executeQuery();
	$maxrow = $mydb->num_rows($r);

	if ($maxrow > 0) {
		$cur = $mydb->loadSingleResult(); 
		echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:red">'.$cur->ToothNumber.'</span>	</a>';

	}else{
		echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:blue">'.$i.'</span>	</a>';

	} 
}
echo '<br/>';
for ($i=17; $i < 33; $i++) {  

	$mydb->setQuery("SELECT * FROM `tblinvoice` i,`tblpayments` p WHERE i.`InvoiceNo`=p.`InvoiceNo` AND Patients='{$Patients}' AND ToothNumber = '{$i}' GROUP BY ToothNumber");
	$r = $mydb->executeQuery();
	$maxrow = $mydb->num_rows($r);

	if ($maxrow > 0) {
		$cur = $mydb->loadSingleResult(); 
		echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:red">'.$cur->ToothNumber.'</span>	</a>';

	}else{
		echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:blue">'.$i.'</span>	</a>';

	} 
}



				  // 	// SELECT `InvoiceID`, `InvoiceNo`, `SKU`, `Services`, `Price`, `QTY`, `SubTotal`, `Remarks`, `UserID`, `Class` FROM `tblinvoice` WHERE 1
				  // 		$mydb->setQuery("SELECT * FROM `tblinvoice` i,`tblpayments` p WHERE i.`InvoiceNo`=p.`InvoiceNo` AND Patients='{$Patients}' AND ToothNumber > 0 AND ToothNumber < 17 GROUP BY ToothNumber");
				  // 		$r = $mydb->executeQuery();
				  // 		$maxrow = $mydb->num_rows($r);

				  // 		if ($maxrow > 0) {
				  // 		$cur = $mydb->loadResultList(); 
						// foreach ($cur as $result) {
				    

				  // 		for ($i=1; $i < 17; $i++) { 
						// 	$i++;
						// }

						// 	# code...
				  // 			if ($result->ToothNumber==$i) {
				  // 				# code...
						// 		echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:red">'.$i.'</span>	</a>';
				  // 			}else{

						// 		echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:blue">'.$i.'</span>	</a>';
				  // 			}

				  // 	} 
				  // }else{
				  // 					for ($i=1; $i < 17; $i++) {  

						// 					echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:blue">'.$i.'</span>	</a>';
							  		 
						// 			}
				  // }
   ?>

<br/>
<?php 
				  	// // SELECT `InvoiceID`, `InvoiceNo`, `SKU`, `Services`, `Price`, `QTY`, `SubTotal`, `Remarks`, `UserID`, `Class` FROM `tblinvoice` WHERE 1
				  	// 	$mydb->setQuery("SELECT * FROM `tblinvoice` i,`tblpayments` p WHERE i.`InvoiceNo`=p.`InvoiceNo` AND Patients='{$Patients}' AND ToothNumber > 16 AND ToothNumber < 33 GROUP BY ToothNumber");
				  	// 	$r = $mydb->executeQuery();
				  	// 	$maxrow = $mydb->num_rows($r);

				  	// 	if ($maxrow > 0) {


				  	// 		# code...
							// 		$cur = $mydb->loadResultList(); 
							// 		foreach ($cur as $result) { 

							//   		for ($i=17; $i < 33; $i++) { 
							// 				# code...
							//   			if ($result->ToothNumber==$i) {
							//   				# code...
							// 				echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:red">'.$i.'</span>	</a>';
							//   			}else{

							// 				echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:blue">'.$i.'</span>	</a>';
							//   			}
							// 		}
							//   	} 
				  	// 	}else{

							//   		for ($i=17; $i < 33; $i++) {  

							// 				echo '<a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number" style="color:blue">'.$i.'</span>	</a>';
							  		 
							// 		}

				  	// 	}
				  		
   ?>
 
</div>