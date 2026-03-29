<?php 
 if(!isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
   }

  $autonum = New Autonumber();
  $res = $autonum->set_autonumber('SKU');

 ?> 
<!-- // SELECT `SKU`, `ProductName`, `Description`, `OriginalPrice`, `MarkupPrice`, `Unit`, `SuplierID` FROM `tblproduct` WHERE 1 -->

           <div class="center wow fadeInDown">
                 <h2 class="page-header">Add New</h2> 
            </div> 
 
                  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validate_fields()">

                      <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "SKU">ServiceID:</label>

                        <div class="col-md-8">
                          
                           <input class="form-control input-sm" id="SKU" name="SKU" placeholder=
                              "ServiceID" type="text" value="<?php echo $res->AUTO;?>"  readonly="true" >
                        </div>
                      </div>
                    </div>
                    
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "ToothNumber">Tooth Number:</label>

                        <div class="col-md-8">
                          
                           <input class="form-control input-sm" id="ToothNumber" name="ToothNumber" placeholder=
                              "Tooth Number" type="number" value="" min="1" max="32">
                        </div>
                      </div>
                    </div>
        
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Services">Service:</label>

                        <div class="col-md-8">
                          
                           <input class="form-control input-sm" id="Services" name="Services" placeholder=
                              "Service Name" type="text" value="" >
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Description">Description:</label>

                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="Description" name="Description" placeholder=
                              "Description"  ></textarea> 
                          </div>
                      </div>
                    </div>
 
                
                 
                   
              <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "OriginalPrice">Price:</label>

                        <div class="col-md-8">
                          
                          <input  class="form-control input-sm" id="OriginalPrice" name="OriginalPrice" placeholder=
                              "Cost"  > 
                        </div>
                      </div>
                    </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-md" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <a href="index.php" class="btn btn-md btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a>
                     
                     </div>
                    </div>
                  </div> 
 

                  </form> 


           
 