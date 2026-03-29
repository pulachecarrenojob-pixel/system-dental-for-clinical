<?php
   if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 

<script src="<?php echo web_root;?>dist/js/jquery-1.11.1.min.js"></script>
<style type="text/css">
 



</style>  
      <!--    <style type="text/css">
           .card-body .chartContainer{
            width: 100%;
            height: 200px;
           }
         </style>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <p class="card-category">Patient</p>
                  <h3 class="card-title"> 
                    <?php
                      $sql = "Select Count(*) as allmemeber From tblpatients";
                      @$mydb->setQuery($sql);
                      $p = @$mydb->loadSingleResult();
                      echo @$p->allmemeber;
                    ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo web_root;?>patients/index.php">
                    <i class="fa fa-info">  </i> View All</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-tree"></i>
                  </div>
                  <p class="card-category">Services <br/></p>
                  <h3 class="card-title">
                    <?php
                      $sql = "Select Count(*) as allmemeber From tblservices";
                      @$mydb->setQuery($sql);
                      $p = @$mydb->loadSingleResult();
                      echo @$p->allmemeber;
                      ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo web_root;?>services/index.php">
                    <i class="fa fa-info">  </i> View All</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <p class="card-category">Invoices</p>
                  <h3 class="card-title">
                    <?php
                      $sql = "Select Count(*) as allmemeber From tblinvoice";
                      @$mydb->setQuery($sql);
                      $p = @$mydb->loadSingleResult();
                      echo @$p->allmemeber;
                      ?> 
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo web_root;?>invoice/index.php?Sector=Solo Parent">
                    <i class="fa fa-info">  </i> View All</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <p class="card-category">Appointments</p>
                  <h3 class="card-title">
                    0
                    <?php
                      // $sql = "Select Count(*) as allmemeber From tblperson Where Sector='Buntis'";
                      // $mydb->setQuery($sql);
                      // $p = $mydb->loadSingleResult();
                      // echo $p->allmemeber;
                      ?> 
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo web_root;?>appointments/index.php?Sector=Buntis">
                    <i class="fa fa-info">  </i> View All</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr/>
         <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-barcode"></i>
                  </div>
                  <p class="card-category">Stocks</p>
                  <h3 class="card-title"> 
                    <?php
                      $sql = "Select Count(*) as allmemeber From tblstocks GROUP BY ProductID";
                      @$mydb->setQuery($sql);
                      $p = @$mydb->loadSingleResult();
                      echo @$p->allmemeber;
                    ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo web_root;?>stocks/index.php">
                    <i class="fa fa-info">  </i> View All</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-barcode"></i>
                  </div>
                  <p class="card-category">Sold <br/></p>
                  <h3 class="card-title">
                    <?php
                      $sql = "Select Count(*) as allmemeber From tblstocks WHERE Sold=1 GROUP BY ProductID";
                      @$mydb->setQuery($sql);
                      $p = @$mydb->loadSingleResult();
                      echo @$p->allmemeber;
                      ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo web_root;?>stockout/index.php">
                    <i class="fa fa-info">  </i> View All</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-bar-chart"></i>
                  </div>
                  <p class="card-category">Reports</p>
                  <h3 class="card-title">
                    <?php
                      $sql = "Select Count(*) as allmemeber From tblinvoice";
                      @$mydb->setQuery($sql);
                      $p = @$mydb->loadSingleResult();
                      echo @$p->allmemeber;
                      ?> 
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo web_root;?>reports/index.php?Sector=Solo Parent">
                    <i class="fa fa-info">  </i> View All</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <p class="card-category">Manage Users</p>
                  <h3 class="card-title"> 
                    <?php
                      $sql = "Select Count(*) as allmemeber From tblusers";
                      @$mydb->setQuery($sql);
                      $p = @$mydb->loadSingleResult();
                      echo @$p->allmemeber;
                      ?> 
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo web_root;?>index.php?Sector=Buntis">
                    <i class="fa fa-info">  </i> View All</a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          
<!--   <div class="search pull-right"> 
   <label>Search for:</label>
    <div ><input class="form-control" id="findProducts" placeholder="Services...." autocomplete="off" /></div> 
</div>  -->
<!------ Include the above in your HEAD tag ----------> 
  
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
    events: 'appointments/controller.php?action=loadevent', 
    selectHelper:false,  
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

            alert(appointmentsTime);



             var title = patients + ' / ' + services;
        

              if(title)
               { 

                  $.ajax({
                   url:"appointments/controller.php?action=insertevent",
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
      url:"appointments/controller.php?action=updateevent",
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
      url:"appointments/controller.php?action=updateevent",
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
       url:"appointments/controller.php?action=deleteevent",
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
  /*  .select2-close-mask{
    z-index: 2099;
}
.select2-dropdown{
    z-index: 3051;
}*/
  </style> 
  <?php

  date_default_timezone_set("Asia/Manila");
// echo "The time is " . date("h:i:sa");
?>
   <div id="calendar"></div> 
 <div class="clearfix"></div>

 <div class="modal" id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Appointments</h5>
    <!--     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <form class="form-horizontal span6" > 

       <div class="form-group">
        <div class="col-md-12">
          <label>**time format [12hrs.]</label>
          <input type="text"  name="appointmentTime" id="appointmentTime" class="form-control" placeholder="00:00" 
          value="<?php echo date("h:i:sa");?>" REQUIRED>
          
        </div> 
      </div>
          <div class="form-group">
        <div class="col-md-12">
          <select class="form-control select2" style="width: 100%" id="patients" REQUIRED>
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