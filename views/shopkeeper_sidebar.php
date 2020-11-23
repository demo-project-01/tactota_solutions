<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tactota solution</title>
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/view_user.css">
    <link rel="stylesheet" href="../public/css/shopkeeper.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/1b83d32a6d.js" crossorigin="anonymous"></script>
    </script>
    </script>
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
                    <li><a href="../controller/authenitication.php?action=profile">Profile</a></li>
                    <li><a href="../controller/authenitication.php?action=logout">Log out</a></li>
                </ul>
            </div>
        </li>

    </ul>
</header>
<!--header area end-->
<div class="sidebar">
    <a href="shopkeeper_dashbord.php"><i class="fas fa-home"></i></i><span>Dashboard</span></a>
    <a href="#"><i class="fas fa-cart-plus"></i></i><span>Customer Purchase </span></a>
    <a href="purchase.php"><i class="fas fa-money-bill-alt"></i>Purchase</span></a>
    <a href="returnitems.php"><i class="fab fa-product-hunt"></i>Return Product</span></a>

</div>



