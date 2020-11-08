<?php
   include 'clerk_sidebar.php';
   require '../controller/inventory_maintain.php';
   $data=new inventory_maintain();
   $sql=$data->display_reminders();
   //print_r($sql);
?>
<link rel="stylesheet" href="reminderitems.css">
<div class="content">
    <h1 id="tbl-heading">Reminder Items</h1>
    <div class="search">
    <input type="text" placeholder="Search..">
  </div>
<!--div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search..">
        </div-->
    <!--div class="main-container" id="view-tbl"-->
    <div class="view-tbl">
       <table>
            <thead>
                <tr>
                    <th> Item Name</th>
                    <th scope="col" colspan=2 border=0></th>
                </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v)
            {
                ?>


                <tr>
                    <td><?php echo $sql[$k]["p_name"] ?></td>
                    <!--td><//?php echo $sql[$k]["brand_name"] ?>
                    <td><//?php echo $sql[$k]["model_no"] ?>
                    <td><//?php echo $sql[$k]["quantity"] ?>
                    <td><//?php echo $sql[$k]["warranty"] ?>
                    <td><//?php echo $sql[$k]["p_cost"] ?>
                    <td--><!--?php echo $sql[$k]["sales_price"] ?-->
                    <td><a href="../controller/inventory_maintain.php?action=reminderitems_suppliers&id=<?php  echo $sql[$k]["p_name"]; ?>" class="view"><button>View</button></a></td>


                </tr>
                <?php

            } ?>
            </tbody>
       </table>
    </div>
    <div class="footers">
			<p>© Tactota Solutions All rights reserved </p>
      </div>  
</div>
