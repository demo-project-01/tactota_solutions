<?php
   include 'clerk_sidebar.php';
   require '../controller/inventory_maintain.php';
   $data=new inventory_maintain();
   $sql=$data->display_reminders();
   //print_r($sql);
?><head>
<link rel="stylesheet" href="../public/css/update.css">

</head>
<div class="content"style="width:auto;">
    <h1 id="tbl-heading">Reminder Items</h1>
    <div class="search">
    <input type="text" placeholder="Search..">
  </div>
    <div class="view-tbl">
       <table>
            <thead>
                <tr>
                    <th> Product Name</th>
                    <th> Brand Name</th>  
                    <th> Model Number</th>
                    <th scope="col" colspan=2 border=0>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    
                    <td><?php echo $sql[$k]["p_name"] ?></td>
		    <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_no"] ?></td>
                    <td><a href="../controller/inventory_maintain.php?action=reminderitems_suppliers&id=<?php  echo $sql[$k]["p_id"]; ?>" title="view"><i class="fa fa-eye" aria-hidden="true">&nbsp&nbspView</i></a></td>
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
