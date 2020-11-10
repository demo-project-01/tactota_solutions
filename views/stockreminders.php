<?php
/*session_start();
$row= $_SESSION['reminderitem_suppliers'];*/
include 'clerk_sidebar.php';
require '../controller/inventory_maintain.php';
/*$data=new inventory_maintain();
$sql=$data->reminderitems_suppliers();*/
//print_r($sql);
?>
  <div class="content">
  <h1 id="tbl-heading"> SUPPLIERS</h1>
  
  <div class="search">
    <input type="text" placeholder="Search..">
  </div>


<div class="view-tbl">
      <table>
        <thead>
          <tr>
            <th>Supplier</th>
            <th scope="col">Address</th>
            <th scope="col">Price</th>
            <th scope="col" colspan=3 border=0></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>suppliers2</td>
            <td>124,abc</td>
            <td>900/=</td>
            <td><button class="view">View</button> </td>
            <td><button class="update">Delete</button> </td-->
            <!--td><button class="delete">Delete</button> </td-->
          </tr>
          <tr>
            <td>supplier3</td>
            <td>125,abc</td>
            <td>800/=</td>
            <td><button class="view">View</button> </td>
            <td><button class="update">Delete</button> </td>
          <!--td><button class="delete">Delete</button> </td-->
          </tr>
          <tr>
            <td>supplier4</td>
            <td>126,abc</td>
            <td>900/=</td>
            <td><button class="view">View</button> </td>
            <td><button class="update">Delete</button> </td>
          <!--td><button class="delete">Delete</button> </td-->
          <!--/tr-->
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
      <div class="footers">
			<p>© Tactota Solutions All rights reserved </p>
      </div>
    </div>
</body-->
