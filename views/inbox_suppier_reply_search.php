<?php
 session_start();
$sql=$_SESSION['inbox_supplier'];
//print_r($row[1]["sup_id"]);
//print_r($_SESSION['supplier_details']);
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

            </tbody>
       </table>