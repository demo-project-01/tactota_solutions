<?php
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

<head>
    <link rel="stylesheet" href="../public/css/update.css">
    <link rel="stylesheet" href="../public/css/test.css">
</head>
<div class="content" style="width: auto;">
    <form method="post" action="../controller/authenitication.php?action=update_profile&id=<?php echo $row['emp_id'] ?>">
        <div class="update-tbl">
            <table>
                <tbody>

                <tr><td></td>
                <td><h1 id="tbl-heading"  >Edit User Account Info</h1></td>                
                </tr>

                <tr>
                    <th>Employee Id</th>
                    <td>
                    <input type="text" name="emp_id" value="<?php echo $row['emp_id'] ?>" disabled>
                    </td>
                </tr>

                <tr>
                    <th>First Name</th>
                    <td>
                    <input type="text" name="firstname" value="<?php echo $row['first_name'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Middle Name</th>
                    <td>
                    <input type="text" name="middlename" value="<?php echo $row['middle_name'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>
                    <input type="text" name="lastname" value="<?php echo $row['last_name'] ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                    <input type="text" name="address" value="<?php echo $row['address'] ?>">

                    </td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td>
                    <input type="text" name="mobile_no" value="<?php echo $row['mobile_no'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>NIC</th>
                    <td>
                    <input type="text" name="nic" value="<?php echo $row['nic'] ?>" disabled>

                    </td>
                </tr>
                <tr>
                    <th>DOB</th>
                    <td>
                    <input type="text" name="dob" value="<?php echo $row['dob'] ?>" disabled>

                    </td>
                </tr>
                <tr>
                    <th>Job Position</th>
                    <td>
                    <input type="text" name="job_position" value="<?php echo $row['position'] ?>" disabled>

                    </td>
                </tr>
                <tr>
                    <th>User Name</th>
                    <td>
                    <input type="text" name="username" value="<?php echo $row['username'] ?>"disabled>

                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                    <input type="text" name="email" value="<?php echo $row['email'] ?>" >

                    </td>
                </tr>



                <tr>  <td></td>
                    <td colspan=2><input type="submit" name="update_profile" value="Update"></td>
                </tr>
               
                </tbody>
            </table>

        </div>
    </form>
<div class="footerc">
			<p>© Tactota Solutions All rights reserved </p>
      </div>
</div>
