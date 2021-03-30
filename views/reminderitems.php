<?php
   include 'clerk_sidebar.php';
  // require '../controller/inventory_maintain.php';
  // $data=new inventory_maintain();
  // $sql=$data->display_reminders();
   //print_r($sql);
   session_start();
?><head>
<link rel="stylesheet" href="../public/css/update.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<script src="../public/js/remainder_items.js"></script>  
</head>
<div class="content"style="width:auto;">
    <h1 id="tbl-heading">Reminder Products</h1>
    <div class="search">
    <input type="text" placeholder="Search.."  id="search_text">
  </div>
    <div class="view-tbl" id="result">
      
    </div>
   
</div>
<div class="footer">
	 <p>© Tactota Solutions All rights reserved </p>
      </div>  