<?php 
require_once("include/initialize.php");
 
if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user->userAuthentication($email, $h_upass);
    if ($res==true) { 
       // message("You logon as ".$_SESSION['ADMIN_ROLE'].".","success"); 

        redirect(web_root."index.php");
    }else{
      message("Account does not exist!", "error");
       redirect(web_root."login.php"); 
    }
 }
 } 
 ?> 