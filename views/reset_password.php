<?php
    $key=$_GET['key'];
    $token=$_GET['token'];

?>
<!DOCTYPE html>

<head>
    <title>Tactota Solutions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../public/css/signup.css" rel="stylesheet" type="text/css"/>
    <script src="https://kit.fontawesome.com/1b83d32a6d.js" crossorigin="anonymous"></script>
</head>
<body>
<div>
    <br/>
    <h1>Reset Password</h1>
    <br/>
    <br/>
	<br/>
	<br/>
    <div class="main-container">
        <div class="sub-container">
            <div><img src="../public/images/logo.jpeg" alt="logo" class="verticle-center" width=400 height=auto /></div>
        </div>

        <div class="sub-container">

            <form action="../controller/authenitication.php?action=reset_password&key=<?php  echo $key; ?>" method="post">
            <br/> 
            <label id='left-p' style="font-size:1.3em; color:#007042">Please enter New Password :</label>
               
					<br/>
					<br/>
					<br/>
                <label for='pswd1' id='left-label'>
						<i class="fa fa-key" aria-hidden="true"></i>
						&nbsp&nbspNew Password *
					</label>
					<input id='pswd1' class="text" type="password" name="password" required="">

					<label for='pswd2' id='left-label'>
						<i class="fa fa-key" aria-hidden="true"></i>
						&nbsp&nbspConfirm Password *
					</label>
					<input id='pswd2' class="text w3lpass" type="password" name="cpassword" required="">
                   
                    <label for='forget' class="right">just rememberd? <a id='forget' href="login.php"> SignIn</b></label>
                  <input type="submit" value="UPDATE">
            </form>

        </div>
    </div>

    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>
</body>
</html>


