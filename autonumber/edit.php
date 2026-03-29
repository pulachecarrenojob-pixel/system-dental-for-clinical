<?php
   if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $AUTOKEY = $_GET['id'];
  $autonumber = New Autonumber();
  $singleauto = $autonumber->single_autonumber($AUTOKEY);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST" autocomplete="off">

            <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Autonumber</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

         <!--<div class="form-group">-->
         <!--           <div class="col-md-8">-->
         <!--             <label class="col-md-4 control-label" for=-->
         <!--             "AUTOKEY">Key:</label>-->

         <!--             <div class="col-md-8">-->
                         <input class="form-control input-sm" id="AUTOKEY" name="AUTOKEY" placeholder=
                            "Key" type="hidden" value="<?php  echo $singleauto->AUTOKEY; ?>">
                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</div>-->

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "AUTOSTART">Prefix:</label>

                      <div class="col-md-8">
                      <input  type="hidden" name="AUTOID" id="AUTOID" value="<?php  echo $singleauto->AUTOID; ?>">
                         <input class="form-control input-sm" id="AUTOSTART" name="AUTOSTART" placeholder=
                            "Prefix" type="text" value="<?php  echo $singleauto->AUTOSTART; ?>">
                      </div>
                    </div>
                  </div>

                 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "AUTOEND">Sequence #:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="AUTOEND" name="AUTOEND" placeholder=
                            "Sequence #" type="text" value="<?php  echo $singleauto->AUTOEND; ?>">
                      </div>
                    </div>
                  </div>

                <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "AUTOINC">Increment Value:</label>
                
                          <div class="col-md-8">
                             <input class="form-control input-sm" id="AUTOINC" name="AUTOINC" placeholder=
                                "Increment Value" type="text" value="<?php  echo $singleauto->AUTOINC; ?>">
                          </div>
                        </div>
                      </div>
                 


            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      
                      <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                    <a href="index.php" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> 
                      </div>
                    </div>
                  </div>

              
          </fieldset> 

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

        </div><!--End of container-->
  