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
 

  $product = New Product();
  $res = $product->single_product($id);
 
  $Suplier = $res->Suplier;
  $taxrate = $res->TaxRate;
  $unit = $res->Unit;
?>
     
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Product</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">   

                  <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "SKU">SKU:</label>

                        <div class="col-md-8">
                          
                           <input class="form-control input-sm" id="SKU" name="SKU" placeholder=
                              "SKU" type="text" value="<?php echo $res->SKU;?>"  readonly="true" >
                        </div>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "ProductName">Product:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="ProductName" name="ProductName" placeholder=
                              "Product Name" type="text"   autocomplete="off" value="<?php echo $res->ProductName; ?>">
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
                        "MarkupPrice">Markup Price:</label>

                        <div class="col-md-6">
                          
                          <input  class="form-control input-sm" id="MarkupPrice" name="MarkupPrice" placeholder=
                              "Markup Price"  value="<?php echo $res->MarkupPrice; ?>"> 
                        </div>
                          <div class="col-md-2"> <a href="#"  data-toggle="modal" data-target="#addbulkmodal" class="btn btn-xs btn-info addbulk" data-id="<?php echo  $res->SKU;?>"><i class="fa fa-plus"></i>Bulk Pricing</a>
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
                                $cur  = $mydb->loadResultList();
                                foreach ($cur as $row) {
                                  # code...
                                    if ($unit==$row->Units) {
                                    # code...
                                        echo '<option SELECTED value='.$row->Units.'>'.$row->Units.'</option>';
                                    }else{
                                      echo '<option  value='.$row->Units.'>'.$row->Units.'</option>';

                                    }
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
                                $cur  = $mydb->loadResultList();
                                foreach ($cur as $row) {

                                   if ($taxrate== $row->TaxRate) {
                                    # code...
                                        echo '<option SELECTED value='.$row->TaxRate.'>'.$row->TaxRate.' %</option>';
                                    }else{
                                      echo '<option  value='.$row->TaxRate.'>'.$row->TaxRate.' %</option>';

                                    } 
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
                                $sql ="Select * From tblsuplier";
                                $mydb->setQuery($sql);
                                $cur  = $mydb->loadResultList();
                                foreach ($cur as $row) {
                                  # code...
                                  if ($Suplier == $row->Suplier) {
                                    # code...
                                     echo '<option SELECTED value='.$row->Suplier.'>'.$row->Suplier.'</option>';
                                  }else{
                                    echo '<option  value='.$row->Suplier.'>'.$row->Suplier.'</option>';

                                  }
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
                              "Supplier Notes"  ><?php echo $res->SupplierDeal; ?></textarea> 
                          </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "SupplierNotes">Supplier Notes:</label>

                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="SupplierNotes" name="SupplierNotes" placeholder=
                              "Supplier Notes" rows="4" ><?php echo $res->SupplierNotes; ?></textarea> 
                          </div>
                      </div>
                    </div>

                 <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "OriginalPrice">Supplier Cost:</label>

                        <div class="col-md-8">
                          
                          <input  class="form-control input-sm" id="OriginalPrice" name="OriginalPrice" placeholder=
                              "Suplier Cost" value="<?php echo $res->OriginalPrice; ?>" > 
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


             

 <div class="modal fade" id="addbulkmodal" tabindex="-1" data-backdrop="static" data-keyboard="false">

 </div>