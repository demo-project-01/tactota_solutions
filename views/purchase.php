<?php
//view purchase details in shopkeeper
include 'shopkeeper_sidebar.php';
require '../controller/sales.php ';
$data=new sales();
$sql=$data->valid_prodcuts();

//print_r($sql);
?>

<head>
    <link rel="stylesheet" href="../public/css/view_user.css"> 
    <link rel="stylesheet" href="../public/css/dropdown.css">
</head>

<div class="content"style="width:auto;">
<h1 id="tbl-heading"> Purchase</h1>
<div class="dropdown">
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
</div>

    <!--div class="search">
            <input type="text" placeholder="Search..">
    </div-->
    
    <div class="view-tbl">
        <table>
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Brand Name</th>
                <th>Model Number</th>
                <th>Quantity</th>
                <th>Warranty</th>
                <th>Cost per Item</th>
                <th>Sale Price</th>
                <th>Action</th>


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
                    <td><?php echo $sql[$k]["quantity"] ?></td>
                    <td><?php echo $sql[$k]["warranty"] ?></td>
                    <td><?php echo $sql[$k]["p_cost"] ?></td>
                    <td><?php echo $sql[$k]["sales_price"] ?></td>
                    <!--td><a href="../controller/sales.php?action=sell&id=<!-?php  echo $sql[$k]["p_id"]; ?>" title="view"-->
                    <td><a href="bill.php" title="view">
                        <i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp&nbsp</i></a></td>


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
</body>
