<?php
  include 'clerk_sidebar.php';
   require '../controller/inventory_maintain.php';
   $data=new inventory_maintain();
   $sql=$data->display_shop_returnitem_details();
   if(isset($_GET['action'])){
    if($_GET["action"]=="shop_return"){
        $sql=$data->display_shop_returnitem_details();
    }
    else if($_GET["action"]=="customer_return"){
        $sql=$data->display_cus_returnitem_details();
        
    }
   }
?>
<head>
<link rel="stylesheet" href="../public/css/view_user.css">
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">Return Items</h1><br/>
    <div class="new">
    <a class="add_button" href="returnitems.php?action=shop_return">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        &nbsp&nbspShop Return Items</a>
    <a class="add_button" href="returnitems.php?action=customer_return">
        <i class="fa fa-user-o" aria-hidden="true"></i>
        &nbsp&nbspCustomer Return Items</a>
    </div>
    <div class="search">
    <input type="text" placeholder="Search..">
    </div>
    <div class="view-tbl">
       <table>
            <thead>
                <tr>
                <!--th> Product ID</th-->
                    <th> Product Name</th>
                    <th> Brand Name</th>  
                    <th> Model Number</th>
                    <th>Returned Date</th>
                    <th>Description</th>
                    <!--th scope="col" colspan=2 border=0></th-->
                </tr>
            </thead>
            <tbody>
            <?php
      if(!empty($sql)){
            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                <!--td><!-?php echo $sql[$k]["p_id"] ?></td-->
                    <td><?php echo $sql[$k]["category_name"] ?></td>
		            <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_name"] ?></td>
                    <td><?php echo $sql[$k]["returned_date"] ?></td>
                    <td><?php echo $sql[$k]["description"] ?></td>
                    <!--td><a href="../controller/inventory_maintain.php?action=display_onereturnitem_details&id=<!-?php  echo $sql[$k]["p_id"]; ?>" class="view"-->
                    <!--i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td-->
                </tr>
                <?php
            }
         } ?>
            </tbody>
       </table>
    </div>
    <div class="footer">
		<p>© Tactota Solutions All rights reserved </p>
    </div>  
</div>