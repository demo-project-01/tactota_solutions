<?php
   include 'shopkeeper_sidebar.php';
   require '../controller/inventory_maintain.php';
  // session_start();
   $data=new inventory_maintain();
   $sql=$data->display_shopkeeper_return_items();
   $sql1=$data->view_categories();
   $sql2=$data->view_brands();
   $sql3=$data->view_models();
 
?>
<head>
    <link rel="stylesheet" href="../public/css/dropdown.css">
    <link rel="stylesheet" href="../public/css/update.css"></link>
    <link rel="stylesheet" href="../public/css/report.css"></link>
    
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">Add Return Items</h1><br/>
    <div class="nav-bar">
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
  
    <!--div class="new">
    <a class="add_button" href="#">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        &nbsp&nbspShop Return Items</a>
    <a class="add_button" href="#">
        <i class="fa fa-user-o" aria-hidden="true"></i>
        &nbsp&nbspCustomer Return Items</a>
    </div-->
    <!--label for="type">Choose a Type:</label-->
    <!--select name="product" id="products">
        <li><option value="Laptop">Laptop</option>
        <option value="saab">Head Phones</option>
        <option value="opel">Printers</option>
        <option value="audi">Keyboard-Gaming</option>
        <option value="audi">Keyboard-Wireless slim</option>
        <option value="audi">Multimedia Office Keyboard</option>
        <option value="audi">CMOS Battery</option>
        <option value="audi">UPS Battery</option>
    </select-->
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
                    <td><?php echo $sql[$k]["category_name"] ?></td>
		            <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_name"] ?></td>
                    
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