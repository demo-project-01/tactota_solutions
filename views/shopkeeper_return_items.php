<?php
   include 'shopkeeper_sidebar.php';
   require '../controller/inventory_maintain.php';
   $data=new inventory_maintain();
   $sql=$data->display_shopkeeper_return_items();
 
?>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">Add Return Items</h1><br/>
    <!--div class="new">
    <a class="add_button" href="#">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        &nbsp&nbspShop Return Items</a>
    <a class="add_button" href="#">
        <i class="fa fa-user-o" aria-hidden="true"></i>
        &nbsp&nbspCustomer Return Items</a>
    </div-->
    <div class="search">
    <input type="text" placeholder="Search..">
    </div>
    <div class="page">
    <h2 style="color:#007042;">Select Item To Add :</h2>
    <div class="view-tbl">  
       <table>
            <thead>
                
                <tr>
                   <th> Serial Number</th>
                    <th> Product Name</th>
                    <th> Brand Name</th>  
                    <th> Model Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php

            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    <td><?php echo $sql[$k]["serial_no"] ?></td>
                    <td><?php echo $sql[$k]["p_name"] ?></td>
		            <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_no"] ?></td>
                    
                    <td><a href="../controller/inventory_maintain.php?action=display_onereturnitem_details&id=<?php  echo $sql[$k]["serial_no"]; ?>" class="view">
                    <i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td>
                </tr>
                <?php
            } ?>
            </tbody>
       </table>
    </div>
    </div> 
    <div class="footer">
		<p>© Tactota Solutions All rights reserved </p>
    </div> 
   
</div>