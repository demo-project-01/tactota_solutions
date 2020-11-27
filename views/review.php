<?php
   include 'admin_sidebar.php';
 //  require '../controller/inventory_maintain.php';
  // $data=new inventory_maintain();
   //$sql=$data->display_reminders();
   //print_r($sql);
?>
<link rel="stylesheet" href="..public/css/style1.css">
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/report.css">
<div class="content"style="width:auto;">



<b><h1 id="tbl-heading">Customer Review</h1></b>
<br/>
<br/>
<ul>
<li><a class="button" href="#">Annual Report</a></li>
    <li><a class="button" href="#">Monthly Report</a></li>
    <li><a class="button" href="#">Weekly Report</a></li>
</ul>
   
<!--div class="main-container" id="view-tbl">
        <div class="search">
            <input type="text" placeholder="Search..">
        </div-->
    <!--div class="main-container" id="view-tbl"-->
    <div class="update-tbl">
       <table>
            <thead>
                <tr>
                    <th>Email</th>
                    
                    <th scope="col" colspan=2 border=0>Action</th>
                </tr>
            </thead>
            <tbody>
           
                    <td>nuwansasanka1@gmail.com</td>
            
                    <td><a href="#" title="View"><i class="fa fa-eye" aria-hidden="true">&nbsp&nbspView</i></a></td>
                    <td><a href="#" title="Delete"><i class="fa fa-trash-o" aria-hidden="true">&nbsp&nbspDelete</i></a></td>
        

            </tbody>
       </table>
    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>    
</div>
