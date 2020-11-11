<!DOCTYPE html>
<html>
<head>
<title>Tactota Solutions</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../public/css/signup.css" rel="stylesheet" type="text/css"/>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div>
		<br/>
		<h1>Forgot Password</h1>
        <br/>

		<br/>
		<br/>
		<br/>
		<br/>
		<div class="main-container">
			<div class="sub-container">
				<div><img src="../public/images/logo.jpeg" alt="logo" class="verticle-center" width=400 height=auto /></div>
			</div>
			
			<div class="sub-container">

				<form action="../controller/authenitication.php?action=forgotpassword" method="post">
                    <i class="fas fa-lock" class="align"></i>
                    <p class="align">Please fill your details</p>
					
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					
					
					
				</form>
                <p>just rememberd? <a href="login.php"> SignIn</b></p>
                <input type="submit" value="NEXT">
			</div>
		</div>
		
		<div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
		</div>
	</div>
</body>
</html>
