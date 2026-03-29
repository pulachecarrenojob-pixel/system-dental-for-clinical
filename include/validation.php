<?php 
require_once('database.php');
/**
 * 
 */
class Validate
{
	
	// function __construct()
	// { 
	// 	 $this->default_tax();
	// 	 $this->default_currency(); 
	// }

	 
	function default_tax(){
		global $mydb;

		$sql = "SELECT * FROM `tbltaxrate` WHERE ActiveTax=1";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);

		if ($maxrow > 0) { 
			$res = $mydb->loadSingleResult();  
			 return $res->TaxRate;  
		 }
	 }  

	function default_currency(){
		global $mydb;

		$sql = "SELECT * FROM `tblcurrency` WHERE ActiveCurrency=1";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$maxrow = $mydb->num_rows($cur);

		if ($maxrow > 0) { 
			$res = $mydb->loadSingleResult();  
			 return  $res->CurrencySymbol;  
		}
	}  

}
$setDefault = new Validate();
?>