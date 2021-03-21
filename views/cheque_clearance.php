<?php
 include 'admin_sidebar.php';
 require '../controller/sales.php';
$row=$_SESSION['cheque_details'];
?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/email.css">

</head>

  <div class="content"style="width:auto;">
  <h1 id="tbl-heading">Cheque Details</h1>
 
  <div class="update-tbl">
    <table>
    <form action="../controller/sales.php?action=remove_cheque&id" method="post">
      <tbody>
       
        <tr>
            <th>Cheque number</th>
            <td>   
              <input type='text'class="text" name="cheque_id"  value="<?php echo $row['cheque_id']?>" disabled>
            </td>
        </tr>
        <tr>
        <th>Bill Number</th>
           <td>
           <input type='text' name="bill_no" value="<?php echo $row['bill_no']?>" disabled>
           </td>
        </tr>
        <tr>
            <th>Bank Name</th>
            <td>   
              <input type='text' class="text" name="bank_name"value="<?php echo $row['bank_name'] ?>" disabled>
            </td>
        </tr>
        <tr>
            <th>Received Dte</th>
            <td>  <input type='text' name="received_date" value="<?php echo $row['received_date'] ?>"disabled>
           </td>
        </tr>
        <tr>
            <th>Due Date</th>
            <td> <input type='text'  name="Due Date" value="<?php echo $row['due_date'] ?>"  disabled>
            </td>
        </tr>
        
        <tr>
            <th>Bill Amount</th>
            <td> <input type='text'  name="bill_amount" value="<?php echo $row['amount'] ?>"  disabled>
            </td>
        </tr>
        <tr>
          <td colspan=2>
          <a class="add_button" href="view_all_cheques.php"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
          <a class="add_button" href="../controller/sales.php?action=remove_cheque&id=<?php  echo $row["cheque_id"]; ?>" ><i class="fa fa-trash" aria-hidden="true">&nbsp&nbspClearance</i></a>
        </tr>
               
      </tbody>
   </form>
   </table>
</div>
  
    <div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
      </div>  
</div>
</body>