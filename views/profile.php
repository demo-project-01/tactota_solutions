<?php
  include 'clerk_sidebar.php';
?>
<div class="content">
<head>
<title>Tactota Solutions</title>

<link href="css/signup.css" rel="stylesheet" type="text/css"/>

</head>
<body>
	<div>
    

		<div class="main-form">
   
    	<div class="sub-container">
     
     <b><h2>Edit Account Info</h2></b>

				<form action="#" method="post">
					
				  <input class="text" type="text" name="firstname" placeholder="First Name" required="">
			  	<input class="text" type="text" name="middlename" placeholder="Middle Name" required="">
				  <input class="text" type="text" name="lastname" placeholder="Last Name" required="">
			  	<input class="text" type="text" name="address" placeholder="Address" required="">
			  	<input class="text" type="text" name="moblile_no" placeholder="Mobile Number" required="">
			  	<input class="text" type="text" name="nic" placeholder="NIC" required="">
			    <input class="text" type="text" name="dob" placeholder="DOB" required="">
					<h5 class="left">Job Position </h5>
					<input class="text" type="radio" name="job_position" value="Clerk" required="">Clerk
					<input class="text" type="radio" name="job_position" value="Shop Keeper" required="">Shop Keeper
			</div>
			<div class="sub-container">
            </br></br>
			<input class="text email" type="email" name="email" placeholder="Email" required="">
			<h5 class="left">Image </h5><input class="text" type="file" name="nic" placeholder="Image" required="">
			<input class="text" type="text" name="Username" placeholder="Username" required="">
				<input class="text" type="password" name="password" placeholder="Password" required="">
				<input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required="">
				<div class="wthree-text">
					<div class="clear"> </div>
				</div>
				<input type="new-btn" value="Update">
	  	</form>
				
			</div>
		</div>
		
		<div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
		</div>

	</div>
</body>
</div>


