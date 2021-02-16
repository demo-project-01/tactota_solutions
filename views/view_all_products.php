<?php
include 'clerk_sidebar.php';
session_start();
?>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="../public/js/view_all_product.js"></script>  
    <link rel="stylesheet" href="../public/css/dropdown.css">  
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">View All Products</h1>
    <div class="new">
        <a class="add_button" href="newproduct.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp&nbsp Add new Product</a>
    </div>
    <div class="new">
        <a class="add_button" href="newcategory.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp&nbsp Add new Category</a>
    </div>
    <div class="new">
        <a class="add_button" href="newbrand.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp&nbsp Add new Brand</a>
    </div>
    <div class="new">
        <a class="add_button" href="newmodel.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp&nbsp Add new Model</a>
    </div>
    <!--div class="search">
        <input type="text" placeholder="Search.."  id="search_text">
    </div-->
   
    <?php if(isset($_SESSION['add_product'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['add_product']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['add_product']); ?>
    
    <div class="view-tbl" id="result">

    </div>
    <div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
      </div> 
</div>

