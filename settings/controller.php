
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

 
	}
 
	function doEdit(){
		global $mydb;
		if(isset($_POST['save'])){ 

			$sql = "SELECT * FROM `tblprintheader` WHERE 1";
			$mydb->setQuery($sql);
			$cur = $mydb->executeQuery();
			$maxrow = $mydb->num_rows($cur);


			if ($maxrow > 0) {
				$sql = "UPDATE `tblprintheader` SET `FirstLine`='".str_replace("'", "&#39;",  $_POST['HFirstLine'])."', `SecondLine`='".str_replace("'", "&#39;",  $_POST['HSecondLine'])."', `ThirdLine`='".str_replace("'", "&#39;",  $_POST['HThirdLine'])."'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();
			  
			}else{
				$sql = "INSERT INTO `tblprintheader` (`FirstLine`, `SecondLine`,`ThirdLine`) 
						VALUES ('". str_replace("'", "&#39;",  $_POST['HFirstLine'])."','".str_replace("'", "&#39;",  $_POST['HSecondLine'])."','".str_replace("'", "&#39;",  $_POST['HThirdLine'])."')";
				$mydb->setQuery($sql);
				$mydb->executeQuery();

			}


			$sql = "SELECT * FROM `tblprintfooter` WHERE 1";
			$mydb->setQuery($sql);
			$cur = $mydb->executeQuery();
			$maxrow = $mydb->num_rows($cur);


			if ($maxrow > 0) {
				$sql = "UPDATE `tblprintfooter` SET `FirstLine`='".str_replace("'", "&#39;",  $_POST['FFirstLine'])."', `SecondLine`='".str_replace("'", "&#39;",  $_POST['FSecondLine'])."', `ThirdLine`='".str_replace("'", "&#39;",  $_POST['FThirdLine'])."'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();
			  
			}else{
				$sql = "INSERT INTO `tblprintfooter` (`FirstLine`, `SecondLine`,`ThirdLine`) 
						VALUES ('". str_replace("'", "&#39;",  $_POST['FFirstLine'])."','".str_replace("'", "&#39;",  $_POST['FSecondLine'])."','".str_replace("'", "&#39;",  $_POST['FThirdLine'])."')";
				$mydb->setQuery($sql);
				$mydb->executeQuery();

			}
		  
			

			message("Settings has been updated!", "success");
			redirect("index.php");
		}

	}

 ?>