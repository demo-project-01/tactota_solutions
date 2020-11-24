<?php
include 'shopkeeper_sidebar.php';
require '../controller/inventory_maintain.php';
/*$data=new inventory_maintain();
$sql=$data->customer_return_items();
print($sql);*/

?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">Add Customer Details</h1>

  <form action="../controller/inventory_maintain.php?action=customer_details" method="post">
  <div class="update-tbl">
    <table>
      <tbody>
      <tr>
            <th>Customer Id</th>
            <td>   
            <input class="text" type="text" name="cust_id" placeholder="EX:-CUST0001" required="">
            </td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td>   
            <input class="text" type="text" name="cust_name" placeholder="cust_name" required="">
            </td>
        </tr>
        <tr>
            <th>Email Address</th>
            <td>   
            <input class="text" type="email" name="email_address" placeholder="email_address" required="">
            </td>
        </tr>
        <tr>
            <th>Address</th>
            <td> 
            <input class="text" type="text" name="address" placeholder="address" required="">
  
            </td>
        </tr>
        <tr>
            <th>Contact Number</th>
            <td> 
            <input class="text" type="text" name="telephone_no" placeholder="telephone_no" required="">
  
            </td>
        </tr>
        
        
        <tr>
        <td colspan=2><input type="submit" name="add_supplier" value="Add"></td>
        </tr>
      </tbody>
      </table>
   </div>
   
  </form>
  <div class="footers"style="color:#ffffff;">
			<p>© Tactota Solutions All rights reserved </p>
    </div>
  </div>
  