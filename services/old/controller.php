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
 		    
 

			// SELECT `SKU`, `ProductName`, `Description`, `OriginalPrice`, `MarkupPrice`, `Unit`, `SuplierID` FROM `tblproduct` WHERE 1
					

			 
					$product = New Product(); 
					$product->SKU 		= $_POST['SKU'];
					$product->ProductName 		= $_POST['ProductName'];
					$product->Description		= $_POST['Description']; 
					$product->OriginalPrice		= $_POST['OriginalPrice'];   
					$product->MarkupPrice		= $_POST['MarkupPrice'];   
					$product->Unit				= $_POST['Unit'];  
					$product->TaxRate			= $_POST['TaxRate'];  
					// $product->SuplierID			= $_POST['SuplierID'];   
					$product->Suplier			= $_POST['SuplierID'];  
					$product->SupplierDeal		= $_POST['SupplierDeal'];   
					$product->SupplierNotes		= $_POST['SupplierNotes'];  
					$product->create(); 

				  
					$autonum = New Autonumber(); 
					$autonum->auto_update('SKU');

					 

					message("New Product created successfully!", "success");
					redirect("index.php?view=edit&id=". $_POST['SKU']);
 
		 }
 } 


	function doEdit(){
	if(isset($_POST['save'])){
 

			$product = New Product();  
			$product->ProductName 		= $_POST['ProductName'];
			$product->Description		= $_POST['Description']; 
			$product->OriginalPrice		= $_POST['OriginalPrice'];   
			$product->MarkupPrice		= $_POST['MarkupPrice'];   
			$product->Unit				= $_POST['Unit'];  
			$product->TaxRate			= $_POST['TaxRate'];  
			// $product->SuplierID			= $_POST['SuplierID'];  
			$product->Suplier			= $_POST['SuplierID'];  
			$product->SupplierDeal		= $_POST['SupplierDeal'];   
			$product->SupplierNotes		= $_POST['SupplierNotes'];  
			$product->update($_POST['SKU']);


			message("Product has been updated!", "success");
			// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
			redirect("index.php?view=edit&id=".$_POST['SKU']);
	     
  	
	 
	}

} 
	function doDelete(){
		global $mydb;
		 
		
				$id = 	$_GET['id'];

				$product = New Product();
	 		 	$product->delete($id); 

		 	// $sql = "UPDATE tblproduct SET Deleted=1 WHERE SKU= '{$id}'";
		  // 	$mydb->setQuery($sql);
		  // 	$mydb->executeQuery();
 
 
			message("Product already Deleted!","success");
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

		  		$sql ="SELECT * FROM `tblbulkpricing` B,tblproduct P WHERE B.SKU=P.SKU AND P.SKU='{$sku}' ORDER BY QTY ASC";
 
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

		  		$sql ="SELECT * FROM `tblbulkpricing` B,tblproduct P WHERE B.SKU=P.SKU AND P.SKU='{$sku}' ORDER BY QTY ASC";
 
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