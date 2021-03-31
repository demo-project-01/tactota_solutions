<?php
include 'admin_sidebar.php';
require '../controller/inventory_maintain.php';
$data = new inventory_maintain();

$sql=$data->sold_items();

if(isset($_POST["search_items"])){
  $date1=$name=$_POST['from_date'];
  $date2=$name=$_POST['to_date'];
  if($date1>$date2){
    $sql=$data->sold_items();
    echo '<script>alert("Invalid time period")</script>';
    
  }else{
 // print_r($date1);print_r($date2);
 
 $sql=$data->get_sold_time_range($date1,$date2);

}
}

?>


<head>
<link rel="stylesheet" href="../public/css/update.css"></link>
<link rel="stylesheet" href="../public/css/report.css"></link>

</head>

<div class="content" style="width:auto;">
  <h1 id="tbl-heading">Sold out Products Report</h1>
  <div class="nav-bar">
     
  <table class="selection">
    
    <tr><form action="report_sold_out_items.php?action=?" method="post">
      <td colspan=3>
        <label for="from_date" class="date-lbl">Time Range :<br/>From</label>
          <input type="date" id="from_date" name="from_date" placeholder="Select start date">
        <label for="to_date" class="date-lbl"> to </label>
           <input type="date" id="to_date" name="to_date" placeholder="Select End date">
      </td>
      <tbody>
    </tr>
    <td>
      <td><input type="submit" id="search" class="add_button" name="search_items" value="Search" >
    
    </tbody>
    </form>
  </table>
</div>

  <div class="view-tbl" id="view-tbl1">
    <table>
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Category Name</th>
          <th>Brand Name</th>
          <th>Model Name</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if(!empty($sql)){
            foreach ($sql as $k => $v)
            {
                ?>
                <tr>
                    <td><?php echo $sql[$k]["p_id"] ?></td>
                    <td><?php echo $sql[$k]["category_name"] ?></td>
		                <td><?php echo $sql[$k]["brand_name"] ?></td>
                    <td><?php echo $sql[$k]["model_name"] ?></td>
                    <td><?php echo $sql[$k]["total"] ?></td>
                </tr>
                <?php
            }
         } ?>
        
      </tbody>
    </table>
  </div>
  <table>
        <tr>
          <td class="center-btn">
            <a class="button" href="admin.php" style="float:left;"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
          </td>
          <td class="center-btn">
            <a class="button" href="../controller/inventory_maintain.php?action=report_download" style="float:right;"><i class="fa fa-download" aria-hidden="true">&nbsp&nbspDownload Report</i></a>
          </td>
        </tr>
      </table>
  </div>
<div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>


<script>
  


</script>
