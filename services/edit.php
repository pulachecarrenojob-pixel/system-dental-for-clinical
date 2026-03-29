<?php  
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
  
// $autonum = New Autonumber();
// $res = $autonum->single_autonumber(2);
 @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
 

  $product = New Services();
  $res = $product->single_product($id);
  
?>
     
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Modify</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">   

                  <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "SKU">ServiceID:</label>

                        <div class="col-md-8">
                          
                           <input class="form-control input-sm" id="SKU" name="SKU" placeholder=
                              "ServiceID" type="text" value="<?php echo $res->SKU;?>"  readonly="true" >
                        </div>
                      </div>
                    </div>
                    
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "ToothNumber">Tooth Number:</label>

                        <div class="col-md-8">
                          
                           <input class="form-control input-sm" id="ToothNumber" name="ToothNumber" placeholder=
                              "Tooth Number" type="number" value="<?php echo $res->ToothNumber; ?>" min="1" max="32">
                        </div>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Services">Service:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="Services" name="Services" placeholder=
                              "Service Name" type="text"   autocomplete="off" value="<?php echo $res->Services; ?>">
                        </div>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Description">Description:</label>

                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="Description" name="Description" placeholder=
                              "Description"  ><?php echo $res->Description; ?></textarea> 
                          </div>
                      </div>
                    </div>


                 <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "OriginalPrice">Price:</label>

                        <div class="col-md-4">
                          
                          <input  class="form-control input-sm" id="OriginalPrice" name="OriginalPrice" placeholder=
                              "Cost" value="<?php echo $res->OriginalPrice; ?>" > 
                        </div>
                            
                      </div>
                    </div>  

 
<!-- 
                 <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "OriginalPrice">Price:</label>

                        <div class="col-md-4">
                          
                          <input  class="form-control input-sm" id="OriginalPrice" name="OriginalPrice" placeholder=
                              "Cost" value="<?php echo $res->OriginalPrice; ?>" > 
                        </div>
                            <div class="col-md-2"> <a href="#"  data-toggle="modal" data-target="#addbulkmodal" class="btn btn-md btn-info addbulk" data-id="<?php echo  $res->SKU;?>"><i class="fa fa-plus"></i>Bulk Pricing</a>
                      </div>
                    </div> 
                  </div> -->
 

 
                          

              <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-md" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                          <a href="index.php" class="btn btn-md btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 


  </form>


             

 <div class="modal fade" id="addbulkmodal" tabindex="-1" data-backdrop="static" data-keyboard="false">

 </div>