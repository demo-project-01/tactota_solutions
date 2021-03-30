<?php
   include 'admin_sidebar.php';
   require '../controller/sales.php';
  // include 'view_all_cheques_search.php';
   $data=new sales();
   $sql=$data->view_cheques();
   if(isset($_GET['action'])){
      if($_GET["action"]=="bank"){
          $sql=$data->view_cheques_by_bank();
      }
      else if($_GET["action"]=="customer_return"){
          $sql=$data->view_cheques();
          
      }
     }
?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="../public/css/view_user.css">

</head>
<body>
<div class="content" style="width:auto;">
      <h1 id="tbl-heading">All Cheques</h1><br/>
      <div class="new">
      <a class="add_button" href="view_all_cheques.php?action=bank">
        <i class="fa fa-bank" aria-hidden="true"></i>
        &nbsp&nbspBank</a>
    <a class="add_button" href="view_all_cheques.php?action=due_date">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        &nbsp&nbspDue Date</a>
    </div>
    
    <div class="view-tbl" id="result">
    <table>
         <thead>
            <tr>
               <th>Cheque Number</th>
               <th>Bill Number</th>
               <th>Bank Name</th>
               <th>Amount </th>
               <th>Due Date</th>
               <th>Action</th>             
            </tr>
         </thead>
         <tboady>
         <?php
  if(!empty($sql)){
foreach ($sql as $k => $v)
{
    ?>
    <tr>
        
        <td><?php echo $sql[$k]["cheque_id"] ?></td>
        <td><?php echo $sql[$k]["bill_no"] ?></td>
        <td><?php echo $sql[$k]["bank_name"] ?></td>
        <td><?php echo $sql[$k]["amount"] ?></td>
        <td><?php echo $sql[$k]["due_date"] ?></td>
        <td><a href="../controller/sales.php?action=cheque_clearance&id=<?php  echo $sql[$k]["cheque_id"]; ?>" title="view">
         <i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp&nbspView</i></a>
    </tr>
    <?php
 }
} ?>
         </tbody>
       </table>



    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
   </div>
</body>