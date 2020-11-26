<?php
   include 'clerk_sidebar.php';
   require '../controller/inventory_maintain.php';
   $data=new inventory_maintain();
   $sql=$data->display_few_reminders();
   //print_r($sql);
?>
<body>
<div class="content" style="width:auto;">
 <div>
    <div class= "dash1">
    <b><p class="dash">SUPPLIERS</p></b>
    <i class="fa fa-users fa-2x icon-right" aria-hidden="true"></i> 
    </div>

    <div class= "dash2">
        <b><p class="dash">PRODUCTS</p></b>
        <i class="fa fa-table fa-2x icon-right" aria-hidden="true"></i>
    </div>
     
    <div class= "dash5">
        <b><p class="dash">PURCHASE</p></b>
        <i class="fas fa-money-bill-alt fa-2x icon-right"></i>
       
    </div>


    </div>

    <div> 
    <div class= "dash3">
        <b><p class="dash">REMINDERS</p></b>
        <i class="fa fa-bell-o fa-2x icon-right" aria-hidden="true"></i>
    </div>
    <div class= "dash4">
        <b><p class="dash">RETURN ITEMS</p></b>
        <i class="fas fa-cart-arrow-down fa-2x icon-right"></i>
    </div>
    <div class= "dash6">
        <b><p class="dash">CURRENT STOCKS</p></b>
        <i class="fas fa-store fa-2x icon-right"></i>
    </div>
    </div>
    
   <div class="wrapper">
        <div class="list_wrap">
            <div class="subcontent">
            <i class="fa fa-list  icon-li" aria-hidden="true"> Stock Reminders</i>
                
            </div>
            <ul>
            <?php
            foreach ($sql as $k => $v){
                ?>
                <li class="github">
                    <div class="list">
                        <div class="contentc">
                        <i class="fa fa-list-ul icon-list" aria-hidden="true"></i>
                            <?php echo $sql[$k]["p_name"] ?>
                        </div>
                        
                    </div>
                    
            </li><?php }?>
                <div><br/>
                    <a href="reminderitems.php" class="viewsAll" ><span>View All Reminders</span></a>
                </div>
                
            </ul>
        </div>
    </div>
    <div class="footerc">
	<p>© Tactota Solutions All rights reserved </p>
   </div>
</div>
</body>
  
