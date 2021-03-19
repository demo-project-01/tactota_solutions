<?php
 session_start();
$sql=$_SESSION['inbox_supplier'];
$sql1=$_SESSION['inbox_supplier_count'];
//print_r($row[1]["sup_id"]);
//print_r($_SESSION['supplier_details']);
$limit = 8;
$total_records=count($sql1);
$total_pages = ceil($total_records/$limit);

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
             <td><?php echo $sql[$k]["description"] ?></td>
         

           
             <td><a href="view_inbox.php" title="View"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td>
             <td><a href="#" title="Delete"><i class="fa fa-trash-o" aria-hidden="true" id="tbl-icon"></i></a></td>
            </tr>
  <?php

 } ?>
          <?php 
          $pagLink = "<ul class='pagination'>";  
             for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='../controller/inventory_maintain.php?action=inbox_supplier&page=".$i."'>".$i."</a></li>";	
          }
          echo $pagLink . "</ul>";
          
          ?>
            </tbody>
       </table> 