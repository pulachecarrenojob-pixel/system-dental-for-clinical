<?php 
   if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
     
  $PatientID = $_GET['id'];
  $client = New Patients();
  $res = $client->single_patient($PatientID);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

       
        <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Client</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Fname">First Name:</label>

                      <div class="col-md-8">
                        <input type="hidden" name="PatientID" value="<?php echo $res->PatientID; ?>">
                         <input class="form-control input-sm" id="Fname" name="Fname" placeholder=
                            "Firts Name" type="text" value="<?php echo $res->Fname; ?>" autocomplete="off">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Mname">Middle Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Mname" name="Mname" placeholder=
                            "Middle Name" type="text" value="<?php echo $res->Mname; ?>" autocomplete="off">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Lname">Last Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Lname" name="Lname" placeholder=
                            "Last Name" type="text" value="<?php echo $res->Lname; ?>" autocomplete="off">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "F_Address">Address:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="F_Address" name="F_Address" placeholder=
                            "Address" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->F_Address; ?></textarea>
                  
                      </div>
                    </div>
                  </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Sex">Sex:</label>

                      <div class="col-md-8">
                      <select  class="form-control input-sm" id="Sex" name="Sex"> 
                        <option <?php echo ($res->Sex=='Male') ? 'SELECTED': '';?>>Male</option>
                        <option <?php echo ($res->Sex=='Female') ? 'SELECTED': '';?>>Female</option>
                      </select>
                      </div>
                    </div>
                  </div>

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Age">Age:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Age" name="Age" placeholder=
                            "Age" type="number" min="2" max="100" value="<?php echo $res->Age; ?>" autocomplete="off">
                      </div>
                    </div>
                  </div>
  

                    
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ContactNo">Contact No.:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                            "Contact No." type="text" value="<?php echo $res->ContactNo; ?>" autocomplete="none">
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
       