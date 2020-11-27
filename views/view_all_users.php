<?php
include 'clerk_sidebar.php';
require '../controller/authenitication.php';
$data=new authenitication();
$sql=$data->user_details();
//session_start();
//$row=$_SESSION['view_user_details'];
?>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading"> View Users</h1>
  
  <div class="search">
    <input type="text" placeholder="Search..">
  </div>


    <div class="view-tbl">
        <table>
            <thead>
            <tr>
                <th>User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Name</th>
                <th scope="col">Job Position</th>
                <th scope="col" colspan=3 border=0>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($sql as $k => $v)
                    {
                        ?>
                <tr>
                    <td><?php echo $sql[$k]['emp_id']; ?></td>
                    <td><?php echo $sql[$k]['username']; ?></td>
                    <td><?php echo $sql[$k]['first_name'];echo " "; echo $sql[$k]['last_name']; ?></td>
                    <td><?php echo $sql[$k]['position']; ?></td>
                    <td> <a href="../controller/authenitication.php?action=view_profile&id=<?php 
                    echo $sql[$k]["emp_id"]; ?>" title="view"><i class="fa fa-eye" aria-hidden="true"></i>
                    </a></td>
                    <td><a href="#" title="delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    
                </tr>
                    <?php 
                } ?>
            </tbody>
        </table> 
    </div>
</div>
</body>
