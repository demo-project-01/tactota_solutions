<?php
   include 'clerk_sidebar.php';
   require '../controller/inventory_maintain.php';
   $data=new inventory_maintain();
   $sql=$data->display_few_reminders();
   $sql1=$data->countsuppliers();
   $sql2=$data->count_reminderitems();
   $sql3=$data->countproducts();
   $sql4=$data->countsold_items();
   $sql5=$data->countstock_details();
  // print_r($sql1);
?>
<body>
<div class="content" style="width:auto;">

    <div>
        <a href ="supplier_details.php">
        <?php
        foreach ($sql1 as $k => $v){
            ?>
            <div class= "dash1">
                <b><p class="dash">SUPPLIERS</p></b>
                <i class="fa fa-users fa-3x icon-right" aria-hidden="true"></i> 
                <b><p class="infor"><?php echo $sql1[$k] ?> Record(s)</p></b>
            </div>
        <?php }?>   
        </a>    
    
        <a href ="view_all_products.php">
        <?php
        foreach ($sql3 as $k => $v){
            ?>
            <div class= "dash2">
                <b><p class="dash">PRODUCTS</p></b>
                <i class="fa fa-table fa-3x icon-right" aria-hidden="true"></i>
                <b><p class="infor"><?php echo $sql3[$k] ?> Record(s)</p></b>
            </div>
            <?php }?>  
        </a>

        <a href ="inbox_supplier_reply.php">
            <div class= "dash5"> 
                <b><p class="dash">INBOX</p></b>
                <i class="fas fa-inbox fa-3x icon-right"></i>
                <b><p class="infor">15 Record(s)</p></b>   
            </div>
        </a>
    </div>

    <div> 

        <a href ="reminderitems.php">   
        <?php
        foreach ($sql2 as $k => $v){
            ?>
            <div class= "dash3">
                <b><p class="dash">REMINDERS</p></b>
                <i class="fa fa-bell-o fa-3x icon-right" aria-hidden="true"></i>
                <b><p class="infor"><?php echo $sql2[$k] ?> Record(s)</p></b>
            </div>
        <?php }?>  
        </a>    
    
        <a href ="report_sold_out_items_clerk.php"> 
        <?php
        foreach ($sql4 as $k => $v){
            ?>
            <div class= "dash4">
                <b><p class="dash">SOLD ITEMS</p></b>
                <i class="fas fa-cart-arrow-down fa-3x icon-right"></i>
                <b><p class="infor"><?php echo $sql4[$k] ?> Record(s)</p></b>
            </div>
            <?php }?>
         </a>

        <a href ="report_products_clerk.php"> 
        <?php
        foreach ($sql5 as $k => $v){
            ?>
            <div class= "dash6">
                <b><p class="dash">STOCK DETAILS</p></b>
                <i class="fas fa-store fa-3x icon-right"></i>
                <b><p class="infor"><?php echo $sql5[$k] ?>Record(s)</p></b>
            </div>
            <?php }?>
         </a>
    </div>
    

   <div class="wrapper">
        <div class="list_wrap">
            <div class="subcontent">
            <i class="fa fa-list  icon-li" aria-hidden="true"> Stock Reminders</i>  
            </div>
            <div class="clerk-tbl">
            <table>
            <tboady>
            <ul>    
            <?php
            foreach ($sql as $k => $v){
                ?><tr>
                <td><li class="github">
                    <div class="list">
                    <div class="contentc">
                         <i class="fa fa-list-ul icon-list" style="left:0;" aria-hidden="true"></i>
                            <b><?php echo $sql[$k]["category_name"] ?>s <?php echo $sql[$k]["brand_name"] ?></b>
                        </div>   
                    </div>       
                   </li>
                </td>
            </tr>
            <?php }?>
            </ul>
            </tboady>
            </table>
            </div>
            </br></br>
                <div><br/>
                    <a href="reminderitems.php" class="viewsAll" ><span>View All Reminders</span></a>
                </div>    
        </div>
    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
   </div>
</div>
</body>
  
