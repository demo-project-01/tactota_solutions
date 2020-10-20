<?php
include 'clerk_sidebar.php';

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
          <tr>
            <td>mish001</td>
            <td>mish</td>
            <td>clerk</td>
            <td><button class="view">View</button> </td>
            <td><button class="update">Update</button> </td>
            <td><button class="delete">Delete</button> </td>
</tr>
<tr>
            <td>mish001</td>
            <td>mish</td>
            <td>clerk</td>
            <td><button class="view">View</button> </td>
            <td><button class="update">Update</button> </td>
            <td><button class="delete">Delete</button> </td>
</tr>
<tr>
            <td>mish001</td>
            <td>mish</td>
            <td>clerk</td>
            <td><button class="view">View</button> </td>
            <td><button class="update">Update</button> </td>
            <td><button class="delete">Delete</button> </td>
</tr>
  <!-- php //if(count($user)): ?>
      php //foreach($person as $user): ?>
      <tr>
        <td>php// echo $person->emp_id; ?></td>
        <td>php //echo $person->username; ?></td>
        <td>php //echo $person->job_position; ?></td>
        <
        <td>
      </tr>
      php //endforeach; ?>
      php //else: ?>
        <tr>
          <td>No Records Found !</td>
        </tr>
      php// endif; ?> -->
      </tbody>
  </table> 
      </div>
     </div>
</body>
