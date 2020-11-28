<?php
session_start();
$sql=$_SESSION['update_product'];
?>
 <table>
            <thead>
            <tr>

                <th>Product Name</th>
                <th>Brand Name</th>
                <th>Model No</th>
                <th>Quantity</th>
                <th >Product Cost</th>
                <th colspan=3>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
foreach ($sql as $k => $v)
{
    ?>
                <tr>

                    <td><?php echo $sql[$k]["p_name"] ?></td>
                    <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_no"] ?></td>
                    <td><?php echo $sql[$k]["quantity"] ?></td>
                    <td><?php echo $sql[$k]["p_cost"] ?></td>
                    <td>
                        <a href="../controller/inventory_maintain.php?action=view_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" title="view"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a>
                    </td>
                    <td><a href ="#" title="Update"><i class="fa fa-pencil" aria-hidden="true" id="tbl-icon"></i></a></td>
                    <td><a href ="#" title="Delete"><i class="fa fa-trash" aria-hidden="true" id="tbl-icon"></i></a></td>
                                        

                </tr>
                <?php

} ?>
            </tbody>
        </table>


