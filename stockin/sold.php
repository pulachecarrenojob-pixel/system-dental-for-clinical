<?php 
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }

     $sql = "SELECT * FROM tblstocks WHERE ProductID='".$_GET['id']."'";
     $mydb->setQuery($sql);
     $res = $mydb->loadSingleResult(); 


     $sql = "SELECT (sum(`Stocks`) - sum(`Sold`)) remaining FROM `tblstocks` WHERE `ProductID`='".$res->ProductID."' GROUP BY `ProductID`";
     $mydb->setQuery($sql);
     $r = $mydb->loadSingleResult();
?>
<style type="text/css"> 
	 .table-client {
 		width: 100%;  
 	}
 	.table-client tr td {
 		border-bottom: 1px solid #ddd;
 		padding: 10px 0px 0px 0px;
 	}

</style>
<div class="col-md-12">
	<table class="table-client">
		<tr>
			<td width="20%">Product ID</td>
			<td> <?php echo $res->ProductID ?></td>
		 
			<td width="20%">Product</td>
			<td><?php echo $res->Products; ?></td>
		</tr>
    <tr>
      <td width="20%">Brand</td>
      <td><?php echo $res->Brand; ?></td>
      <td width="20%">Category</td>
      <td><?php echo $res->Category; ?></td>
    
		</tr> 
    <tr> 
      <td width="20%">Remaining Quantity</td>
      <td colspan="3"><?php echo $r->remaining; ?></td>
    
    </tr> 
	</table> 
</div> 
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">Deduct Quantity</h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form class="form-horizontal span6" action="controller.php?action=soldqty" Method="POST">  	 		
				  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Stocks">QTY:</label>

                        <input type="hidden" name="ProductID" value="<?php echo $res->ProductID; ?>">
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Stocks" name="Stocks" placeholder=
                            "Quantity" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div> 
         
                
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-md" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <a href="index.php" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> 
                     </div>
                    </div>
                  </div> 
				</form> 