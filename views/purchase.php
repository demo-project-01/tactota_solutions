<?php
//view purchase details in shopkeeper
include 'shopkeeper_sidebar.php';
require '../controller/sales.php ';
$data=new sales();
$sql=$data->valid_prodcuts();

//print_r($sql);
?>

<head>
    <link rel="stylesheet" href="../public/css/view_user.css"> 
</head>

<div class="content"style="width:auto;">
<h1 id="tbl-heading"> Purchase</h1>
    <div class="search">
            <input type="text" placeholder="Search..">
    </div>
    
    <div class="view-tbl">
        <table>
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Brand Name</th>
                <th>Model Number</th>
                <th>Quantity</th>
                <th>Warranty</th>
                <th>Product Cost</th>
                <th>Sale Price</th>
                <th>Action</th>


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
                    <td><?php echo $sql[$k]["warranty"] ?></td>
                    <td><?php echo $sql[$k]["p_cost"] ?></td>
                    <td><?php echo $sql[$k]["sales_price"] ?></td>
                    <!--td><a href="../controller/sales.php?action=sell&id=<!-?php  echo $sql[$k]["p_id"]; ?>" title="view"-->
                    <td><a href="bill.php" title="view">
                        <i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp&nbsp</i></a></td>


                </tr>
                <?php

            } ?>
            </tbody>


        </table>
    </div>

<div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>
</body>
