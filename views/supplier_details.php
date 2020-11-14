<?php
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
$data=new inventory_maintain();
$sql=$data->view_suppliers();
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
</head>
<div class="content">
    <h1 id="tbl-heading">Supplier Details</h1>
    <div class="search">
        <input type="text" placeholder="Search..">
    </div>
    <div>
        <a class="add_button" href="add_suppliers.php" class="next">-|- Add new Suppliers</a>
    </div>
 <br>
    <div class="view-tbl">
        <table>
            <thead>
                <tr>
                   
                    <th>Supplier Name</th>
                    <th>Email Address</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th colspan=3>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    
                    <td><?php echo $sql[$k]["sup_name"] ?></td>
                    <td><?php echo $sql[$k]["email_address"] ?></td>
                    <td><?php echo $sql[$k]["address"] ?></td>
                    <td><?php echo $sql[$k]["telephone_no"] ?></td>

                   <td><a href="../controller/inventory_maintain.php?action=supplier_profile&id=<?php
                      echo $sql[$k]["sup_id"]; ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                    </a></td>
                    <td><i class="fa fa-pencil" aria-hidden="true"></i> </td>
                    <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                   </tr>
                <?php

            } ?>
            </tbody>
        </table>
    </div>
</div>
</body>

