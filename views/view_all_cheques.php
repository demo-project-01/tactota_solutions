<?php
   include 'admin_sidebar.php';
   require '../controller/sales.php';
   $data=new sales();
   $sql=$data->view_cheques();
?>
<head>
<link rel="stylesheet" href="../public/css/view_user.css">
</head>
<body>
   <div class="content" style="width:auto;">
      <h1 id="tbl-heading">All Cheques</h1><br/>
      <div class="search">
    <input type="text" placeholder="Search..">
    </div>
    <div class="view-tbl">
       <table>
         <thead>
            <tr>
               <th>Cheque Number</th>
               <th>Bill Number</th>
               <th>Bank Name</th>
               <th>Amount </th>
               <th>Due Date</th>             
            </tr>
         </thead>
         <tboady>
         <?php

foreach ($sql as $k => $v)
{
    ?>
    <tr>
        
        <td><?php echo $sql[$k]["cheque_id"] ?></td>
        <td><?php echo $sql[$k]["bill_no"] ?></td>
        <td><?php echo $sql[$k]["bank_name"] ?></td>
        <td><?php echo $sql[$k]["amount"] ?></td>
        <td><?php echo $sql[$k]["due_date"] ?></td>
        
    </tr>
    <?php
} ?>
         </tbody>
       </table>
    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
   </div>
</body>