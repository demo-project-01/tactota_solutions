<?php
session_start();
$sql=$_SESSION['dashbord_search'];

?>
<head>
    <link rel="stylesheet" href="../public/css/search.css">
</head>



<?php
foreach ($sql as $k => $v){
    ?>
    <ul id="myUL">
        <li><a href="../controller/sales.php?action=view_search_product&id=<?php  echo $sql[$k]['p_name']; ?>&id1=<?php  echo $sql[$k]['model_no']; ?>"> <?php  echo $sql[$k]['p_name']   ?>  <?php  echo $sql[$k]['model_no']   ?> </a></li>

    </ul>

    <?php
} ?>
