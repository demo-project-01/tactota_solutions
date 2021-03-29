<?php
include 'clerk_sidebar.php';
//require '../controller/inventory_maintain.php';

?>
<?php
 session_start();
 $row=$_SESSION['update_supplier'];
?>

<head>
    <link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content"style="width:auto;">
    <h1 id="tbl-heading"> Update Supplier</h1>

    <div class="update-tbl">
        <table>
            <form method="post" action="../controller/inventory_maintain.php?action=update_supplier&id=<?php echo $row['sup_id'] ?>">
                <tbody>


                <tr>
                    <th>Supplier Id</th>
                    <td>
                        <input type='text'class="text" name="sup_id" value="<?php echo $row['sup_id'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Supplier Name</th>
                    <td>  <input type='text' name="sup_name" value="<?php echo $row['sup_name'] ?>" required="">
                    </td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td><input type='text' name="email_address" value="<?php echo $row['email_address'] ?>" required="">
                    </td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td><input type='text'  placeholder="Supplier Address" name="address" value="<?php echo $row['address'] ?>" required="">
                    </td>
                </tr>
                <tr>
                    <th>Contact Number</th>
                    <td><input type='tell' class="text" name="telephone_no" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="<?php echo $row['telephone_no'] ?>" >
                    </td>
                </tr>
                
                <tr>
                    <td colspan=2>
                        <input type="submit" name="update_supplier" value="update"></td>
                </tr>
                </tbody>

            </form>

        </table>
     </div>
        <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
   </div>
   </div>
