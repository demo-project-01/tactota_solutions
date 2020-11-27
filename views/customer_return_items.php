<?php
include 'clerk_sidebar.php';
/*require '../controller/inventory_maintain.php';
$data=new inventory_maintain();
$sql=$data->customer_return_items();
print($sql);*/

?>

<!--div class="content">
    <h1 id="tbl-headings">Reminder Items</h1>
    <div class="view-tbl">
    <table>
    <thead>
    <form action="../controller/inventory_maintain.php?action=customer_return_items" method="post">
        <input class="text" type="text" name="cust_id" placeholder="cust_id" required="">
        <input class="text" type="text" name="serial_no" placeholder="serial_no" required="">
        <input class="text" type="text" name="returned_date" placeholder="returned_date" required=""-->
        <!--input class="text" type="text" name="description" placeholder="description" required=""-->
        <!--input type="submit" name="login_user" value="LOGIN">
        
    </form>
    </table>
    </div>
    <div class="footers">
			<p>© Tactota Solutions All rights reserved </p>
    </div> 
</div-->
<head>
<link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">Add Return Items</h1>

  <form action="../controller/inventory_maintain.php?action=customer_return_items" method="post">
  <div class="update-tbl">
    <table>
      <tbody>
      <tr>
            <th>Customer Id</th>
            <td>   
            <input class="text" type="text" name="cust_id" placeholder="cust_id" required="">
            </td>
        </tr>
        <tr>
            <th>Serial Number</th>
            <td>   
            <input class="text" type="text" name="serial_no" placeholder="serial_no" required="">
            </td>
        </tr>
        <tr>
            <th>Returned Date</th>
            <td>   
            <input class="text" type="text" name="returned_date" placeholder="returned_date" required="">
            </td>
        </tr>
        <!--tr>
            <th>Description</th>
            <td> 
            <input class="text" type="text" name="moblile_no" placeholder="Mobile Number" required="">
  
            </td>
        </tr-->
        
        
        <tr>
        <td colspan=2><input type="submit" name="add_supplier" value="Add"></td>
        </tr>
      </tbody>
      </table>
   </div>
   
  </form>
  <div class="footerc">
			<p>© Tactota Solutions All rights reserved </p>
    </div>
  </div>
  