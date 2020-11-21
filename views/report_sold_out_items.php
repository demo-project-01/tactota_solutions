<?php
include 'admin_sidebar.php';
?>


<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">Sold out Item Report</h1>
    <br/>
    <br/>
  <ul>
    <li><a class="button" href="#">Annual Report</a></li>
    <li><a class="button" href="#">Monthly Report</a></li>
    <li><a class="button" href="#">Weekly Report</a></li>
    <li class="right" style="font-weight:bold; font-size:1.2em;">Custom Time Range 
      <label for="f_date" style="font-weight:bold; font-size:0.8em;">From : </label><input type="date" id="f_date" name="f_date" placeholder="Select start date" min="2017-04-01" max="2020-11-21">
      <label for="t_date" style="font-weight:bold; font-size:0.8em;">To : </label><input type="date" id="t_date" name="t_date" placeholder="Select End date" min="2017-04-01" max="2020-11-21">
    </li>
  </ul>

  <h1 id="h1">Sold Items</h1>
  <div class="view-tbl">
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
  
  <a class="button" href="#" style="float:left;"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
  <a class="button" href="#" style="float:right;"><i class="fa fa-download" aria-hidden="true">&nbsp&nbspDownload Report</i></a>
</div>
<div class="footer" style="color:#ffffff;">
	<p>© Tactota Solutions All rights reserved </p>
</div>



