<?php
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
$data = new inventory_maintain();
$sql=$data->view_categories();
$sql1=$data->view_brands();
$sql2=$data->view_models();
$sql3=$data->current_stock();
?>


<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">Current Stock Details</h1>
  
  <div class="page">
  
  

  <div class="view-tbl" id="view-tbl1">
  <table>
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Brand Name</th>
          <th>Model Name</th>
          <th>Quantity</th>
          <th>Reorder Level</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if(!empty($sql3)){
foreach ($sql3 as $k => $v)
{
    ?>
    <tr>
        
       <td><?php echo $sql3[$k]["category_name"] ?></td>
        <td><?php echo $sql3[$k]["brand_name"] ?></td>
        <td><?php echo $sql3[$k]["model_name"] ?></td>
        <td><?php echo $sql3[$k]["total_quantity"] ?></td>
        <td><?php echo $sql3[$k]["reorder_level"] ?></td>
    </tr>
    <?php
}
} ?>
      </tbody>
    </table>
</div>
<!--table>
        <tr>
          <td class="center-btn">
            <a class="button" href="clerk.php" style="float:left;"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
          </td>
        </tr>
</table-->
</div>
<div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>




