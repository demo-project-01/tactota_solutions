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
        <div class="income3">
            <i class="fas fa-cart-plus fa-3x icon-left"></i>
            <b><p class="incomes">INCOME</p></b>
            <b><p class="inform">10 Record(s)</p></b>
        </div>
        <div class="income4">
            <i class="fas fa-store fa-3x icon-left"></i>
            <b><p class="incomes">STOCK DETAILS</p></b> 
            <b><p class="inform">10 Record(s)</p></b>
        </div>   
    </div>
    <div class="wrapper">
        <div class="list_wrap">
        <div class="contentch"><h1><p>Cheque Reminders</p></h1></div></br>
        <div class="admin-tbl">
            <table>
                <thead>
                    <tr>
                        <th>Cheque ID</th>
                        <th>Bank Name</th>
                        <th>Amount </th>
                        <th>Due Date</th>
                        
                    </tr>
                </thead>
                <tboady>
                    <tr>
                        <td>CHE001</td>
                        <td>BOC</td>
                        <td>20,000/=</td>
                        <td>2020-11-10</td>
                    </tr>
                    <tr>
                        <td>CHE002</td>
                        <td>BOC</td>
                        <td>20,000/=</td>
                        <td>2020-11-15</td>
                    </tr>
                    <tr>
                        <td>CHE003</td>
                        <td>NSB</td>
                        <td>50,000/=</td>
                        <td>2020-11-12</td>
                    </tr>
                    <tr>
                        <td>CHE004</td>
                        <td>HNB</td>
                        <td>20,000/=</td>
                        <td>2020-12-10</td>
                    </tr>
                    <tr>
                        <td>CHE005</td>
                        <td>NDB</td>
                        <td>60,000/=</td>
                        <td>2020-10-10</td>
                    </tr>
                </tboady>
            </table>
            </div>
            <!--ul>
                <li class="github">
                    <div class="list">
                        <div class="contentc">
                            <b>Bill1</b>
                        </div>
                    </div>
                </li>
                <li class="codepen">
                    <div class="list">
                        <div class="contentc">
                            <b>Bill2</b>
                        </div>
                    </div>
                </li>
                <li class="dribble">
                    <div class="list">
                        <div class="contentc">
                            <b>Bill3</b>
                        </div>
                    </div>
                </li>
                <li class="reddit">
                    <div class="list">
                        <div class="contentc">
                            <b>Bill4</b>
                        </div> 
                    </div>
                </li>
                <li class="quora">
                    <div class="list">
                        <div class="contentc">
                            <b>Bill5</b>
                        </div> 
                    </div>
                </li><br/></ul-->
                <div >
                <b><a href="view_all_cheques.php"class="view">View All Cheque</a></b>
                </div>
            
        </div>

    </div>
    <div class="footer">
	<p>© Tactota Solutions All rights reserved </p>
</div>
</div>
</body>
