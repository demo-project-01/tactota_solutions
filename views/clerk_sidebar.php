<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Template</title>
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/clerk.css">
    <link rel="stylesheet" href="../public/css/view_user.css">
    <link rel="stylesheet" href="../public/css/update.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/1b83d32a6d.js" crossorigin="anonymous"></script>

</head>
<body>

<input type="checkbox" id="check">
<!--header area start-->
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <h3>TACTOTA<span> SOLUTION</span></h3>
    </div>
    <ul class="profile-wrapper">
        <li>

            <div class="profile">

                <i class="far fa-user-circle fa-2x"></i>
                <ul class="menu">
                    <li><a href="../controller/authenitication.php?action=profile"><i class="fas fa-user-alt"></i>Profile</a></li>
                    <li><a href="../controller/authenitication.php?action=logout"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
                </ul>
            </div>
        </li>

    </ul>
</header>
<!--header area end-->

<div class="sidebar">

    <a href="clerk.php"><i class="fas fa-home"></i></i><span>Dashboard</span></a>
    <a href="view_all_products.php"><i class="fas fa-cart-plus"></i></i><span>Add Product</span></a>
    <a href="list_updateproduct.php"><i class="fas fa-edit"></i></i><span>Update Product</span></a>
    <a href="inbox.php"><i class="fas fa-inbox"></i></i><span>Inbox</span></a>
    <a href="returnitems.php"><i class="fas fa-cart-arrow-down"></i></i><span>Return Product</span></a>
    <a href="clerk_active_user.php"><i class="fas fa-users"></i></i><span>Users</span></a>
    <a href="solditem.php"><i class="fas fa-shopping-cart"></i></i><span>Sold Item</span></a>
    <a href="stockreport.php"><i class="fas fa-store"></i></i><span>Stock Details</span></a>
    <a href="purchasedetails.php"><i class="fas fa-shopping-bag"></i></i></i><span>Purchase Details</span></a>
    <a href="supplier_details.php"><i class="fas fa-people-carry"></i></i><span>Add Suppliers</span></a>
    <a href="view_all_feedbacks.php"><i class="fas fa-comments"></i></i></i><span>Feedback</span></a>
</div>
<!--sidebar end-->




     







