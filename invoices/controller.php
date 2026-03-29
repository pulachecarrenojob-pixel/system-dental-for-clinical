<?php
require_once ("../include/initialize.php");
if(!isset($_SESSION['ADMIN_USERID'])){
  redirect(web_root."admin/index.php");
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
        
        case 'updatedate':
        # code...
        doUpdateDate();
        break;
        case 'updatetaxsummary':
        # code...
        doUpdateTaxSummary();
        break;
        case 'payemnt':
        # code...
        doUpdateStatus();
        break;
	} 
	
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){ 

			$TotalQTY =0;
			$TotalTax  =0;
			$TotalAmount  =0;

		$autonum = New Autonumber();
		$res = $autonum->set_autonumber('INVOICENO');
		$invno = $res->AUTO;

			$stocks = 0;
			$sold = 0;
			$remaining = 0;
			  if (!empty($_SESSION['admin_gcCart'])){   
                $count_cart = count($_SESSION['admin_gcCart']); 
                    for ($i=0; $i < $count_cart  ; $i++) { 
                    	$sku = $_SESSION['admin_gcCart'][$i]['pid'];
                        $product = $_SESSION['admin_gcCart'][$i]['product'];
                        $price = $_SESSION['admin_gcCart'][$i]['price'];
                        $qty = $_SESSION['admin_gcCart'][$i]['qty']; 
                        $subtotal = $_SESSION['admin_gcCart'][$i]['subtotal'];
                        $tax = $_SESSION['admin_gcCart'][$i]['taxrate'];
                        $DateInvoiced = date_format(date_create($_POST['DateInvoiced']),'Y-m-d');
                        $DueDate = date_format(date_create($_POST['DueDate']),'Y-m-d');
                        $Remarks = "Remarks";
                        $UserID = $_SESSION['ADMIN_USERID'];
                        $ClientID = $_POST['ClientID'];
                        $toothnumber = $_SESSION['admin_gcCart'][$i]['toothnumber'];

                    	
                        $sql = "Select * From tblproduct WHERE SKU='".$_SESSION['admin_gcCart'][$i]['pid']."'";
                        $mydb->setQuery($sql);   
                        $res = $mydb->loadSingleResult();

                        $unit = $res->Unit;
 
 
                        $inv = new Invoice();
                        $inv->InvoiceNo          = $invno;
                        $inv->SKU                = $sku;
                        $inv->ToothNumber        = $toothnumber;
                        $inv->Products           = $product;
                        $inv->Price              = $price;
                        $inv->QTY                = $qty;
                        $inv->Unit               = $unit;
                        $inv->SubTotal           = $subtotal;
                        $inv->TaxAmount          = $tax;
                        $inv->DateInvoiced       = $DateInvoiced;
                        $inv->DueDate            = $DueDate;
                        $inv->Remarks            = $Remarks; 
                        $inv->UserID             = $UserID;
                        $inv->Class              = 'Invoice';
                        $inv->create(); 
                             

                    	$TotalQTY += $qty;
                    	$TotalTax += $tax;
                    	$TotalAmount += $subtotal;
                   
                    }
 

                	$sql = "INSERT INTO `tblpayments` (`InvoiceNo`, `TotalQTY`, `TotalTax`, `TotalAmount`, `ClientID`, `UserID`) 
                								 VALUES('{$invno}','{$TotalQTY}','{$TotalTax}','{$TotalAmount}','{$ClientID}','{$UserID}')";
                	$mydb->setQuery($sql);
                	$mydb->executeQuery();

                    unset($_SESSION['admin_gcCart']);
                    unset($_SESSION['ClientID']);

					$autonum = New Autonumber(); 
					$autonum->auto_update('INVOICENO');

                    message("Invoice created successfully!", "success");
				// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
		    	   redirect("index.php");
                }else{
                	message("Transaction is Invalid.", "success");
				// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
		    	   redirect("index.php?view=add");

                }

		}

	} 

	function doUpdate(){
		global $mydb;
		if(isset($_POST['save'])){ 

			$TotalQTY =0;
			$TotalTax  =0;
			$TotalAmount  =0;
 
			$stocks = 0;
			$sold = 0;
			$remaining = 0;




			  if (!empty($_SESSION['admin_gcCart'])){   

                $invno = $_POST['InvoiceNo'];

			  	$sql = "Delete FROM tblinvoice WHERE InvoiceNo='{$invno}'";
            	$mydb->setQuery($sql);
            	$mydb->executeQuery();


                $count_cart = count($_SESSION['admin_gcCart']); 
                    for ($i=0; $i < $count_cart  ; $i++) { 
                    	$sku = $_SESSION['admin_gcCart'][$i]['pid'];
                        $product = $_SESSION['admin_gcCart'][$i]['product'];
                    	$price = $_SESSION['admin_gcCart'][$i]['price'];
                    	$qty = $_SESSION['admin_gcCart'][$i]['qty']; 
                    	$subtotal = $_SESSION['admin_gcCart'][$i]['subtotal'];
                    	$tax = $_SESSION['admin_gcCart'][$i]['taxrate'];
                    	$DateInvoiced = date_format(date_create($_POST['DateInvoiced']),'Y-m-d');
                    	$DueDate = date_format(date_create($_POST['DueDate']),'Y-m-d');
                    	$Remarks = "Remarks";
                    	$UserID = $_SESSION['ADMIN_USERID'];
                    	$ClientID = $_POST['ClientID'];


                        $sql = "Select * From tblproduct WHERE SKU='".$_SESSION['admin_gcCart'][$i]['pid']."'";
                        $mydb->setQuery($sql);   
                        $res = $mydb->loadSingleResult();

                        $unit = $res->Unit;
 
 
                 			$inv = new Invoice();
	                    	$inv->InvoiceNo          = $invno;
	                    	$inv->SKU                = $sku;
                            $inv->Products           = $product;
	                    	$inv->Price              = $price;
	                    	$inv->QTY                = $qty;
                            $inv->Unit               = $unit;
	                    	$inv->SubTotal           = $subtotal;
	                    	$inv->TaxAmount          = $tax;
	                    	$inv->DateInvoiced       = $DateInvoiced;
	                    	$inv->DueDate            = $DueDate;
	                    	$inv->Remarks            = $Remarks; 
	                    	$inv->UserID             = $UserID;
	                    	$inv->Class              = 'Invoice';
	                    	$inv->create(); 
		                     

                    		$TotalQTY += $qty;
	                    	$TotalTax += $tax;
	                    	$TotalAmount += $subtotal;
 
                    }
 

                	$sql = "UPDATE `tblpayments` SET  `TotalQTY`='{$TotalQTY}', `TotalTax`='{$TotalTax}'
                								, `TotalAmount`='{$TotalAmount}', `UserID`='{$UserID}' WHERE InvoiceNo='{$invno}'";  
                	$mydb->setQuery($sql);
                	$mydb->executeQuery();

                   
                    unset($_SESSION['admin_gcCart']);
                    unset($_SESSION['ClientID']);


                    message("Invoice updated successfully!", "success"); 
		    	   redirect("index.php");
                }else{
                	message("Transaction is Invalid.", "success"); 
		    	   redirect("index.php?view=edit");

                }

		}

		 
	}

function doDelete(){
	global $mydb;
	$invno = $_GET['id'];
	$sql = "DELETE FROM `tblinvoice` WHERE `InvoiceNo`='{$invno}'";
	$mydb->setQuery($sql);
    $mydb->executeQuery(); 

	$sql ="DELETE FROM `tblpayments` WHERE `InvoiceNo`='{$invno}'";
	$mydb->setQuery($sql);
    $mydb->executeQuery(); 
 


	message("Invoice has been deleted!", "success");
	// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
	redirect("index.php");

	}


    function doUpdateDate(){

        global $mydb;

        $invno = $_POST['invno'];
        $invdate = date_format(date_create($_POST['invdate']),'Y-m-d');
        $duedate = date_format(date_create($_POST['duedate']),'Y-m-d');

        $sql = "UPDATE `tblpayments` SET `InvoiceDate`='{$invdate}', `DateDue`='{$duedate}'  WHERE `InvoiceNo`='{$invno}'";
        $mydb->setQuery($sql);
        $mydb->executeQuery();

        $sql = "UPDATE `tblinvoice` SET `DateInvoiced`='{$invdate}', `DueDate`='{$duedate}'  WHERE `InvoiceNo`='{$invno}'";
        $mydb->setQuery($sql);
        $mydb->executeQuery();
    }
    
      function doUpdateTaxSummary(){
        enbledisbletax("Invoice");
    }

    function doUpdateStatus(){
        global $mydb;
            $invno = $_GET['id'];
            $sql = "UPDATE tblpayments SET Status='Paid'   WHERE InvoiceNo = '{$invno}'";
            $mydb->setQuery($sql);
            $mydb->executeQuery();
            message("Invoice Status has been changed!", "success");
            redirect("index.php");
    }
?>