<?php 
require_once("../include/initialize.php");   
	$sku = isset($_POST['id']) ? $_POST['id'] : '';



	$sql = "SELECT * FROM `tblservices`  WHERE   `SKU`=" .$sku;
	$mydb->setQuery($sql);
	$res = $mydb->loadSingleResult();


?>  
<div class="modal-dialog"  tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-content">
        <div class="modal-header">
            <a class="close"  href="">x</a>

            <h4 class="modal-title" id="myModalLabel">Bulk Pricing</h4>
            <div id="successmsg"></div>
        </div> 
           <div class="modal-body">

<style type="text/css">
.content-header {
	min-height: 50px;
	border-bottom: 1px solid #ddd;
	font-size: 15px;
	font-weight: bold;
}
.content-body {
	min-height: 100px;
	/*border-bottom: 1px solid #ddd;*/
	padding: 20px 0px;
}
.content-body >p {
	padding:10px;
	font-size: 12px;
	font-weight: bold;
	border-bottom: 1px solid #ddd;
}
.content-footer {
	min-height: 100px;
	border-top: 1px solid #ddd;

}
.content-footer > p {
	padding:5px;
	font-size: 15px;
	font-weight: bold; 
}
 
.content-footer textarea {
	width: 100%;
	height: 200px;
}
.content-footer  .submitbutton{  
	margin-top: 20px;
	/*padding: 0;*/

}

.bulkform {
	padding: 10px 0px;
}

.mytbl tr td {
	padding: 2px;
}

</style> 
<!-- <div class="col-sm-12 content-header" style="">Details</div> -->
<div class="col-sm-12 content-body" > 
	<p>Service Details</p> 
	<h3><?php echo $res->Services; ?></h3> 
<!-- `Description`, `OriginalPrice`, `MarkupPrice`, `Unit` --> 
		<ul>
            <li><i class="fp-ht-bed"></i>Description : <?php echo $res->Description; ?></li>
            <li><i class="fp-ht-food"></i>Price : <?php echo number_format($res->OriginalPrice,2);  ?></li> 
        </ul> 
</div> 
<div class="bulkform"> 
<form class="form-horizontal span6 " id="my_form" action="#" method="POST" autocomplete="off">

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for=
        "QTY">Quantity:</label> 
        <div class="col-md-8">
          <input type="hidden" name="SKU" value="<?php echo $sku; ?>">
          <input  class="form-control input-sm" id="QTY" name="QTY" placeholder=
              "Quantity" type="number" > 
        </div>
      </div>
    </div> 

  	<div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for=
        "Price">Bulk Price:</label> 
        <div class="col-md-8"> 
          <input  class="form-control input-sm" id="Price" name="Price"  placeholder=
              "Price" onkeypress="IsNumeric(this.value)"  > 
        </div>
      </div>
    </div>  

   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "idno"></label>   
      <div class="col-md-8">
         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button> 
     </div>
    </div>
  </div>  

  </form> 
</div>

<div class="col-sm-12 content-footer">
<p><i class="fa fa-paperclip"></i>  Bulk Prices</p>
 <div class="table-responsive">  
		<table   class="col-md-12  table-striped table-bordered  table-hover  mytbl"  cellspacing="0"> 
		  <thead> 
		  	<tr> 
		  		<th width="5%"></th>
				<th>Quantity</th>
				<th>Bulk Price</th>
				<th>Price</th> 
				<!-- <th width="10%">Action</th>  -->
		  	</tr>	
		  </thead> 
		  <tbody id="loadtable">
		  	<?php   
			    

			    $discounted_pricre = 0;

		  		$sql ="SELECT * FROM `tblbulkpricing` B,tblservices P WHERE B.SKU=P.SKU AND P.SKU='{$res->SKU}' ORDER BY QTY ASC";
 
		  		$mydb->setQuery($sql);
		  		$cur = $mydb->loadResultList();

				foreach ($cur as $result) {  

				$discounted_pricre = $result->Price / $result->QTY;	
		  		echo '<tr>'; 
		  			echo '<td align="center" >    
  		             <a title="Remove" href="#"  data-id="'.$result->BulkID.'"  class="btn btn-danger btn-md del  ">
  		             <span class="fa fa-trash-o fw-fa"></span></a> 
  					 </td>';
		  		echo '<td>'. $result->QTY.'</td>'; 
		  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->Price,2).'</a></td>';  
		  		echo '<td> '.$setDefault->default_currency(). ' ' . number_format($discounted_pricre,2).'</a></td>';  
 
		  		echo '</tr>';

		  		 
		  	} 
		  	?>
		  </tbody>
			
		</table>			 
 </div>	
</div> 
<br/>


            <div class="modal-footer">
                <a class="btn btn-default"  href="">Close</a>  
            </div> 
    </div><!-- /.modal-content-->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
         
 <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
  <script type="text/javascript">
 
 $("#my_form").submit(function(event){
    event.preventDefault(); //prevent default action 
  var qty = $("#QTY").val();
  var price = $("#Price").val(); 

  if (qty==0 || qty == 1 || qty =="") { alert("Please put the right quantity.");   $("#QTY").focus(); return false; }

  if (price==0 || price =="" || !IsNumeric(price)) { alert("Please put the right amount.");  $("#Price").focus(); return false; }

 
    	$.ajax({
	        type: "POST",
	        url: "controller.php?action=addbulk&modal=true",
	        data: $('#my_form').serialize(),
	        success: function (data) {
	          // alert(data);
	          $("#loadtable").html(data);
	          $("#QTY").val("");
	          $("#Price").val("");
	          $("#QTY").focus();
	          
      		}
      	}); 
});


$(".del").click(function(){

	var id;
	var sku;

	id=$(this).data("id");
	// alert(id);
	 
	// alert(sku);

	$.ajax({
	    type: "POST",
	    url: "controller.php?action=deletebulk&modal=true",
	    dataType :"text",
	    data:{id:id},
	    success: function (data) {
	      // alert(data);
	          $("#loadtable").html(data);
	          $("#QTY").val("");
	          $("#Price").val("");
	          $("#QTY").focus();
	      
		}
	}); 
	

});


 

function IsNumeric(input){
    var RE = /^-{0,1}\d*\.{0,1}\d+$/;
    return (RE.test(input));
}

</script>   
