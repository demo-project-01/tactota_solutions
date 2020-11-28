<?php
session_start();
$sql=$_SESSION['admin_active_user']
?>
<table>
    <thead>
    <tr>

        <th scope="col">User Name</th>
        <th scope="col">Job Position</th>
        <th scope="col">View Details</th>
        <th scope="col">View Details</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($sql as $k => $v){
    ?>


    <tr>

        <td><?php echo $sql[$k]["username"] ?></td>
        <td><?php echo $sql[$k]["position"] ?></td>
        <td>

            <a href="../controller/authenitication.php?action=view_profile&id=<?php  echo $sql[$k]["emp_id"]; ?>"><i class="fa fa-eye" aria-hidden="true" title="view" id="tbl-icon"></i></a>
        </td>
        <td>
            <?php
            if(($sql[$k]['verified'])==0)
            {
                ?>
                <a href="../controller/authenitication.php?action=active_inactive_account&id=<?php  echo $sql[$k]["emp_id"];?>&id1=1" class="active"><button>Active</button></a>
                <?php
            }else if(($sql[$k]['verified'])==1)
            {
                ?>
                <a href="../controller/authenitication.php?action=active_inactive_account&id=<?php  echo $sql[$k]["emp_id"];?>&id1=0"  class="deactive"><button style="background-color: red;">Deactivate</button></a>
                <?php
            }?>
        </td>



        <?php

        } ?>
    </tbody>
</table>
