<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>
          <?php
          global $setDefault; 
           $user = New User();
           $singleuser = $user->single_user($_SESSION['ADMIN_USERID']);

            // if (currentpage()!="invoices" || currentpage()!="quotes" ) {
            //   # code...
            //   unset($_SESSION['admin_gcCart']);
            //   unset($_SESSION['ClientID']);

              
            // }
           echo 'Dental Clinic';

          ?>
        </title>
       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->

        <link rel="stylesheet" href="<?php echo web_root;?>fullcalendar/fullcalendar.min.css" />
        <link rel="stylesheet" href="<?php echo web_root;?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css">
 
        <link rel="stylesheet" href="<?php echo web_root;?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo web_root;?>dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" href="<?php echo web_root;?>plugins/datatables/jquery.dataTables.min.css">  

        <link rel="stylesheet" href="<?php echo web_root; ?>plugins/select2/select2.css"> 

        <link rel="stylesheet" href="<?php echo web_root; ?>plugins/teeth/style.css"> 
        <!-- <link rel="stylesheet" href="<?php echo web_root; ?>plugins/calendar/style.css">  -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 
        <link href="<?php echo web_root; ?>dist/css/jquery.treetable.css" rel="stylesheet">
        <link href="<?php echo web_root; ?>dist/css/jquery.treetable.theme.default.css" rel="stylesheet">

<style type="text/css">
  .stretch-img img {
    width: 100%;
    height: 100%;
  }

     thead{
        background: #3c8dbc;
          background: -webkit-linear-gradient(left, #367fa9, #3c8dbc);
          background: -o-linear-gradient(left, #367fa9, #3c8dbc);
          background: -moz-linear-gradient(left, #367fa9, #3c8dbc);
          background: linear-gradient(left, #367fa9, #3c8dbc);

          color: #fff;
    }
</style>
 <style type="text/css">
   .table{
    white-space: nowrap;
   }

 </style>

    </head>

 <body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo web_root;?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini stretch-img"><b><img src="<?php echo web_root;?>/dist/img/logo.png"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dental Clinic</b></span>
      <!-- A web based medical store locator with android application -->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          

    
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" style="padding-right: 15px;"  >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo web_root.'user/'. $singleuser->PicLoc;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $singleuser->FullName; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"> 
                <img data-target="#menuModal"  data-toggle="modal"  src="<?php echo web_root.'user/'. $singleuser->PicLoc;?>" class="img-circle" alt="User Image" />  
              </li> 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo web_root.'user/index.php?view=view&id='.$singleuser->UserID ;?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo web_root ;?>logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>



 <div class="modal fade" id="menuModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">x</button>

                                    <h4 class="modal-title" id="myModalLabel">Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>user/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8"> 
                                                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                                                              <input name="MAX_FILE_SIZE" type="hidden" 
                                                              value="1000000"> 
                                                              <input id="photo" name="photo" type="file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content-->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->  



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu"> 
        <li  class="<?php echo (currentpage() == 'index.php') ? "active" : false;?>" >
          <a href="<?php echo web_root ;?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>  
          </a> 
        </li> 
        <li class="<?php echo (currentpage() == 'patients') ? "active" : false;?>" >
          <a href="<?php echo web_root ;?>patients/">
            <i class="fa fa-users"></i> <span>Patients</span> 
          </a>
        </li>


        <?php if($_SESSION['ADMIN_ROLE']=="Administrator"){ ?>  
        <li class="<?php echo (currentpage() == 'services') ? "active" : false;?>" >
          <a href="<?php echo web_root ;?>services/">
            <i class="fa fa-tree"></i> <span>Services</span> 
          </a>
        </li> 
          <?php } ?> 
        <li class="<?php echo (currentpage() == 'invoices') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>invoices/">
            <i class="fa fa-dollar"></i> <span>Invoices</span>  
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'appointments') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>appointments/">
            <i class="fa fa-calendar"></i> <span>Appointments</span>  
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'stockin') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>stockin/">
            <i class="fa fa-barcode"></i> <span>Supplies</span>  
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'prescription') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>prescription/">
            <i class="fa fa-barcode"></i> <span>Add Prescription to Patien</span>  
          </a>
        </li> 
         <?php if($_SESSION['ADMIN_ROLE']=="Administrator"){ ?> 
        <li class="<?php echo (currentpage() == 'inventoryreports') ? "active" : false;?>">
          <a href="<?php echo web_root; ?>inventoryreports/">
            <i class="fa fa-bar-chart"></i> <span>Inventory Reports</span> </a>
        </li> 
        <li class="<?php echo (currentpage() == 'reports') ? "active" : false;?>">
          <a href="<?php echo web_root; ?>reports/">
            <i class="fa fa-bar-chart"></i> <span>Sales Reports</span> </a>
        </li> 
       <li class="treeview <?php echo (currentpage() == 'user' || currentpage() == 'suplier' ||
       currentpage() == 'taxrate' || currentpage() == 'discountrate' || currentpage() == 'currency' || 
       currentpage() == 'units' || currentpage() == 'settings' ||  currentpage() == 'taxsettings' || currentpage() == 'autonumber') ? "active" : false;?>">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Settings</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a> 
          <ul class="treeview-menu">
            <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>"><a href="<?php echo web_root;?>user/"><i class="fa fa-circle-o"></i> Manage Users</a></li>
            <!-- <li class="<?php echo (currentpage() == 'suplier') ? "active" : false;?>"><a href="<?php echo web_root ;?>suplier/"><i class="fa fa-circle-o"></i> Manage Suppliers</a></li> -->
            <!-- <li class="<?php echo (currentpage() == 'taxrate') ? "active" : false;?>"><a href="<?php echo web_root ;?>taxrate/"><i class="fa fa-circle-o"></i> Tax Rates</a></li> -->
            <!-- <li class="<?php echo (currentpage() == 'discountrate') ? "active" : false;?>"><a href="<?php echo web_root ;?>discountrate/"><i class="fa fa-circle-o"></i> Discount Rates</a></li> -->
            <li class="<?php echo (currentpage() == 'currency') ? "active" : false;?>"><a href="<?php echo web_root ;?>currency/"><i class="fa fa-circle-o"></i> Currency</a></li>
            <!-- <li class="<?php echo (currentpage() == 'units') ? "active" : false;?>"><a href="<?php echo web_root ;?>units/"><i class="fa fa-circle-o"></i> Units</a></li> -->
            <li class="<?php echo (currentpage() == 'settings') ? "active" : false;?>"><a href="<?php echo web_root ;?>settings/"><i class="fa fa-circle-o"></i> Header and Footer</a></li>
             <!-- <li class="<?php echo (currentpage() == 'taxsettings') ? "active" : false;?>"><a href="<?php echo web_root ;?>taxsettings/"><i class="fa fa-circle-o"></i> Enable | Disable Tax</a></li> -->
            <!-- <li class="<?php echo (currentpage() == 'autonumber') ? "active" : false;?>"><a href="<?php echo web_root ;?>autonumber/"><i class="fa fa-circle-o"></i> Autonumbers</a></li> -->
          </ul>
        </li> 
        <?php } ?> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        
        <?php echo isset($title) ? $title : ''; ?>
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <?php

          if ($title!='Dashboard') {
            # code... 
            $active_title = '';
            if (isset($_GET['view'])) {
              # code...
              $active_title = '<li class='.$active_title.'><a href="index.php">'.$title.'</a></li>';
            }else{
              $active_title = '<li class='.$active_title.'>'.$title.'</li>';
            }
            echo '<li><a href='.web_root.'><i class="fa fa-dashboard"></i> Dashboard</a></li>';
            echo  $active_title;
            echo  isset($_GET['view']) ? '<li class="active">'.$_GET['view'].'</li>' : '';
          } 


        ?>
      </ol>
    </section>
         <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <div id="check_msg">
              <?php 
              if ($title!='Dashboard') {
               echo  check_message() ;
              } 
              ?>
            </div>
                <?php 
               require_once $content; 
               ?> 
             </div>
             </div>
           </div>
         </div>
         </section>
 </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.2
    </div>
    <strong>Copyright &copy; 2018 <a href="">Villarimo Dental Clinic</a>.</strong> All rights
    reserved.
  </footer>

  

    </body>
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"> </script>

<script src="<?php echo web_root;?>fullcalendar/lib/moment.min.js"></script>
<script src="<?php echo web_root;?>fullcalendar/fullcalendar.min.js"></script>

      <script type="text/javascript" src="<?php echo web_root; ?>bootstrap/js/bootstrap.min.js" ></script>
      <script src="<?php echo web_root;?>dist/js/app.min.js"></script> 

      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js" ></script> 
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datatables/dataTables.bootstrap.min.js" ></script> 
      <script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script> 

      <script src="<?php echo web_root; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>

      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/select2/select2.full.min.js"></script> 
      <!-- <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/calendar/script.js"></script>  -->
     
 

<!-- <script src="<?php echo web_root;?>fullcalendar/lib/jquery.min.js"></script> -->
<script>  

function hideMsg(){
  $("#check_msg").hide();
} 
setTimeout(function(){ hideMsg(); }, 3000);  
  
setTimeout(function(){ window.location = "<?php echo web_root; ?>logout.php"; }, 1800000); 


  $(".addbulk").click(function(){

    var sku = $(this).data("id")
    // alert(id)

    $.ajax({
      type:"POST",
      url : "modalproduct.php",
      dataType : "text",
      data:{id:sku},
      success:function(data){
          $("#addbulkmodal").html(data);
      }
    })

  });
    
  $(function(){
    $(".btn-danger").click(function(){
       if (confirm("Are you sure you want to delete this?")) {
        return true;
       }else{
        return false;
       }
    })
  });

    $(function(){
    $(".btn-trans").click(function(){
       if (confirm("Are you sure you want to cancel this?")) {
        return true;
       }else{
        return false;
       }
    })
  });

   $(function(){ 
      $.ajax({
        type:"POST",  
        url: "loaddata.php",    
        dataType: "text",  //expect html to be returned           
        success: function(data){    
         // $('#searchclient').hide();   
         $('#searchclient').show(); 
         $('#searchclient').html(data);   
        } 
      });
  });


 $(function(){ 
      $.ajax({
        type:"POST",  
        url: "loadcart.php",    
        dataType: "text",  //expect html to be returned           
        success: function(data){    
         // $('#loadcart').hide();   
         $('#loadcart').show(); 
         $('#loadcart').html(data);   
        } 
      });
  });


  $(function(){
     $('.select2').select2();
  });

// $(".select2").select2({
//     dropdownParent: $('#myModal')
// });
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
        $(document)
        .off('focusin.bs.modal') // guard against infinite focus loop
        .on('focusin.bs.modal', $.proxy(function (e) {
            if (this.$element[0] !== e.target && !this.$element.has(e.target).length && !$(e.target).closest('.select2-dropdown').length) {
                this.$element.trigger('focus')
            }
        }, this))
    }

  $(function () {
    $("#dash-table").DataTable({
       "iDisplayLength": 50
    });
    $('#dash-table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
       });
  });
  $(function () {
    $("#dash-tables").DataTable ({
      // "paging": true,
      // "lengthChange": false,
      // "searching": true,
      // "ordering": true,
      // "info": true,
      // "autoWidth": true,
       "order": [[2, "desc" ]],
        // "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "iDisplayLength": 50

       });
  });

$('input[data-mask]').each(function() {
  var input = $(this);
  input.setMask(input.data('mask'));
});

$('#appointmentTime').inputmask({
    mask: "h:s t\\m",
    placeholder: "hh:mm xm",
    alias: "datetime",
    hourFormat: "12"
});

// $('input[id$="appointmentTime"]').inputmask("hh:mm", {
//         // placeholder: "hh:MM TT", 
//         insertMode: false, 
//         showMaskOnHover: false,
//         hourFormat: 12
//       }
//  );
// $('#appointmentTime').inputmask({  
//     alias: "datetime",  
//     placeholder: "12:00 AM",   
//     inputFormat: "hh:MM TT",  
//     insertMode: false,   
//     showMaskOnHover: false, 
//     hourFormat: 12 
//    }
 

$('#DueDate').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});

$('#DateInvoiced').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});

 
$('.date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
  startDate : '01/01/1950', 
  language:  'en',
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1, 
  startView: 2,
  minView: 2,
  forceParse: 0 

});


 

$("#addtoinvoice").on("click",function(e){
 
  var inv = document.getElementById('InvoiceNo').value; 
  var product = document.getElementById("SKU").value; 
      $.ajax({
        type:"POST",  
        url: "loadcart.php",    
        dataType: "text",  //expect html to be returned      
        data :{SKU:product,invno:inv},
         beforeSend: function() {
          $("#loading-client").show(); 
          $("#invoicing-body").hide(); 
        },         
        success: function(data){  
         $("#loading-client").hide();  

         $("#invoicing-body").show(); 
         // $('#loadcart').hide();   
         $('#loadcart').show(); 
         $('#loadcart').html(data);   

          $("#SKU").val('');
         $("#SKU").focus();
        } 
      });
      
  e.preventDefault(); 
}); 
// $("#SKU").on("change",function(){ 

//   var inv = document.getElementById('InvoiceNo').value; 
//   var product = $(this).val();
//       $.ajax({
//         type:"POST",  
//         url: "loadcart.php",    
//         dataType: "text",  //expect html to be returned   
//         data :{SKU:product,invno:inv},
//          beforeSend: function() { 
//           $("#loading-client").show(); 
//           $("#invoicing-body").hide(); 
//           },      
//         success: function(data){   
//          $("#loading-client").hide(); 
//          // $('#loadcart').hide();   
//          $("#invoicing-body").show(); 
//          $('#loadcart').show(); 
//          $('#loadcart').html(data);   

//          $("#SKU").val('');
//          $("#SKU").focus();
//         } 
//       }); 
// });



</script>
   

<link href="<?php echo web_root; ?>plugins/autocomplete/jquery.auto-complete.css" rel="stylesheet" media="screen">
<script src="<?php echo web_root; ?>plugins/autocomplete/jquery.auto-complete.min.js"></script> 

<?php  

$sql = "Select * From tblservices";
$mydb->setQuery($sql);
$cur = $mydb->loadResultList();
foreach ($cur as $result) {
  # code... 
   $products[] = $result->Services;  
} 
 
?>

<script> 
  var pro = <?php echo json_encode($products) ?>; 

  $( "#SKU").autoComplete({
    minChars:  1,
    source: function(term, suggest){
        term = term.toLowerCase();
        var choices =pro;
        var matches = [];
        for (i=0; i<choices.length; i++)
            if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
        suggest(matches);
    }
});



$("#findProducts").on("keyup",function(){ 

<?php  
$sql = "Select * From tblservices ";
$mydb->setQuery($sql);
$cur = $mydb->loadResultList();
foreach ($cur as $result) {
  # code... 
   $data_products[] = $result->Services;   
}  
?>   
var availableTags = <?php echo json_encode($data_products) ?>; 
}); 

  
$( "#findProducts").autoComplete({
    minChars:  0,
    source: function(term, suggest){
        term = term.toLowerCase();
        var choices =availableTags;
        var matches = [];
        for (i=0; i<choices.length; i++)
            if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
        suggest(matches);
    }
}); 


$("#findProducts").on("keyup",function(){
 
var searchvalue = $(this).val(); 
 
  $.ajax({
    type : "POST",
    url : "loaddashboard.php",
    dataType : "text",
    data :{search_data:searchvalue},
    success: function(data){ 
      $("#loaddashboard").html(data);
    //   alert(data)

    }
  });

});

$("#findProducts").on("change",function(){

var searchvalue = $(this).val(); 
 

  $.ajax({
    type : "POST",
    url : "loaddashboard.php",
    dataType : "text",
    data :{search_data:searchvalue},
    success: function(data){ 
      $("#loaddashboard").html(data);

    }
  });

});

 function validate_fields(){
    var unit;
    var supplierid;

    unit = $("#Unit").val(); 
    supplierid = $("#SuplierID").val();

    if(unit == "None"){
      alert("Please choose a unit for the Product.")
      return false
    }
    if(supplierid=="None"){
      alert("Please choose a supplier for the Product.")
      return false
    }

    // return true;

  }


 $(".date_inv").on("change",function(){ 

    var invdate = document.getElementById('DateInvoiced').value;
    var duedate = document.getElementById('DueDate').value;
    var invno = document.getElementById('InvoiceNo').value;
    var dataString = 'invdate=' + invdate + '&duedate=' + duedate + '&invno=' + invno;

    $.ajax({
      type : "POST",
      url : "controller.php?action=updatedate",
      dataType : "text",
      data :dataString,
      success: function(data){  
        // alert(data)
      }
    });

 });
 
  </script>

 <script type="text/javascript">
   $(".editinv").click(function(){
      var id = $(this).data("id");
      // alert(id);
      $("#modal-body #invno").val(id);

   });
 </script>

 <script type="text/javascript">
    $(function(){
    $("#createinvoice").click(function(){
       if (confirm("Are you sure you want to create a new Invoice?")) {
        return true;
       }else{
        return false;
       }
    })
  });

$(function(){
    $("#createquote").click(function(){
       if (confirm("Are you sure you want to create a new Quote?")) {
        return true;
       }else{
        return false;
       }
    })
  });
  
function IsNumeric(input){
    var RE = /^-{0,1}\d*\.{0,1}\d+$/;
    return (RE.test(input));
}

$("#bulk_form").submit(function(event){ 

    var qty = $("#QTY").val();
    var price = $("#Price").val(); 

    if (qty==0 || qty == 1 || qty =="") {
     alert("Please put the right quantity.");   
     $("#QTY").focus(); return false; 
    }else  if (price==0 || price =="" || !IsNumeric(price)) {
     alert("Please put the right amount.");  
     $("#Price").focus(); 
     return false; 
   }else{
     return true;
   } 
   
});
</script>
</html>
 