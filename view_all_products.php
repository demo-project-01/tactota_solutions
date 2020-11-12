<?php
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
$data=new inventory_maintain();
$sql=$data->update_product();
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
</head>
<div class="content">
    <h1 id="tbl-heading">View All Products</h1>
    <div class="search">
        <input type="text" placeholder="Search..">
    </div>
    <div>
        <a class="add_button" href="new_product.php">-|- Add new Product</a>
    </div>

 <br>
    <div class="view-tbl">
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
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
                    <td><?php echo $sql[$k]["p_id"] ?></td>
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
    </div>
</div>
</body>

