<?php
   include 'admin_sidebar.php';
 //  require '../controller/inventory_maintain.php';
  // $data=new inventory_maintain();
   //$sql=$data->display_reminders();
   //print_r($sql);
?>
<link rel="stylesheet" href="..public/css/style1.css">
<div class="content">
    <h1 id="tbl-heading">Reminder Items</h1>
    <div class="search">
    <input type="text" placeholder="Search..">
  </div>
<!--div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search..">
        </div-->
    <!--div class="main-container" id="view-tbl"-->
    <div class="view-tbl">
       <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>

                    <th scope="col" colspan=2 border=0></th>
                </tr>
            </thead>
            <tbody>
           
                    <td>Name</td>
                    <td>Nsnajs</td>
                    <td><a href><button>View</button></a></td>
                    <td><a href><button>Delete</button></a></td>
        

            </tbody>
       </table>
    </div>
    <div class="footers">
			<p>© Tactota Solutions All rights reserved </p>
      </div>  
</div>
