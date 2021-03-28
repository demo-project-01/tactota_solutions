<?php
   include 'clerk_sidebar.php';

?>
<head>
<link rel="stylesheet" href="../public/css/view_user.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<div class="content" style="width:auto;">
    <h1 id="tbl-heading">Return Items</h1><br/>
   
    <div class="search">
    <input type="text" id="keywords" placeholder="Search.." onkeyup="searchFilter()"> 
    <select id="sortBy" onchange="searchFilter()">
        <option value="">Sort By</option>
        <option value="shop">Shop Return Items</option>
        <option value="customer">Customer Return Items</option>
    </select>
    </div>
    <div class="view-tbl" id="posts_content">
     
    </div>
    <div class="footer">
		<p>© Tactota Solutions All rights reserved </p>
    </div>  
</div>

<script>
function searchFilter() {
  
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: '../controller/inventory_maintain.php?action=returnitem_search',
        data:'&keywords='+keywords+'&sortBy='+sortBy,
        success: function (html) {
            $('#posts_content').html(html);
            
        }
    });
   
}
searchFilter()
</script>