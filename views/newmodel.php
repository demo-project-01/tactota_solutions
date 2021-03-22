<?php
include 'clerk_sidebar.php';


session_start();

?>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../public/css/update.css">
    <link rel="stylesheet" href="../public/css/newproduct.css">
    <script src="../public/js/"></script>

</head>
<div class="content" style="width: auto;">
    <h1 id="tbl-heading"  >Add new Model</h1>
    <?php if(isset($_SESSION['addnewmodel'])): ?>
        <div class="alert" id="activate">
            <span class="activebtn">&times;</span>
            <strong><?php echo $_SESSION['addnewmodel']; ?></strong>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['addnewmodel']); ?>

    <form action="../controller/sales.php?action=add_new_model" id="myForm"  method="post">
    <div class="update-tbl">
            <table>
                <tbody>
                <tr>
                    <th>Model Name</th>
                    <td>
                        <input class="text" id="model_no" type="text" name="model_number" required="">
                        <span id='uname1'></span>
                    </td>
                </tr>
        
                <tr>
                    <th>Sales Price</th>
                    <td>  <labal id="sales_price1"> </labal>
                        <input class="text" id="sales_price" type="number" min="1" name="sales_price" required="">

                    </td>
                </tr>
       

         

                <tr>
                    <th>Re-Order Level</th>
                    <td>
                        <labal id="reorder1"> </labal>
                        <input class="text" id="reorder"  type="number"  min="1" name="reorder_level" required="">

                    </td>
                </tr>

                <tr>
                    <th>specification</th>
                    <td>
                        <labal id="reorder1"> </labal>
                        <input class="text" id="reorder"  type="text"  min="1" name="specification" required="">

                    </td>
                </tr>




                <tr>
                    <td colspan=2><input type="submit" id="submit" name="add_model" value="Add"></td>
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
 
 var model_name_state = false;
 

  $('#model_no').on('blur', function(){
      var model_name = $('#model_no').val();
      if (model_name == '') {
          model_name_state = false;
          return;
      }
      $.ajax({
          url: '../controller/sales.php?action=check_model',
          type: 'post',
          data: {
              'model_name' : model_number
          },
          success: function(response){
       //     $('#uname1').html('already taken').css('color','red');
              if (response == 'taken' ) {
                  model_name_state = false;
                  $('#uname1').html('already taken').css('color','red');
              }else if (response == 'not_taken') {
                  model_name_state = true;

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