<?php
require '../controller/inventory_maintain.php';
$data = new inventory_maintain();
$sql=$data->view_categories();
?>

<select id="opts" onchange="showForm()">
<?php
        foreach ($sql as $k => $v){
        ?>
        <option value="<?php echo $sql[$k]["category_id"] ?>">
            <?php echo $sql[$k]["category_name"] ?>
        </option>
        <?php
        }
        ?>
</select>

<div id="f1" style="display:none">
    <form name="form1">
        <select id="opts" onchange="showForm() >
        <?php
        foreach ($sql as $k => $v){
        ?>
        <option value="<?php echo $sql[$k]["model_id"] ?>">
            <?php echo $sql[$k]["model_name"] ?>
        </option>
        <?php
        }
        ?>
        </select>
    </form>
</div>

<div id="f2" style="display:none">
    <form name="form2">
        <select id="opts" onchange="showForm()">
            <option value="0">Select Option</option>
            <option value="1">Option 2A</option>
            <option value="2">Option 2B</option>
        </select>
    </form>
</div>

<script type="text/javascript">
    function showForm() {
        var selopt = document.getElementById("opts").value;
        if (selopt == 1) {
            document.getElementById("f1").style.display = "block";
            document.getElementById("f2").style.display = "none";
        }
        if (selopt == 2) {
            document.getElementById("f2").style.display = "block";
            document.getElementById("f1").style.display = "none";
        }
        if (selopt == 0) {
            document.getElementById("f2").style.display = "none";
            document.getElementById("f1").style.display = "none";
        }
    }
</script>


<!--div class="nav-bar">
      <table class="selection">
        <tr>
          <td><label for="category" class="date-lbl">Category</label></td>
          <td><label for="brand" class="date-lbl">Brand</label></td>
          <td><label for="model" class="date-lbl">Model</label></td>
        </tr>
        <tr>
          <td>
            <select name="category" id="category">
              <option value="0">All</option>
              <?php  
              if(!empty($sql)){
                foreach ($sql as $k => $v){  ?>
                  <option value="<?php echo $sql[$k]["category_id"] ?>"> <?php 
                    echo $sql[$k]["category_name"] ?>
                  </option>   <?php
                   }
                }
              ?>
            </select>
          </td>
          <td>
            <select name="brand" id="brand">
              <option value="0">All</option>
              <?php
                 if(!empty($sql1)){
                foreach ($sql1 as $k => $v){  ?>
                  <option value="<?php echo $sql1[$k]["brand_id"] ?>"> <?php 
                    echo $sql1[$k]["brand_name"] ?>
                  </option>   <?php
                 }
                }
              ?>
            </select>
          </td>
          <td>
            <select name="model" id="model">
              <option value="0">All</option>
              <?php 
                 if(!empty($sql2)){
                foreach ($sql2 as $k => $v){  ?>
                  <option value="<?php echo $sql2[$k]["model_id"] ?>"> <?php 
                    echo $sql2[$k]["model_name"] ?>
                  </option>   <?php
                 }
                }
              ?>
            </select>
          </td>
        </tr>
        
        <tr>
          <td colspan=3>
            <a class="button" href="#">Search </a>
          </td>
        </tr>
      </table>
    </div-->