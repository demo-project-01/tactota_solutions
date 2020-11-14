<?php
include 'clerk_sidebar.php';

?>
<?php
 session_start();
  $row=$_SESSION['supplier_profile_details'];
 

?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
</head>

  <div class="content">
  <h1 id="tbl-heading">View Supplier</h1>
 
  <div class="update-tbl">
    <table>
      <tbody>
        <tr>
            <th>Supplier Id</th>
            <td><?php echo $row['sup_id'] ?></td>
        </tr>
        <tr>
            <th>Supplier Name</th>
            <td><?php echo $row['sup_name'] ?></td>
        </tr>
        <tr>
            <th>Email Address</th>
            <td><?php echo $row['email_address'] ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $row['address'] ?></td>
        </tr>
        
        <tr>
            <th>Contact Number</th>
            <td><?php echo $row['telephone_no'] ?></td>
        </tr>
        <tr>
        <td colspan=2>
          <a class="add_button" href="supplier_details.php">Back</a>
          <a class="add_button" href="#" >Update</a>
          <a class="add_button" href="#" >Delete</a>
        </td>
      </tr>
    </tbody>
    </table>
   </body>
   </html>
   
   
