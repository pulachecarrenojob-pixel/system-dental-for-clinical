<?php  
      if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
if(!$_SESSION['ADMIN_ROLE']=='Administrator'){
  redirect(web_root."admin/index.php");
}
  @$USERID = $_SESSION['ADMIN_USERID'];
    if($USERID==''){
  redirect("index.php");
}
  $user = New User();
  $singleuser = $user->single_user($USERID);
 
 
  ?>
<div class="container">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
         <a  data-target="#myModal" data-toggle="modal" href="" title="Click here to Change Image." >
            <img alt="" style="width:500px; height:400px;>"
             title="" class="img-circle img-thumbnail isTooltip" src="<?php echo web_root.'user/'. $singleuser->PicLoc;?>" data-original-title="Usuario"> 
         </a>  
        </div>
        <div class="col-md-8">
            <h1><strong>Profile</strong></h1><br>
             <form class="form-horizontal span6" action="controller.php?action=edit&view=" method="POST">
  
                         <input id="USERID" name="USERID" type="Hidden" value="<?php echo $singleuser->UserID; ?>">
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_NAME">Name:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_NAME" name="U_NAME" placeholder=
                            "Account Name" type="text" value="<?php echo $singleuser->FullName; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_USERNAME">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_USERNAME" name="U_USERNAME" placeholder=
                            "Email Address" type="text" value="<?php echo $singleuser->Username; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_PASS">Password:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="U_PASS" name="U_PASS" placeholder=
                            "Account Password" type="Password" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_ROLE">Role:</label>

                      <div class="col-md-8">
                       <select class="form-control input-sm" name="U_ROLE" id="U_ROLE">
                       <!-- <?php if($_SESSION['ADMIN_ROLE']=="Administrator"){ ?> -->
                          <option value="Administrator"  <?php echo ($singleuser->Role=='Administrator') ? 'selected="true"': '' ; ?>>Administrator</option>
                     <!--    <?php }else{ ?>
                           <option value="Store"  <?php echo ($singleuser->Role=='Store') ? 'selected="true"': '' ; ?>>Administrator</option>
                        <?php } ?>  -->
                          <option value="Staff" <?php echo ($singleuser->Role=='Staff') ? 'selected="true"': '' ; ?>>Staff</option>  
                        </select> 
                      </div>
                    </div>
                  </div>

            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                         <button class="btn btn-primary " name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                          <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span>&nbsp;<strong>List of Users</strong></a> -->
                      </div>
                    </div>
                  </div> 
        </form>
      
             
        </div>
    </div>
</div>
</div>
            

     <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                </div>

                <form action="controller.php?action=photos" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="rows">
                        <div class="col-md-12">
                          <div class="rows">
                            <div class="col-md-8">
                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                              <input name="MAX_FILE_SIZE" type=
                              "hidden" value="1000000"> <input id=
                              "photo" name="photo" type=
                              "file">
                            </div>

                            <div class="col-md-4"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Close</button> <button class="btn btn-primary"
                    name="savephoto" type="submit">Upload Photo</button>
                  </div>
                </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
  <script type="text/javascript">
    var map = null;
    var directionsDisplay = null;
    var directionsService = null;
    function initialize() {
        var myLatlng = new google.maps.LatLng(10.640739,122.968956);
        var myOptions = {
            zoom: 7,
            center: {lat:10.640739, lng:122.968956},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvas").get(0), myOptions);
      directionsDisplay = new google.maps.DirectionsRenderer();
      directionsService = new google.maps.DirectionsService();
      var input = document.getElementById('StoreAddress');
      var searchBox = new google.maps.places.SearchBox(input); 
    } 
    $(document).ready(function() {
        initialize();
    });
 
  </script>  
  <div  id="results" style="width: 990px; height: 500px;display: none;">
    <div id="map_canvas" style="width: 80%; height: 100%; float: left;"></div>
  </div> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places"> </script>

<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU"></script>  -->
<script type="text/javascript">

  $("#StoreAddress").on("keyup",function(){ 
      var geocoder = new google.maps.Geocoder();
      var address = $(this).val();
      if (address=='' ) {
          $("#lat").val('');
          $("#lng").val('');
      }else{
         geocoder.geocode( { 'address': address}, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
              var latitude = results[0].geometry.location.lat();
              var longitude = results[0].geometry.location.lng();

              $("#lat").val(latitude);
              $("#lng").val(longitude);

              // alert(latitude);
              // alert(longitude)
            } 
          }); 
      }

     

  });


</script>


 