<?php
include 'admin_sidebar.php';
require '../controller/inventory_maintain.php';
$data = new inventory_maintain();
$sql=$data->view_categories();
$sql1=$data->view_brands();
$sql2=$data->view_models();
$sql3=$data->get_bills();
$sql4=$data->get_bought_products();
?>

<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>
<body>
<div class="content" style="width:auto;">
  <h1 id="tbl-heading">View Income Reports</h1>
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
    <h1 id="h1">Income</h1>
    <div class="view-tbl" id="view-tbl1">
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Bill no</th>
            <th>Amount Rs.</th>
          </tr>
        </thead>
        <tbody>
        <?php
  $total=0;
foreach ($sql3 as $k => $v)
{
    ?>
    <tr>
        
        <td><?php echo $sql3[$k]["date_time"] ?></td>
        <th>Sold item</td>
        <td><?php echo $sql3[$k]["bill_no"] ?></td>
        <td><?php echo $sql3[$k]["amount"] ?></td>
        
    </tr>
    <?php
    $total=$total+$sql3[$k]["amount"];
} ?>
 <?php
   if(!empty($sql3)){
     ?>
         <tr>       
                    <td></td>
                    <td></td> 
                    <td align="right">Total Amount</td>
                    <td><?php echo number_format($total) ?></td>
        </tr>
        <?php
      }?>
        </tbody>
      </table>
    </div>
    
    <h1 id="h1">Expences</h1>
    <div class="view-tbl" id="view-tbl1">
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Category</td>
            <th>Brand</th>
            <th>Model</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Unit price</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
        <?php
  $total_buy=0;
foreach ($sql4 as $k => $v)
{
    ?>
    <tr>
        
        <td><?php echo $sql4[$k]["date"] ?></td>
        <td><?php echo $sql4[$k]["category_name"] ?></td>
        <td><?php echo $sql4[$k]["brand_name"] ?></td>
        <td><?php echo $sql4[$k]["model_name"] ?></td>
        <td><?php echo $sql4[$k]["sup_name"] ?></td>
        <td><?php echo $sql4[$k]["quantity"] ?></td>
        <td><?php echo $sql4[$k]["unit_price"] ?></td>
        <td><?php echo number_format($sql4[$k]["quantity"]*$sql4[$k]["unit_price"]) ?></td>
    </tr>
    <?php
    $total_buy=$total_buy+($sql4[$k]["quantity"]*$sql4[$k]["unit_price"]);
} ?>
 <?php
   if(!empty($sql4)){
     ?>
         <tr>       
                    <td></td>
                    <td></td> 
                    <td></td>
                    <td></td> 
                    <td></td>
                    <td></td> 
                    <td align="right">Total Expences</td>
                    <td><?php echo number_format($total_buy) ?></td>
        </tr>
        <?php
      }?>
        </tbody>
      </table>

    </div>
    <h1 id="h1">Profit / Loss</h1>

    <div class="view-tbl" id="view-tbl1">
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>20/11/2020</td>
            <td>Profit / Loss </td>
            <td>430.00</td>
          </tr>
        </tbody>
      </table>
    </div>

      <table>
        <tr>
          <td class="center-btn">
            <a class="button" href="admin.php" style="float:left;"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
          </td>
          <td class="center-btn">
            <a class="button" href="#" style="float:right;"><i class="fa fa-download" aria-hidden="true">&nbsp&nbspDownload Report</i></a>
          </td>
        </tr>
      </table>

  </div>
   <div class="footer">
      <p>© Tactota Solutions All rights reserved </p>
  </div>
</div>





