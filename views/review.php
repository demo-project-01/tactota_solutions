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
        <li class="right" style="font-weight:bold; font-size:1.2em;">Custom Time Range 
        <label for="f_date" style="font-weight:bold; font-size:0.8em;">From : </label><input type="date" id="f_date" name="f_date" placeholder="Select start date" min="2017-04-01" max="2020-11-21">
        <label for="t_date" style="font-weight:bold; font-size:0.8em;">To : </label><input type="date" id="t_date" name="t_date" placeholder="Select End date" min="2017-04-01" max="2020-11-21">
        </li>
    </ul>
   
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
                    <td>nuwansasanka1@gmail.com</td>
                    <td>Customer Service was good. I got good quality products</td>
                    <td><a href="#" title="View"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td>
                    <td><a href="#" title="Delete"><i class="fa fa-trash-o" aria-hidden="true" id="tbl-icon"></i></a></td>
                </tr>
                <tr>
                    <td>20/11/2020</td>
                    <td>mufernando02@gmail.com</td>
                    <td>Excellent service</td>
                    <td><a href="#" title="View"><i class="fa fa-eye" aria-hidden="true" id="tbl-icon"></i></a></td>
                    <td><a href="#" title="Delete"><i class="fa fa-trash-o" aria-hidden="true" id="tbl-icon"></i></a></td>
                </tr>
            </tbody>
       </table>
    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
    </div>    
</div>
