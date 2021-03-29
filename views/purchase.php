<?php
//view purchase details in shopkeeper
include 'shopkeeper_sidebar.php';
require '../controller/sales.php ';

//$purchase=$_SESSION["purchase"];
$data=new sales();
$sql=$data->valid_prodcuts();
//session_start();
//print_r($_SESSION['purchase']);

  if(isset($_POST["add_to_bill"]))
        { 
            if(isset($_SESSION['purchase']))
           { 
            $item_array_id=array_column($_SESSION['purchase'],"item_id");
            if(!in_array($_GET["id"],$item_array_id))
            {  
                $count=count($_SESSION["purchase"]);
                $item_array=array(
                    'item_id'=> $_GET["id"],
                    'category_name'=>$_POST["hidden_pname"],
                    'brand_name'=>$_POST["hidden_bname"],
                    'model_name'=>$_POST["hidden_mname"],
                    'warrenty'=>$_POST["hidden_warrenty"],
                    'sales_price'=>$_POST["hidden_sprice"],
                    'serial_no'=>$_POST["hidden_sno"],
                    'model_id'=>$_POST["hidden_modelid"]
                );
                $_SESSION["purchase"][$count]=$item_array;

            }
            else
            {
                echo '<script>alert("Item Alredy Added")</script>';
            }
           }
           else
           {//header('location: ../views/bill.php');
                     $item_array=array(
                'item_id'=> $_GET["id"],
                'category_name'=>$_POST["hidden_pname"],
                       'brand_name'=>$_POST["hidden_bname"],
                       'model_name'=>$_POST["hidden_mname"],
                       'warrenty'=>$_POST["hidden_warrenty"],
                       'sales_price'=>$_POST["hidden_sprice"],
                       'serial_no'=>$_POST["hidden_sno"],
                       'model_id'=>$_POST["hidden_modelid"]
                          );
            $_SESSION["purchase"][0]=$item_array;
           }
      }
      else if(isset($_POST["search"])){
        $model=$name=$_POST['model_name'];
        $sql=$data->valid_prodcuts_search($model);
       }
?>

<?php if(isset($_SESSION['flash_payment'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['flash_payment']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['flash_payment']); ?>
   
<head>
    <link rel="stylesheet" href="../public/css/view_user.css"> 
    <link rel="stylesheet" href="../public/css/dropdown.css">
    <link rel="stylesheet" href="../public/css/update.css"></link>
    <link rel="stylesheet" href="../public/css/report.css"></link>
</head>

<div class="content"style="width:auto;">
<div class="new">
        <a class="add_button" href="view_purchase_list.php"> View selected Items</a></a>
    </div>
<h1 id="tbl-heading"> Purchase</h1>
<div class="nav-bar">
  
      <table class="selection">
    
        <tr><form action="purchase.php?action=?" method="post">
          <td colspan=3>
            <label for="model_name" class="date-lbl">Model Name :</label>
              <input type="text-box" id="model_name" name="model_name" placeholder="Model Name">
              <input type="submit" id="search" class="add_button" name="search" value="Search" >
          </td>
          <tbody>
        </tr>
       
        </tbody>
        </form>
      </table>
    </div>


    <div class="view-tbl">
        <table>
            <thead>
            <tr>
                <th>Category Name</th>
                <th>Brand Name</th>
                <th>Model Name</th>
                <th>Warranty</th>
                <th>Sale Price</th>
                <th>Action</th>


            </tr>
            </thead>
            <tbody>
            <?php
          if(!empty($sql)){
            foreach ($sql as $k => $v)
            {
                ?>

                <tr>
                <form method="post" action="purchase.php?action=add_id&id=<?php echo $sql[$k]["item_id"]?>">
                    <td name="category_name"><?php echo $sql[$k]["category_name"] ?></td>
                    <td name="brand_name"><?php echo $sql[$k]["brand_name"] ?></td>
                    <td name="model_name"><?php echo $sql[$k]["model_name"] ?></td>
                    <td name="warrenty"><?php echo $sql[$k]["warrenty"] ?></td>
                    <td name="sales_price"><?php echo $sql[$k]["sales_price"] ?></td>
                    <!--td><a href="../controller/sales.php?action=sell&id=<!-?php  echo $sql[$k]["p_id"]; ?>" title="view"-->
                    <input type="hidden" name="hidden_pname" value="<?php echo $sql[$k]["category_name"] ?>" >
                    <input type="hidden" name="hidden_bname" value="<?php echo $sql[$k]["brand_name"] ?>" >
                    <input type="hidden" name="hidden_mname" value="<?php echo $sql[$k]["model_name"] ?>" >
                    <input type="hidden" name="hidden_warrenty" value="<?php echo $sql[$k]["warrenty"] ?>" >
                    <input type="hidden" name="hidden_sprice" value="<?php echo $sql[$k]["sales_price"] ?>" >
                    <input type="hidden" name="hidden_sno" value="<?php echo $sql[$k]["serial_no"] ?>" >
                    <input type="hidden" name="hidden_modelid" value="<?php echo $sql[$k]["model_id"] ?>" >
                    <td><input type="submit" class="add_button" name="add_to_bill" value="Add" ></td>
                        

                   </form>     
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

</body>
<script>

setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 1600);

</script>