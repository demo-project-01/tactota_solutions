<?php
include 'admin_sidebar.php';
?>


<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">View Stock Reports</h1>
  <div class="nav-bar">
      <table>
        <tr>
          <td class="button-bar">
            <ul>
              <li><a class="button" href="#">Annual</a>
              <li><a class="button" href="#">Monthly</a>
              <li><a class="button" href="#">Weekly</a>           
          </td>
          <td class="date-bar">
            <li><a class="button" href="#">Custom Time Range: </a>   
            <label for="f_date" class="date-lbl">From : </label>
              <input type="date" id="f_date" name="f_date" placeholder="Select start date" min="2017-04-01" max="2020-11-21">
            <label for="t_date" class="date-lbl">To : </label>
               <input type="date" id="t_date" name="t_date" placeholder="Select End date" min="2017-04-01" max="2020-11-21">
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
          <th>Product Name</th>
          <th>Brand Name</th>
          <th>Model</th>
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
          <th>Model</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>P001</td>
          <td>Laptop</td>
          <td>Asus</td>
          <td>Vivobook X512J</td>
        <td>2</td>
        </tr>
        <tr>
          <td>P001</td>
          <td>Printer</td>
          <td>HP</td>
          <td>Sw123</td>
        <td>5</td>
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




