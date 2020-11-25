<?php
include 'clerk_sidebar.php';
?>

<?php
 session_start();
  $row=$_SESSION['product_details'];
?>

<head>
    <link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content" style="width:auto;">
    <h1 id="tbl-heading"> View Product</h1>
    <div class="update-tbl">
        <table>
            <tbody>
            <tr>
                <th class="viewth">Product ID</th>
                <td><?php echo $row['p_id'] ?></td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td><?php echo $row['p_name'] ?></td>
            </tr>
            <tr>
                <th>Brand Name</th>
                <td><?php echo $row['brand_name'] ?></td>
            </tr>
            <tr>
                <th>Model Number</th>
                <td><?php echo $row['model_no'] ?></td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><?php echo $row['quantity'] ?></td>
            </tr>
            <tr>
                <th>Product Cost</th>
                <td><?php echo $row['p_cost'] ?></td>
            </tr>
            <tr>
                <th>Warrenty Period (months)</th>
                <td><?php echo $row['warranty'] ?></td>
            </tr>
            <!--tr
              <th>Supplier Name</th>
              <td>
              <a href="../controller/inventory_maintain.php?action=supplier_profile&id=<?php  echo $sql[$k]["sup_id"]; ?>" class="view"><button>View</button></a>
              <//?php echo $row['sup_name'] ?></td>
          </tr>-->
            <tr>
                <th>Re-order Level</th>
                <td><?php echo $row['reorder_level'] ?></td>
            </tr>
            <tr>
                <td colspan=2>
                    <a class="add_button" href="list_updateproduct.php">Back</a>
                    <a class="add_button" href="update_product.php" >Update</a>     <!-- methana update ekata hariyata link karann -->
                    <a class="add_button" href="../controller/inventory_maintain.php?action=delete_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" >Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="footerc">
	 <p>© Tactota Solutions All rights reserved </p>
      </div>
</div>
</body>
