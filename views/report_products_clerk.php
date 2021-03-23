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
  <h1 id="tbl-heading">View Stock Details</h1>
  <div class="nav-bar">
      <table class="selection">
        <tr>
          <td><label for="category" class="date-lbl">Category</label></td>
          <td><label for="brand" class="date-lbl">Brand</label></td>
          <td><label for="model" class="date-lbl">Model</label></td>
        </tr>
        <tr>
          <td>
            <select name="category" id="category">
              <option value="0">All</option>
              <?php
                foreach ($sql as $k => $v){  ?>
                  <option value="<?php echo $sql[$k]["category_id"] ?>"> <?php 
                    echo $sql[$k]["category_name"] ?>
                  </option>   <?php
                }
              ?>
            </select>
          </td>
          <td>
            <select name="brand" id="brand">
              <option value="0">All</option>
              <?php
                foreach ($sql1 as $k => $v){  ?>
                  <option value="<?php echo $sql1[$k]["brand_id"] ?>"> <?php 
                    echo $sql1[$k]["brand_name"] ?>
                  </option>   <?php
                }
              ?>
            </select>
          </td>
          <td>
            <select name="model" id="model">
              <option value="0">All</option>
              <?php
                foreach ($sql2 as $k => $v){  ?>
                  <option value="<?php echo $sql2[$k]["model_id"] ?>"> <?php 
                    echo $sql2[$k]["model_name"] ?>
                  </option>   <?php
                }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan=3>
            <label for="f_date" class="date-lbl">Time Range :<br/>From</label>
              <input type="date" id="f_date" name="f_date" placeholder="Select start date" min="2017-04-01" max="2020-11-21">
            <label for="t_date" class="date-lbl"> to </label>
               <input type="date" id="t_date" name="t_date" placeholder="Select End date" min="2017-04-01" max="2020-11-21">
          </td>
        </tr>
        <tr>
          <td colspan=3>
            <a class="button" href="#">Search </a>
          </td>
        </tr>
      </table>
    </div>
  
  <div class="page">
  
  <h1 id="h1">Maximum Sold Products</h1>
  <div class="view-tbl" id="view-tbl1">
    <table>
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Category Name</th>
          <th>Brand Name</th>
          <th>Model Name</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>P001</td>
          <td>Laptop</td>
          <td>Asus</td>
          <td>Vivobook X512J</td>
        <td>12</td>
        </tr>
        <tr>
          <td>P001</td>
          <td>Printer</td>
          <td>HP</td>
          <td>Sw123</td>
        <td>10</td>
        </tr>
        
      </tbody>
    </table>
  </div> 
  <h1 id="h1">Current Stock</h1>

  <div class="view-tbl" id="view-tbl1">
  <table>
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Brand Name</th>
          <th>Model Name</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
      <?php
foreach ($sql3 as $k => $v)
{
    ?>
    <tr>
        
        <td><?php echo $sql3[$k]["p_id"] ?></td>
        <td><?php echo $sql3[$k]["category_name"] ?></td>
        <td><?php echo $sql3[$k]["brand_name"] ?></td>
        <td><?php echo $sql3[$k]["model_name"] ?></td>
        <td><?php echo $sql3[$k]["total_quantity"] ?></td>
    </tr>
    <?php
} ?>
      </tbody>
    </table>
</div>
<table>
        <tr>
          <td class="center-btn">
            <a class="button" href="clerk.php" style="float:left;"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
          </td>
        </tr>
      </table>
  </div>
<div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>




