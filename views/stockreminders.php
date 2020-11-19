<?php
/*session_start();
$row= $_SESSION['reminderitem_suppliers'];*/
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
session_start();
$row= $_SESSION['reminderitem_suppliers'];
?>
<head>
<link rel="stylesheet" href="../public/css/reminderitems.css">
</head>
  <div class="content"style="width:auto;">
  <h1 id="tbl-heading"> SUPPLIERS</h1>
  
  <div class="search">
    <input type="text" placeholder="Search..">
  </div>


<div class="view-tbl">
      <table>
        <thead>
          <tr>
            <th>Supplier</th>
            <th scope="col">Address</th>
            <th scope="col">Price</th>
            <th scope="col" colspan=3 border=0></th>
          </tr>
        </thead>
        <tbody>
        <?php


?>



<tr> 


    <td><?php echo $row["sup_name"] ?></td>
    <td><?php echo $row["address"] ?></td>
    <td><?php echo $row["p_cost"] ?></td>
    <td><a href = "email.php" class="view"><button>View</button> </td>
<td><button class="update">Delete</button> </td>
</tr>
<?php

?>
    
            
          <!--td><button class="delete">Delete</button> </td-->
          <!--/tr-->
  <!-- php //if(count($user)): ?>
      php //foreach($person as $user): ?>
      <tr>
        <td>php// echo $person->emp_id; ?></td>
        <td>php //echo $person->username; ?></td>
        <td>php //echo $person->job_position; ?></td>
        <
        <td>
      </tr>
      php //endforeach; ?>
      php //else: ?>
        <tr>
          <td>No Records Found !</td>
        </tr>
      php// endif; ?> -->
      </tbody>
  </table> 
      </div>
      <div class="footerh">
			<p>© Tactota Solutions All rights reserved </p>
      </div>
    </div>
</body-->
