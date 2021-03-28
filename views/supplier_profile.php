<?php
include 'clerk_sidebar.php';

?>
<?php
$row=$_SESSION['supplier_profile_details'];
$row2=$_SESSION['supplier_product_details'];
$row3=array_unique($row2);
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
            <a class="add_button" href="../controller/inventory_maintain.php?action=update_supplier_details&id=<?php  echo $row["sup_id"]; ?>" ><i class="fa fa-pencil" aria-hidden="true">&nbsp&nbspUpdate</i></a>
            <a class="add_button" href="#" ><i class="fa fa-trash" aria-hidden="true">&nbsp&nbspDelete</i></a>
          </td>
        </tr>
        </tbody>
         
      </table>
    </div>
    <div id="product">
      <table style="float:top;">
      <thead>
        <tr>
          <th colspan=3>Product List :</th>
        </tr>
        </thead>
        <?php 
        if(empty($row3)){  ?>
                <tbody>

        <tr>
          <td colspan=3>No products to show !</td>
        </tr>
        <?php 
        }
        else{ ?>
        <tr>
          <td style="width:30%;">category Name</td>
          <td style="width:30%;">Brand Name</td>
          <td style="width:30%;">Model Name</td>
        </tr>
        <?php 
        foreach ($row3 as $k => $v) {   ?>
        <tr>
          <td><?php echo $row3[$k]["category_name"] ?></td>
          <td><?php echo $row3[$k]["brand_name"] ?></td>
          <td><?php echo $row3[$k]["model_name"] ?></td>
        </tr>
        <?php   
        }
        }  ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="footer">
	    <p>© Tactota Solutions All rights reserved </p>
  </div>
</div>
</body>
</html>
   
   
