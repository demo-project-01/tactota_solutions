<?php
   include 'shopkeeper_sidebar.php';
   //require '../controller/sales.php';
   //$data=new sales();
   //$sql=$data->display_customers_details();
 session_start();
?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="../public/js/bill.js"></script>  
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/report.css"></link>
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">Bills Details</h1><br/>
    <div class="search">
        <input type="text" placeholder="Search.."  id="search_text">
    </div>
   
    <div class="view-tbl" id="result">
      
    </div>
    <div class="footer"  style="margin-top:500px;">
		<p>© Tactota Solutions All rights reserved </p>
    </div>  
</div>