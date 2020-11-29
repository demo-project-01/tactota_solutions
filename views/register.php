<!DOCTYPE html>
<html>
<head>
    <title>Tactota Solutions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="../public/css/signup.css" rel="stylesheet" type="text/css"/>
    <script src="https://kit.fontawesome.com/1b83d32a6d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="../public/js/register.js" ></script>
</head>
<body>
<div>
    <br/>
    
        <h1> Registration</h1>
    <br/>
    
    <div class="main-container" id="reg-main">
        <div id="img-sub">
            <div><img src="../public/images/logo-s.jpeg" alt="logo" width=300 height=auto />
        </div>
        </div>
        <div id="sub1">
            <form action="../controller/authenitication.php?action=register" method="post" enctype="">
                <label for='fname' id='left-label'>
                    <i class="fa fa-user" aria-hidden="true"></i></i>
                    &nbsp&nbspFirst Name *
                    <span id='firstname'></span>
                </label>
                <input id='fname' class="text" type="text" name="firstname" required="">
                <label for='mname' id='left-label'>
                    <i class="fa fa-user" aria-hidden="true"></i></i>
                    &nbsp&nbspMiddle Name
                    <span id='middlename'></span>
                </label>
                <input id='mname' class="text" type="text" name="middlename">
                <label for='lname' id='left-label'>
                    <i class="fa fa-user" aria-hidden="true"></i></i>
                    &nbsp&nbspLast Name *
                    <span id='lastname'></span>
                </label>
                <input id='lname' class="text" type="text" name="lastname" required="">
                <label for='address' id='left-label'>
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    &nbsp&nbspHome Address *
                    <span id='address1'></span>
                </label>
                <input id="address" class="text" type="text" name="address"required="">
                <label for='teleno' id='left-label'>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    &nbsp&nbspContact Number *
                    <span id='cnumber'></span>
                </label>
                <input id='teleno' class="text" type="text" name="moblile_no" required="">
                <label for='nic' id='left-label'>
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    &nbsp&nbspNIC *
                    <span id='nic1'></span>
                </label>
                <input id='nic' class="text" type="text" name="nic8" required="">
                <label for='dob' id='left-label'>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    &nbsp&nbspDOB *
                    <span id='dob1'></span>
                </label>
                <input id="dob" class="text" type="date" placeholder="ex:1999-10-20" name="dob" min="1940-01-01" max="2005-12-31" required="">

                <table>
                    <tr>
                        <td rowspan=3>
                            <label for='job' id='left-label'>
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                &nbsp&nbspJob Position *
                            </label>
                        </td>

                    </tr>
                    <tr>
                        <td><input id='job' class="text" type="radio" name="job_position" value="Clerk" required=""><span style="font-size:0.8em; color:#007042;">Clerk</span></td>
                    </tr>
                    <tr>
                        <td><input id='job' class="text" type="radio" name="job_position" value="Shopkeeper" required=""><span style="font-size:0.8em; color:#007042;">Shopkeeper</span></td>
                    </tr>
                </table>

        </div>
        <div id="sub2">
            <div id="error_msg"></div>
            <label for='email' id='left-label'>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                &nbsp&nbspEmail Address *
                <span id='email1'></span>
            </label>
            <input id='email' class="text email" type="email" name="email" required="">
            
            
            <label for='img' id='left-label'>
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                &nbsp&nbspImage
                <span id='img1'></span>
            </label>
            <input id="img" class="text" type="file" name="nic" >
            
            
            <label for='username' id='left-label'>
                <i class="fa fa-user" aria-hidden="true"></i>
                &nbsp&nbspUsername *
                <span id='uname'></span>
            </label>
            <input id='username' class="text" type="text" name="username" required="">
            <label for='pswd1' id='left-label'>
                <i class="fa fa-key" aria-hidden="true"></i>
                &nbsp&nbspPassword *
            </label>
            <input id='pswd1' class="text" type="password" name="password" required="">
            <label for='pswd2' id='left-label'>
                <i class="fa fa-key" aria-hidden="true"></i>
                &nbsp&nbspConfirm Password *
                <span id='password'></span>
            </label>
            <input id='pswd2' class="text w3lpass" type="password" name="cpassword" required="">

            <div class="wthree-text">
                <label class="anim">
                    <input type="checkbox" class="checkbox" required="">
                    <span><a href="terms_and_conditions.txt" target="_blank">I Agree To The Terms & Conditions Read file</a></span>
                </label>
                <div class="clear"> </div>
            </div>
            <input id="reg_btn" type="submit" value="REGISTER">
            <label for='login' id='left-p'>Already have an Account? <a id='login' href="login.php" style="font-size:1.3em;"> Login Now!</a></label>

                </form>

        </div>
    </div>

    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>
</body>
</html>

