<?php
   include 'admin_sidebar.php';
   require '../controller/inventory_maintain.php';
    $data = new inventory_maintain();
    $sql=$data->view_categories();
    $sql1=$data->count_users();
    $a=array();
    foreach ($sql as $k => $v)
    {
        array_push($a,$sql[$k]["category_name"]);
    }
?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
<div class="content" style="width:auto;">             
    <div>
        <a href ="users.php">
        <?php
        foreach ($sql1 as $k => $v){
            ?>
        <div class="income1">
            <i class="fas fa-users fa-3x icon-left"></i>
            <b><p class="incomes">USERS</p></b>
            <b><p class="inform"><?php echo $sql1[$k] ?> Record(s)</p></b>
        </div>
        <?php }?> 
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
            <canvas id="myChart" width=500 height=200px></canvas>
        </div>
        <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($a); ?>, /*use for convert php array into js array*/ 
        datasets: [{
            label: '# of Items',
            data: [12, 19, 3, 5, 2],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 252)',
                'rgba(255, 159, 64)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
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
