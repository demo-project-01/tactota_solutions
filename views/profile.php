<?php
require '../controller/authenitication.php';
session_start();
$row= $_SESSION['upadate_profile_view'];
if($row['position']=="Clerk"){
    require('clerk_sidebar.php');
 }elseif ($row['position']=="Admin"){
  require('admin_sidebar.php');
 }elseif($row['position']=='Shopkeeper'){
    require('shopkeeper_sidebar.php');
 }
?>

<link rel="stylesheet" href="../public/css/signup.css">
<link rel="stylesheet" href="../public/css/style1.css">
<link rel="stylesheet" href="../public/css/update.css"> 
<link rel="stylesheet" href="../public/css/view_user.css"> 

<div class="content"style="width:auto;">
    <br><br>
<form method="post" action="../controller/authenitication.php?action=update_profile&id=<?php echo $row['emp_id'] ?>">
 <div class="main-form">
  <div class="sub-container">

  <div class="row">
  <div class="col-75">
  <b><h2>Edit Account Informations</h2></b>
   </div>

    </div>

  </br>
 
      <div class="row">
  <div class="col-25">
  <label1 for="firstname">First Name</label1>
  </div>
  <div class="col-75">
  <input type="text" name="firstname" value="<?php echo $row['first_name'] ?>" disabled>
  </div>
      </div>
  
      <div class="row">
  <div class="col-25">
  <label1 for="middlename">Middle Name</label1>
  </div>
  <div class="col-75">
  <input type="text" name="middlename" value="<?php echo $row['middle_name'] ?>" disabled>
  </div>
        </div>
  
  
        <div class="row">
  <div class="col-25">
  <label1 for="lastname">Last Name</label1>
  </div>
  <div class="col-75">
  <input type="text" name="lastname" value="<?php echo $row['last_name'] ?>" disabled>
  </div>
        </div>

        <div class="row">
  <div class="col-25">
  <label1 for="address">Address</label1>
  </div>
  <div class="col-75">
  <input type="text" name="address" value="<?php echo $row['address'] ?>">
  </div>
        </div>

        <div class="row">
  <div class="col-25">
  <label1 for="mobile_no">Mobile Number</label1>
  </div>
  <div class="col-75">
  <input type="text" name="mobile_no" value="<?php echo $row['mobile_no'] ?>">
  </div>
        </div>

        <div class="row">
  <div class="col-25">
  <label1 for="nic">NIC</label>
  </div>
  <div class="col-75">
  <input type="text" name="nic" value="<?php echo $row['nic'] ?>" disabled>
  </div>
        </div>

        
        <div class="row">
  <div class="col-25">
  <label1 for ="dob">DOB</label>
  </div>
  <div class="col-75">
  <input type="text" name="dob" value="<?php echo $row['dob'] ?>" disabled>
  </div>
        </div>
        <br><br>

        <!--div class="row">
       <h5 class="left">Job Position</h5>
                  <input class="text" type="radio" name="Job_position" value="cash" required="">Clerk
                  <input class="text" type="radio" name="Job_position" value="cheque" required="">Shopkeeper
      </div-->
    

      </div>

  <div class="sub-container">

      </br></br</br></br></br></br>
     <div class="row">
  <div class="col-25">
  <label1 for="email">Email</label1>
  </div>
  <div class="col-75">
  <input type="text" name="email" value="<?php echo $row['email'] ?>" >
  </div>
      </div>
      <br>
      <!--h5 class="left">Image </h5><input class="text" type="file" name="nic" placeholder="Image" required=""-->

  

    
   <br><br><br><br><br><br>
  
      
      <div class="row">
  <div class="col-75">
  <input type="submit" name="update_profile" value="Update">
  </div>
      </div>
  


  </div>
  
 

  </div>
  </form>
</div>
</body>


