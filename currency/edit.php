<?php 
   if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
     
  $CurrencyID = $_GET['id'];
  $currency = New Currency();
  $res = $currency->single_currency($CurrencyID);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

       
        <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Currency</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                  
           

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CurrencySymbol">Currency:</label>

                      <div class="col-md-8">
                        <input type="hidden" name="CurrencyID" value="<?php echo $res->CurrencyID;?>">
                         <input class="form-control input-sm" id="CurrencySymbol " name="CurrencySymbol" placeholder=
                            "Currency" type="text" value="<?php echo $res->CurrencySymbol;?>" autocomplete="off">
                      </div>
                    </div>
                  </div>
 


            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8"> 
                      <button class="btn btn-primary btn-md" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button> <a href="index.php" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> 
                   
                      </div>
                    </div>
                  </div>

              
   
        </form>

 

       