<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	 
<style type="text/css">
  .row {
    margin-bottom: 5px;
  }
  @media print {
  .no-print, .no-print *
    {
        display: none !important;
    }
  }
</style>
  <!-- =============================================== -->
 <form action="" method="POST">
 	<section class="content-header  no-print">
	<div class="col-md-3"> </div>
	<div class="col-md-6"> 
		<div class="panel">
			<div class="panel-header"></div>
				<div class="panel-body ">  
					 <div class="row">
					  <div class="col-sm-12 search1">
					    <label class="col-sm-3">Date From:</label>
					    <div class="col-sm-9">
					      <div class="input-group date">
					        <div class="input-group-addon">
					          <i class="fa fa-calendar"></i>
					        </div>
					        <input required autocomplete="off" type="text" value="<?php echo isset($_POST['date_from']) ? $_POST['date_from'] : DATE('m/d/Y'); ?>" name="date_from" class="form-control pull-right date_picker" id="datemask2" placeholder="mm/dd/yyyy">
					      </div>
					    </div>
					  </div>
					</div>   
					 <div class="row">
					  <div class="col-sm-12 search1">
					    <label class="col-sm-3">Date To:</label>
					    <div class="col-sm-9">
					      <div class="input-group date">
					        <div class="input-group-addon">
					          <i class="fa fa-calendar"></i>
					        </div>
					        <input required autocomplete="off" type="text" value="<?php echo isset($_POST['date_to']) ? $_POST['date_to'] : DATE('m/d/Y'); ?>" name="date_to" class="form-control pull-right date_picker" id="datemask2" placeholder="mm/dd/yyyy">
					      </div>
					    </div>
					  </div>
					</div>   
					  <div class="row">
					  <div class="col-sm-12 search1">
					    <label class="col-sm-3"></label>
					    <div class="col-sm-9">
					       <input type="submit" name="submit" class="btn btn-success">
					    </div>
					  </div>
					</div>  
				</div>
		</div> 
		
	</div> 
	<div class="col-md-3"> </div>
</section> 
</form>

<div class="clear"></div>
  <section class="content col-sm-12">
 
  	<p style="text-align: center;font-size: 15px"><br>
	Inventroy Report <br/>
	As of <?php echo date('m/d/Y');?>

 
	 <?php
	     // $date_taken = isset($_POST['date_taken']) ? date_format(date_create($_POST['date_taken']),"Y-m-d") : "";
	     //  $course  = isset($_POST['Course']) ? $_POST['Course'] : "";
	     //  $semester = isset($_POST['Semester']) ? $_POST['Semester'] : ""; 
	 ?>

	 <p  style="font-size:15px;text-align: center;">
    Inclusive Dates: <?php echo isset($_POST['date_from']) ? "From : " .$_POST['date_from'] : "Month-Day-Year" ?> | <?php echo isset($_POST['date_to']) ? " To : " .$_POST['date_to'] : "Month-Day-Year" ?></p>
  </p>
  	  
 <div class=" no-print">
  <center><button type="button" class="btn btn-info pull-center" button onclick="myFunction()">Print Report</button></center>
</div>
       <table  class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
        
          <thead>
            <tr> 
              <th>ProductID</th> 
              <th>Products</th> 
              <th>Brand</th> 
              <th>Category</th> 
              <th>Stocks</th>  
              <th>Sold</th>  
              <th>Remaining</th> 
              <!-- <th>Status</th> 
              <th>Remarks</th>  --> 
            </tr> 
          </thead>  
                <tbody id="loaddashboard" style="width:320px; height:10px; overflow:auto;">
                  <?php   
  $datefrom =isset($_POST['date_from'])  ?  date_format(date_create($_POST['date_from']),'Y-m-d') : "";
	      $dateto = isset($_POST['date_to'])  ? date_format(date_create($_POST['date_to']),'Y-m-d') : "";
                  
            $bal=0;
            // SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, `Stocks`, `DateReceived`, `Sold`, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remark`, `Status` FROM `tblstocks` GROUP BY CONCAT(`Products`, `Brand`, `Category`)
              $mydb->setQuery("SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, sum(`Stocks`) as ST, `DateReceived`, sum(`Sold`) as sl, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remarks`, `Status` FROM `tblstocks`  WHERE  DATE(`DateReceived`) >= '".$datefrom ."' AND DATE(`DateReceived`) <= '".$dateto."' GROUP BY ProductID");
              $cur = $mydb->loadResultList(); 
            foreach ($cur as $result) {
              $bal = $result->ST-$result->sl;
              if ($bal < 5) {
                # code...
                  echo '<tr style="background-color:red;color:#fff">';
              }else{ 
                  echo '<tr>';
              }
    
         // `Fullname`, `CompanyName`, `F_Address`, `S_Address`, `ContactNo`



                echo '<td>' . $result->ProductID.'</td>';
                echo '<td>' . $result->Products.'</td>';
                echo '<td>' . $result->Brand.'</td>';
                echo '<td>' . $result->Category.'</td>'; 
                echo '<td>' . $result->ST.'</td>'; 
                echo '<td>' . $result->sl.'</td>'; 
                echo '<td>' . $bal.'</td>'; 
                // echo '<td>' . $result->Status.'</td>';
                // echo '<td>' . $result->Remarks.'</td>'; 
             
              echo '</tr>';
            } 
 
 
                  ?>
                </tbody>
                
              </table> 


  <script> 
  function myFunction(){ 
    window.print();
    
  } 
  </script>  
  </section> 