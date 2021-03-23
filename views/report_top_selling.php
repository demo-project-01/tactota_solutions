<?php
include 'admin_sidebar.php';
require '../controller/inventory_maintain.php';
$data = new inventory_maintain();
$sql=$data->view_categories();
$sql1=$data->view_brands();
$sql2=$data->view_models();
$sql3=$data->max_sales_with_categories();
$sql3=$data->min_sales_with_categories();
?>


<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">Top/Least Selling Products of the Month</h1>
  <!-- div class="nav-bar">
      <table class="selection">
        <tr>
          <td><button id="year" class="add_button">Yearly</label></td>
          <td><button id="month" class="add_button">Monthly</label></td>
          <td><button id="week" class="add_button">Weekly</label></td>
        </tr>
      </table>
    </div -->
  
  <div class="page">
    
  <h1 id="h1">Top Selling</h1>
  <div class="view-tbl" id="view-tbl1" width=50%>
    <table>
      <thead>
        <tr>
            <th>Category Name</td>
            <th>Brand Name</th>
            <th>Model Name</th>
            <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sql3 as $k => $v){ ?>
        <tr>
          <td><?php echo $sql3[$k]["category_name"] ?></td>
          <td><?php echo $sql3[$k]["brand_name"] ?></td>
          <td><?php echo $sql3[$k]["model_name"] ?></td>
          <td><?php echo $sql3[$k]["total"] ?></td>
        </tr>
        <?php } ?>
       </tbody>
    </table>
  </div> 
  <h1 id="h1">Least Selling</h1>
  <div class="view-tbl" id="view-tbl1" width=50%>
  <table>
      <thead>
        <tr>
            <th>Category Name</td>
            <th>Brand Name</th>
            <th>Model Name</th>
            <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sql3 as $k => $v){ ?>
        <tr>
          <td><?php echo $sql3[$k]["category_name"] ?></td>
          <td><?php echo $sql3[$k]["brand_name"] ?></td>
          <td><?php echo $sql3[$k]["model_name"] ?></td>
          <td><?php echo $sql3[$k]["total"] ?></td>
        </tr>
        <?php } ?>
       </tbody>
    </table>
  </div> 
  </div>
<div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>



