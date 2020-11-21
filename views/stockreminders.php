<?php
/*session_start();
$row= $_SESSION['reminderitem_suppliers'];*/
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
//session_start();
$row= $_SESSION['reminderitem_suppliers'];
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
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
                <th scope="col" colspan=3 border=0>Action</th>
              </tr>
            </thead>
            <tbody>
            <tr> 
              <td><?php echo $row["sup_name"] ?></td>
              <td><?php echo $row["address"] ?></td>
              <td><?php echo $row["p_cost"] ?></td>
              <td><a href = "email.php" title="view"><i class="fa fa-eye" aria-hidden="true">&nbsp&nbspView</i></td>
              <td><a href="#"><i class="fa fa-trash-o" aria-hidden="true">&nbsp&nbspDelete</i></td>
            </tr>
            <tr>
            <td colspan=6 >
                <a class="add_button" href="view_all_users.php"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
              </td>
            </tr>
            </tbody>
          </table> 
    </div>
    <div class="footerh">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
  </div>
</body>
