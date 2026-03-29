<?php 
 if(!isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
   }

  $autonum = New Autonumber();
  $res = $autonum->set_autonumber('SKU');

 ?> 
<!-- // SELECT `SKU`, `ProductName`, `Description`, `OriginalPrice`, `MarkupPrice`, `Unit`, `SuplierID` FROM `tblproduct` WHERE 1 -->

           <div class="center wow fadeInDown">
                 <h2 class="page-header">Add New Product</h2> 
            </div> 
 
                  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validate_fields()">

                      <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "SKU">SKU:</label>

                        <div class="col-md-8">
                          
                           <input class="form-control input-sm" id="SKU" name="SKU" placeholder=
                              "SKU" type="text" value="<?php echo $res->AUTO;?>"  readonly="true" >
                        </div>
                      </div>
                    </div>
        
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "ProductName">Product:</label>

                        <div class="col-md-8">
                          
                           <input class="form-control input-sm" id="ProductName" name="ProductName" placeholder=
                              "Product Name" type="text" value="" >
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
                        "MarkupPrice">Markup Price:</label>

                        <div class="col-md-8">
                          
                          <input  class="form-control input-sm" id="MarkupPrice" name="MarkupPrice" placeholder=
                              "Markup Price"  >
                        </div>

                      
                      </div>
                    </div> 
 
                     <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "Unit">Units:</label>

                          <div class="col-md-8">
                            <select class="form-control input-sm select2" id="Unit" name="Unit">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="Select * From tblunit ";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  echo '<option value='.$row->Units.'>'.$row->Units.'</option>';
                                }

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>  


                     <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "TaxRate">Tax Rate:</label>

                          <div class="col-md-8">
                            <select class="form-control input-sm select2" id="TaxRate" name="TaxRate">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="Select * From tbltaxrate ";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  echo '<option value='.$row->TaxRate.'>'.$row->TaxRate.' %</option>';
                                }

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>  

                      <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "SuplierID">Supplier:</label>

                          <div class="col-md-8">
                            <select class="form-control input-sm select2" id="SuplierID" name="SuplierID">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="Select * From tblsuplier ";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  echo '<option value='.$row->Suplier.'>'.$row->Suplier.'</option>';
                                }

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>  

                       <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "SupplierDeal">Supplier Deal:</label>

                        <div class="col-md-8"> 
                         <textarea  class="form-control input-sm" rows="4" id="SupplierDeal" name="SupplierDeal" placeholder=
                              "Supplier Notes"  ></textarea> 
                          </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "SupplierNotes">Supplier Notes:</label>

                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="SupplierNotes" name="SupplierNotes" placeholder=
                              "Supplier Notes" rows="4" ></textarea> 
                          </div>
                      </div>
                    </div>
                 
                   
              <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "OriginalPrice">Supplier Cost:</label>

                        <div class="col-md-8">
                          
                          <input  class="form-control input-sm" id="OriginalPrice" name="OriginalPrice" placeholder=
                              "Suplier Cost"  > 
                        </div>
                      </div>
                    </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 
 

                  </form> 


           
 