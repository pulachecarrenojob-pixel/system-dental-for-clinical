<?php
	function strip_zeros_from_date($marked_string="") {
		//first remove the marked zeros
		$no_zeros = str_replace('*0','',$marked_string);
		$cleaned_string = str_replace('*0','',$no_zeros);
		return $cleaned_string;
	}
	function redirect_to($location = NULL) {
		if($location != NULL){
			header("Location: {$location}");
			exit;
		}
	}
	function redirect($location=Null){
		if($location!=Null){
			echo "<script>
					window.location='{$location}'
				</script>";	
		}else{
			echo 'error location';
		}
		 
	}
	function output_message($message="") {
	
		if(!empty($message)){
		return "<p class=\"message\">{$message}</p>";
		}else{
			return "";
		}
	}
	function date_toText($datetime=""){
		$nicetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $nicetime);	
					
	}
	
spl_autoload_register(function($class_name) {
    $class_name = strtolower($class_name);
    $path = LIB_PATH.DS."{$class_name}.php";
    if(file_exists($path)){
        require_once($path);
    }else{
        die("The file {$class_name}.php could not be found.");
    }
});



	function currentpage_public(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[2];
	  
	}

	function currentpage_admin(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[4];
	  
	}
  // echo "string " .currentpage_admin()."<br/>";
function curPageName() {
 return substr($_SERVER['REQUEST_URI'], 21, strrpos($_SERVER['REQUEST_URI'], '/')-24);
}

  // echo "The current page name is ".curPageName();

function currentpage(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[2];
	  
	}
	function publiccurrentpage(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[3];
	  
	}
	 // echo publiccurrentpage();
	function msgBox($msg=""){
		?>
		<script type="text/javascript">
			 alert(<?php echo $msg; ?>)
		</script>
		<?php
	}



	function Add_Invoice($invno,$sku,$class){
		global $mydb;

		$TotalQTY =0;
		$TotalTax  =0;
		$TotalAmount  =0;
		$stocks = 0;
		$sold = 0;
		$remaining = 0;
		$UserID = $_SESSION['ADMIN_USERID'];
		// $invno = $invno 
		$sql = "SELECT * FROM tblinvoice i,tblservices p WHERE i.SKU=p.SKU AND InvoiceNo='{$invno}' AND  (p.SKU='{$sku}' OR p.Services='{$sku}')";
		$mydb->setQuery($sql); 
		$res_row = $mydb->executeQuery();
		$max_row = $mydb->num_rows($res_row);

		if ($max_row > 0) { 
			$inv = $mydb->loadSingleResult(); 
			 
				$sql = "Select * From tblservices Where SKU='{$sku}' OR Services='{$sku}'";
				$mydb->setQuery($sql); 
				$cur = $mydb->executeQuery();
				$maxrow = $mydb->num_rows($cur);

				if ($maxrow > 0) { 
					$pro = $mydb->loadSingleResult();  

					if($pro->Description ==""){
						$desc ="";  
					}else{
						$desc=' | ' .$pro->Description;
					}

					$sku = $pro->SKU;
					$toothnumber = $pro->ToothNumber;
					$product=$pro->Services . $desc ;
					$OriginalPrice=$pro->OriginalPrice;
					$qty=$inv->QTY + 1;
					// $unit = $pro->Unit;
					$subtotal=$pro->OriginalPrice;
					// $taxrate=$pro->TaxRate; 
					$Remarks=""; 

 
					 // $tax = $subtotal / ($taxrate + 100) * $taxrate ;
 

	                  // $sql = "SELECT * FROM tblbulkpricing WHERE SKU ='{$sku}' AND '{$qty}' >= QTY ORDER BY QTY DESC";
	                  // $mydb->setQuery($sql);
	                  // $curbulk = $mydb->executeQuery($sql);
	                  // $numrow = $mydb->num_rows($curbulk);

	                  // if ($numrow > 0) { 
	                  //   $bulk = $mydb->loadSingleResult();

	                  //   $price = $bulk->Price / $bulk->QTY; 
	                  // }else{  
	                    $price =$OriginalPrice;
	                  // }

 

				 	$sql = "UPDATE tblinvoice SET Price='{$price}',QTY='{$qty}',SubTotal='{$price}'
					WHERE InvoiceNo='{$invno}' AND SKU='{$sku}'";
					$mydb->setQuery($sql); 
					$mydb->executeQuery(); 
 
				}


		

		}else{


				$sql = "Select * From tblservices Where SKU='{$sku}' OR Services='{$sku}'";
				$mydb->setQuery($sql); 
				$cur = $mydb->executeQuery();
				$maxrow = $mydb->num_rows($cur);

				if ($maxrow > 0) { 
					$pro = $mydb->loadSingleResult();  

					$sku = $pro->SKU;

					if($pro->Description ==""){
						$desc ="";  
					}else{
						$desc=' ( ' .$pro->Description . ' )';
					}
 
					$toothnumber = $pro->ToothNumber;
					$product=$pro->Services .$desc;
					$price=$pro->OriginalPrice;
					$qty=1; 
					$subtotal=$pro->OriginalPrice; 
					$Remarks="";
					$class ='Invoice';
 

					$inv = new Invoice();
					$inv->InvoiceNo          = $invno;
					$inv->SKU                = $sku;
					$inv->ToothNumber                = $toothnumber;
					$inv->Services           = $product;
					$inv->Price              = $price;
					$inv->QTY                = $qty; 
					$inv->SubTotal           = $subtotal;  
					$inv->Remarks            = $Remarks; 
					$inv->UserID             = $UserID;
					$inv->Class              = $class;
					$inv->create(); 
				}

		}


			// updating the payments
			$sql = "SELECT * FROM `tblinvoice` WHERE `InvoiceNo`='{$invno}'";
			$mydb->setQuery($sql);  
			$cur_inv = $mydb->loadResultList();

			foreach ($cur_inv as $result) {    
				// $TotalQTY += $result->QTY; 
				$TotalAmount += $result->Price;
			} 

  
		$sql = "UPDATE `tblpayments` SET  `TotalAmount`='{$TotalAmount}',`UserID`='{$UserID}' WHERE `InvoiceNo`='{$invno}'";
		$mydb->setQuery($sql);
		$mydb->executeQuery();
		// end of payments
 

			
}
function Update_Invoice($invno,$sku,$qty){
		global $mydb;

		$TotalQTY =0;
		$TotalTax  =0;
		$TotalAmount  =0;
		$stocks = 0;
		$sold = 0;
		$remaining = 0;
		$UserID = $_SESSION['ADMIN_USERID'];
		// $invno = $invno 
		$sql = "SELECT *,i.Price as invPrice FROM tblinvoice i, tblservices p WHERE i.SKU=p.SKU AND InvoiceNo='{$invno}' AND i.SKU='{$sku}'";
		$mydb->setQuery($sql); 
		$res_row = $mydb->executeQuery();
		$max_row = $mydb->num_rows($res_row);

		// echo $max_row;

		if ($max_row > 0) { 

			// geting the exact qty of the invoice



			$inv = $mydb->loadSingleResult();  
			$product=$inv;
			// $changePrice = $inv->ChangePrice;
			// $updatePrice=$inv->invPrice;   
			$OriginalPrice=$inv->OriginalPrice;   
			$Remarks=""; 


			// if ($changePrice == 0) {
				# code... 
	    //           $sql = "SELECT * FROM tblbulkpricing WHERE SKU ='{$sku}' AND '{$qty}' >= QTY ORDER BY QTY DESC";
	    //           $mydb->setQuery($sql);
	    //           $curbulk = $mydb->executeQuery($sql);
	    //           $numrow = $mydb->num_rows($curbulk);

	    //           if ($numrow > 0) { 
	    //             $bulk = $mydb->loadSingleResult(); 

	    //             $price = $bulk->Price / $bulk->QTY; 

	             

					// $subtotal=$price;

	    //           }else{  

	                $price =$OriginalPrice;
					$subtotal=$price;
	              // }
			// }else{
			// 	$price =$updatePrice;
			// 	$subtotal=$price * $qty; 
			// }



 


// updating invoice..
		 	$sql = "UPDATE tblinvoice SET Price='{$price}',QTY='{$qty}',SubTotal='{$subtotal}'
			WHERE InvoiceNo='{$invno}' AND SKU='{$sku}'";
			$mydb->setQuery($sql); 
			$mydb->executeQuery(); 


		// updating the payments
			$sql = "SELECT * FROM `tblinvoice` WHERE `InvoiceNo`='{$invno}'";
			$mydb->setQuery($sql);  
			$cur_inv = $mydb->loadResultList();

			foreach ($cur_inv as $result) {    
				$TotalQTY += $result->QTY; 
				$TotalAmount += $result->SubTotal;
			}
 
			$sql = "UPDATE `tblpayments` SET `TotalQTY`='{$TotalQTY}',  `TotalAmount`='{$TotalAmount}' , `UserID`='{$UserID}' WHERE `InvoiceNo`='{$invno}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery();
			// end of payments
  
		

		}   
			
} 



function enbledisbletax($taxinfo){
	global $mydb; 

	  $sql = "SELECT * FROM tbltaxsettings LIMIT 1";
	  $mydb->setQuery($sql);
	  $taxseting = $mydb->executeQuery($sql);
	  $numrow = $mydb->num_rows($taxseting);

	  if ($numrow > 0) { 
	    $taxres = $mydb->loadSingleResult();
	    if ($taxinfo=="Quote") {
	    	if ($taxres->TaxQuote==1) {
					$enable = 1;
				}else{
					$enable = 0;
				}
	    }else{
	    	if ($taxres->TaxInvoice==1) {
					$enable = 1;
				}else{
					$enable = 0;
				}
	    }
			
	  }else{  
	    $enable = 0;
	  }

	  echo $enable; 
}

// chnaging price for the invoice

function Update_Invoice_change_price($invno,$sku,$qty,$price,$chck){
		global $mydb;

		$TotalQTY =0;
		$TotalTax  =0;
		$TotalAmount  =0;
		$stocks = 0;
		$sold = 0;
		$remaining = 0;
		$UserID = $_SESSION['ADMIN_USERID'];
		// $invno = $invno 
		$sql = "SELECT *,i.Price as invPrice FROM tblinvoice i, tblservices p WHERE i.SKU=p.SKU AND InvoiceNo='{$invno}' AND i.SKU='{$sku}'";
		$mydb->setQuery($sql); 
		$res_row = $mydb->executeQuery();
		$max_row = $mydb->num_rows($res_row);

		// echo $max_row;

		if ($max_row > 0) { 

			// geting the exact price of the invoice

			$inv = $mydb->loadSingleResult();  

			$product=$inv; 
			$subtotal=$price;
			// $taxrate=$inv->TaxRate; 
			$Remarks=""; 


			 // $tax = $subtotal / ($taxrate + 100) * $taxrate ;

// SELECT `InvoiceID`, `InvoiceNo`, `SKU`, `Products`, `Price`, `QTY`, `Unit`, `SubTotal`, `TaxAmount`, `DateInvoiced`, `DueDate`, `Remarks`, `UserID`, `Class`, `ChangePrice` FROM `tblinvoice` WHERE 1
     
// updating invoice..
		 	$sql = "UPDATE tblinvoice SET Price='{$price}',QTY='{$qty}',SubTotal='{$subtotal}',TaxAmount='{$tax}',ChangePrice='{$chck}',Remarks='' WHERE InvoiceNo='{$invno}' AND SKU='{$sku}'";
			$mydb->setQuery($sql); 
			$res = $mydb->executeQuery(); 

			echo $res;


		// updating the payments
			$sql = "SELECT * FROM `tblinvoice` WHERE `InvoiceNo`='{$invno}'";
			$mydb->setQuery($sql);  
			$cur_inv = $mydb->loadResultList();

			foreach ($cur_inv as $result) {    
				$TotalQTY += $result->QTY;
				// $TotalTax += $result->TaxAmount;
				$TotalAmount += $result->SubTotal;
			}
 
			$sql = "UPDATE `tblpayments` SET `TotalQTY`='{$TotalQTY}', `TotalTax`='{$TotalTax}', `TotalAmount`='{$TotalAmount}' , `UserID`='{$UserID}' WHERE `InvoiceNo`='{$invno}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery();
			// end of payments


  
		

		}   
			
} 
?>