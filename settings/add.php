<?php
   if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" autocomplete="off">

                <div class="row">
                   <div class="col-lg-12">
                      <h1 class="page-header">Add New Supplier</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 </div> 
 <!-- // ` `SuplierID`, `Suplier`, `SuplierDeal`, `SuplierNotes` -->
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Suplier">Supplier:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Suplier" name="Suplier" placeholder=
                            "Suplier" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>

                    <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SuplierDeal">Deal:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="SuplierDeal" name="SuplierDeal" placeholder=
                            "Deal" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>




                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SuplierNotes">Notes:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="SuplierNotes" name="SuplierNotes" placeholder=
                            "Notes" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
                  
                      </div>
                    </div>
                  </div>  -->

                
                
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-xs" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
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

 