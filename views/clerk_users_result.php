<?php
session_start();
$sql=$_SESSION['active_user'];
?>

<table>
    <thead>
    <tr>

        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Job Position</th>

        <th scope="col">View Details</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($sql as $k => $v){
    ?>


    <tr>

        <td><?php echo $sql[$k]["first_name"] ?></td>
        <td><?php echo $sql[$k]["last_name"] ?></td>
        <td><?php echo $sql[$k]["position"] ?></td>





        <td><a href="../controller/authenitication.php?action=view_profile&id=<?php  echo $sql[$k]["emp_id"]; ?>" class="view"><i class="fa fa-eye" aria-hidden="true" title="view" id="tbl-icon"></i></a></td>

        <?php

        } ?>
    </tbody>
</table>
