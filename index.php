<?php 
require_once("include/initialize.php");  
 if (!isset($_SESSION['ADMIN_USERID'])){
  redirect(web_root."login.php");
 }
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'dashboard' :
        $title="Dashboard";	
		$content='dashboard.php';		
		break;
	case 'login' : 
        $title="Login";	
		$content='login.php';		
		break; 

	default :
	   $title="Dashboard";	
		$content='dashboard.php';		
}
require_once("theme/templates.php");
?>
