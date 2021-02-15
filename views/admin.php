<?php
   include 'admin_sidebar.php';
?>
<body>
<div class="content" style="width:auto;">             
    <div>
        <a href ="users.php">
        <div class="income1">
            <i class="fas fa-users fa-3x icon-left"></i>
            <b><p class="incomes">USERS</p></b>
            <b><p class="inform">10 Record(s)</p></b>
        </div>
        </a>
        <a href ="review.php">
        <div class="income2"> 
            <i class="fas fa-thumbs-up fa-3x icon-left"></i>
            <b><p class="incomes">REVIEW</p></b> 
            <b><p class="inform">10 Record(s)</p></b> 
        </div>   
        </a>
        <a href="report_loss_profit.php">
        <div class="income3">
            <i class="fa fa-money fa-3x icon-left"></i>
            <b><p class="incomes">INCOME</p></b>
            <b><p class="inform">10 Record(s)</p></b>
        </div>
        </a>
        <a href="report_products.php">
        <div class="income4">
            <i class="fas fa-store fa-3x icon-left"></i>
            <b><p class="incomes">STOCK DETAILS</p></b> 
            <b><p class="inform">10 Record(s)</p></b>
        </div>
        </a>   
    </div>
    <div class="row">
        <div class="graph">
            <b><p class="incomes">SALES CHART OF THE MONTH</p></b>
        </div>
        <div class="column">
            <div>
                <p class="incomes">TOP SELLING ITEM OF THE MONTH</p>
                <img src="../public/images/topselling.png">
            </div>
            <div>
                <p class="incomes">LEAST SELLING ITEM OF THE MONTH</p>
            </div>
        </div>
        <div class="card emp">
            <img src="../public/images/bestsales.png" alt="" width="100px" height="auto"><br/>
            <p class="incomes">BEST PERFORMING SALES PERSON OF THE MONTH</p>
            <br/>
            <p style="font-size:20px;color:#6D6E31;"><b>Mr.Amal Perera</b></p>
            <p style="color:red;font-size:40px;margin-top:12px;"><b>20</b></p>Sales</p>
        </div>
    </div>
    
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>
</body>
