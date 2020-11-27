<?php
include 'clerk_sidebar.php';
?>

<head>
<link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content"style="width:auto;">
  <h1 id="tbl-heading">Add new Supplier</h1>

  <form action="../controller/inventory_maintain.php?action=newsuppliers" method="post">
  <div class="update-tbl">
    <table>
      <tbody>
      
       <tr>
            <th>Supplier Name</th>
            <td>   
            <input class="text" type="text" name="name" placeholder="First Name" required="">
            </td>
        </tr>
        <tr>
            <th>Address</th>
            <td>   
            <input class="text" type="text" name="address" placeholder="Address" required="">
            </td>
        </tr>
        <tr>
            <th>Contact Number</th>
            <td> 
            <input class="text" type="text" name="moblile_no" placeholder="Mobile Number" required="">
  
            </td>
        </tr>
        <tr>
            <th>Email Address</th>
            <td>   
            <input class="text email" type="email" name="email" placeholder="Email" required="">

            </td>
        </tr>
        
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

