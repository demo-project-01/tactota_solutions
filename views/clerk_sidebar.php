<?php  
require '../controller/authenitication.php';
$data = new authenitication();
$sql= $data->get_username();
//print_r($sql);

//foreach($sql as $value){
 //   echo $value . "<br>";
//}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clerk</title>
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/clerk.css">
    <link rel="stylesheet" href="../public/css/view_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/1b83d32a6d.js" crossorigin="anonymous"></script>
</head>
<body>
<input type="checkbox" id="check">
<!--header area start-->
<header>
    
    <div class="left_area">
        <table width=100% style="margin:0px;">
            <tr>
                <td>
                    <img src="../public/images/logo-s.jpeg" alt="Logo">
                </td>
                <td>
                    <label for="check"><i class="fas fa-bars" id="sidebar_btn">&nbsp&nbsp<span style="font-family: 'Courier New', monospace;">CLERK</span></i></label>
                </td>
                
                <td style="width:15%;">
                    <div class="profile-wrapper">
                        <button class="dropbtn"> 
                            <i class="far fa-user-circle fa-2x"></i></a>
                           
                        </button>

                        <?php

                     foreach ($sql as $value){
                        ?>
                        <p id="disp-name"><?php echo $value ?></p>

                        <?php
                         }
                ?>
                            <div class="menu">
                                <a href="../controller/authenitication.php?action=profile"><i class="fas fa-user-alt"></i>&nbsp&nbspProfile</a>
                                <a href="../controller/authenitication.php?action=logout"><i class="fas fa-sign-out-alt"></i>&nbsp&nbspLog out</a>
                            </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</header>
<!--header area end-->
<div class="sidebar">
    <a href="clerk.php"><i class="fas fa-home"></i></i><span>Dashboard</span></a>
    <a href="view_all_products.php"><i class="fas fa-cart-plus"></i></i><span>Product</span></a>
    <a href="reminderitems.php"><i class="fa fa-bell-o"></i></i><span>Reminder Products</span></a>
    <a href="returnitems.php"><i class="fas fa-cart-arrow-down"></i></i><span>Return Items</span></a>
    <a href="supplier_details.php"><i class="fas fa-people-carry"></i></i><span>Suppliers</span></a>
    <a href="inbox_supplier_reply.php"><i class="fas fa-inbox"></i></i><span>Supplier Response</span></a>
    <!--a href="clerk_active_user.php"><i class="fas fa-users"></i></i><span>Users</span></a-->
    <a href="report_sold_out_items_clerk.php"><i class="fas fa-shopping-cart"></i></i><span>Sold Item</span></a>
    <a href="report_products_clerk.php"><i class="fas fa-store"></i></i><span>Stock Details</span></a>
    <!--a href="purchasedetails.php"><i class="fas fa-shopping-bag"></i></i></i><span>Purchase Details</span></a-->
    <a href="review_clerk.php"><i class="fas fa-comments"></i></i></i><span>Feedback</span></a>
</div>
<!--sidebar end-->