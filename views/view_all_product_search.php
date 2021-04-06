<?php
session_start();
$sql=$_SESSION['update_product'];

foreach($sql as $k=>$v){
   if($sql[$k]["warrenty"]<10){
       print_r("true");
   }
}


?>
 <table>
            <thead>
            <tr>

                <th>Category Name</th>
                <th>Brand Name</th>
                <th>Model Name</th>
                <th>Current Quantity</th>
                <th>warrenty</th>
                <th>Cost per Item</th>
                <th colspan=3>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
             if(!empty($sql)){
foreach ($sql as $k => $v)
{
    ?>
                <tr>

                    <td><?php echo $sql[$k]["category_name"] ?></td>
                    <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_name"] ?></td>
                    <td><?php echo $sql[$k]["total_quantity"] ?></td>
                      
                    <td><?php
                    
                        if($sql[$k]["warrenty"]<10){
                            print_r("true");
                        }else{
                            print_r("fales");
                        } 
                        
                        
                        ?></td>

                    <td><?php echo $sql[$k]["unit_price"] ?></td>
                    
                    <td><a href="../controller/inventory_maintain.php?action=view_one_model_details&id=<?php  echo $sql[$k]["model_id"]; ?>" title="view"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbspView</i></a></td>
                    <!--td><a href="../controller/inventory_maintain.php?action=view_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" title="update"><i class="fa fa-pencil" aria-hidden="true" id="tbl-icon"></i></a></td-->
                    <!--td><a href="../controller/inventory_maintain.php?action=delete_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" id="tbl-icon"></i></a></td-->
                                        

                </tr>
                <?php
}
} ?>
            </tbody>
        </table>
