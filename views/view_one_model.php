<?php
include 'clerk_sidebar.php';
session_start();
$sql=$_SESSION['one_model_details'];

?>

<head>
    <link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content" style="width:auto;">
    <h1 id="tbl-heading"> 
    <?php echo $sql[0]["model_name"];
    echo " ";
        echo $sql[0]["category_name"]; ?>
    </h1>
    <div class="view-tbl" id="sameSizeColumns">
    <table>
            <thead>
            <tr>

                <th>Product Id</th>
                <th>Supplier Name</th>
                <th>Bought Date</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th >Warrenty (months)</th>
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
                <td><?php echo $sql[$k]["p_id"] ?></td>
                <td><?php echo $sql[$k]["sup_name"] ?></td>
                <td><?php echo $sql[$k]["date"] ?></td>
                <td><?php echo $sql[$k]["unit_price"] ?></td>
                <td><?php echo $sql[$k]["quantity"] ?></td>
                <td><?php echo $sql[$k]["warrenty"] ?></td>
                <td><a href="../controller/inventory_maintain.php?action=view_one_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" title="view"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp</i></a></td>
                <td><a href="../controller/inventory_maintain.php?action=view_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" title="update"><i class="fa fa-pencil" aria-hidden="true" id="tbl-icon"></i></a></td>
                <td><a href="../controller/inventory_maintain.php?action=delete_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" id="tbl-icon"></i></a></td>
            </tr>
            <?php
                }
            } ?>
            <tr>
                <td colspan=9>
                    <a class="add_button" href="view_all_products.php"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
	 <p>© Tactota Solutions All rights reserved </p>
      </div>
</div>
</body>