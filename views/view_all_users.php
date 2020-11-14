<?php
include 'clerk_sidebar.php';
require '../controller/authenitication.php';
$data=new authenitication();
$sql=$data->user_details();
//session_start();
//$row=$_SESSION['view_user_details'];
?>
<div class="content">
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
                    <td><?php echo $sql[$k]['position']; ?></td>
                    <td> <a href="../controller/authenitication.php?action=get_view_details&id=<?php 
                    echo $sql[$k]["emp_id"]; ?>"><i class="fa fa-eye" aria-hidden="true">&nbsp View</i>
                    </a></td>
                    <td><i class="fa fa-trash" aria-hidden="true">&nbsp Delete</i></td>
                </tr>
                    <?php 
                } ?>
            </tbody>
        </table> 
    </div>
</div>
</body>
