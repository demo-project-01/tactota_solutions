
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
		<h1> Registration Form</h1>
		<br/>
		<div class="main-container" id="reg-main">
			<div class="sub-container" id="img-sub">
				<div><img src="../public/images/logo.jpeg" alt="logo" class="verticle-center" width=400 height=auto /></div>
			</div>
			<div class="sub-container">
				<form action="../controller/authenitication.php?action=register" method="post">

					<label for='fname' id='left-label'>
						<i class="fa fa-user" aria-hidden="true"></i></i>
						&nbsp&nbspFirst Name *
					</label>
					<input id='fname' class="text" type="text" name="firstname" required=""> 

					<label for='mname' id='left-label'>
						<i class="fa fa-user" aria-hidden="true"></i></i>
						&nbsp&nbspMiddle Name
					</label>	
					<input id='mname' class="text" type="text" name="middlename">

					<label for='lname' id='left-label'>
						<i class="fa fa-user" aria-hidden="true"></i></i>
						&nbsp&nbspLast Name *
					</label>
					<input id='lname' class="text" type="text" name="lastname" required="">

					<label for='address' id='left-label'>
						<i class="fa fa-address-book" aria-hidden="true"></i>
						&nbsp&nbspHome Address *
					</label>
					<input id="address" class="text" type="text" name="address"required="">

					<label for='teleno' id='left-label'>
						<i class="fa fa-phone" aria-hidden="true"></i>
						&nbsp&nbspContact Number *
					</label>
					<input id='teleno' class="text" type="text" name="moblile_no" required="">

					<label for='nic' id='left-label'>
						<i class="fa fa-id-card-o" aria-hidden="true"></i>
						&nbsp&nbspNIC *
					</label>
					<input id='nic' class="text" type="text" name="nic" required="">

					<label for='dob' id='left-label'>
						<i class="fa fa-calendar" aria-hidden="true"></i>
						&nbsp&nbspDOB *
					</label>
					<input id="dob" class="text" type="text" name="dob" required="">

					<label for='job' id='left-label'>
						<i class="fa fa-briefcase" aria-hidden="true"></i>
						&nbsp&nbspJob Position *
					</label>
					<input id='job' class="text" type="radio" name="job_position" value="Clerk" required=""><span style="font-size:0.8em; color:#007042;">Clerk&nbsp&nbsp
					<input id='job' class="text" type="radio" name="job_position" value="Shop Keeper" required="">Shop Keeper</span>
			</div>
			<div class="sub-container">
			
					<label for='email' id='left-label'>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						&nbsp&nbspEmail Address *
					</label>
					<input id='email' class="text email" type="email" name="email" required="">

					<label for='img' id='left-label'>
						<i class="fa fa-file-image-o" aria-hidden="true"></i>
						&nbsp&nbspImage 
					</label>
					<input id="img" class="text" type="file" name="nic" >

					<label for='username' id='left-label'>
						<i class="fa fa-user" aria-hidden="true"></i>
						&nbsp&nbspUsername *
					</label>
					<input id='username' class="text" type="text" name="Username" required="">

					<label for='pswd1' id='left-label'>
						<i class="fa fa-key" aria-hidden="true"></i>
						&nbsp&nbspPassword *
					</label>
					<input id='pswd1' class="text" type="password" name="password" required="">

					<label for='pswd2' id='left-label'>
						<i class="fa fa-key" aria-hidden="true"></i>
						&nbsp&nbspConfirm Password *
					</label>
					<input id='pswd2' class="text w3lpass" type="password" name="password" required="">
					
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span >I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>

					<input type="submit" value="REGISTER">
					<label for='login' id='left-p'>Already have an Account? <a id='login' href="login.php" style="font-size:1.3em;"> Login Now!</a></p>
					

				</form>
				
			</div>
		</div>
		
		<div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
		</div>

	</div>
</body>
</html>
