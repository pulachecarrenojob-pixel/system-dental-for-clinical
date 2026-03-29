<?php
require_once ("../include/initialize.php");
if(!isset($_SESSION['ADMIN_USERID'])){
  redirect(web_root."index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doUpdate();
	break; 
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;
   
   
    case 'addfiles' :
	doAddFiles();
	break;

	case 'checkid' :
	Check_StudentID();
	break;
	

}

function doInsert(){
  global $mydb;

	if (isset($_POST['selector'])==''){
		message("Select the records first before you delete!","error");
		redirect('index.php');
	 }else{ 
	 	$invno = $_POST['invno'];
		$id = $_POST['selector'];
		$key = count($id);

		for($i=0;$i<$key;$i++){ 
			$sql = "Select * From tblservices Where SKU='{$id[$i]}'";
			$mydb->setQuery($sql); 
			$cur = $mydb->executeQuery();
			$maxrow = $mydb->num_rows($cur);

			if ($maxrow > 0) {
				# code... 
				$res = $mydb->loadSingleResult();

				$sku = $res->SKU; 
				Add_Invoice($invno,$sku,"Invoice"); 
			} 
		}
 

    redirect('index.php?view=add&invno='.$invno);
}
} 
?>