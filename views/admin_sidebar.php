<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tactota solution</title>
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/view_user.css">
    <link rel="stylesheet" href="../public/css/admin.css">
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
        <img src="../public/images/logo-s.jpeg" alt="Logo">
    
    <ul class="profile-wrapper">
        <li>

            <div class="profile">

                <i class="far fa-user-circle fa-2x "></i>
                <ul class="menu">
                    <li><a href="../controller/authenitication.php?action=profile"><i class="fas fa-user-alt"></i>Profile</a></li>
                    <li><a href="../controller/authenitication.php?action=logout"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
                </ul>
            </div>
        </li>

    </ul>
    </div>
</header>
<!--header area end-->
<div class="sidebar">
    <a href="admin.php"><i class="fas fa-home"></i></i><span>Dashboard</span></a>
    <a href="income.php"><i class="fas fa-cart-plus"></i></i><span>Income</span></a>
    <a href="review.php"><i class="fas fa-thumbs-up"></i>Review</span></a>
    <a href="users.php"><i class="fas fa-users"></i></i><span>Users</span></a>
    <a href="solditem.php"><i class="fas fa-shopping-cart"></i></i><span>Sold Item</span></a>
    <a href="stockreport.php"><i class="fas fa-store"></i></i><span>Stock Details</span></a>

</div>



