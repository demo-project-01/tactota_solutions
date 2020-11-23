<?php
include 'clerk_sidebar.php';
session_start();
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="../public/js/view_all_product.js"></script>    
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">View All Products</h1>
    <div class="search">
        <input type="text" placeholder="Search.."  id="search_text">
    </div>
    <div>
        <a class="add_button" href="newproduct.php">-|- Add new Product</a>
    </div>

    <?php if(isset($_SESSION['add_product'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['add_product']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['add_product']); ?>
    <br>
    <div class="view-tbl" id="result">

    </div>
</div>

