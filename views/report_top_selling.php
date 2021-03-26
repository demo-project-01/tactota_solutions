<?php
include 'admin_sidebar.php';
require '../controller/inventory_maintain.php';
$data = new inventory_maintain();
$sql=$data->view_categories();
$sql1=$data->view_brands();
$sql2=$data->view_models();
$sql3=$data->max_sales_with_categories();
$sql4=$data->min_sales_with_categories();
$maxmodels=array();       // need to clarify the same model is not in top and least tables. (there may be models that sold only that in their category)
$minmodels=array();
if(!empty($sql4)){
foreach ($sql4 as $k => $v)
  {
    array_push($minmodels,$sql4[$k]["model_name"]);
  }
}
?>


<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">Top/Least Selling Products of the Month</h1>
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
        <?php 
         if(!empty($sql3)){
        foreach ($sql3 as $k => $v){ 
          if ($sql3[$k]["total"]>1) //cant consider one item sale as top selling :)
          {
            array_push($maxmodels,$sql3[$k]["model_name"]); //what was considered as top selling. becouse they shouldn't be in least table
            ?>
        <tr>
          <td><?php echo $sql3[$k]["category_name"] ?></td>
          <td><?php echo $sql3[$k]["brand_name"] ?></td>
          <td><?php echo $sql3[$k]["model_name"] ?></td>
          <td><?php echo $sql3[$k]["total"] ?></td>
        </tr>
        <?php }
        } 
      }
      ?>
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
        <?php
         if(!empty($sql4)){
         foreach ($sql4 as $k => $v){ 
           if (!in_array($sql4[$k]["model_name"],$maxmodels))       //same model is not be in the top and least both tables
           {
             ?>
        <tr>
          <td><?php echo $sql4[$k]["category_name"] ?></td>
          <td><?php echo $sql4[$k]["brand_name"] ?></td>
          <td><?php echo $sql4[$k]["model_name"] ?></td>
          <td><?php echo $sql4[$k]["total"] ?></td>
        </tr>
        <?php }
        } 
      }?>
       </tbody>
    </table>
  </div> 
  </div>
<div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>



