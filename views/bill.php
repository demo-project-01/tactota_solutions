<?php
include 'header.php';

?>
  <link rel="stylesheet" href="../public/css/view_user.css">

  <div class="content">
 
   <div class="main-box">
    <div class="sub-box">

    <div class="row">
    <div class="col-75">
    <b><h2>Bill number-1234</h2></b>
     </div>
     <div class="col-25">
     <b><h2>2020/10/29</h2></b>
     </div>
      </div>

    </br>
        <div class="row">
    <div class="col-25">
    <b><label1>Product name</label1></b>
    </div>
    <div class="col-75">
    <input type="text" id="pname" name="productname">
    </div>
        </div>
    
        <div class="row">
    <div class="col-25">
    <label1>Brand</label1>
    </div>
    <div class="col-75">
    <input type="text" id="brand" name="brand">
    </div>
          </div>
    
    
          <div class="row">
    <div class="col-25">
    <label1>Model No</label1>
    </div>
    <div class="col-75">
    <input type="text" id="modelno" name="modelno">
    </div>
          </div>

          <div class="row">
    <div class="col-25">
    <label1>Sales Price</label1>
    </div>
    <div class="col-75">
    <input type="text" id="salesprice" name="salesprice">
    </div>
          </div>

          <div class="row">
    <div class="col-25">
    <label1>Quantity</label1>
    </div>
    <div class="col-75">
    <input type="text" id="quantity" name="quantity">
    </div>
          </div>

          <div class="row">
    <div class="col-25">
    <label1>Discount</label1>
    </div>
    <div class="col-75">
    <input type="text" id="discount" name="discount">
    </div>
          </div>
	   
	   
          <div class="row">
    <div class="col-25">
    <label1>Serial No</label1>
    </div>
    <div class="col-75">
    <input type="text" id="serialno" name="serialno">
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

    <div class="sub-box">

        </br></br</br></br></br></br>
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

       </br>
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
    
        
        <div class="row">
    <div class="col-50">
    <input type="new-btn" value="Pay">
    </div>
    <div class="col-50">
    <input type="new-btn" value="Cancel">
    </div>
        </div>
    


    </div>
    </div>
      <div class="footers">
	  <p>© Tactota Solutions All rights reserved </p>
</div>

 </div>
</body>
