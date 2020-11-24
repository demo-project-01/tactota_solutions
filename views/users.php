<?php
require('admin_sidebar.php');
session_start();
?>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="../public/js/admin_users.js"></script>
    <link rel="stylesheet" href="../public/css/update.css">
</head>

<div class="content" style="width: auto;">

    <h1 id="tbl-heading">Users</h1>

    <div class="search">
        <input type="text" id="search_text" placeholder="Search..">
    </div>
    <?php if(isset($_SESSION['active_deactive'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['active_deactive']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['active_deactive']); ?>
    <div class="update-tbl" id="result">

    </div>

</div>
