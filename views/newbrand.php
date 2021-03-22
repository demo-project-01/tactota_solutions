<?php
include 'clerk_sidebar.php';

require '../controller/sales.php';
$data=new sales();
$sql=$data->get_supplier_names();
//print_r($sql);
//session_start();
//print_r($_SESSION['addnewproduct']);
?>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../public/css/update.css">
    <link rel="stylesheet" href="../public/css/newproduct.css">
    <script src="../public/js/"></script>

</head>
<div class="content" style="width: auto;">
    <h1 id="tbl-heading"  >Add new Brand</h1>
    <?php if(isset($_SESSION['addnewbrand'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['addnewbrand']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['addnewbrand']); ?>

    <form action="../controller/sales.php?action=add_brand" id="myForm"  method="post">
        <div class="update-tbl">
            <table>
                <tbody>

                <tr>

                    <th>Brand Name</th>
                    <td>
                        <input class="text" id="brand_name" type="text" name="brand_name" required="">
                        <span id='uname1'></span>
                    </td>
                </tr>
                


                <tr>
                    <td colspan=2><input type="submit" id="submit" name="add_brand" value="Add"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
    <div class="footer">
	    <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>

<script>
 $('document').ready(function() {
 
 var brand_name_state = false;
 

  $('#brand_name').on('blur', function(){
      var brand_name = $('#brand_name').val();
      if (brand_name == '') {
          brand_name_state = false;
          return;
      }
      $.ajax({
          url: '../controller/sales.php?action=check_brand',
          type: 'post',
          data: {
              'brand_name' : brand_name
          },
          success: function(response){
       //     $('#uname1').html('already taken').css('color','red');
              if (response == 'taken' ) {
                  category_name_state = false;
                  $('#uname1').html('already taken').css('color','red');
              }else if (response == 'not_taken') {
                  category_name_state = true;

                  $('#uname1').html('available').css('color','green');
              }
          }
      });
  });



});

</script>

<script>

    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 1600);
</script>