<?php
include 'shopkeeper_sidebar.php';
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
</head>

  <div class="content"style="width:auto;">
  <h1 id="tbl-heading"> Customer Return Item Details</h1>
 
  <div class="update-tbl">
    <table>
    <form  method="post">
      <tbody>
       
        <tr>
            <th>Type</th>
            <td>   
              <input type='text'class="text"  placeholder="Customet Return" name="p_id" value="Customer Return" disabled>
              
            </td>
        </tr>
        <tr>
            <th>Product Name</th>
            <td>   
              <input type='text'class="text"  placeholder="Laptop" name="p_name" disabled>
            </td>
        </tr>
        <tr>
            <th>Brand Name</th>
            <td>  <input type='text' placeholder="Asus" name="brand_name"disabled>
           </td>
        </tr>
        <tr>
            <th>Model Number</th>
            <td> <input type='text'  placeholder="1234" name="model_no" disabled>
            </td>
        </tr>
        
        <tr>
            <th>Reason</th>
            <td>   <input type='text'  placeholder="Battery Issue" name="description" required="">
            </td>
        </tr>
        <tr>
          <td colspan=2>
          <input type="submit" name="update_product" value="ADD"></td>
           
        </tr>
        
        
      </tbody>
   </form>
   
</table>
</div>
   
    <div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
      </div>  
</div>
