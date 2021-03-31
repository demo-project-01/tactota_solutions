<?php
include 'clerk_sidebar.php';
?>
<head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="../public/js/suplier_details.js"></script>
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">Supplier Details</h1>
    <?php if(isset($_SESSION['supplier_details_success'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['supplier_details_success']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['supplier_details_success']); ?>
    <div class="new">
        <a class="add_button" href="add_suppliers.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp&nbspAdd new Suppliers</a>
    </div>
    <br/>
    <div class="search">
        <input type="text" id="search_text" placeholder="Search..">
    </div>

   <div class="view-tbl" id="result">

    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
   </div>
</div>
</body>

