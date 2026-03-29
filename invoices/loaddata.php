<?php
require_once("../include/initialize.php"); 
//checkAdmin();
if (!isset($_SESSION['ADMIN_USERID'])){
	redirect(web_root."login.php");
}
 

if (isset($_POST['ClosedClientSession'])) {
  # code...

    unset($_SESSION['Patients']);


    if (isset($_POST['invno'])) { 
      $invno = $_POST['invno']; 
      $sql ="UPDATE `tblpayments` SET `Patients`='NONE' WHERE `InvoiceNo`='{$invno}'";
      $mydb->setQuery($sql);
      $mydb->executeQuery();
    }
}
 
if (!isset($_SESSION['Patients'])) {
//   # code...
    $_SESSION['Patients'] = isset($_POST['Patients']) ? $_POST['Patients'] : "";
}else{
   if (isset($_POST['Patients'])) {
     # code...
      $_SESSION['Patients']  =$_POST['Patients'];
   } 
}
 

// echo "<script>alert(".$_SESSION['Patients'].")</script> 
if($_SESSION['Patients']=="NONE" || $_SESSION['Patients']==""){
?>
 <label>Patient : </label>
      
<select class="select2 form-control" id="Patients" name="Patients">
  <option value="None">Select</option>
<?php 
    $sql ="Select * From tblpatients; ";
    $mydb->setQuery($sql);
    $res  = $mydb->loadResultList();
    foreach ($res as $row) {
      # code...
      echo '<option>'.$row->Lname.', '.$row->Fname.' '.$row->Mname.'</option>';
    } 
  ?>
</select>
<a id="client_modal" data-target="#addClientModal"  data-toggle="modal" href="#">Add New</a>

<?php }else{
      $Patients = $_SESSION['Patients'];  

      if (isset($_POST['invno'])) { 
        $invno = $_POST['invno']; 
        $sql ="UPDATE `tblpayments` SET `Patients`='{$Patients}'  WHERE `InvoiceNo`='{$invno}'";
        $mydb->setQuery($sql);
        $mydb->executeQuery();
      }

      $sql ="SELECT * FROM tblpatients WHERE CONCAT(Lname, ', ',Fname,' ',Mname)='{$Patients}'";
      $mydb->setQuery($sql);
      $cur = $mydb->executeQuery();
      $maxrow = $mydb->num_rows($cur);
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

	<div id="closeClient" style="text-align: right;cursor: pointer;color: red;font-weight: bolder;">x</div>
<?php  if ($maxrow > 0) {  ?>  
	
	<table class="table-client">
		<tr>
			<td>Patient Name</td>
			<td> <?php echo $res->Lname.', '.$res->Fname.' ' .$res->Mname; ?></td>
		</tr>
		<tr>
			<td>Sex</td>
			<td><?php echo $res->Sex; ?></td>
		</tr>
    <tr>
      <td>Age</td>
      <td><?php echo $res->Age; ?></td>
    </tr>
		<tr>
			<td>Address</td>
			<td> <?php echo $res->F_Address; ?></td>
		</tr>
		<tr>
			<td>Phone #</td>
			<td><?php echo $res->ContactNo; ?></td>
		</tr>
	</table> 
 <?php 
  }   
 } ?> 
<script type="text/javascript" src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"> </script>
 <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/select2/select2.full.min.js"></script> 
 <script type="text/javascript">


 $("#Patients").on("change",function(){
    var Patients = $(this).val();
    var invno = document.getElementById("InvoiceNo").value;
     // alert(invno)

    $.ajax({
      type:"POST",  
      url: "loaddata.php",    
      dataType: "text",  //expect html to be returned  
      data:{Patients:Patients,invno:invno},               
      beforeSend: function() { 
         $("#loading-client").show(); 
          $("#invoicing-body").hide(); 
       },
      success: function(data){   
       $("#loading-client").hide();   
        $("#invoicing-body").show();   
       $('#searchclient').show(); 
       $('#searchclient').html(data);   
      } 
    })

  });


     

 $("#closeClient").on("click",function(){
 
 var invno = document.getElementById("InvoiceNo").value;
 // alert(invno)
 	$.ajax({
        type:"POST",  
        url: "loaddata.php",    
        dataType: "text",  //expect html to be returned       
        beforeSend: function() { 
          $("#loading-client").show(); 
          $("#invoicing-body").hide(); 
        },    
        data:{ClosedClientSession : "closed",invno:invno},
        success: function(data){  
        // $("#loading-client").fadeIn();
        $("#loading-client").hide();   
        $("#invoicing-body").show(); 
         // $('#searchclient').hide();   
         $('#searchclient').show(); 
         $('#searchclient').html(data);   
        } 
      }); 
 
 });


$.clearFormFields = function() {
    $('#my_form').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
    $("#successmsg").html("");
};

$('#client_modal').on('click', function () {
        $.clearFormFields(); 
});

 </script>