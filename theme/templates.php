<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>
          <?php
          global $setDefault; 
           $user = New User();
           $singleuser = $user->single_user($_SESSION['ADMIN_USERID']);
           echo 'SmilePro Clinic';
          ?>
        </title>
       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo web_root;?>fullcalendar/fullcalendar.min.css" />
        <link rel="stylesheet" href="<?php echo web_root;?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo web_root;?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo web_root;?>dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/morris/morris.css">
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/datatables/jquery.dataTables.min.css">  
        <link rel="stylesheet" href="<?php echo web_root; ?>plugins/select2/select2.css"> 
        <link rel="stylesheet" href="<?php echo web_root; ?>plugins/teeth/style.css"> 
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 
        <link href="<?php echo web_root; ?>dist/css/jquery.treetable.css" rel="stylesheet">
        <link href="<?php echo web_root; ?>dist/css/jquery.treetable.theme.default.css" rel="stylesheet">

<style type="text/css">

  /* ===== DARK MODE - SmilePro Clinic ===== */

  /* Fondo general */
  body, .wrapper {
    background-color: #1a1a2e !important;
    color: #e0e0e0 !important;
  }

  /* Header / Navbar */
  .main-header,
  .main-header .navbar,
  .main-header .logo {
    background-color: #16213e !important;
    border-bottom: 2px solid #0f3460 !important;
  }

  .main-header .logo {
    background-color: #0f3460 !important;
  }

  .main-header .logo:hover {
    background-color: #1a4a8a !important;
  }

  .main-header .navbar .nav > li > a {
    color: #c0c0d0 !important;
  }

  /* Logo text con ícono dental */
  .logo-lg {
    color: #7ecfff !important;
    font-weight: bold;
    font-size: 16px;
    letter-spacing: 0.5px;
  }

  .logo-mini img {
    filter: brightness(1.3);
  }

  /* Sidebar */
  .main-sidebar,
  .sidebar {
    background-color: #16213e !important;
  }

  .sidebar-menu > li > a {
    color: #b0b8d0 !important;
    border-left: 3px solid transparent;
    transition: all 0.2s ease;
  }

  .sidebar-menu > li > a:hover,
  .sidebar-menu > li.active > a {
    background-color: #0f3460 !important;
    color: #7ecfff !important;
    border-left: 3px solid #7ecfff !important;
  }

  .sidebar-menu > li > a i {
    color: #7ecfff !important;
  }

  .treeview-menu {
    background-color: #111827 !important;
  }

  .treeview-menu > li > a {
    color: #9aaabb !important;
  }

  .treeview-menu > li > a:hover {
    color: #7ecfff !important;
  }

  /* Content wrapper */
  .content-wrapper {
    background-color: #1a1a2e !important;
    color: #e0e0e0 !important;
  }

  /* Breadcrumb */
  .content-header {
    background-color: #1e2a45 !important;
    border-bottom: 1px solid #0f3460 !important;
  }

  .breadcrumb {
    background-color: transparent !important;
  }

  .breadcrumb > li > a {
    color: #7ecfff !important;
  }

  /* Cajas / Cards */
  .box {
    background-color: #16213e !important;
    border: 1px solid #0f3460 !important;
    color: #e0e0e0 !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.4) !important;
  }

  .box-header {
    background-color: #0f3460 !important;
    color: #7ecfff !important;
    border-bottom: 1px solid #1a4a8a !important;
  }

  .box-body {
    background-color: #16213e !important;
    color: #e0e0e0 !important;
  }

  /* Tablas */
  .table {
    white-space: nowrap;
    color: #e0e0e0 !important;
  }

  .table > thead > tr > th,
  thead {
    background: #0f3460 !important;
    background: linear-gradient(left, #0a2a50, #0f3460) !important;
    color: #7ecfff !important;
    border-bottom: 2px solid #1a4a8a !important;
  }

  .table > tbody > tr > td {
    border-color: #1e2a45 !important;
    color: #d0d8e8 !important;
  }

  .table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #1e2a45 !important;
  }

  .table-hover > tbody > tr:hover {
    background-color: #0f3460 !important;
  }

  /* Formularios */
  .form-control {
    background-color: #111827 !important;
    border: 1px solid #0f3460 !important;
    color: #e0e0e0 !important;
  }

  .form-control:focus {
    border-color: #7ecfff !important;
    box-shadow: 0 0 5px rgba(126, 207, 255, 0.3) !important;
  }

  /* Botones */
  .btn-primary {
    background-color: #0f3460 !important;
    border-color: #1a4a8a !important;
  }

  .btn-primary:hover {
    background-color: #1a4a8a !important;
  }

  .btn-default {
    background-color: #1e2a45 !important;
    border-color: #2a3a5a !important;
    color: #c0c8d8 !important;
  }

  /* Modales */
  .modal-content {
    background-color: #16213e !important;
    border: 1px solid #0f3460 !important;
    color: #e0e0e0 !important;
  }

  .modal-header {
    background-color: #0f3460 !important;
    border-bottom: 1px solid #1a4a8a !important;
  }

  .modal-footer {
    background-color: #111827 !important;
    border-top: 1px solid #1e2a45 !important;
  }

  /* Dropdown usuario */
  .dropdown-menu {
    background-color: #16213e !important;
    border: 1px solid #0f3460 !important;
  }

  .dropdown-menu > li > a {
    color: #c0c8d8 !important;
  }

  .dropdown-menu > li > a:hover {
    background-color: #0f3460 !important;
    color: #7ecfff !important;
  }

  .user-header {
    background: linear-gradient(135deg, #0f3460, #1a4a8a) !important;
  }

  /* Footer */
  .main-footer {
    background-color: #111827 !important;
    border-top: 1px solid #0f3460 !important;
    color: #7090a0 !important;
  }

  .main-footer a {
    color: #7ecfff !important;
  }

  /* Selects y select2 */
  .select2-container .select2-choice,
  .select2-container-multi .select2-choices {
    background-color: #111827 !important;
    border-color: #0f3460 !important;
    color: #e0e0e0 !important;
  }

  /* Imagen stretch */
  .stretch-img img {
    width: 100%;
    height: 100%;
  }

  /* Scrollbar oscuro */
  ::-webkit-scrollbar {
    width: 8px;
    background: #111827;
  }
  ::-webkit-scrollbar-thumb {
    background: #0f3460;
    border-radius: 4px;
  }

  /* Ícono dental en el logo */
  .logo-dental-icon {
    margin-right: 6px;
    font-size: 18px;
    color: #7ecfff;
  }

</style>

    </head>

 <body class="hold-transition skin-blue-light fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo web_root;?>" class="logo">
      <!-- mini logo para sidebar mini -->
      <span class="logo-mini stretch-img"><b>&#9887;</b></span>
      <!-- logo para estado normal -->
      <span class="logo-lg">
        <i class="fa fa-medkit logo-dental-icon"></i><b>SmilePro</b> Clinic
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account -->
          <li class="dropdown user user-menu" style="padding-right: 15px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo web_root.'user/'. $singleuser->PicLoc;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $singleuser->FullName; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header"> 
                <img data-target="#menuModal" data-toggle="modal" src="<?php echo web_root.'user/'. $singleuser->PicLoc;?>" class="img-circle" alt="User Image" />  
              </li> 
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo web_root.'user/index.php?view=view&id='.$singleuser->UserID;?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo web_root;?>logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Modal foto de perfil -->
  <div class="modal fade" id="menuModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">x</button>
          <h4 class="modal-title" id="myModalLabel">Profile Photo</h4>
        </div>
        <form action="<?php echo web_root; ?>user/controller.php?action=photos" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <div class="form-group">
              <div class="rows">
                <div class="col-md-12">
                  <div class="rows">
                    <div class="col-md-8"> 
                      <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                      <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
                      <input id="photo" name="photo" type="file">
                    </div>
                    <div class="col-md-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
            <button class="btn btn-primary" name="savephoto" type="submit">Upload Photo</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar"> 
      <ul class="sidebar-menu"> 
        <li class="<?php echo (currentpage() == 'index.php') ? "active" : false;?>">
          <a href="<?php echo web_root;?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>  
          </a> 
        </li> 
        <li class="<?php echo (currentpage() == 'patients') ? "active" : false;?>">
          <a href="<?php echo web_root;?>patients/">
            <i class="fa fa-users"></i> <span>Patients</span> 
          </a>
        </li>

        <?php if($_SESSION['ADMIN_ROLE']=="Administrator"){ ?>  
        <li class="<?php echo (currentpage() == 'services') ? "active" : false;?>">
          <a href="<?php echo web_root;?>services/">
            <i class="fa fa-tree"></i> <span>Services</span> 
          </a>
        </li> 
        <?php } ?> 

        <li class="<?php echo (currentpage() == 'invoices') ? "active" : false;?>"> 
          <a href="<?php echo web_root;?>invoices/">
            <i class="fa fa-dollar"></i> <span>Invoices</span>  
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'appointments') ? "active" : false;?>"> 
          <a href="<?php echo web_root;?>appointments/">
            <i class="fa fa-calendar"></i> <span>Appointments</span>  
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'stockin') ? "active" : false;?>"> 
          <a href="<?php echo web_root;?>stockin/">
            <i class="fa fa-barcode"></i> <span>Supplies</span>  
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'prescription') ? "active" : false;?>"> 
          <a href="<?php echo web_root;?>prescription/">
            <i class="fa fa-file-text"></i> <span>Prescription</span>  
          </a>
        </li> 

        <?php if($_SESSION['ADMIN_ROLE']=="Administrator"){ ?> 
        <li class="<?php echo (currentpage() == 'inventoryreports') ? "active" : false;?>">
          <a href="<?php echo web_root;?>inventoryreports/">
            <i class="fa fa-bar-chart"></i> <span>Inventory Reports</span>
          </a>
        </li> 
        <li class="<?php echo (currentpage() == 'reports') ? "active" : false;?>">
          <a href="<?php echo web_root;?>reports/">
            <i class="fa fa-bar-chart"></i> <span>Sales Reports</span>
          </a>
        </li> 

        <li class="treeview <?php echo (currentpage() == 'user' || currentpage() == 'suplier' ||
        currentpage() == 'taxrate' || currentpage() == 'discountrate' || currentpage() == 'currency' || 
        currentpage() == 'units' || currentpage() == 'settings' || currentpage() == 'taxsettings' || currentpage() == 'autonumber') ? "active" : false;?>">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Settings</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a> 
          <ul class="treeview-menu">
            <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
              <a href="<?php echo web_root;?>user/"><i class="fa fa-circle-o"></i> Manage Users</a>
            </li>
            <li class="<?php echo (currentpage() == 'currency') ? "active" : false;?>">
              <a href="<?php echo web_root;?>currency/"><i class="fa fa-circle-o"></i> Currency</a>
            </li>
            <li class="<?php echo (currentpage() == 'settings') ? "active" : false;?>">
              <a href="<?php echo web_root;?>settings/"><i class="fa fa-circle-o"></i> Header and Footer</a>
            </li>
          </ul>
        </li> 
        <?php } ?> 
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php echo isset($title) ? $title : ''; ?>
      </h1>
      <ol class="breadcrumb">
        <?php
          if ($title != 'Dashboard') {
            $active_title = '';
            if (isset($_GET['view'])) {
              $active_title = '<li class='.$active_title.'><a href="index.php">'.$title.'</a></li>';
            } else {
              $active_title = '<li class='.$active_title.'>'.$title.'</li>';
            }
            echo '<li><a href='.web_root.'><i class="fa fa-dashboard"></i> Dashboard</a></li>';
            echo $active_title;
            echo isset($_GET['view']) ? '<li class="active">'.$_GET['view'].'</li>' : '';
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
                if ($title != 'Dashboard') {
                  echo check_message();
                } 
                ?>
              </div>
              <?php require_once $content; ?> 
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
    <strong>Copyright &copy; <?php echo date('Y'); ?> 
      <a href=""><i class="fa fa-medkit"></i> SmilePro Clinic</a>.
    </strong> All rights reserved.
  </footer>

</body>

<script type="text/javascript" src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo web_root;?>fullcalendar/lib/moment.min.js"></script>
<script src="<?php echo web_root;?>fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo web_root; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo web_root;?>dist/js/app.min.js"></script> 
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo web_root; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/select2/select2.full.min.js"></script> 

<script>  
function hideMsg(){
  $("#check_msg").hide();
} 
setTimeout(function(){ hideMsg(); }, 3000);  
setTimeout(function(){ window.location = "<?php echo web_root; ?>logout.php"; }, 1800000); 

$(".addbulk").click(function(){
  var sku = $(this).data("id");
  $.ajax({
    type:"POST",
    url : "modalproduct.php",
    dataType : "text",
    data:{id:sku},
    success:function(data){
      $("#addbulkmodal").html(data);
    }
  });
});

$(function(){
  $(".btn-danger").click(function(){
    if (confirm("Are you sure you want to delete this?")) {
      return true;
    } else {
      return false;
    }
  });
});

$(function(){
  $(".btn-trans").click(function(){
    if (confirm("Are you sure you want to cancel this?")) {
      return true;
    } else {
      return false;
    }
  });
});

$(function(){ 
  $.ajax({
    type:"POST",  
    url: "loaddata.php",    
    dataType: "text",           
    success: function(data){    
      $('#searchclient').show(); 
      $('#searchclient').html(data);   
    } 
  });
});

$(function(){ 
  $.ajax({
    type:"POST",  
    url: "loadcart.php",    
    dataType: "text",           
    success: function(data){    
      $('#loadcart').show(); 
      $('#loadcart').html(data);   
    } 
  });
});

$(function(){
  $('.select2').select2();
});

$.fn.modal.Constructor.prototype.enforceFocus = function () {
  $(document)
  .off('focusin.bs.modal')
  .on('focusin.bs.modal', $.proxy(function (e) {
    if (this.$element[0] !== e.target && !this.$element.has(e.target).length && !$(e.target).closest('.select2-dropdown').length) {
      this.$element.trigger('focus');
    }
  }, this));
};

$(function () {
  $("#dash-table").DataTable({ "iDisplayLength": 50 });
  $('#dash-table2').DataTable({
    "paging": true, "lengthChange": false, "searching": false,
    "ordering": true, "info": true, "autoWidth": false
  });
});

$(function () {
  $("#dash-tables").DataTable({
    "order": [[2, "desc"]],
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
  startDate: '01/01/1950', 
  language: 'en',
  weekStart: 1,
  todayBtn: 1,
  autoclose: 1,
  todayHighlight: 1, 
  startView: 2,
  minView: 2,
  forceParse: 0 
});

$("#addtoinvoice").on("click", function(e){
  var inv = document.getElementById('InvoiceNo').value; 
  var product = document.getElementById("SKU").value; 
  $.ajax({
    type:"POST",  
    url: "loadcart.php",    
    dataType: "text",
    data:{SKU:product, invno:inv},
    beforeSend: function() {
      $("#loading-client").show(); 
      $("#invoicing-body").hide(); 
    },         
    success: function(data){  
      $("#loading-client").hide();  
      $("#invoicing-body").show(); 
      $('#loadcart').show(); 
      $('#loadcart').html(data);   
      $("#SKU").val('');
      $("#SKU").focus();
    } 
  });
  e.preventDefault(); 
}); 

$(".date_inv").on("change", function(){ 
  var invdate = document.getElementById('DateInvoiced').value;
  var duedate = document.getElementById('DueDate').value;
  var invno = document.getElementById('InvoiceNo').value;
  var dataString = 'invdate=' + invdate + '&duedate=' + duedate + '&invno=' + invno;
  $.ajax({
    type:"POST",
    url:"controller.php?action=updatedate",
    dataType:"text",
    data:dataString,
    success: function(data){}
  });
});
</script>

<link href="<?php echo web_root; ?>plugins/autocomplete/jquery.auto-complete.css" rel="stylesheet" media="screen">
<script src="<?php echo web_root; ?>plugins/autocomplete/jquery.auto-complete.min.js"></script> 

<?php  
$sql = "Select * From tblservices";
$mydb->setQuery($sql);
$cur = $mydb->loadResultList();
foreach ($cur as $result) {
  $products[] = $result->Services;  
} 
?>

<script> 
var pro = <?php echo json_encode($products) ?>; 

$("#SKU").autoComplete({
  minChars: 1,
  source: function(term, suggest){
    term = term.toLowerCase();
    var choices = pro;
    var matches = [];
    for (i=0; i<choices.length; i++)
      if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
    suggest(matches);
  }
});

$("#findProducts").on("keyup", function(){ 
<?php  
$sql = "Select * From tblservices";
$mydb->setQuery($sql);
$cur = $mydb->loadResultList();
foreach ($cur as $result) {
  $data_products[] = $result->Services;   
}  
?>   
var availableTags = <?php echo json_encode($data_products) ?>; 
}); 

$("#findProducts").autoComplete({
  minChars: 0,
  source: function(term, suggest){
    term = term.toLowerCase();
    var choices = availableTags;
    var matches = [];
    for (i=0; i<choices.length; i++)
      if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
    suggest(matches);
  }
}); 

$("#findProducts").on("keyup", function(){
  var searchvalue = $(this).val(); 
  $.ajax({
    type:"POST",
    url:"loaddashboard.php",
    dataType:"text",
    data:{search_data:searchvalue},
    success: function(data){ 
      $("#loaddashboard").html(data);
    }
  });
});

$("#findProducts").on("change", function(){
  var searchvalue = $(this).val(); 
  $.ajax({
    type:"POST",
    url:"loaddashboard.php",
    dataType:"text",
    data:{search_data:searchvalue},
    success: function(data){ 
      $("#loaddashboard").html(data);
    }
  });
});

function validate_fields(){
  var unit = $("#Unit").val(); 
  var supplierid = $("#SuplierID").val();
  if(unit == "None"){
    alert("Please choose a unit for the Product.");
    return false;
  }
  if(supplierid == "None"){
    alert("Please choose a supplier for the Product.");
    return false;
  }
}

$(".editinv").click(function(){
  var id = $(this).data("id");
  $("#modal-body #invno").val(id);
});

$(function(){
  $("#createinvoice").click(function(){
    if (confirm("Are you sure you want to create a new Invoice?")) {
      return true;
    } else {
      return false;
    }
  });
});

$(function(){
  $("#createquote").click(function(){
    if (confirm("Are you sure you want to create a new Quote?")) {
      return true;
    } else {
      return false;
    }
  });
});

function IsNumeric(input){
  var RE = /^-{0,1}\d*\.{0,1}\d+$/;
  return (RE.test(input));
}

$("#bulk_form").submit(function(event){ 
  var qty = $("#QTY").val();
  var price = $("#Price").val(); 
  if (qty==0 || qty == 1 || qty == "") {
    alert("Please put the right quantity.");   
    $("#QTY").focus(); return false; 
  } else if (price==0 || price == "" || !IsNumeric(price)) {
    alert("Please put the right amount.");  
    $("#Price").focus(); 
    return false; 
  } else {
    return true;
  } 
});
</script>
</html>