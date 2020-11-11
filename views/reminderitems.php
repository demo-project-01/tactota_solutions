<?php
   include 'clerk_sidebar.php';
   require '../controller/inventory_maintain.php';
   $data=new inventory_maintain();
   $sql=$data->display_reminders();
   //print_r($sql);
?><head>
<link rel="stylesheet" href="../public/css/reminderitems.css">
</head>
<div class="content">
    <h1 id="tbl-heading">Reminder Items</h1>
    <div class="searchs">
    <input type="text" placeholder="Search..">
  </div>
    <div class="reminderitems-tbl">
       <table>
            <thead>
                <tr>
                    <th> Product ID</th>
                    <th> Product Name</th>
                    <th scope="col" colspan=2 border=0></th>
                </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    <td><?php echo $sql[$k]["p_id"] ?></td>
                    <td><?php echo $sql[$k]["p_name"] ?></td>
                    <td><a href="../controller/inventory_maintain.php?action=reminderitems_suppliers&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button>View</button></a></td>
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
