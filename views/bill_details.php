<?php
include 'shopkeeper_sidebar.php';
require '../controller/sales.php';
$row=$_SESSION['bill_details'];
?>

<link rel="stylesheet" href="../public/css/bill.css">
  <link rel="stylesheet" href="../public/css/view_user.css">
  <link rel="stylesheet" href="../public/css/update.css">
  <link rel="stylesheet" href="../public/css/style1.css">

  <div class="content1">
 <form>
     <div class="main-box1">

          <div class="row">
            <div class="col-50">

             <div class="sub-box1">

             

                    </br>
                 <div class="row">
                    <div class="col-25">
                      <b><label1>Bill number</label1></b>
                    </div>
                    <div class="col-75">
                    <input type="text" name="bill_no" value="<?php echo $row[0]['bill_no'] ?>" disabled>
                    </div>
                 </div>
    
                 <div class="row">
                   <div class="col-25">
                     <b><label1>Date</label1></b>
                   </div>
                   <div class="col-75">
                   <input type="text" name="date" value="<?php echo $row[0]['date_time'] ?>" disabled>
                   </div>
                 </div>
    
            
      
               <div class="row">
           <div class="col-25">
            <b><label1>Total Price</label1></b>
           </div>
           <div class="col-75">
           <input type="text" name="amount" value="<?php echo $row[0]['amount'] ?>" disabled>
           </div>
               </div>
              
              
               <div class="row">
           <div class="col-25">
            <b><label1>Employee</label1></b>
           </div>
           <div class="col-75">
           <input type="text" name="emp_name" value="<?php echo $row[0]['first_name'] ?>" disabled>
           </div>
               </div>



     </div>
      </div>

  <div class="col-50">
      <div class="sub-box1">


        <div class="row">
          <div class="col-25">
            <b><label1>Customer Name</label1></b>
          </div>
         <div class="col-75">
           <input type="text" name="cust_name" value="<?php echo $row[0]['cust_name'] ?>" disabled>
         </div>
        </div>

        <div class="row">
          <div class="col-25">
            <b><label1>Address</label1></b>
          </div>
         <div class="col-75">
         <input type="text" name="address" value="<?php echo $row[0]['cust_address'] ?>" disabled>
         </div>
        </div>

        <div class="row">
          <div class="col-25">
           <b><label1>Telephone No</label1></b>
          </div>
          <div class="col-75">
          <input type="text" name="telephone_no" value="<?php echo $row[0]['telephone_no'] ?>" disabled>
          </div>
        </div>
    
        <div class="row">
          <div class="col-25">
            <b><label1>Email</label1></b>
          </div>
          <div class="col-75">
          <input type="text" name="email_address" value="<?php echo $row[0]['email_address'] ?>" disabled>
          </div>
        </div>

      

     </div>
   
    
   </div> 
    

    <div class="view-tbl">
  
    <table>
 
 <thead>
   <tr>
     <th scope="col">Serial Number</th>
     <th>Category Name</th>
     <th scope="col">Brand Name</th>
     <th scope="col">Model Name</th>
     <th scope="col">Warrenty</th>
     <th scope="col">Sales Price</th>
     
   </tr>
 </thead>

 <tbody>
 <?php
     if(!empty($sql)){
          foreach($row as $k => $v)
            {
                ?>


                <tr>
                    <td><?php echo $row[$k]["serial_no"] ?></td>
                    <td><?php echo $row[$k]["category_name"] ?></td>
                    <td><?php echo $row[$k]["brand_name"] ?></td>
                    <td><?php echo $row[$k]["model_name"] ?></td>
                    <td><?php echo $row[$k]["warrenty"] ?></td>
                    <td><?php echo $row[$k]["sales_price"] ?></td>
                                
                </tr>
                <?php
            } 
          }?>
        
</table>
</div>


         <div class="box-down1">
            
         <div class="row">
    <div class="col-25">
    <b><label1>Payment Method</label1></b>
    </div>
    <div class="col-75">
    <input type="text" name="payment_method" value="<?php echo $row[0]['payment_method'] ?>" disabled>
    </div>
        </div> 
    
        <b><h2>Cheque information</h2></b>

      
        <div class="row">
    <div class="col-25">
    <b><label1>Bank Name</label1></b>
    </div>
    <div class="col-75">
    <input type="text" name="bank_name" value="<?php echo $row[0]['bank_name'] ?>" disabled>
    </div>
        </div>

       
        <div class="row">
    <div class="col-25">
    <b><label1>Cheque No</label1></b>
    </div>
    <div class="col-75">
    <input type="text" name="cheque_no" value="<?php echo $row[0]['cheque_id'] ?>" disabled>
    </div>
        </div>
    
        <div class="row">
    <div class="col-25">
    <b><label1>Due Date</label1></b>
    </div>
    <div class="col-75">
    <input type="text" name="due_date" value="<?php echo $row[0]['due_date'] ?>" disabled>
    </div>
        </div>
               
         <div class="row">
    <div class="col-25">
    <b><label1>Recived Date</label1></b>
    </div>
    <div class="col-75">
    <input type="text" name="received_dare" value="<?php echo $row[0]['received_date'] ?>" disabled>
    </div>
        </div>
    
        
    </br></br></br>
        </div>
</form>
</div>
 </div>
</body>
