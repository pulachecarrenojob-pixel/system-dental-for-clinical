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

	case 'qty' :
	doQty();
	break;
 
	}
   
	function doInsert(){
		global $mydb;


			$autonum = New Autonumber();
			$res = $autonum->set_autonumber('PROID');
			$proid = $res->AUTO;

// SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, `Stocks`, `DateReceived`, `Sold`, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remark`, `Status` FROM `tblstocks` WHERE 1

		$sql="SELECT * FROM tblstocks WHERE Products='".trim($_POST['Products'])."' 
				AND Brand='".trim($_POST['Brand'])."' AND Category='".trim($_POST['Category'])."'";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);

		if($maxrow>0){ 
		    
			if (isset($_GET['modal'])) {
				# code... 
				echo '<script>alert("Product already exist.");</script>'; 
			} else{
				message("Product already exist!", "error");
				redirect("index.php?view=add");
			}

		}else{

			

			$stocks = New Stocks();
			$stocks->ProductID		= trim($proid); 
			$stocks->Products		= trim($_POST['Products']); 
			$stocks->Brand			= trim($_POST['Brand']); 
			$stocks->Category		= trim($_POST['Category']);
			$stocks->Description	= $_POST['Description']; 
			$stocks->Stocks	= 1; 
			$stocks->create();

			$autonum = New Autonumber();
			$autonum->auto_update('PROID'); 


			if (isset($_GET['modal'])) {
				# code... 
				echo "New Stocks created successfully!";
			} else{
				message("New Stocks created successfully!", "success");
				redirect("index.php");
			}
			
		}
 
 			
			
			
		// echo "get";
		// }  

	}

	function doEdit(){
		global $mydb;
		if(isset($_POST['save'])){

		   $sql="SELECT * FROM tblstocks WHERE Products='".trim($_POST['Products'])."' AND Brand='".trim($_POST['Brand'])."'  AND Category='".trim($_POST['Category'])."' AND Description='".trim($_POST['Description'])."'";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);

		if($maxrow>0){ 
		    
			if (isset($_GET['modal'])) {
				# code... 
				echo '<script>alert("Product already exist.");</script>'; 
			} else{
				message("Product already exist!", "error");
				redirect("index.php?view=add");
			}

		}else{
 
			$stocks = New Stocks(); 
			$stocks->Products		= trim($_POST['Products']); 
			$stocks->Brand			= trim($_POST['Brand']); 
			$stocks->Category		= trim($_POST['Category']);
			$stocks->Description	= $_POST['Description']; 
			$stocks->update($_POST['ProductID']);

			message("Product has been updated!", "success");
			redirect("index.php");
		}
	}
	}


	function doDelete(){
		global $mydb;
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$s = New Stocks();
			$s->delete($id);

			  
			message("Stocks has been Deleted!","info");
			redirect('index.php');

		 
		
	}
	function doQty(){

		global $mydb; 

		echo $qty = $_POST['Stocks'];
		$proid = trim($_POST['ProductID']);

		if ($qty > 0) {
			# code...
	 

		$sql="SELECT *,(sum(Stocks) - sum(Sold)) as r FROM tblstocks WHERE ProductID='".trim($_POST['ProductID'])."' GROUP BY ProductID";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);
		if ($maxrow>0) {
			# code...
			$res = $mydb->loadSingleResult(); 

			if ($qty>$res->r) {
				# code...
				message("The quantity is grater than the remaining items!", "error");
					redirect("index.php?view=view&id=".$proid); 
			}else{

				// for ($i=0; $i < $qty; $i++) { 

					$sql="UPDATE tblstocks SET Sold=1, DateSold=NOW() WHERE ProductID='{$proid}' AND Sold=0 ORDER BY DateReceived LIMIT {$qty}";
					$mydb->setQuery($sql);
					$cur = $mydb->executeQuery();   
				// }  

				message("Product has been sold!", "success");
			    redirect("index.php"); 
			}
            
		}
	}else{
		message("Input the correct amount!", "error");
		redirect("index.php?view=view&id=".$proid); 
	}

			 

	
}
?>