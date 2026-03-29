<?php
require_once ("../include/initialize.php");
 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break; 
	
	case 'delete' :
	doDelete();
	break;

    case 'addbulk' :
	addBulk();
	break; 
	
	case 'deletebulk' :
	deleteBulk();
	break; 
	

	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){ 
 
					$sql = "SELECT * FROM `tblservices` WHERE `SKU`='".$_POST['SKU']."'";
					$mydb->setQuery($sql);
					$res = $mydb->executeQuery();
					$maxrow = $mydb->num_rows($res);

					if($maxrow > 0){

						echo '<script>alert("SKU already exist! It will automatically assign a new and unique SKU to avoid duplication of Services.")</script>';

						$sql = "SELECT SKU FROM `tblservices`";
						$mydb->setQuery($sql);
						$pro = $mydb->loadResultList(); 
						foreach ($pro as $row) { 
						   $str[] = (int) filter_var($row->SKU, FILTER_SANITIZE_NUMBER_INT);  
						}

  					    $incvalue = json_encode(max($str)) + 1;

  					    // echo   $incvalue ;

					    $sql = "UPDATE `tblautonumbers` SET `AUTOEND`='{$incvalue}' WHERE `AUTOKEY`='SKU'";
					    $mydb->setQuery($sql);
						$res = $mydb->executeQuery();

						$autonum = New Autonumber();
 						$res = $autonum->set_autonumber('SKU');
 

						$serviceid = $res->AUTO;

					}else{
						$serviceid = $_POST['SKU'];
					}


					$sql = "SELECT * FROM `tblservices` WHERE `ToothNumber`='".trim($_POST['ToothNumber'])."' AND `Services`='".trim($_POST['Services'])."'";
					$mydb->setQuery($sql);
					$res = $mydb->executeQuery();
					$maxrow = $mydb->num_rows($res);

					if ($maxrow > 0) {
						# code...
							echo '<script>alert("Services already exist!")</script>';

							redirect("index.php?view=add");

					}else{
			 
						$service = New Services(); 
						$service->SKU 				= $serviceid ;
						$service->ToothNumber 		= $_POST['ToothNumber'];
						$service->Services 			= $_POST['Services'];
						$service->Description		= $_POST['Description']; 
						$service->OriginalPrice		= $_POST['OriginalPrice'];     
						$service->create(); 

					  
						$autonum = New Autonumber(); 
						$autonum->auto_update('SKU');

						message("New Service created successfully!", "success");
						redirect("index.php?view=edit&id=". $serviceid);

					}

					 

 
		 }
 } 


	function doEdit(){
		global $mydb;
	if(isset($_POST['save'])){
 // echo $_POST['SuplierID'];  

				$sql = "SELECT * FROM `tblservices` WHERE `ToothNumber`='".trim($_POST['ToothNumber'])."' AND `Services`='".trim($_POST['Services'])."'";
					$mydb->setQuery($sql);
					$res = $mydb->executeQuery();
					$maxrow = $mydb->num_rows($res);

					if ($maxrow > 0) {
						# code...
							message("Service has been updated!", "success");

						redirect("index.php?view=edit&id=".$_POST['SKU']);

					}else{
			 
						
						$service = New Services();  
						$service->ToothNumber 		= $_POST['ToothNumber'];
						$service->Services 			= $_POST['Services'];
						$service->Description		= $_POST['Description']; 
						$service->OriginalPrice		= $_POST['OriginalPrice'];      
						$service->update($_POST['SKU']);


						message("Service has been updated!", "success");
						// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
						redirect("index.php?view=edit&id=".$_POST['SKU']);

					}

	     
  	
	 
	}

} 
	function doDelete(){
		global $mydb;
		 
		
				$id = 	$_GET['id'];

				$service = New Services();
	 		 	$service->delete($id); 

		 	// $sql = "UPDATE tblservices SET Deleted=1 WHERE SKU= '{$id}'";
		  // 	$mydb->setQuery($sql);
		  // 	$mydb->executeQuery();
 
 
			message("Service already Deleted!","success");
			redirect('index.php'); 
		
	}
  function addBulk(){
  	global $mydb;
  	 global $setDefault;

  		$sku =$_POST['SKU'];

  		// echo $sku;

  	$sql = "INSERT INTO `tblbulkpricing` (`SKU`, `QTY`, `Price`, `ModifiedDate`) 
  			Values ('".$_POST['SKU']."','".$_POST['QTY']."','".$_POST['Price']."',Now())";
  	$mydb->setQuery($sql);
  	$mydb->executeQuery();

  	if (isset($_GET['modal'])) {
  		# code... 

  		 $discounted_pricre = 0;

		  		$sql ="SELECT * FROM `tblbulkpricing` B,tblservices P WHERE B.SKU=P.SKU AND P.SKU='{$sku}' ORDER BY QTY ASC";
 
		  		$mydb->setQuery($sql);
		  		$cur = $mydb->loadResultList();

				foreach ($cur as $result) {  

				$discounted_pricre = $result->Price / $result->QTY;	
		  		echo '<tr>'; 
		  			echo '<td align="center" >    
  		             <a title="Remove" href="#"  data-id="'.$result->BulkID.'"  class="btn btn-danger btn-xs del  ">
  		             <span class="fa fa-trash-o fw-fa"></span></a> 
  					 </td>';
		  		echo '<td>'. $result->QTY.'</td>'; 
		  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->Price,2).'</a></td>';  
		  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($discounted_pricre,2).'</a></td>'; 
		  		echo '<td>'. $result->Unit.'</td>'; 
 
		  		echo '</tr>';

		  		 
		  	} 
  	}else{

		message("Bulk price already created.","success");
	    redirect('index.php?view=bulk&id='.$_POST['SKU']); 
  	}
  }

 function deleteBulk(){
  	global $mydb;
  	 global $setDefault;
  	$id=0;

  	if (isset($_GET['modal'])) {
  		$id = $_POST['id']; 
  		

			$sql = "SELECT * FROM `tblbulkpricing` WHERE BulkID=".$id;
			$mydb->setQuery($sql);
			$res= $mydb->loadSingleResult();

			$sku =$res->SKU;

  	}else{
  		$id = $_GET['id'];
  	}


  	$sql = "DELETE FROM `tblbulkpricing` WHERE BulkID=".$id;
  	$mydb->setQuery($sql);
  	$mydb->executeQuery();




  	if (isset($_GET['modal'])) {
  		# code...
  		// echo "Bulk price already deleted";

  			 $discounted_pricre = 0;

		  		$sql ="SELECT * FROM `tblbulkpricing` B,tblservices P WHERE B.SKU=P.SKU AND P.SKU='{$sku}' ORDER BY QTY ASC";
 
		  		$mydb->setQuery($sql);
		  		$cur = $mydb->loadResultList();

				foreach ($cur as $result) {  

				$discounted_pricre = $result->Price / $result->QTY;	
		  		echo '<tr>'; 
		  			echo '<td align="center" >    
  		             <a title="Remove" href="#"  data-id="'.$result->BulkID.'"  class="btn btn-danger btn-xs del  ">
  		             <span class="fa fa-trash-o fw-fa"></span></a> 
  					 </td>';
		  		echo '<td>'. $result->QTY.'</td>'; 
		  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->Price,2).'</a></td>';  
		  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($discounted_pricre,2).'</a></td>'; 
		  		echo '<td>'. $result->Unit.'</td>'; 
 
		  		echo '</tr>';

		  		 
		  	} 
  	}else{
	message("Bulk price already deleted.","info");
    redirect('index.php?view=bulk&id='.$_GET['SKU']);
    } 
  } 
 
?>

<script type="text/javascript">
	$(".del").click(function(){

	var id;
	var sku;

	id=$(this).data("id"); 
	// alert(sku);

	$.ajax({
	    type: "POST",
	    url: "controller.php?action=deletebulk&modal=true",
	    dataType :"text",
	    data:{id:id},
	    success: function (data) {
	      // alert(data);
	          $("#loadtable").html(data);
	          $("#QTY").val("");
	          $("#Price").val("");
	          $("#QTY").focus();
	      
		}
	}); 
	

});
</script>