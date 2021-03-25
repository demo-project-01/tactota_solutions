<?php

require '../controller/sales.php';
//session_start();
//$sql=$_SESSION['search_cheque'];
//print_r($sql);
$data=new sales();
 if(isset($_POST['action'])){
    if($_POST["action"]=="bank"){
        $sql=$data->view_cheques_by_bank();
    }
    else if($_POST["action"]=="customer_return"){
        $sql=$data->view_cheques();
        
    }
   }else{
    $sql=$_SESSION['search_cheque'];
   }

?>
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
} ?>
         </tbody>
       </table>


