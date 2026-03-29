<?php
   if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
  <?php

  date_default_timezone_set("Asia/Manila");
// echo "The time is " . date("h:i:sa");
?>
<script src="<?php echo web_root;?>dist/js/jquery-1.11.1.min.js"></script>
<style type="text/css">
 



</style>   
  <script type="text/javascript">
     function getTwentyFourHourTime(amPmString) { 
        var d = new Date("1/1/2013 " + amPmString); 
        return d.getHours() + ':' + d.getMinutes(); 
    }
      
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
     eventOrder: "eventOrder",
     // displayEventTime : false,
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'controller.php?action=loadevent', 
    selectHelper:true,  
     selectable: true,
    selectConstraint: {
        start: $.fullCalendar.moment().subtract(1, 'days'),
        end: $.fullCalendar.moment().startOf('month').add(1, 'month')
    },
    select: function(start, end, allDay)
    {

      

      $('#myModal').modal('show');
     // var title = prompt("Enter Appointment");  
        
       var start = $.fullCalendar.formatDate(start, "Y-MM-D");
       var end = $.fullCalendar.formatDate(end, "Y-MM-D");
 
      $("#saveappointment").click(function(){  

            var patients = $('#patients').val();
            var services = $('#services').val();
            var appointmentsTime = getTwentyFourHourTime($("#appointmentTime").val());


             var title = patients + ' / ' + services;
        

              if(title)
               { 

                  $.ajax({
                   url:"controller.php?action=insertevent",
                   type:"POST",
                   data:{title:title, start:start + ' ' +  appointmentsTime , end:start  + ' ' +  appointmentsTime},
                   success:function()
                   {
                    // calendar.fullCalendar('refetchEvents');
                    // alert("Added Successfully");
                    $('#myModal').modal('hide');
                    window.location = "index.php";
                   }
                  });
               }
     }); 

  
    },
    editable:true, 
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-d HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-d HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"controller.php?action=updateevent",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       // alert('Appointment Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-d H:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-d H:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"controller.php?action=updateevent",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       // alert("Appointment Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"controller.php?action=deleteevent",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        // alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script> 
  <style type="text/css">
    .container > .calendar{
      width: 100%;
    }
  </style> 
   <div id="calendar"></div> 
 <div class="clearfix"></div>

 <div class="modal" id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Appointments</h5>
   <!--      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <form class="form-horizontal span6" > 

           <div class="form-group">
        <div class="col-md-12"> 
          <label>**time format [24hrs.]</label>
          <input type="text"  name="appointmentTime" id="appointmentTime" class="form-control" placeholder="00:00" value="<?php echo date('H:i:sa');?>" REQUIRED>
          
        </div> 
      </div>
          <div class="form-group">
        <div class="col-md-12">
          <select class=" select2" style="width: 100%" id="patients" REQUIRED>
            <option value="">Select Patients</option>
            <?php
              $mydb->setQuery("SELECT * FROM `tblpatients`");
                $cur = $mydb->loadResultList(); 
              foreach ($cur as $result) {
                echo '<option>' . $result->Lname.', ' . $result->Fname.' ' . $result->Mname.'<option>';
              }
            ?>
          </select>
          
        </div> 
      </div>
        <div class="form-group">
        <div class="col-md-12">
          <select class="form-control" id="services" REQUIRED>
            <option value="">Select Services</option>
            <?php
            $sql ="SELECT * FROM `tblservices` GROUP BY Services";
                $mydb->setQuery($sql);
                $cur = $mydb->loadResultList(); 
              foreach ($cur as $result) {
                echo '<option>'.$result->Services.'<option>';
              }
            ?>
          </select>
          
        </div>
      </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="saveappointment" class="btn btn-primary">Save changes</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <a href="index.php" class="btn btn-secondary" >Close</a>
      </div>
    </div>
  </div>
</div>