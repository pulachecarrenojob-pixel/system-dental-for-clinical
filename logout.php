<?php 
require_once 'include/initialize.php';
 

unset($_SESSION['ADMIN_USERID']);  
unset($_SESSION['ADMIN_FULLNAME']); 
unset($_SESSION['ADMIN_USERNAME']);  
unset($_SESSION['ADMIN_ROLE']); 
 
 unset($_SESSION['admin_gcCart']);
redirect("login.php?logout=1");
?>