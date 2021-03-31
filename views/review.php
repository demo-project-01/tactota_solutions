<?php
   include 'admin_sidebar.php';
   require '../controller/inventory_maintain.php';
    $data=new inventory_maintain();
    $sql=$data->review_all();
   //print_r($sql);
 //  session_start();
 if(isset($_GET['action'])){
  if($_GET["action"]=="annual"){
        $sql=$data->review_annual();
  }
  else if($_GET["action"]=="monthly"){
    $sql=$data->review_monthly();
  }
  else if($_GET["action"]=="week"){
    $sql=$data->review_weekly();
}  
else if($_GET["action"]=="time"){
   
 //   $sql=$data->review_time();
}
 }
  //$sql = $_SESSION['review'];
//   print_r($sql);
?>
<head>
<!--link rel="stylesheet" href="..public/css/style1.css">
<link rel="stylesheet" href="../public/css/update.css"-->
<link rel="stylesheet" href="../public/css/report.css">
</head>

<div class="content" style="width:auto;">
<h1 id="tbl-heading">Customer Reviews</h1>

    <div class="nav-bar">
      <table class="selection">
        <tr>
          <td><a class="button" href="review.php?action=annual">Annual</a></td>
          <td><a class="button" href="review.php?action=monthly">Monthly</a></td>   
          <td><a class="button" href="review.php?action=weekly">Weekly</a></td>          
          <td>
       
          <form action="review.php?action=time" method="post" id="nameform">
            <label for="f_date" class="date-lbl"> Custom Time Range :<br/>From</label>
              <input type="date" id="f_date" name="f_date" placeholder="Select start date" min="2017-04-01">
            <label for="t_date" class="date-lbl"> to </label>
               <input type="date" id="t_date" name="t_date" placeholder="Select End date" min="2017-04-01">
            </form>    
          <button class="button" type="submit" form="nameform" value="Submit">Search </button></td>
         
        </tr>
      </table>
    </div>
    <div class="page">
    <div class="view-tbl" id="view-tbl1">
    <table>
         <thead>
            <tr>
               <th>Date</th>
               <th>Email</th>
               <th>Subject</th>
               <th>Action</th>        
            </tr>
         </thead>
         <tboady>
         <?php

foreach ($sql as $k => $v)
{
    ?>
    <tr>
        
        <td><?php echo $sql[$k]["date"] ?></td>
        <td><?php echo $sql[$k]["email"] ?></td>
        <td><?php echo $sql[$k]["subject"] ?></td>
       
        <td><a href="../controller/invertory_maintain.php?action=review_&id=<?php  echo $sql[$k]["email_id"]; ?>" title="view">
         <i class="fa fa-eye" aria-hidden="true" id="tbl-icon">&nbsp&nbspView</i></a>
    </tr>
    <?php
} ?>
         </tbody>
       </table>
    
    </div>
    <table>
        <tr>
          <td class="center-btn">
            <a class="button" href="admin.php" style="float:left;"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
          </td>
          <!--td class="center-btn">
            <a class="button" href="#" style="float:right;"><i class="fa fa-download" aria-hidden="true">&nbsp&nbspDownload Report</i></a>
          </td-->
        </tr>
      </table>
  </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
    </div>    
</div>
