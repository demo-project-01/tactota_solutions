<?php
 session_start();
$sql=$_SESSION['inbox_supplier'];
//$sql1=$_SESSION['inbox_supplier_count'];
//print_r($row[1]["sup_id"]);
//print_r($_SESSION['supplier_details']);
$limit = 8;
//$total_records=count($sql1);
//$total_pages = ceil($total_records/$limit);

//print_r($sql);


?>
 <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th scope="col" colspan=2 >Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
         foreach ($sql as $k => $v)
           {
             ?>
            <tr>

             <td><?php echo $sql[$k]["date"] ?></td>
             <td><?php echo $sql[$k]["email"] ?></td>
             <td><?php echo $sql[$k]["subject"] ?></td>
         

           
             <td><a href="../controller/inventory_maintain.php?action=view_inbox&id=<?php echo $sql[$k]["email_id"]; ?>" title="View"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td>
             <td><a href="../controller/inventory_maintain.php?action=view_inbox_delete&id=<?php echo $sql[$k]["email_id"]; ?>" title="Delete"><i class="fa fa-trash-o" aria-hidden="true" id="tbl-icon"></i></a></td>
            </tr>
  <?php

 } ?>
          <?php 
      
          
          ?>
            </tbody>
       </table> 
