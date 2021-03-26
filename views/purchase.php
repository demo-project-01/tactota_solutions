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
?>
   
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
<h1 id="tbl-heading"> Purchase</h1><div class="nav-bar">
      <table class="selection">
        <tr>
          <td><label for="category" class="date-lbl">Category</label></td>
          <td><label for="brand" class="date-lbl">Brand</label></td>
          <td><label for="model" class="date-lbl">Model</label></td>
        </tr>
        <tr>
          <td>
            <select name="category" id="category">
              <option value="0">All</option>
              <?php
                foreach ($sql1 as $k => $v){  ?>
                  <option value="<?php echo $sql1[$k]["category_id"] ?>"> <?php echo $sql1[$k]["category_name"] ?></option>  
             <?php
                }
              ?>
            </select>
          </td>
          <td>
            <select name="brand" id="brand">
              <option value="0">All</option>
              <?php
                foreach ($sql2 as $k => $v){  ?>
                  <option value="<?php echo $sql2[$k]["brand_id"] ?>"> <?php echo $sql2[$k]["brand_name"] ?></option>   
              <?php
                }
              ?>
            </select>
          </td>
          <td>
            <select name="model" id="model">
              <option value="0">All</option>
              <?php
                foreach ($sql3 as $k => $v){  ?>
                  <option value="<?php echo $sql3[$k]["model_id"] ?>"> <?php echo $sql3[$k]["model_name"] ?></option>   
              <?php
                }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan=3>
            <a class="button" href="#">Search </a>
          </td>
        </tr>
      </table>
    </div>


<!--div class="dropdown">
    <ul style="position:relative;z-index:10;">
    
        <li><a href="#">Categories</a>
        
            <ul>
                
                <li><a href="#">Laptop</a>
                    <ul>
                        <li><a href="#">Asus</a></li>
                        <li><a href="#">HP</a></li>
                        <li><a href="#">Dell</a></li>
                        <li><a href="#">Acer</a></li>
                    </ul>
                </li>

                <li><a href="#">Wireless Mouse-USB</a>
                    <ul>
                        <li><a href="#">Logitech</a></li>
                    </ul>
                </li>
                
                <li><a href="#">Head Phones</a>
                    <ul>
                        <li><a href="#">AKG</a></li>
                    </ul>
                </li>

                <li><a href="#">Printers</a>
                    <ul>
                        <li><a href="#">Cannon</a></li>
                    </ul>
                </li>

                <li><a href="#">Keyboard-Gaming</a>
                    <ul>
                        <li><a href="#">Fantech</a></li>
                    </ul>
                </li>

                <li><a href="#">Keyboard-Wireless slim</a>
                    <ul>
                        <li><a href="#">K1000</a></li>
                    </ul>
                </li>

                <li><a href="#">Multimedia Office Keyboard</a>
                    <ul>
                        <li><a href="#">Fantech</a></li>
                    </ul>
                </li>

                <li><a href="#">CMOS Battery</a>
                    <ul>
                        <li><a href="#">Sony</a></li>
                    </ul>
                </li>

                <li><a href="#">UPS Battery</a>
                    <ul>
                        <li><a href="#">CyberPower</a></li>
                    </ul>
                </li>
                   
            </ul>
        
        </li>
    </ul>
</div-->

    <!--div class="search">
            <input type="text" placeholder="Search..">
    </div-->
    
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
                    <td><input type="submit" class="button1" name="add_to_bill" value="Add" ></td>
                        

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
