<?php
include 'admin_sidebar.php';
require '../controller/inventory_maintain.php';
$data = new inventory_maintain();

if(isset($_GET['action'])){
  if($_GET["action"]=="week"){ 
    $sql1=$data->get_bills_week();
    $sql2=$data->get_bought_products_week();
  }
  else if($_GET["action"]=="month"){ 
    $sql1=$data->get_bills_month();
    $sql2=$data->get_bought_products_month();
  }
  else if($_GET["action"]=="year"){ 
    $sql1=$data->get_bills_year();
    $sql2=$data->get_bought_products_year();
   }
 }else{
  $sql1=$data->get_bills();
  $sql2=$data->get_bought_products();
  
 }
?>

<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>
<body>
<div class="content" style="width:auto;">
   <div class="new">
      <a class="add_button" href="report_loss_profit.php?action=week">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        &nbsp&nbspWeekly</a>
    <a class="add_button" href="report_loss_profit.php?action=month">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        &nbsp&nbspMonthly</a>
    <a class="add_button" href="report_loss_profit.php?action=year">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        &nbsp&nbspYearly</a>
    </div>
  <h1 id="tbl-heading">View Income Reports</h1>
  
  <div class="nav-bar">
  <form action="../controller/inventory_maintain.php?action=search_income" method="post">
      <table class="selection">
    
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
  </form>
  <div class="page">
    <h1 id="h1">Income</h1>
    <div class="view-tbl" id="view-tbl1">
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Payment Method</th>
            <th>Bill no</th>
            <th>Amount Rs.</th>
          </tr>
        </thead>
        <tbody>
        <?php
  $total=0;
foreach ($sql1 as $k => $v)
{
    ?>
    <tr>
        
        <td><?php echo $sql1[$k]["date_time"] ?></td>
        <td><?php echo $sql1[$k]["payment_method"] ?></td>
        <td><?php echo $sql1[$k]["bill_no"] ?></td>
        <td><?php echo $sql1[$k]["amount"] ?></td>
        
    </tr>
    <?php
    $total=$total+$sql1[$k]["amount"];
} ?>
 <?php
   if(!empty($sql1)){
     ?>
         <tr>       
                    <td></td>
                    <td></td> 
                    <td align="right">Total Income</td>
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
            <th>Category Name</td>
            <th>Brand Name</th>
            <th>Model Name</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Unit price</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
        <?php
  $total_buy=0;
foreach ($sql2 as $k => $v)
{
    ?>
    <tr>
        
        <td><?php echo $sql2[$k]["date"] ?></td>
        <td><?php echo $sql2[$k]["category_name"] ?></td>
        <td><?php echo $sql2[$k]["brand_name"] ?></td>
        <td><?php echo $sql2[$k]["model_name"] ?></td>
        <td><?php echo $sql2[$k]["sup_name"] ?></td>
        <td><?php echo $sql2[$k]["quantity"] ?></td>
        <td><?php echo $sql2[$k]["unit_price"] ?></td>
        <td><?php echo number_format($sql2[$k]["quantity"]*$sql2[$k]["unit_price"]) ?></td>
    </tr>
    <?php
    $total_buy=$total_buy+($sql2[$k]["quantity"]*$sql2[$k]["unit_price"]);
} ?>
 <?php
   if(!empty($sql2)){
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
        <?php
     $income=$total-$total_buy;
     ?> 
         <tr>       
                    <td><?php echo date("Y/m/d")?></td>
                    <?php 
                    if($income>=0){
                      ?> 
                       <td align="right">Total Profit</td>
                    <td><?php echo number_format($total-$total_buy) ?></td>
                    <?php  }?> 
                     <?php 
                      if($income<0){
                      ?>   
                      <td align="right">Total Lost</td>
                      <td><?php echo number_format($total_buy-$total) ?></td>
                      <?php }   
                     ?>
        </tr>
        <?php
  ?>
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





