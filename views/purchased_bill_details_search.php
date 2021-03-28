<?php
session_start();
$sql=$_SESSION['bill_search'];
?>
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
       if(!empty($sql)){
            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    <td><?php echo $sql[$k]["bill_no"] ?></td>
		            <td><?php echo $sql[$k]["cust_name"] ?></td>
                    <td><?php echo $sql[$k]["telephone_no"] ?></td>
                    <td><?php echo $sql[$k]["date_time"] ?></td>
                    <td><a href="../controller/sales.php?action=view_bill&id=<?php  echo $sql[$k]["bill_no"]?>" class="view" title="view"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp&nbsp</i></a></td>
                </tr>
                <?php
            } 
        }?>
            </tbody>
       </table>