<?php
include 'clerk_sidebar.php';

?>
<?php
session_start();
$row=$_SESSION['supplier_profile_details'];
$row2=$_SESSION['supplier_product_details'];

?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/supplier.css">
</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">View Supplier</h1>
 
  <div class="update-tbl">
    <div  id="info">
      <table>
        <tbody>
          <tr>
              <th>Supplier Id</th>
              <td><?php echo $row['sup_id'] ?></td>
          </tr>
          <tr>
              <th>Supplier Name</th>
              <td><?php echo $row['sup_name'] ?></td>
          </tr>
          <tr>
              <th>Email Address</th>
              <td><?php echo $row['email_address'] ?></td>
          </tr>
          <tr>
              <th>Address</th>
              <td><?php echo $row['address'] ?></td>
          </tr>
          
          <tr>
              <th>Contact Number</th>
              <td><?php echo $row['telephone_no'] ?></td>
          </tr>
          <tr>
          
          <tr>
          <td colspan=2>
            <a class="add_button" href="supplier_details.php"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
            <a class="add_button" href="#" ><i class="fa fa-pencil" aria-hidden="true">&nbsp&nbspUpdate</i></a>
            <a class="add_button" href="#" ><i class="fa fa-trash" aria-hidden="true">&nbsp&nbspDelete</i></a>
          </td>
        </tr>
        </tbody>
         
      </table>
    </div>
    <div id="product">
      <table style="float:top;">
        <tr>
          <th colspan=4>Product List :</td>
        </tr>
  <?php if(empty($row2)){  ?>
        <tr>
          <td colspan=4><?php echo "No products to show !"; ?></td>
  <?php }
        else{ ?>
        <tr>
          <td>Product ID</td>
          <td>Product Name</td>
          <td>Brand Name</td>
          <td>Model No.</td>
        </tr>
  <?php foreach ($row2 as $k => $v)
          {   ?>
        <tr>
          <td><?php echo $row2[$k]["p_id"] ?></td>
          <td><?php echo $row2[$k]["p_name"] ?></td>
          <td><?php echo $row2[$k]["brand_name"] ?></td>
          <td><?php echo $row2[$k]["model_no"] ?></td>
        </tr>
  <?php   }
        }  ?>
        
      </table>
    </div>
  </div>
  <div class="footer">
	    <p>© Tactota Solutions All rights reserved </p>
  </div>
</div>
</body>
</html>
   
   
