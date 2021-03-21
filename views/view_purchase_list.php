<?php
//view purchase details in shopkeeper
include 'shopkeeper_sidebar.php';
require '../controller/sales.php ';
//session_start();
//$data=new sales();
//$values=$data->add_id($id);
$values=$_SESSION["purchase"];

if(isset($_GET['action']))
{  
    if($_GET["action"]=="delete_item"){
        foreach($_SESSION["purchase"] as $keys => $values){
            if($values["item_id"]==$_GET["id"]){
                unset($_SESSION["purchase"][$keys]);
                echo'<script>alert("Product has removed")</script>';
                echo'<script>window.location=view_purchase_list.php</script>';
            }
        }
    }
    else if($_GET["action"]=="clear"){ 
        unset($_SESSION["purchase"]);
        echo'<script>alert("Clear list")</script>';
        echo'<script>window.location=purchase.php</script>';
    }

}

?>

<head>
    <link rel="stylesheet" href="../public/css/view_user.css"> 
    <link rel="stylesheet" href="../public/css/dropdown.css">
</head>

<div class="content"style="width:auto;">
<div class="new">
        <a class="add_button" href="bill.php">Add to Bill</a></a>
</div>
<div class="new">
        <a class="add_button" href="purchase.php">Back</a></a>
    </div>
    <div class="new">
        <a class="add_button" href="view_purchase_list.php?action=clear">clear</a></a>
    </div>


<h1 id="tbl-heading"> Items To Purchase</h1>

    <!--div class="search">
            <input type="text" placeholder="Search..">
    </div-->
    
    <div class="view-tbl">
        <table>
            <thead>
            <tr>
                <th>Item Id</th>
                <th>Product Name</th>
                <th>Brand Name</th>
                <th>Model Number</th>
                <th>Warranty</th>
                <th>Sale Price</th>
                <th>Action</th>


            </tr>
            </thead>
            <tbody>
            <?php
      if(!empty($_SESSION["purchase"]))
      {  $total=0;
          foreach($_SESSION["purchase"] as $keys => $values)
            {
                ?>


                <tr>
                   <td><?php echo $values["item_id"] ?></td>
                    <td><?php echo $values["category_name"] ?></td>
                    <td><?php echo $values["brand_name"] ?></td>
                    <td><?php echo $values["model_name"] ?></td>
                    <td><?php echo $values["warrenty"] ?></td>
                    <td><?php echo $values["sales_price"] ?></td>
                    <td><a href="view_purchase_list.php?action=delete_item&id=<?php  echo $values["item_id"]?>">Remove Item</a></td>
                    
                </tr>
                <?php
                   $total=$total+$values["sales_price"];
                  
            } 
        }?>
        <?php
        if(!empty($_SESSION["purchase"])){ ?>
        <tr>        <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right">Total</td>
                    <td><?php echo number_format($total,2) ?></td>
        </tr><?php
        }?>
            </tbody>


        </table>
    </div>

<div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>
</body>