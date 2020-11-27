<?php
include 'admin_sidebar.php';
?>


<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">View Income Reports</h1>
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

  <h1 id="h1">Income</h1>
  <div class="view-tbl">
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
          <td>Purchase item</td>
          <td>123456789</td>
          <td>5000.00</td>
        </tr>
        <tr>
          <td>21/11/2020</td>
          <td>Purchase item</td>
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

  <div class="view-tbl">
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Description</th>
          <th>Invoice No</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>20/11/2020</td>
          <td>Document Accessories</td>
          <td>6549</td>
          <td>430.00</td>
        </tr>

        <tr>
          <td>20/11/2020</td>
          <td colspan=2>Total</td>
          <td>5500.00</td>
        </tr>
      </tbody>
    </table>

  </div>
  <h1 id="h1">Profit / Loss</h1>

  <div class="view-tbl">
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
  <a class="button" href="#" style="float:left;"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
  <a class="button" href="#" style="float:right;"><i class="fa fa-download" aria-hidden="true">&nbsp&nbspDownload Report</i></a>
  <div class="footer">
	  <p>© Tactota Solutions All rights reserved </p>
</div>





