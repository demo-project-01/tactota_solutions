<?php
   include 'admin_sidebar.php';
   require '../controller/inventory_maintain.php';
    $data = new inventory_maintain();

    $categories=array();
    $count=array();

    $sql=$data->sold_category_count();
    $sql1=$data->count_users();
    $sql2=$data->countstock_details();
    $sql3=$data->max_min_sales();
    $sql4=$data->countcheck_reminders();
    $sql5=$data->count_review();

    foreach ($sql as $k => $v)
    {
        array_push($categories,$sql[$k]["category_name"]);
        array_push($count,$sql[$k]["total"]);
    }
    $income=$data->get_income();
    $expences=$data->get_expences();
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
        <?php
        foreach ($sql5 as $k => $v){
            ?>
        <div class="income2"> 
            <i class="fas fa-thumbs-up fa-3x icon-left"></i>
            <b><p class="incomes">REVIEW</p></b> 
            <b><p class="inform"><?php echo $sql5[$k] ?>  Record(s)</p></b> 
        </div> 
        <?php }?>   
        </a>
        <a href="view_all_cheques.php">
        <?php
        foreach ($sql4 as $k => $v){
            ?>
        <div class="income3">
            <i class="fa fa-money fa-3x icon-left"></i>
            <b><p class="incomes">Cheque Reminders</p></b>
            <b><p class="inform"><?php echo $sql4[$k] ?>  Record(s)</p></b>
        </div>
        <?php }?> 
        </a>
        <a href="report_products.php">
        <?php
        foreach ($sql2 as $k => $v){
            ?>
        <div class="income4">
            <i class="fas fa-store fa-3x icon-left"></i>
            <b><p class="incomes">STOCK DETAILS</p></b> 
            <b><p class="inform"><?php echo $sql2[$k] ?> Record(s)</p></b>
        </div>
        <?php }?> 
        </a>   
    </div>
    <div class="row">
        <div class="graph">
            <b><p class="incomes" style="font-size:20;font-family:times new roman;font-weight:bold;">SALES CHART OF THE MONTH</p></b>
            <canvas id="myChart" width=500 height=200px></canvas>
        </div>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($categories); ?>, /*use for convert php array into js array*/ 
                    datasets: [{
                        label: '# of Items',
                        data: <?php echo json_encode($count); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 252)',
                            'rgba(255, 159, 64)',
                            'rgba(205, 199, 24)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(205, 199, 24,1)'
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
                <a href="report_top_selling.php">
                <p style="color:rgba(255, 99, 132);font-size:20;font-family:times new roman;font-weight:bold;"> TOP <br/> SELLING</p><!--p style="color:000000;font-size:15px;">ITEM OF THE MONTH</p-->
                <p style="font-size:20px;color:#6D6E31;font-weight:bold;">
                    <?php 
                    echo $sql3[0]['model_name'];
                    ?>
                </p>
                <p style="font-size:15px;color:#6D6E31;font-weight:bold;">
                    <?php 
                    echo $sql3[0]['category_name'];
                    ?>
                </p>
                <p style="font-size:15px;color:blue;font-weight:bold;">
                    <?php 
                    echo $sql3[0]['total'];
                    echo " sales";
                    ?>
                </p>
                </a>
            </div>
            <div>
                <a href="report_top_selling.php">
                <p style="color:rgba(255, 99, 132);font-size:20;font-family:times new roman;font-weight:bold;">LEAST <br/>SELLING </p>
                <p style="font-size:20px;color:#6D6E31;font-weight:bold;">
                    <?php 
                    echo $sql3[count($sql3)-1]['model_name'];
                    ?>
                </p>
                <p style="font-size:15px;color:#6D6E31;font-weight:bold;">
                    <?php     
                    echo $sql3[count($sql3)-1]['category_name'];
                    ?>
                </p>  
                <p style="font-size:15px;color:blue;font-weight:bold;">
                    <?php 
                    echo $sql3[count($sql3)-1]['total'];
                    echo " sales";
                    ?>
                </p>  
                </a>
            </div>
        </div>
        <!--div class="card emp">
            <img src="../public/images/bestsales.png" alt="" width="100px" height="auto"><br/>
            <p class="incomes">BEST PERFORMING SALES PERSON OF THE MONTH</p>
            <br/>
            <p style="font-size:20px;color:#6D6E31;"><b>Mr.Amal Perera</b></p>
            <p style="color:red;font-size:40px;margin-top:12px;"><b>20</b></p>Sales</p>
        </div-->
        <div class="card emp">
            <a href="report_loss_profit.php">
            <p style="font-family:times new roman;font-size:25px;font-weight:bold;color:007042;"><?php echo date('F, Y'); ?></p><br/>
            <p class="incomes" style="font-family:times new roman;color:red;font-size:20px;">Expences
            <?php 
            $exp =$expences[0]['tot'];
            echo $exp;
            ?>
            </p>
            <p class="incomes" style="font-family:times new roman;color:green;font-size:20px;">Income
            <?php
             $inc =$income[0]['tot'];
             echo $inc;
            ?>
            </p>
            <br/>
            <?php
            if ($inc > $exp )
            {
                echo '<i class="fa fa-star fa-3x" aria-hidden="true" style="color:rgba(255, 206, 86);"></i><p class="incomes" style="font-family:times new roman;color:orange;font-size:20px;">Profit of the Month</p><br/><p style="font-family:times new roman;color:rgba(75, 192, 192);font-size:35px;">Rs. ';
                echo $inc-$exp;
                echo '</p>';
            }
            else
            {
                echo '<i class="fa fa-meh-o fa-3x" aria-hidden="true" style="color:rgba(255, 99, 132);"></i><p class="incomes" style="font-family:times new roman;color:rgba(255, 99, 132);font-size:20px;">Loss of the Month</p><br/><p style="font-family:times new roman;color:rgba(75, 192, 192);font-size:35px;">Rs. ';
                echo $exp-$inc;
                echo '</p>';
            }
            ?>
            </a>
        </div>
    </div>   
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
    </div>
</div>
</body>
