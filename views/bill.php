<?php
include 'shopkeeper_sidebar.php';
require '../controller/sales.php';
//session_start();
$data=new sales();
//$sql=$data->get_product_details();
$row=$data->get_bill_no();

?>

  <link rel="stylesheet" href="../public/css/bill.css">
  <link rel="stylesheet" href="../public/css/view_user.css">
  <link rel="stylesheet" href="../public/css/update.css">
  <link rel="stylesheet" href="../public/css/style1.css">
  <div class="content1">
 
     <div class="main-box1">
     <form action="../controller/sales.php?action=add_bill" method="post">
          <div class="row">
            <div class="col-50">

             <div class="sub-box1">
   
                 <div class="row">
                    <div class="col-25">
                      <b><label1>Bill number</label1></b>
                    </div>
                    <div class="col-75">
                     <input type="text" id="bill_no" name="bill_no" value="<?php echo $row?>" disabled>
                    </div>
                 </div>
    
                 <div class="row">
                   <div class="col-25">
                     <label1>Date</label1>
                   </div>
                   <div class="col-75">
                    <input id="date" class="text" type="date" name="date_time" value="<?php echo date("Y/m/d")?>" required="">
                   </div>
                 </div>
    
    
         
      
     </div>
      </div>

  <div class="col-50">
      <div class="sub-box1">


        <div class="row">
          <div class="col-25">
            <label1>Customer Name</label1>
          </div>
         <div class="col-75">
           <input type="text" id="cust_name" name="cust_name" required="">
         </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label1>Address</label1>
          </div>
         <div class="col-75">
           <input type="text" id="address" name="address" required="">
         </div>
        </div>

        <div class="row">
          <div class="col-25">
           <label1>Telephone No</label1>
          </div>
          <div class="col-75">
            <input type="text" id="telephone_no" name="telephone_no" required="">
          </div>
        </div>
    
        <div class="row">
          <div class="col-25">
            <label1>Email</label1>
          </div>
          <div class="col-75">
            <input type="text" id="email_address" name="email_address" required="">
          </div>
        </div>

      

     </div>
   
    
   </div> 
    

    <div class="view-tbl">
  
    <table>
 
 <thead>
   <tr>
     <th>Product Name</th>
     <th scope="col">Brand Name</th>
     <th scope="col">Model Number</th>
     <th scope="col">serial Number</th>
     <th scope="col">Warrenty</th>
     <th scope="col">Sales Price</th>
     <th scope="col">Discount</th>
     <th scope="col">Total Price</th>

   </tr>
 </thead>

 <tbody>
 <?php
 if(!empty($_SESSION["purchase"]))
      {  $total=0;
          $total_p=0;
          $total_items=0;
          foreach($_SESSION["purchase"] as $keys => $values)
            {
                ?>


                <tr>
                    <td><?php echo $values["category_name"] ?></td>
                    <td><?php echo $values["brand_name"] ?></td>
                    <td><?php echo $values["model_name"] ?></td>
                    <td><?php echo $values["serial_no"] ?></td>
                    <td><?php echo $values["warrenty"] ?></td>
                    <td><?php echo $values["sales_price"] ?></td>
                    <input type="hidden" name="hidden_sno[]" value="<?php echo $values["serial_no"] ?>" >
                    <input type="hidden" name="hidden_itemid[]" value="<?php echo $values["item_id"] ?>" >
                    <td><input type="text" class="discount" name="discount"></td>
                    <td><?php echo number_format($total+$values["sales_price"]) ?></td>                
                </tr>
                <?php
                 $total_p=$total_p+$values["sales_price"];
                 $total_items=$total_items+1;
            } 
        }
        ?>
        <?php
   if(!empty($_SESSION["purchase"])){
     ?>
         <tr>        <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right">Total items</td>
                    <td><?php echo number_format($total_items) ?></td>
                    <input type="hidden" name="hidden_total_i" value="<?php echo number_format($total_items) ?>" >
        </tr>
        <tr>        <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right">Total amount</td>
                    <td><?php echo number_format($total_p,2) ?></td>
                    <input type="hidden" name="hidden_total" value="<?php echo ($total_p) ?>" >
        </tr>
        <?php
      }?>
    </tbody>
</table>
</div>

         <div class="box-down1">
        
         <div class="row">
         <h5 class="left">Payment Method</h5>
					<input id="payment_method" class="text" type="radio" name="payment_method" value="cash">Cash
					<input id="payment_method" class="text" type="radio" name="payment_method" value="cheque">Cheque
        </div>
    
        <b><h2>Cheque information</h2></b>

      
        <div class="row">
    <div class="col-25">
    <label1>Bank Name</label1>
    </div>
    <div class="col-75">
    <input  type="text" id="bank_name" name="bank_name">
    <!--input id="address" class="text" type="text" name="address"required=""-->
    </div>
        </div>
        <div class="row">
    <div class="col-25">
    <label1>Cheque No</label1>
    </div>
    <div class="col-75">
    <input type="text" id="cheque_no" name="cheque_no">
    </div>
        </div>
    
        <div class="row">
    <div class="col-25">
    <label1>Due Date</label1>
    </div>
    <div class="col-75">
    <input id="date" class="text" type="date" name="due_date">
    </div>
        </div>
               
         <div class="row">
    <div class="col-25">
    <label1>Recived Date</label1>
    </div>
    <div class="col-75">
     <input id="date" class="text" type="date" name="recived_date">
    </div>
        </div>
    
        <br>
        <div class="row">
    <div class="col-50">
    <input type="submit" name="add_bill" value="Pay">
    </div>
    <div class="col-50">
    <input type="submit" name="cancel" value="Cancel">
    </div>
        </div>
  
        </div>
  </form>
</div>
 </div>
</body>


