<?php
   if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
<style type="text/css">
  .search { 
    margin-bottom: 10px; 
  }

  .search label,
  .search div {
      display: inline-block;
    }
  .search div{
    width: 300px;
  }


</style> 
                 
<div class="modal fade" id="modalproducts" tabindex="-1" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" data-dismiss="modal" type=
            "button">x</button>

            <h4 class="modal-title" id="myModalLabel">List of Supplies</h4>
            <div id="successmsg"></div>
        </div>

           <div id="modal-body" class="modal-body">

              <div class="search  "> 
                 <label>Search for:</label>
                  <div ><input class="form-control" id="findProducts" placeholder="Supplies...." autocomplete="off" /></div> 
              </div>
          
       <form id="my_form" class="form-horizontal span6 " method="POST" action="actionCart.php?action=add" >
        <input type="hidden" name="invno" id="invno" value="<?php echo $invno;?>">
        <div class="table-responsive">
              <table id="tree_table" class="table table-bordered  table-hover table-responsive mytbl" style="font-size:12px" cellspacing="0">
               
                <thead > 
                  <tr>
                    <!-- <th>SKU</th> -->
                    <th></th>
                    <th>Services</th>
                    <th>Description</th> 
                    <th>Tooth Number</th>
                    <th>Price</th>
                    <th>Total Price</th>

                  </tr> 
                </thead> 
                <tbody id="loaddashboard" >
                  <?php   

                     
                   $sql ="SELECT * FROM `tblservices`";
           
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();

                    foreach ($cur as $result) {  

                      $discounted_price=0; 

                    echo '<tr data-tt-id="1'.$result->SKU.'" style="background:#ddd">';
                    // echo '<td>'. $result->SKU.'</td>';
                    echo '<td> <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->SKU. '"/></td>';
                    echo '<td>  '. $result->Services.'</td>';
                    echo '<td>' . $result->Description.'</td>';  
                    echo '<td>' . $result->ToothNumber.'</td>';  
                    echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->OriginalPrice,2).'</a></td>';  
                    echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->OriginalPrice,2).'</a></td>'; 
                    echo '</tr>';
 
                    // // echo '<table class="table table-bordered table-hover">';
                    // $query ="SELECT * FROM `tblbulkpricing` B,tblservices P WHERE B.SKU=P.SKU AND P.SKU='{$result->SKU}' ORDER BY QTY ASC";

                    // $mydb->setQuery($query);
                    // $row = $mydb->loadResultList();
                    // foreach ($row as $res) {

                    //     $discounted_price = $res->Price / $res->QTY;

                    //   echo '<tr style="font-size:13px;" data-tt-id="2" data-tt-parent-id="1'.$res->SKU.'">';
                    //   echo '<td colspan="3"></td>';
                    //   echo '<td>'. $res->QTY.'</td>';
                    //   echo '<td>'. $setDefault->default_currency(). ' ' . number_format($res->Price,2).'</td>';  
                    //   echo '<td>'. $setDefault->default_currency(). ' ' . number_format($discounted_price,2).'</td>';  
                    //   echo '</tr>';
 

                    // } 
                  } 
                  ?>
                </tbody>
                
              </table> 
       <table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
        
          <thead>
            <tr> 
              <th>ProductID</th> 
              <th>Products</th> 
              <!-- <th>Brand</th>  -->
              <th>Category</th> 
              <th>Stocks</th>  
              <th>Sold</th>  
              <th>Remaining</th> 
              <!-- <th>Status</th> 
              <th>Remarks</th>  -->

               <th width="5%" align="center">Action</th>
            </tr> 
          </thead> 
          <tbody>
            <?php 
            $bal=0;
            // SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, `Stocks`, `DateReceived`, `Sold`, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remark`, `Status` FROM `tblstocks` GROUP BY CONCAT(`Products`, `Brand`, `Category`)
              $mydb->setQuery("SELECT `StocksID`, `ProductID`, `Products`, `Brand`, `Category`, `Description`, `Price`, sum(`Stocks`) as ST, `DateReceived`, sum(`Sold`) as sl, `DateSold`, `Expired`, `DateExpired`, `Balance`, `Remarks`, `Status` FROM `tblstocks` GROUP BY ProductID");
              $cur = $mydb->loadResultList(); 
            foreach ($cur as $result) {
              echo '<tr>';
         // `Fullname`, `CompanyName`, `F_Address`, `S_Address`, `ContactNo`

              $bal = $result->ST-$result->sl;

                echo '<td>' . $result->ProductID.'</td>';
                echo '<td>' . $result->Products.'</td>';
                // echo '<td>' . $result->Brand.'</td>';
                echo '<td>' . $result->Category.'</td>'; 
                echo '<td>' . $result->ST.'</td>'; 
                echo '<td>' . $result->sl.'</td>'; 
                echo '<td>' . $bal.'</td>'; 
                // echo '<td>' . $result->Status.'</td>';
                // echo '<td>' . $result->Remarks.'</td>';
              echo '<td align="center"> 
                <a title="Deduct Qty" href="index.php?view=sold&id='.$result->ProductID.'" class="btn btn-info btn-md  ">  <span class="fa fa-shopping-cart fw-fa"> Add Medicine to Patient</a>

              <a title="View" href="index.php?view=view&id='.$result->ProductID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-plus fw-fa"> Add Qty</a>
              <a title="Modify" href="index.php?view=edit&id='.$result->ProductID.'" class="btn btn-primary btn-md  ">  <span class="fa fa-edit fw-fa">Modify</a>
                   <a title="Delete" href="controller.php?action=delete&id='.$result->ProductID.'" class="btn btn-danger btn-md  ">  <span class="fa  fa-trash fw-fa "></a></td>';
             
              echo '</tr>';
            } 
            ?>
          </tbody>
          
        </table> 
</div>
           </div>
               
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type=
                "button">Close</button> <button class="btn btn-primary"
                name="save" type="submit">Add to Invoice</button>
            </div>
        </form>
    </div><!-- /.modal-content-->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->  

         
<script type="text/javascript" src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"> </script>  
  <script type="text/javascript">
 

$("#findProducts").on("keyup",function(){

var searchvalue = $(this).val(); 

// alert(searchvalue);

  $.ajax({
    type : "POST",
    url : "lisofproducts.php",
    dataType : "text",
    data :{search_data:searchvalue},
    success: function(data){ 
      $("#loaddashboard").html(data);

    }
  });

});

  </script>   
 