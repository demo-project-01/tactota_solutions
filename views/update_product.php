<?php
include 'clerk_sidebar.php';
//require '../controller/inventory_maintain.php';

?>
<?php
 session_start();
  $row=$_SESSION['product_details'];
 // print_r($row);
 // print_r($row['p_name']);
 // print_r($row['p_id']);
//print_r($_SESSION['emp_id']);
 //print_r($_SESSION['product_details']);

?>

<head>
    <link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content"style="width:auto;">
    <h1 id="tbl-heading"> Update Product</h1>

    <div class="update-tbl">
        <table>
            <form method="post" action="../controller/inventory_maintain.php?action=update_product_details&id=<?php echo $row['p_id'] ?>">
                <tbody>


                <tr>
                    <th>Product Name</th>
                    <td>
                        <input type='text'class="text"  placeholder="Product Name" name="p_name" value="<?php echo $row['p_name'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Brand Name</th>
                    <td>  <input type='text' placeholder="Brand Name" name="brand_name" value="<?php echo $row['brand_name'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Model Number</th>
                    <td>   <input type='text'  placeholder="Model No" name="model_no" value="<?php echo $row['model_no'] ?>" disabled>
                    </td>
                </tr>

                <tr>
                    <th>Quantity</th>
                    <td>   <input type='text'  placeholder="" name="quantity" value="<?php echo $row['quantity'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Product Cost</th>
                    <td>   <input type='text' class="text" placeholder="Product Cost" name="p_cost" value="<?php echo $row['p_cost'] ?>" >
                    </td>
                </tr>
                <tr>
                    <th>Sales Price</th>
                    <td>   <input type='text'  placeholder="" name="sales_price" value="<?php echo $row['sales_price'] ?>" >
                    </td>
                </tr>
                <tr>
                    <th>Warrenty Period (months)</th>
                    <td><input type='text'  placeholder="" name="warranty" value="<?php echo $row['warranty'] ?>" ></td>
                </tr>

                <tr>
                    <th>Re-order Level</th>
                    <td>   <input type='text' placeholder="" name="reorder_level" value="<?php echo $row['reorder_level'] ?>"  >
                    </td>
                </tr>

                <tr>
                    <td colspan=2>
                        <input type="submit" name="update_product" value="update"></td>
                </tr>
                </tbody>
            </form>

        </table>
     </div>
        <div class="footerc"style="color:#ffffff;">
	<p>© Tactota Solutions All rights reserved </p>
   </div>
   </div>

