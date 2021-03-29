<?php
session_start();
$sql=$_SESSION['reminderitems_search'];
?>


<table>
            <thead>
                <tr>
                    <th> Category Name</th>
                    <th> Brand Name</th>  
                    <th> Model Name</th>
                    <th scope="col" colspan=2 border=0>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
         if(!empty($sql)){
            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    
                    <td><?php echo $sql[$k]["category_name"] ?></td>
		            <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_name"] ?></td>
                    <td><a href="../controller/inventory_maintain.php?action=reminderitems_suppliers&id=<?php  echo $sql[$k]["p_id"]; ?>" title="view">
                        <i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp&nbspView</i></a>
                    </td>
                </tr>
                <?php
            }
            } ?>
            </tbody>
       </table>