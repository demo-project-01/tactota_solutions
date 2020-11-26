<!DOCTYPE html>
<html>
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
		<h1>Forgot Password</h1>
        <br/>

		<br/>
		<br/>
		<br/>
		<div class="main-container">
			<div class="img">
				<div><img src="../public/images/logo-m.jpeg" alt="logo" width=300 height=auto /></div>
			</div>
			
			<div class="sub-container">
					<br/>
				<form action="../controller/authenitication.php?action=forgotpassword" method="post">
				<label id='left-p' style="font-size:1.3em; color:#007042">Please enter your Registered Email Address :</label>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<label for='email' id='left-label'>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						&nbsp&nbspEmail Address *
					</label>					
					<input id='email' class="text email" type="email" name="email" required="">
                <input type="submit" value="NEXT">
					
				</form>
				<label for='forget' class="right">just rememberd? <a id='forget' href="login.php"> SignIn</b></label>

			</div>
		</div>
		
		<div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
		</div>
	</div>
</body>
</html>
