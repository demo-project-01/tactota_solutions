$('document').ready(function() {
    $('#pswd1, #pswd2').on('keyup', function () {
        if ($('#pswd1').val() == $('#pswd2').val()) {
            $('#password').html('     Matching').css('color', 'green');
        } else
            $('#password').html('     Not Matching').css('color', 'red');

    });

    var username_state = false;
    var email_state = false;

    $('#username').on('blur', function(){
        var username = $('#username').val();
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
            url: '../controller/authenitication.php?action=check_username',
            type: 'post',
            data: {
                'username' : username
            },
            success: function(response){
                if (response == 'taken' ) {
                    username_state = false;
                    $('#uname').html('already taken').css('color','red');
                }else if (response == 'not_taken') {
                    username_state = true;

                    $('#uname').html('available').css('color','green');
                }
            }
        });
    });

    $('#email').on('blur', function(){
        var email = $('#email').val();
        if (email == '') {
            return;
        }
        $.ajax({
            url: '../controller/authenitication.php?action=check_email',
            type: 'post',
            data: {
                'email' : email
            },
            success: function(response){
                if (response == 'taken' ) {
                    email_state = false;

                    $('#email1').html('Email already taken').css('color','red');
                }else if (response == 'not_taken') {
                    email_state = true;

                    $('#email1').html('Email available').css('color','green');
                }
            }
        });
    });




});
