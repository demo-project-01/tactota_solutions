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
                <th >Action</th>
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
                        <a href="../controller/inventory_maintain.php?action=view_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button>View</button></a>
                    </td>

                </tr>
                <?php

} ?>
            </tbody>
        </table>

-->
