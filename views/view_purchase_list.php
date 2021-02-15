<?php
//view purchase details in shopkeeper
include 'shopkeeper_sidebar.php';
require '../controller/sales.php ';
session_start();
//$values=$data->get_product_details();
?>

<head>
    <link rel="stylesheet" href="../public/css/view_user.css"> 
    <link rel="stylesheet" href="../public/css/dropdown.css">
</head>

<div class="content"style="width:auto;">
<h1 id="tbl-heading"> Items To Purchase</h1>

    <!--div class="search">
            <input type="text" placeholder="Search..">
    </div-->
    
    <div class="view-tbl">
        <table>
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Brand Name</th>
                <th>Model Number</th>
                <th>Quantity</th>
                <th>Warranty</th>
                <th>Sale Price</th>
                <th>Action</th>


            </tr>
            </thead>
            <tbody>
            <?php
      if(!empty($_SESSION["purchase"]))
      {
          foreach($_SESSION["purchase"] as $keys => $values)
            {
                ?>


                <tr>
                    <td><?php echo $values["category_name"] ?></td>
                    <td><?php echo $values["brand_name"] ?></td>
                    <td><?php echo $values["model_name"] ?></td>
                    <td><?php echo $values["warrenty"] ?></td>
                    <td><?php echo $values["sales_price"] ?></td>
                    <!--td><a href="../controller/sales.php?action=sell&id=<!-?php  echo $sql[$k]["p_id"]; ?>" title="view"-->
                    <td><a type="submit" name="add_to_bill" title="Remove">
                        <i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp&nbsp</i></a></td>


                </tr>
                <?php

            } 
        }?>
            </tbody>


        </table>
    </div>

<div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>
</body>