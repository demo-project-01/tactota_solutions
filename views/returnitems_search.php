<?php  
session_start();
$sql= $_SESSION['return_search_sort'];


?>

<table>
            <thead>
                <tr>
                <!--th> Product ID</th-->
                    <th> Serial Number</th>
                    <th> Category Name</th>
                    <th> Brand Name</th>  
                    <th> Model Number</th>
                    <th>Returned Date</th>
                    <th>Description</th>
                    <!--th scope="col" colspan=2 border=0></th-->
                </tr>
            </thead>
            <tbody>
            <?php
      if(!empty($sql)){
            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                <!--td><!-?php echo $sql[$k]["p_id"] ?></td-->
                    <td><?php echo $sql[$k]["serial_no"] ?></td>
                    <td><?php echo $sql[$k]["category_name"] ?></td>
		            <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_name"] ?></td>
                    <td><?php echo $sql[$k]["returned_date"] ?></td>
                    <td><?php echo $sql[$k]["description"] ?></td>
                    <!--td><a href="../controller/inventory_maintain.php?action=display_onereturnitem_details&id=<!-?php  echo $sql[$k]["p_id"]; ?>" class="view"-->
                    <!--i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td-->
                </tr>
                <?php
            }
         } ?>
            </tbody>
       </table>