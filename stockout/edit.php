<?php 
   if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
     
  $ProductID = $_GET['id'];
  $stock = New Stocks();
  $res = $stock->single_stock($ProductID);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

       
        <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Modify Products</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
 
                        <input type="hidden" name="ProductID" value="<?php echo $res->ProductID; ?>">
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Products">Products:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Products" name="Products" placeholder=
                            "Product Name" type="text" value="<?php echo $res->Products; ?>" autocomplete="off">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Brand">Brand:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Brand" name="Brand" placeholder=
                            "Brand Name" type="text" value="<?php echo $res->Brand; ?>" autocomplete="off">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Category">Category:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Category" name="Category" placeholder=
                            "Category" type="text" value="<?php echo $res->Category; ?>" autocomplete="off">
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Description">Description:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="Description" name="Description" placeholder=
                            "Description" type="text" value=""   onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->Description; ?></textarea>
                  
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


 <!-- <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
  <script type="text/javascript">
    var map = null;
    var directionsDisplay = null;
    var directionsService = null;
    function initialize() {
        
      var input = document.getElementById('S_Address');
      var searchBox = new google.maps.places.SearchBox(input); 

       var input = document.getElementById('F_Address');
      var searchBox = new google.maps.places.SearchBox(input); 
    } 
    $(document).ready(function() {
        initialize();
    });
 
  </script>   
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places"> </script> -->
       