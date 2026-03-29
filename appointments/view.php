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
				  		<th>Qty</th> 
				  		<th>Total</th> 
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
				  			echo '<td>' . $result->Price.'</td>';
				  			echo '<td>' . $result->QTY.'</td>';
				  			echo '<td>' . $result->SubTotal.'</td>';
				  			echo '<td>' . $result->Remarks.'</td>';
				  		// echo '<td align="center"> 
				  		// <a title="View" href="index.php?view=edit&id='.$result->InvoiceID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-info fw-fa"> View Records</a>
				  		// <a title="Edit" href="index.php?view=edit&id='.$result->InvoiceID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-edit fw-fa"></a>
				  		//      <a title="Delete" href="controller.php?action=delete&id='.$result->InvoiceID.'" class="btn btn-danger btn-md  ">  <span class="fa  fa-trash fw-fa "></a></td>';
				  	 
				  		echo '</tr>';
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
 <a href="#1"><span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">1</span>	</a>

 <a href="#2">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">2</span></a>
 <a href="#3">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">3</span></a>
 <a href="#4">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">4</span></a>
 <a href="#5">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">5</span></a>
 <a href="#6">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">6</span></a>
 <a href="#7">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">7</span></a>
 <a href="#8">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>	<span class="number">8</span></a>
 <a href="#9">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">9</span></a>
 <a href="#10">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">10</span></a>
 <a href="#11">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">11</span></a>
 <a href="#12">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">12</span></a>
 <a href="#13">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">13</span></a>
 <a href="#14">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">14</span></a>
 <a href="#15">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">15</span></a>
 <a href="#16">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">16</span></a>

 <br/> <br/> <br/> 
  <a href="#17">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">17</span></a>
 <a href="#18">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">18</span></a>
 <a href="#19">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">19</span></a>
 <a href="#20">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">20</span></a>
 <a href="#21">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">21</span></a>
 <a href="#22">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">22</span></a>
 <a href="#23">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">23</span></a>
 <a href="#24">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">24</span></a>
 <a href="#25">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">25</span></a>
 <a href="#26">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">26</span></a>
 <a href="#27">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">27</span></a>
 <a href="#28">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">28</span></a>
 <a href="#29">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">29</span></a>
 <a href="#30">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">30</span></a>
 <a href="#31">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">31</span></a>
 <a href="#32">	 <span style="font-size: 50px" class="icon-iconfinder_Dental_-_Tooth_-_Dentist_-_Dentistry_01_2185089"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><span class="number">32</span></a>
</div>