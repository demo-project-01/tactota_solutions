<?php
include 'clerk_sidebar.php';
?>
<?php
session_start();
$row=$_SESSION['row'];

//print_r($_SESSION['emp_id']);


?>
<head>
<link rel="stylesheet" href="../public/css/update.css">
<link rel="stylesheet" href="../public/css/email.css">
</head>

<div class="content" style="width: auto;">
    <h1 id="tbl-heading">Compose Email</h1>

    <div class="email-tbl">
        <table class="email">
            <form action="" method="post">
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
                    <td><input id="email-text" type="text" name="to" placeholder=""/></td>
                </tr>
                <tr id="email-tr">
                    <td class="bold">Subject</td>
                    <td><input id="email-text" type="text" name="subject" placeholder=""/></td>
                </tr>
                
                <tr id="email-tr">
                    <td class="bold">Message</td>
                    <td><textarea id="email-textarea" name="message" placeholder="" rows=4 cols=60></textarea></td>
                </tr>
                <tr id="email-tr">
                    <td colspan=2>
                        <a class="add_button" href="view_all_users.php"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp&nbspSend</a>
                        <a class="add_button" href="#" ><i class="fa fa-repeat" aria-hidden="true"></i>&nbsp&nbspClear</a>
                    </td>
                </tr>
            </tbody>
            </form>
        </table> 
    </div>
    <div class="footerc">
			<p>© Tactota Solutions All rights reserved </p>
      </div>
</div>

</body>
