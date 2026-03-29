 <div class="modal fade" id="addClientModal" tabindex="-1" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" data-dismiss="modal" type=
            "button">x</button>

            <h4 class="modal-title" id="myModalLabel">Add New Client</h4>
            <div id="successmsg"></div>
        </div>

       <form id="my_form" class="form-horizontal span6 " method="POST" action="" >
           <div class="modal-body">
              
                     <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "Fname">First Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Fname" name="Fname" placeholder=
                            "Firts Name" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "Mname">Middle Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Mname" name="Mname" placeholder=
                            "Middle Name" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "Lname">Last Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Lname" name="Lname" placeholder=
                            "Last Name" type="text" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "F_Address">Address:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="F_Address" name="F_Address" placeholder=
                            "Address 1" type="text" value=""   onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
                  
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-10">
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
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "Age">Age:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="Age" name="Age" placeholder=
                            "Age" type="number" min="2" max="100" value="" autocomplete="off">
                      </div>
                    </div>
                  </div>
 
                    
                  <div class="form-group">
                    <div class="col-md-10">
                      <label class="col-md-4 control-label" for=
                      "ContactNo">Contact No.:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                            "Contact No." type="text" value="" autocomplete="none">
                      </div>
                    </div>
                  </div>  
                    
            </div>

            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type=
                "button">Close</button> <button class="btn btn-primary"
                name="save" type="submit">Save</button>
            </div>
        </form>
    </div><!-- /.modal-content-->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->  

         
 <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
  <script type="text/javascript">
 
 $("#my_form").submit(function(event){
    event.preventDefault(); //prevent default action 
    $.ajax({
        type: "POST",
        url: "<?php echo web_root;?>patients/controller.php?action=add&modal=true",
        data: $('#my_form').serialize(),
        success: function (data) {
          // alert(data);
          $("#successmsg").html(data);

           $.ajax({
            type:"POST",  
            url: "loaddata.php",    
            dataType: "text",  //expect html to be returned           
            success: function(data){    
             $('#searchclient').hide();   
             $('#searchclient').fadeIn(); 
             $('#searchclient').html(data);   
            } 
          });
 


        }
      });

     
});


  </script>   
 