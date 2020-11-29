<?php
   include 'admin_sidebar.php';
?>
<head>
<link rel="stylesheet" href="../public/css/view_user.css">
</head>
<body>
   <div class="content" style="width:auto;">
      <h1 id="tbl-heading">All Cheques</h1><br/>
      <div class="search">
    <input type="text" placeholder="Search..">
    </div>
    <div class="view-tbl">
       <table>
         <thead>
            <tr>
               <th>Cheque ID</th>
               <th>Bank Name</th>
               <th>Amount </th>
               <th>Due Date</th>             
            </tr>
         </thead>
         <tboady>
         <tr>
            <td>CHE001</td>
            <td>BOC</td>
            <td>20,000/=</td>
            <td>2020-11-10</td>
         </tr>
         <tr>
            <td>CHE002</td>
            <td>BOC</td>
            <td>20,000/=</td>
            <td>2020-11-15</td>
         </tr>
         <tr>
            <td>CHE003</td>
            <td>NSB</td>
            <td>50,000/=</td>
            <td>2020-11-12</td>
         </tr>
         <tr>
            <td>CHE004</td>
            <td>HNB</td>
            <td>20,000/=</td>
            <td>2020-12-10</td>
         </tr>
         <tr>
            <td>CHE005</td>
            <td>NDB</td>
            <td>60,000/=</td>
            <td>2020-10-10</td>
         </tr>
         </tbody>
       </table>
    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
   </div>
</body>