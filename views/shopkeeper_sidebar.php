<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopkeeper</title>
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
    
    <div class="left_area">
        <table width=100% style="margin:0px;">
            <tr>
                <td>
                    <img src="../public/images/logo-s.jpeg" alt="Logo">
                </td>
                <td>
                    <label for="check"><i class="fas fa-bars" id="sidebar_btn">&nbsp&nbsp<span style="font-family: 'Courier New', monospace;">SHOPKEEPER</span></i></label>
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
    <a href="shopkeeper_dashbord.php"><i class="fas fa-home"></i></i><span>Dashboard</span></a>
    <!--a href="customerpurchase.php"><i class="fas fa-cart-plus"></i></i><span>Customer Purchase </span></a-->
    <a href="purchase.php"><i class="fas fa-money-bill-alt"></i>Purchase</span></a>
    <a href="purchased_bills_details.php"><i class="fa fa-money" aria-hidden="true"></i><span>Bill Details</span></a>
    <a href="shopkeeper_return_items.php"><i class="fa fa-plus-square" aria-hidden="true"></i>Add Return Product</span></a>

</div>



