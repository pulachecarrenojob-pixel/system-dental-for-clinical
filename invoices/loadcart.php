<?php
require_once("../include/initialize.php");
if (isset($_POST['SKU'])) {
	# code...
	$sku = $_POST['SKU']; 
	$invno =$_POST['invno'];
	Add_Invoice($invno,$sku,"Invoice"); 
}

if (isset($_POST['updateCart'])) {
	# code...   
	
	$sku=$_POST['PROID']; 
	$invno = $_POST['invno'];
	$qty=intval(isset($_POST['QTY']) ? $_POST['QTY'] : "");
 
	Update_Invoice($invno,$sku,$qty);
		  
}

if (isset($_POST['btnChangePrice'])) {
	# code...
	$invno = $_POST['invno'];
	$sku = $_POST['sku'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$chck = $_POST['chck'];

	 Update_Invoice_change_price($invno,$sku,$qty,$price,$chck);
}

if (isset($_POST['deleteCart'])) {

	$productID=$_POST['ProductID'];  
	$invno = $_POST['invno'];


  		$TotalQTY =0;
		$TotalTax  =0;
		$TotalAmount  =0;
		$stocks = 0;
		$sold = 0;
		$remaining = 0;

 
		$Remarks = "Remarks";
		$UserID = $_SESSION['ADMIN_USERID'];
 

		$sql = "DELETE FROM tblinvoice WHERE InvoiceNo='{$invno}' AND SKU='{$productID}'";
		$mydb->setQuery($sql); 
		$mydb->executeQuery(); 


	    $sql = "SELECT * FROM tblinvoice WHERE InvoiceNo='{$invno}'";
		$mydb->setQuery($sql); 
		$res = $mydb->loadResultList();

		foreach ($res as $row) {
			# code... 
  
			@$qty = $row->QTY; 
			@$subtotal = $row->SubTotal;
			@$tax = $row->TaxAmount; 

			$TotalQTY += $qty;
			$TotalTax += $tax;
			$TotalAmount += $subtotal;
		}
 
		$sql = "UPDATE `tblpayments` SET `TotalQTY`='{$TotalQTY}', `TotalAmount`='{$TotalAmount}' WHERE `InvoiceNo`='{$invno}'";
		$mydb->setQuery($sql);
		$mydb->executeQuery();
  
}
 
?>

<table class="table table-bordered" >
<thead> 
	<th width="5%"></th>  
	<th width="12%">Tooth Number</th>   
	<th>Services</th> 
	<th width="10%">Price</th>  
	<!-- <th width="15%">Line Total</th>  -->
</thead>
<tbody > 
	<?php 
	$invno =$_SESSION['invno'];
	$totalamount = 0; 
    $subtotal = 0; 
    // $taxrate=0;
 

	$sql = "SELECT * FROM `tblinvoice` WHERE `InvoiceNo`='{$invno}'";
	$mydb->setQuery($sql);   
	$cur_inv = $mydb->loadResultList();
	foreach ($cur_inv as $row) {
		# code... 
	 	echo '<tr>';
    	echo '<td><a class="delCart btn btn-xs btn-danger fa fa-trash" title="remove" style="text-decoration:none;" href="#" data-id="'.$row->SKU.'"></a></td>';
    	echo '<td>'.$row->ToothNumber.'</td>'; 
    	// echo '<td><input type="number" name="qty" id="qty'.$row->SKU.'" min="1" class="form-control input-cart" autocomplete="off" value="'.$row->QTY.'" data-id="'.$row->SKU.'"></td>'; 
 		echo '<td>'.$row->Services.'</td>';

 		if ($_SESSION['ADMIN_ROLE']=='Administrator') {
 			# code...

 		// echo '<td>'.$setDefault->default_currency(). ' '.number_format($row->Price,2).' <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalLong'.$row->SKU.'">Change Price</a></td>'; 

 		echo '<td>'.$setDefault->default_currency(). ' '.number_format($row->Price,2).' </td>'; 
 		}else{

 		echo '<td>'.$setDefault->default_currency(). ' '.number_format($row->Price,2).'</td>'; 
 		}
 	 
 		// change price modal
 		
 		// end 
 		// echo '<td>'.$setDefault->default_currency(). ' '.number_format($row->SubTotal,2).'</td>';
 		echo '</tr>';

 		// changePriceModal($invno,$row->SKU,$row->QTY,$row->Price,$setDefault->default_currency());
	}  
?> 
</tbody>
</table> 
<?php
 
    $sql = "SELECT  * FROM `tblinvoice`  WHERE   `InvoiceNo`='{$invno}'";
    $mydb->setQuery($sql);
    $inv = $mydb->loadResultList();
    foreach ($inv as $result) {
      # code... 
      $linetotal = $result->Price;
      // $taxrate = $result->TaxAmount; 



      $subtotal += $linetotal; 
      $totalamount += $linetotal;
      // $totaltax += $taxrate;
    }

?>
 
 <div class="row"> 
   <div class="table-responsive">   
	 	<div class="col-md-6 pull-right">
	 		<table class="table-summary" style="font-size: 15px">
	 		 
	 			<tr> 
	 				<td id="summary-name" width="18%">Total</td>
	 				<td class="right"><?php echo $setDefault->default_currency(); ?> <span style="color: red;font-size:25px;"><?php echo number_format($totalamount,2); ?> </span> </td>
	 			</tr> 
	 		</table>
	 	</div> 
   </div>  
 </div>
</div>







<script type="text/javascript" src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"> </script>

<script type="text/javascript">
	
	$(".input-cart").on("focusout",function(){ 
		var sku = $(this).data('id'); 
		var qty = document.getElementById("qty"+sku).value; 
		var inv = document.getElementById('InvoiceNo').value; 

		// var discount = document.getElementById("discount"+sku).value; 
		var dataString = 'invno='+ inv + '&QTY='+ qty + '&PROID=' + sku +  '&updateCart=';

    
	      $.ajax({
	        type:"POST",  
	        url: "loadcart.php",    
	        dataType: "text",  //expect html to be returned           
	        data:dataString,
	         beforeSend: function() { 
		         $("#loading-client").show(); 
		          $("#invoicing-body").hide(); 
           },
	    //   	complete:function() {
	    //        $("#loading-client").remove();
	  		// },
	        success: function(data){  
	       	$("#loading-client").hide();   
          	$("#invoicing-body").show();  
	         // $('#loadcart').hide();   
	         $('#loadcart').show(); 
	         $('#loadcart').html(data);   
	        } 


	      });  
	});

    $(".input-cart").on("keypress",function(e){ 
			 if(e.keyCode == 13) {

				var sku = $(this).data('id'); 
				var qty = document.getElementById("qty"+sku).value;  
				var inv = document.getElementById('InvoiceNo').value;

				// alert(sku)

				// var discount = document.getElementById("discount"+sku).value; 
				var dataString = 'invno='+ inv + '&QTY='+ qty + '&PROID=' + sku +  '&updateCart=';

		    
			      $.ajax({
			        type:"POST",  
			        url: "loadcart.php",    
			        dataType: "text",  //expect html to be returned           
			        data:dataString,
			         beforeSend: function() { 
				         $("#loading-client").show(); 
				          $("#invoicing-body").hide(); 
		           },
			    //   	complete:function() {
			    //        $("#loading-client").remove();
			  		// },
			        success: function(data){  
			       	$("#loading-client").hide();  
		          	$("#invoicing-body").show();  
			         // $('#loadcart').hide();   
			         $('#loadcart').show(); 
			         $('#loadcart').html(data);   
			        } 


			      });  

  				e.preventDefault();
	  		}
	});

	$(".input-cart").click(function(){
		$(this).select();
	});

	$(".delCart").on("click",  function(){

    var id  = $(this).data('id'); 
	var inv = document.getElementById('InvoiceNo').value;
	var dataString = 'invno='+ inv + '&ProductID=' + id +  '&deleteCart=';
    // var subtot; 
 // alert(id)
    $.ajax({
        type:"POST",
        url:  "loadcart.php",
        dataType: "text", 
		data:dataString,
         beforeSend: function() {
          $("#loading-client").show(); 
          $("#invoicing-body").hide(); ;  
      	},
    //   	complete:function() {
    //        $("#loading-client").remove();
  		// },
        success: function(data) {
        	$("#loading-client").hide();
            $("#invoicing-body").show(); 

         
	       // $('#loadcart').hide();   
	       $('#loadcart').show(); 
	       $('#loadcart').html(data);  
	     }
    });


});



	$(".btnChangePrice").on("click",  function(){

		var id = $(this).data('id');
 
 		var chck = document.getElementById(id+'chkOriginalPrice').checked;
		var invno = document.getElementById(id+'minvno').value;
		var sku = document.getElementById(id+'msku').value;
		var qty = document.getElementById(id+'mqty').value;
		var price = document.getElementById(id+'mprice').value;

		if (chck==false) {
			intChk = 1;
		}else{
			intChk = 0;
		}

 

		var dataString = 'invno='+ invno + '&sku=' + sku +  '&qty=' + qty +  '&price=' + price +  '&chck=' + intChk +  '&btnChangePrice=';
  //   // var subtot; 
 		// alert(dataString)
    $.ajax({
        type:"POST",
        url:  "loadcart.php",
        dataType: "text", 
		data:dataString,
         beforeSend: function() {
          $("#loading-client").show(); 
          $("#invoicing-body").hide();  
      	},
 
        success: function(data) {
        	$("#loading-client").hide();
            $("#invoicing-body").show(); 

         // alert(data);
	       // $('#loadcart').hide();   
	       $('#loadcart').show(); 
	       $('#loadcart').html(data);  

	     }
    });


});



$(".chkOriginalPrice").on("click",  function(){

		var id = $(this).data('id');
  
		var chck = document.getElementById(id+'chkOriginalPrice').checked;
		var price = document.getElementById(id+'mprice');
		var omprice = document.getElementById(id+'originalmprice').value;

 

		var dataString =  '&chck=' + chck +  '&price=' + price.value +  '&omprice=' + omprice;
 
		// alert(dataString);

		if (chck == true) {
			price.disabled =true;
			price.value = omprice;
		}else{
				price.disabled =false;
			price.value = "";
		}
});



</script>

<?php
function changePriceModal($invno,$sku,$qty,$price,$currency) {  
global $mydb;
	$sql ="SELECT * FROM `tblproduct` WHERE `SKU`='{$sku}'";
	$mydb->setQuery($sql);
	$p = $mydb->loadSingleResult();
?>
	<!-- <div class="modal" tabindex="-1" role="dialog" id="exampleModalLong<?php echo $sku;?>" data-backdrop="static" data-keyboard="false"> -->
	 <div class="modal" tabindex="-1" role="dialog" id="exampleModalLong<?php echo $sku;?>"> 
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Change Price</h5>
	      <!--   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button> -->
	      </div>
	      <div class="modal-body">
	        <p>Price : <label><?php echo $currency.$price;?></label></p>
	        <p>Change Price : <input class="input-cart" type="" id="<?php echo $sku;?>mprice" value=""> <input data-id="<?php echo $sku;?>"  class="chkOriginalPrice" type="checkbox" id="<?php echo $sku;?>chkOriginalPrice" value="">Back to Original Price</p>
	         <input type="hidden" id="<?php echo $sku;?>originalmprice" value="<?php echo $p->MarkupPrice;?>">
	        <input type="hidden" id="<?php echo $sku;?>minvno" value="<?php echo $invno;?>">
	        <input type="hidden" id="<?php echo $sku;?>msku" value="<?php echo $sku;?>">
	        <input type="hidden" id="<?php echo $sku;?>mqty" value="<?php echo $qty;?>">
	      </div>
	      <div class="modal-footer">
	        <a href="#" data-id="<?php echo $sku;?>" class="btn btn-primary btnChangePrice" name="btnChangePrice" id="btnChangePrice"  data-dismiss="modal">Save changes</a>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
<?php } ?>
