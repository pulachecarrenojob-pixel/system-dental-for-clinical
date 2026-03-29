<?php   
require_once("../include/initialize.php");  
 if (!isset($_SESSION['ADMIN_USERID'])){
  redirect(web_root."login.php");
 }
 
 $search_value = isset($_POST['search_data']) ? $_POST['search_data'] : "";

                     
                $sql ="SELECT * FROM `tblservices` p WHERE  
                        SKU LIKE '%$search_value%' 
                       OR Services LIKE '%$search_value%'
                       OR Description LIKE '%$search_value%'";
       
                $mydb->setQuery($sql);
                $cur = $mydb->loadResultList();

                foreach ($cur as $result) {  

      
                   $discounted_price=0; 

                echo '<tr data-tt-id="1'.$result->SKU.'" style="background:#ddd">';
                // echo '<td>'. $result->SKU.'</td>';
                echo '<td> <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->SKU. '"/></td>';
                echo '<td>  '. $result->Services.'</td>';
                echo '<td>' . $result->Description.'</a></td>';  
                echo '<td>' . $result->ToothNumber.'</td>';  
                echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->OriginalPrice,2).'</a></td>';  
                echo '<td> '.$setDefault->default_currency(). ' ' . number_format($result->OriginalPrice,2).'</a></td>';  
                echo '</tr>';

                // echo '<table class="table table-bordered table-hover">';
                // $query ="SELECT * FROM `tblbulkpricing` B,tblservices P WHERE B.SKU=P.SKU AND P.SKU='{$result->SKU}'  ORDER BY QTY ASC ";

                // $mydb->setQuery($query);
                // $row = $mydb->loadResultList();
                // foreach ($row as $res) {

                //       $discounted_price = $res->Price / $res->QTY;

                //       echo '<tr style="font-size:13px;" data-tt-id="2" data-tt-parent-id="1'.$res->SKU.'" >';
                //       echo '<td colspan="3"></td>';
                //       echo '<td>'. $res->QTY.'</td>';
                //       echo '<td>'. $setDefault->default_currency(). ' ' . number_format($res->Price,2).'</td>';  
                //       echo '<td>'. $setDefault->default_currency(). ' ' . number_format($discounted_price,2).'</td>';  
                //       echo '</tr>';


                // } 
              } 
                 
              ?>