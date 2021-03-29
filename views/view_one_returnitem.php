<?php
include 'shopkeeper_sidebar.php';
//require '../controller/inventory_maintain.php';
session_start();
$row=$_SESSION['return_item'];
//echo($row['item_status']);
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/email.css">
<link rel="stylesheet" href="../public/css/report.css"></link>


</head>

  <div class="content"style="width:auto;">
  <div class="page">
  <h1 id="tbl-heading"> Return Item Details</h1>
 
  <div class="update-tbl">
    <table>
    <form action="../controller/inventory_maintain.php?action=add_returnitem_details" method="post">
      <tbody>
       
        <tr>
            <th>Type</th>
            <?php
            if(($row[0]["item_status"])==1){
              ?>
            <td>   
              <input type='text'class="text" placeholder="Shop Return"  value="Shop Return" disabled>
            </td>
            <?php }?>

            <?php
            if(($row[0]["item_status"])==0){
              ?>
            <td>   
              <input type='text'class="text"  placeholder="Shop Return"  value="Customer Return" disabled>
            </td>
            <?php }?>
        </tr>
        <tr>
        <th>Serial Number</th>
           <td>
           <input type='text' placeholder="" name="serial_no" value="<?php echo $row[0]['serial_no']?>"readonly>
           </td>
        </tr>
        
           <input type='hidden' placeholder="" name="item_status" value="<?php echo $row[0]['item_status']?>"readonly>
        
        <tr>
            <th>Category Name</th>
            <td>   
              <input type='text'class="text"  placeholder="Laptop" name="category_name"value="<?php echo $row[0]['category_name'] ?>" disabled>
            </td>
        </tr>
        <tr>
            <th>Brand Name</th>
            <td>  <input type='text' placeholder="Asus" name="brand_name" value="<?php echo $row[0]['brand_name'] ?>"disabled>
           </td>
        </tr>
        <tr>
            <th>Model Name</th>
            <td> <input type='text'  placeholder="1234" name="model_name"value="<?php echo $row[0]['model_name'] ?>"  readonly>
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
<table>
        <tr>
          <td class="center-btn">
            <a class="button" href="shopkeeper_return_items.php" style="float:left;"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
          </td>
        </tr>
</table>


</div> 
    <div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
      </div>  
</div>
</body>
