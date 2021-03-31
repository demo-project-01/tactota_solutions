<?php
   include 'shopkeeper_sidebar.php';
   //require '../controller/inventory_maintain.php';
   session_start();
   /*$data=new inventory_maintain();
   $sql=$data->display_shopkeeper_return_items();*/
   /*$sql1=$data->view_categories();
   $sql2=$data->view_brands();
   $sql3=$data->view_models();*/
   /*$numbr_of_results = $data->countitems();
   print_r($numbr_of_results);
   $results_per_page =10;  //define how many results you want per page
   $numbr_of_pages = ((int)($numbr_of_results) / ($results_per_page));
   print_r($numbr_of_pages);*/

?>
<head>
    <link rel="stylesheet" href="../public/css/dropdown.css">
    <link rel="stylesheet" href="../public/css/update.css"></link>
    <link rel="stylesheet" href="../public/css/report.css"></link>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<script src="../public/js/add_retrunitems.js"></script> 
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">Add Return Items</h1><br/>
    <?php if(isset($_SESSION['flash_msg_return'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['flash_msg_return']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['flash_msg_return']); ?>
    <div class="search">
    <input type="text" placeholder="Search.." id="search_text">
    </div>
    <div class="page">
    <h2 style="color:#007042;">Select Item To Add :</h2>
    <div class="view-tbl" id="result">  
       
    </div>
    </div> 
    <div class="footer">
		<p>© Tactota Solutions All rights reserved </p>
    </div> 
   
</div>
<script>

setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 1600);

</script>