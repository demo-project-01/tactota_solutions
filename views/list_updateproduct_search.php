<?php
session_start();
$sql=$_SESSION['update_product'];

?>

<table>
    <thead>
    <tr>

        <th scope="col">Product Name</th>
        <th scope="col">Brand Name</th>
        <th scope="col">Supplier Name</th>
        <th scope="col">Price</th>
        <th scope="col" colspan=3 border=0>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($sql as $k => $v){
        ?>


        <tr>
            <td><?php echo $sql[$k]["p_name"] ?></td>
            <td><?php echo $sql[$k]["brand_name"] ?></td>
            <td><?php echo $sql[$k]["sup_id"] ?></td>
            <td><?php echo $sql[$k]["sales_price"] ?></td>
            <td><a href="../controller/inventory_maintain.php?action=view_one_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button class="view">View</button> </td>
            <td><a href="../controller/inventory_maintain.php?action=view_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button>Update</button></a></td>
            <td><a href="../controller/inventory_maintain.php?action=delete_product_details&id=<?php  echo $sql[$k]["p_id"]; ?>" class="view"><button class="delete">Delete</button> </td>
        </tr>
        <?php

    } ?>
    </tbody>


</table>
