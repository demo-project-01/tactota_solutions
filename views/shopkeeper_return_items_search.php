<?php
session_start();
$sql=$_SESSION['add_return_search'];
?>
<table>
            <thead>
                
                <tr>
                   <th> Serial Number</th>
                    <th> Category Name</th>
                    <th> Brand Name</th>  
                    <th> Model Name</th>
                    <th> Sell / Not Sell</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
         if(!empty($sql)){
            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    <td><?php echo $sql[$k]["serial_no"] ?></td>
                    <td><?php echo $sql[$k]["category_name"] ?></td>
		                <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_name"] ?></td>

                    <?php
                    if(($sql[$k]["item_status"])==1){
                    ?>
                    <td><?php echo "Not Sell" ?></td>
                    <?php }?>
                    <?php
                    if(($sql[$k]["item_status"])==0){
                    ?>
                    <td><?php echo "Sell" ?></td>
                    <?php }?>
                    <td><a href="../controller/inventory_maintain.php?action=display_onereturnitem_details&id=<?php  echo $sql[$k]["serial_no"]; ?>" class="view">
                    <i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td>
                </tr>
                <?php
            } 
          }?>
            </tbody>
       </table>

       