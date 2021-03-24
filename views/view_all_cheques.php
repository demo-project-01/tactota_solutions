<?php
   include 'admin_sidebar.php';
  // include 'view_all_cheques_search.php';
  // $data=new sales();
   //$sql=$data->view_cheques();
 /*  if(isset($_GET['action'])){
      if($_GET["action"]=="bank"){
          $sql=$data->view_cheques_by_bank();
      }
      else if($_GET["action"]=="customer_return"){
          $sql=$data->view_cheques();
          
      }
     }*/
?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="../public/css/view_user.css">
<script src="../public/js/view_all_cheques.js"></script>  
</head>
<body>
<div class="content" style="width:auto;">
      <h1 id="tbl-heading">All Cheques</h1><br/>
      <div class="new">
      <a class="add_button" href="view_all_cheques.php?action=bank">
        <i class="fa fa-bank" aria-hidden="true"></i>
        &nbsp&nbspBank</a>
    <a class="add_button" href="view_all_cheques.php?action=due_date">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        &nbsp&nbspDue Date</a>
    </div>
      <div class="search">
    <input type="text" placeholder="Search.." id="search_text">
    </div>
    <div class="view-tbl" id="result">
     
    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
   </div>
</body>