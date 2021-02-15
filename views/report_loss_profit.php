<?php
include 'admin_sidebar.php';
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
          <td>
            <label for="category" class="date-lbl">Category
            <select name="category" id="category">
              <option value="*">All</option>
              <option value="laptop">Laptop</option>
            </select>
          </td>
          <td>
            <label for="brand" class="date-lbl">Brand
            <select name="brand" id="brand">
              <option value="*">All</option>
              <option value="laptop">Laptop</option>
            </select>
          </td>
          <td>
            <label for="model" class="date-lbl">Model 
            <select name="model" id="model">
              <option value="*">All</option>
              <option value="laptop">Laptop</option>
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
          <tr>
            <td>20/11/2020</td>
            <td>Sold item</td>
            <td>123456789</td>
            <td>5000.00</td>
          </tr>
          <tr>
            <td>21/11/2020</td>
            <td>Sold item</td>
            <td>78956789</td>
            <td>500.00</td>
          </tr>

          <tr>
            <td>20/11/2020</td>
            <td colspan=2>Total</td>
            <td>5500.00</td>
          </tr>
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
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>20/11/2020</td>
            <td>laptop</td>
            <td>HP </td>
            <td>envy12 </td>
            <td>barckleys computers</td>
            <td>6549</td>
            <td>430.00</td>
          </tr>
          <tr>
            <td>20/11/2020</td>
            <td colspan=5>Total</td>
            <td>430.00</td>
          </tr>
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





