<?php
//view purchase details in shopkeeper
include 'shopkeeper_sidebar.php';
require '../controller/sales.php ';
$data=new sales();
$sql=$data->valid_prodcuts();

//print_r($sql);
?>

<div class="content" style="width:auto;">

    <div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search..">
        </div>
    </div>
    <div class="main-container" id="view-tbl">
        <table>
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Brand Name</th>
                <th>Model Name</th>
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
                    <td><?php echo $sql[$k]["p_name"] ?>
                    <td><?php echo $sql[$k]["brand_name"] ?>
                    <td><?php echo $sql[$k]["model_no"] ?>
                    <td><?php echo $sql[$k]["quantity"] ?>
                    <td><?php echo $sql[$k]["warranty"] ?>
                    <td><?php echo $sql[$k]["p_cost"] ?>
                    <td><?php echo $sql[$k]["sales_price"] ?>
                    <td><a href="../controller/sales.php?action=sell&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button>View</button></a>


                </tr>
                <?php

            } ?>
            </tbody>


        </table>
    </div>
</div>
</div>
</body>

