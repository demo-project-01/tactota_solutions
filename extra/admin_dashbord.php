 
<?php 
  

  include 'config/db.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started
session_start();

if(!isset($_SESSION['username'])) { //if not yet logged in
header("Location: signin.php");// send to login page
exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tactota solution</title>
  <link rel="stylesheet" href="style1.css">
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
                             <li><a href="#">Edit</a></li>
                             <li><a href="logout.php">Log out</a></li>
                       </ul>    
                 </div>
            </li>
              
     </ul> 
  </header>
  <!--header area end-->

  <div class="sidebar">

    <a href="#"><i class="fas fa-home"></i></i><span>Dashboard</span></a>
    <a href="#"><i class="fas fa-cart-plus"></i></i><span>Income</span></a>
    <a href="#"><i class="fas fa-thumbs-up"></i>Review</span></a>
    <a href="#"><i class="fas fa-users"></i></i><span>Users</span></a>
    <a href="#"><i class="fas fa-shopping-cart"></i></i><span>Sold Item</span></a>
    <a href="#"><i class="fas fa-store"></i></i><span>Stock Details</span></a>
    
  </div>
  <!--sidebar end-->

  <div class="content">
    <div class="card">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
    <div class="card">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
    <div class="card">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
  </div>



</body>
</html>

