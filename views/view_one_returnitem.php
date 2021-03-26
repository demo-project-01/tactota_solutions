<?php
include 'shopkeeper_sidebar.php';
require '../controller/inventory_maintain.php';
$row=$_SESSION['return_item'];
//echo($row['item_status']);
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/email.css">

</head>

  <div class="content"style="width:auto;">
  <h1 id="tbl-heading"> Return Item Details</h1>
 
  <div class="update-tbl">
    <table>
    <form action="../controller/inventory_maintain.php?action=add_returnitem_details" method="post">
      <tbody>
       
        <tr>
            <th>Type</th>
            <?php
            if(($row["item_status"])==1){
              ?>
            <td>   
              <input type='text'class="text" placeholder="Shop Return"  value="Shop Return" disabled>
            </td>
            <?php }?>

            <?php
            if(($row["item_status"])==0){
              ?>
            <td>   
              <input type='text'class="text"  placeholder="Shop Return"  value="Customer Return" disabled>
            </td>
            <?php }?>
        </tr>
        <tr>
        <th>Serial Number</th>
           <td>
           <input type='text' placeholder="" name="serial_no" value="<?php echo $row['serial_no']?>"readonly>
           </td>
        </tr>
        
           <input type='hidden' placeholder="" name="item_status" value="<?php echo $row['item_status']?>"readonly>
        
        <tr>
            <th>Category Name</th>
            <td>   
              <input type='text'class="text"  placeholder="Laptop" name="category_name"value="<?php echo $row['category_name'] ?>" disabled>
            </td>
        </tr>
        <tr>
            <th>Brand Name</th>
            <td>  <input type='text' placeholder="Asus" name="brand_name" value="<?php echo $row['brand_name'] ?>"disabled>
           </td>
        </tr>
        <tr>
            <th>Model Name</th>
            <td> <input type='text'  placeholder="1234" name="model_name"value="<?php echo $row['model_name'] ?>"  readonly>
            </td>
        </tr>
        
        <tr>
            <th>Reason</th>
            <td>   <textarea id="email-textarea"  placeholder="Battery Issue" name="description"  rows=4 cols=60 required></textarea>
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
</body>
