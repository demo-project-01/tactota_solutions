<?php
   include 'shopkeeper_sidebar.php';
   require '../controller/sales.php';
   $data=new sales();
   $sql=$data->display_customers_details();
 
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">Bills Details</h1><br/>
    <div class="view-tbl">
       <table>
            <thead>
                <tr>
               
                    <th>Bill No</th>
                    <th>Customer Name</th>  
                    <th>Telephone Number</th>
                    <th>Date</th>
                    <th>View Details</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    <td><?php echo $sql[$k]["bill_no"] ?></td>
		            <td><?php echo $sql[$k]["cust_name"] ?></td>
                    <td><?php echo $sql[$k]["telephone_no"] ?></td>
                    <td><?php echo $sql[$k]["date_time"] ?></td>
                    <td><a href="../views/bill_details.php" class="view" title="view"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp&nbsp</i></a></td>
                </tr>
                <?php
            } ?>
            </tbody>
       </table>
    </div>
    <div class="footer"  style="margin-top:500px;">
		<p>© Tactota Solutions All rights reserved </p>
    </div>  
</div>