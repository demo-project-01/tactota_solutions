<?php
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';

?>
<?php
 session_start();
  $row=$_SESSION['supplier_profile_details'];
?>

<head>
    <link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content"style="width:auto;">
    <h1 id="tbl-heading"> Update Product</h1>

    <div class="update-tbl">
        <table>
            <form method="post" action="../controller/inventory_maintain.php?action=update_supplier_details&id=<?php echo $row['sup_p_id'] ?>">
                <tbody>


                <tr>
                    <th>Supplier Id</th>
                    <td>
                        <input type='text'class="text" name="sup_Id" value="<?php echo $row['sup_id'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Supplier Name</th>
                    <td>  <input type='text' placeholder="Supplier Name" name="sup_name" value="<?php echo $row['sup_name'] ?>" >
                    </td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td><input type='text'  placeholder="Email Address" name="email" value="<?php echo $row['email'] ?>">
                    </td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td><input type='text'  placeholder="Supplier Address" name="address" value="<?php echo $row['address'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Contact Number</th>
                    <td><input type='text' class="text" placeholder="Contact Number" name="telephone_no" value="<?php echo $row['mobile_no'] ?>" >
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
        <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
   </div>
   </div>
