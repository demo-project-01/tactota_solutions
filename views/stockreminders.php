<?php
/*session_start();
$row= $_SESSION['reminderitem_suppliers'];*/
include 'clerk_sidebar.php';
//require '../controller/inventory_maintain.php';
session_start();
$sql= $_SESSION['reminderitem_suppliers'];

?>

<head>
<link rel="stylesheet" href="../public/css/update.css">

</head>
<body>
  <div class="content"style="width:auto;">

      <h1 id="tbl-heading"> Stock Reminder - Suppliers</h1>

      <?php if(isset($_SESSION['email_sent_supplier'])): ?>
                    <div class="alert" id="activate">
              <span class="activebtn">&times;</span>
              <strong><?php echo $_SESSION['email_sent_supplier']; ?></strong>
                    </div>
                  <?php endif; ?>
                <?php unset($_SESSION['email_sent_supplier']); ?>

      <!--div class="search">
        <input type="text" placeholder="Search..">
      </div-->


      <div class="view-tbl">
        <table>
          <thead>
            <tr>
              <th>Supplier</th>
              <th scope="col">Address</th>
              <th scope="col">Price</th>
              <!--th scope="col">Action</th-->
              <th scope="col" colspan=2 border=0>Action</th>
            </tr>
          </thead>
          <tbody>
              <?php
              if(!empty($sql)){
              foreach ($sql as $k => $v)
              {
                  ?>
            <tr>
              <td><?php echo $sql[$k]["sup_name"] ?></td>
              <td><?php echo $sql[$k]["address"] ?></td>
              <td><?php echo $sql[$k]["unit_price"] ?></td>
              <td><a href = "../controller/inventory_maintain.php?action=send_email_form&id=<?php echo $sql[$k]["email_address"]?>&id1=<?php echo $sql[$k]['p_id'] ?>"  title="view"><i class="fa fa-envelope" aria-hidden="true" id="tbl-icon">&nbsp&nbspContact Supplier</i></a> </td>
            </tr>
              <?php
                }
              } ?>
            <tr>
              <td colspan=5 >
                <a class="add_button" href="reminderitems.php"><i class="fa fa-angle-double-left" aria-hidden="true" >&nbsp&nbspBack</i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
      </div>
  </div>

</body>
<script>

setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 1600);

</script>
