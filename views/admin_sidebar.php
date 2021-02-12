<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>
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
    
    <div class="left_area">
        <table width=100% style="margin:0px;">
            <tr>
                <td>
                    <img src="../public/images/logo-s.jpeg" alt="Logo">
                    
                </td>
                <td>
                    <label for="check"><i class="fas fa-bars" id="sidebar_btn">&nbsp&nbsp<span style="font-family: 'Courier New', monospace;">MANAGER</span></i></label>
                </td>
                
                <td style="width:15%;">
                    <div class="profile-wrapper">
                        <button class="dropbtn"> 
                            <i class="far fa-user-circle fa-2x"></i></a>
                           
                        </button>
                        <p id="disp-name"><!--?php echo $first_name ?--> Someone's name  </p>
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
    <a href="admin.php"><i class="fas fa-home"></i></i><span>Dashboard</span></a>
    <a href="users.php"><i class="fas fa-users"></i></i><span>Users</span></a>
    <a href="report_loss_profit.php"><i class="fa fa-money"></i></i><span>Income</span></a>
    <a href="report_products.php"><i class="fas fa-store"></i></i><span>Stock Details</span></a>
    <a href="report_sold_out_items.php"><i class="fas fa-shopping-cart"></i></i><span>Sold Products</span></a>
    <a href="review.php"><i class="fas fa-thumbs-up"></i>Review</span></a>

</div>



