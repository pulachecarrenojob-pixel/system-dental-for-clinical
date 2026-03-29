<?php
   if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."login.php");
     }
?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" autocomplete="off">

                <div class="row">
                   <div class="col-lg-12">
                      <h1 class="page-header">Add New</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 </div> 
  

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Fname">First Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Fname" name="Fname" placeholder=
                            "Firts Name" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Mname">Middle Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Mname" name="Mname" placeholder=
                            "Middle Name" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Lname">Last Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Lname" name="Lname" placeholder=
                            "Last Name" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "F_Address">Address:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="F_Address" name="F_Address" placeholder=
                            "Address 1" type="text" value=""   onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
                  
                      </div>
                    </div>
                  </div> 

                                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Sex">Sex:</label>

                      <div class="col-md-8">
                      <select  class="form-control input-sm" id="Sex" name="Sex">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                      </div>
                    </div>
                  </div>



                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BirthDate">Date of Birth:</label>

                      <div class="col-md-8">
                         <div class="input-group date  " data-provide="datepicker" data-date="2012-12-21T15:25:00Z">
                            <input type="input" class="form-control input-sm date_picker date_inv" id="DateInvoiced" name="BirthDate" placeholder="mm/dd/yyyy"   autocomplete="off" required value="<?php echo date_format(date_create(date('Y-m-d')),'m/d/Y');?>" /> 
                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                          </div>
                      </div>
                    </div>
                  </div>

               <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Age">Age:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Age" name="Age" placeholder=
                            "Age" type="text" min="2" max="100" maxlength="2" value="" autocomplete="off">
                      </div>
                    </div>
                  </div> -->
 
                    
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ContactNo">Contact No.:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                            "Contact No." type="text" value="" maxlength="11" autocomplete="none">
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

 