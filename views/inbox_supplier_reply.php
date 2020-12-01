<?php
   include 'clerk_sidebar.php';
 //  require '../controller/inventory_maintain.php';
  // $data=new inventory_maintain();
   //$sql=$data->display_reminders();
   //print_r($sql);
?>
<link rel="stylesheet" href="..public/css/style1.css">
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/report.css">


<div class="content"style="width:auto;">
    <b><h1 id="tbl-heading">Inbox - Supplier Reply</h1></b>
   
    <div class="search">
        <input type="text" id="search_text" placeholder="Search..">
    </div>
    <div class="view-tbl">
       <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th scope="col" colspan=2 >Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>20/11/2020</td>
                    <td>info@barcleys.lk</td>
                    <td>We have Lenovo Ideapad 310. Here attached the new price list for lenovo laptops</td>
                    <td><a href="view_inbox.php" title="View"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td>
                    <td><a href="#" title="Delete"><i class="fa fa-trash-o" aria-hidden="true" id="tbl-icon"></i></a></td>
                </tr>
                <tr>
                    <td>20/11/2020</td>
                    <td>uprightcomputers@gmail.com</td>
                    <td>3 Cannon Printers are available. Price not changed</td>
                    <td><a href="view_inbox.php" title="View"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td>
                    <td><a href="#" title="Delete"><i class="fa fa-trash-o" aria-hidden="true" id="tbl-icon"></i></a></td>
                </tr>
            </tbody>
       </table>
    </div>
    <div class="footer" style="margin-top:400px;">
	<p>© Tactota Solutions All rights reserved </p>
    </div>    
</div>
