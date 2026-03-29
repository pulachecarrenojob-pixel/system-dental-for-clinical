
<?php
require_once ("../include/initialize.php");
 	 // if (!isset($_SESSION['ADMIN_USERID'])){
   //    redirect(web_root."admin/index.php");
   //   }


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

	case 'confirm' :
	doConfirmed();
	break;

 
	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){
 
 
 
			$currency = New Currency();
			$currency->CurrencySymbol			= $_POST['CurrencySymbol']; 
			$currency->create();

			 
			message("New Currency created successfully!", "success");
			redirect("index.php");
			
		} 

	}

	function doEdit(){
		if(isset($_POST['save'])){

		  
			
			$currency = New Currency();
			$currency->CurrencySymbol			= $_POST['CurrencySymbol']; 
			$currency->update($_POST['CurrencyID']);

			message("Currency has been updated!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){
		global $mydb;
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];
 
			$currency = New Currency();
			$currency->delete($id);

		 
 

			message("Currency has been Deleted!","info");
			redirect('index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$category = New Category();
		// 	$category->delete($id[$i]);

		// 	message("Category already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}

	function doConfirmed() {
		global $mydb;

		$sql = "Update tblcurrency set ActiveCurrency=0";
		$mydb->setQuery($sql);
		$mydb->executeQuery();

		$currency = New Currency();
		$currency->ActiveCurrency		= 1; 
		$currency->update($_GET['id']);

		message("Currency has been activated!","info");
		redirect('index.php');

	}
?>