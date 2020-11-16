
<!DOCTYPE html>
<html>
<head>
<title>Tactota Solutions</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../public/css/signup.css" rel="stylesheet" type="text/css"/>

</head>
<body>
	<div>
		<br/>
		<h1> Registration Form</h1>
		<br/>
		<div class="main-container" id="reg-main">
			<div class="sub-container" id="img-sub">
				<div><img src="../public/images/logo.jpeg" alt="logo" class="verticle-center" width=400 height=auto /></div>
			</div>
			<div class="sub-container">
				<form action="../controller/authenitication.php?action=register" method="post">
					<label for='fname' id='left-label'>First Name</label>
								<i class="fas fa-lock" class="align"></i>
								<input id='fname' class="text" type="text" name="firstname" required="">
					<label for='mname' id='left-label'>Middle Name</label>
								<i class="fas fa-lock" class="align"></i>
								<input id='mname' class="text" type="text" name="middlename">
					<label for='lname' id='left-label'>Last Name</label>
								<i class="fas fa-lock" class="align"></i>
								<input id='lname' class="text" type="text" name="lastname" required="">
					<label for='address' id='left-label'>Home Address</label>
								<i class="fas fa-lock" class="align"></i>
								<input id="address" class="text" type="text" name="address"required="">
					<label for='teleno' id='left-label'>Contact Number</label>
								<i class="fas fa-lock" class="align"></i>
								<input id='teleno' class="text" type="text" name="moblile_no" required="">
					<label for='nic' id='left-label'>NIC</label>
								<i class="fas fa-lock" class="align"></i>
								<input id='nic' class="text" type="text" name="nic" required="">
					<label for='lname' id='left-label'>DOB</label>
								<i class="fas fa-lock" class="align"></i>
								<input class="text" type="text" name="dob" required="">
					<label for='job' id='left-label'>Job Position </label>
								<input id='job' class="text" type="radio" name="job_position" value="Clerk" required=""><span style="font-size:0.8em; color:#007042;">Clerk&nbsp&nbsp
								<input id='job' class="text" type="radio" name="job_position" value="Shop Keeper" required="">Shop Keeper</span>
			</div>
			<div class="sub-container">
			
					<label for='email' id='left-label'>Email Address </label>
						<i class="fas fa-lock" class="align"></i>
						<input id='email' class="text email" type="email" name="email" required="">
					<label for='img' id='left-label'>Image </label>
						<i class="fas fa-lock" class="align"></i>
						<input id="img" class="text" type="file" name="nic" >
					<label for='username' id='left-label'>Username </label>
						<i class="fas fa-lock" class="align"></i>
						<input id='username' class="text" type="text" name="Username" required="">
					<label for='pswd1' id='left-label'>Password </label>
						<input id='pswd1' class="text" type="password" name="password" required="">
					<label for='pswd2' id='left-label'>Confirm Password </label>
						<input id='pswd2' class="text w3lpass" type="password" name="password" required="">
					
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span >I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>

					<input type="submit" value="REGISTER">
					<label for='login' id='left-p'>Already have an Account? <a id='login' href="login.php" style="font-size:1.5em;"> Login Now!</a></p>
					

				</form>
				
			</div>
		</div>
		
		<div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
		</div>

	</div>
</body>
</html>
