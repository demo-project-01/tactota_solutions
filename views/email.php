<?php
include 'clerk_sidebar.php';
?>
<?php
session_start();
$row= $_SESSION['send_suplier_email'];

//print_r($_SESSION['emp_id']);


?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/email.css">
</head>

<div class="content" style="width: auto;">
    <h1 id="tbl-heading">Compose Email</h1>

    <div class="email-tbl">
        <table>
            <form action="../controller/inventory_maintain.php?action=send_email_supplier" method="post">
            <tbody>
                <tr id="email-tr">
                    <td class="bold">From</td>    
                    <td>
                        <select id="email-select" type="text" name="from" placeholder="">
                            <option value="tactota@gmail.com">tactota@gmail.com</option>
                            <option value="info@tactota.com">info@tactota.com</option>
                        </select>

                    </td>
                </tr>
                <tr id="email-tr">
                    <td class="bold">To</td>
                    <td><input id="email-text" type="email" name="to" value="<?php echo $row; ?>" placeholder="" readonly /></td>
                </tr>
                <tr id="email-tr">
                    <td class="bold">Subject</td>
                    <td><input id="email-text" type="text" name="subject" placeholder=""  /></td>
                </tr>
                
                <tr id="email-tr">
                    <td class="bold">Message</td>
                    <td><textarea id="email-textarea" name="message" placeholder="" rows=4 cols=60 required></textarea></td>
                </tr>


                <tr id="email-tr">
                    <td colspan=2>
                        <a class="add_button" href="stockreminders.php"><i class="fa fa-angle-double-left" aria-hidden="true">&nbsp&nbspBack</i></a>
                        <button class="add_button" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp&nbspSend</button>
                        <button class="add_button" type="reset" ><i class="fa fa-repeat" aria-hidden="true"></i>&nbsp&nbspClear</button>
                    </td>
                </tr>
            </form>
            </tbody>

        </table> 
    </div>
    <div class="footer">
			<p>© Tactota Solutions All rights reserved </p>
      </div>
</div>

</body>
