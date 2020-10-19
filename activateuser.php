<?php
include 'clerk_sidebar.php';

?>
  <div class="content">
    
      <h1> USER DETAILS</h1>

      <div class="main-container" id="view-tbl">
      <div class="search">
        <input type="text" placeholder="Search..">
      </div>
</div>
      <div class="main-container" id="view-tbl">
      <table>
        <thead>
          <tr>
            <th>User ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Job Position</th>
            <th scope="col">Active/non-Active</th>
            <th scope="col">View Details</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>mish001</td>
            <td>mish</td>
            <td>clerk</td>
            <td><label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
            </td>
            <td><button class="view">View</button> 
          </tr>
          <tr>
            <td>mish001</td>
            <td>mish</td>
            <td>clerk</td>
            <td><label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
            </td>
            <td><button class="view">View</button> 
          </tr>
          <tr>
            <td>mish001</td>
            <td>mish</td>
            <td>clerk</td>
            <td><label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
            </td>
            <td><button class="view">View</button> 
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
     </div>
</body>
