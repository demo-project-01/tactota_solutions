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
    <div class="dropdown">
    <ul style="position:relative;z-index:10;">
    
        <li><a href="#">Categories</a>
        
            <ul>
                
                <li><a href="#">Laptop</a>
                    <ul>
                        <li><a href="#">Asus</a></li>
                        <li><a href="#">HP</a></li>
                        <li><a href="#">Dell</a></li>
                        <li><a href="#">Acer</a></li>
                    </ul>
                </li>

                <li><a href="#">Wireless Mouse-USB</a>
                    <ul>
                        <li><a href="#">Logitech</a></li>
                    </ul>
                </li>
                
                <li><a href="#">Head Phones</a>
                    <ul>
                        <li><a href="#">AKG</a></li>
                    </ul>
                </li>

                <li><a href="#">Printers</a>
                    <ul>
                        <li><a href="#">Cannon</a></li>
                    </ul>
                </li>

                <li><a href="#">Keyboard-Gaming</a>
                    <ul>
                        <li><a href="#">Fantech</a></li>
                    </ul>
                </li>

                <li><a href="#">Keyboard-Wireless slim</a>
                    <ul>
                        <li><a href="#">K1000</a></li>
                    </ul>
                </li>

                <li><a href="#">Multimedia Office Keyboard</a>
                    <ul>
                        <li><a href="#">Fantech</a></li>
                    </ul>
                </li>

                <li><a href="#">CMOS Battery</a>
                    <ul>
                        <li><a href="#">Sony</a></li>
                    </ul>
                </li>

                <li><a href="#">UPS Battery</a>
                    <ul>
                        <li><a href="#">CyberPower</a></li>
                    </ul>
                </li>
                   
            </ul>
        
        </li>
    </ul>
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

