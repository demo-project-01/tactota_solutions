<?php
include 'header.php';

?>

  <link rel="stylesheet" href="../public/css/bill.css">
  <link rel="stylesheet" href="../public/css/view_user.css">

  <div class="content1">
 
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
                     <input type="text" id="pname" name="productname">
                    </div>
                 </div>
    
                 <div class="row">
                   <div class="col-25">
                     <label1>Date</label1>
                   </div>
                   <div class="col-75">
                     <input type="text" id="brand" name="brand">
                   </div>
                 </div>
    
    
         
      
               <div class="row">
           <div class="col-25">
            <b><label1>Total Price</label1></b>
           </div>
           <div class="col-75">
            <input type="text" id="tprice" name="totalprice">
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
           <input type="text" id="cname" name="customername">
         </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label1>Address</label1>
          </div>
         <div class="col-75">
           <input type="text" id="address" name="firstname">
         </div>
        </div>

        <div class="row">
          <div class="col-25">
           <label1>Telephone No</label1>
          </div>
          <div class="col-75">
            <input type="text" id="telephoneno" name="telephoneno">
          </div>
        </div>
    
        <div class="row">
          <div class="col-25">
            <label1>Email</label1>
          </div>
          <div class="col-75">
            <input type="text" id="email" name="email">
          </div>
        </div>

      

     </div>
   
    
   </div> 
    

    <div class="view-tbl1">
  
    <table>
 
 <thead>
   <tr>
     <th>Product Name</th>
     <th scope="col">Brand Name</th>
     <th scope="col">Model Number</th>
     <th scope="col">Warrenty(months)</th>
     <th scope="col">Quantity</th>
     <th scope="col">Sales Price</th>
     <th scope="col">Total Price</th>

   </tr>
 </thead>

 <tbody>
   <tr>
     <td>Laptop</td>
     <td>que</td>
     <td>123-456</td>
     <td>12</td>
     <td>1</td>
     <td>1500</td>
     <td>1500</td>

    
</tr>
</table>
</div>


         <div class="box-down1">
            
         <div class="row">
         <h5 class="left">Payment Method</h5>
					<input class="text" type="radio" name="payment_method" value="cash" required="">Cash
					<input class="text" type="radio" name="payment_mehod" value="cheque" required="">Cheque
        </div>
    
        <b><h2>Cheque information</h2></b>

      
        <div class="row">
    <div class="col-25">
    <label1>Bank Name</label1>
    </div>
    <div class="col-75">
    <input type="text" id="bname" name="bankname">
    </div>
        </div>

       
        <div class="row">
    <div class="col-25">
    <label1>Cheque No</label1>
    </div>
    <div class="col-75">
    <input type="text" id="chequeno" name="chequeno">
    </div>
        </div>
    
        <div class="row">
    <div class="col-25">
    <label1>Due Date</label1>
    </div>
    <div class="col-75">
    <input type="text" id="duedate" name="due date">
    </div>
        </div>
               
         <div class="row">
    <div class="col-25">
    <label1>Recived Date</label1>
    </div>
    <div class="col-75">
    <input type="text" id="reciveddate" name="recived date">
    </div>
        </div>
    
        
    </br></br></br>
        </div>

</div>
 </div>
</body>
