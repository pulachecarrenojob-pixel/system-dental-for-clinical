<?php
   if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" autocomplete="off">

                <div class="row">
                   <div class="col-lg-12">
                      <h1 class="page-header">Add New Currency</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 </div> 
 <!-- // ` SELECT `TaxID`, `TaxRate`, `ActiveTax` FROM `tbltaxrate` WHERE 1 -->
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CurrencySymbol">Currency:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="CurrencySymbol" name="CurrencySymbol" placeholder=
                            "Currency" type="text" value="" autocomplete="off">
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
      
 <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places"> </script>

 