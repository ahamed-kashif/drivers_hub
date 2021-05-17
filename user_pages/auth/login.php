<?php
    session_start();
    require_once __DIR__ . '../../../vendor/autoload.php';
    if(isset($_SESSION['name']) || isset($_SESSION['fb_access_token'])){
        header('Location: ../profile.php?error=your%20already%20logged%20in!');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Driver's Hub</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/auth.css">
    <link href="/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <!-- <fb:login-button 
                        scope="public_profile,email"
                        onlogin="checkLoginState();">
                    </fb:login-button> -->
                    <?php
                        $fb = new Facebook\Facebook([
                            'app_id' => '1373208343040789',
                            'app_secret' => '72c287bbeecbb55c3e6a37f11dac68b3',
                            'default_graph_version' => 'v2.10',
                        ]);

                        $helper = $fb->getRedirectLoginHelper();

                        $permissions = ['email']; // Optional permissions
                        $loginUrl = $helper->getLoginUrl('http://localhost:8080/user_pages/auth/fb-callback.php', $permissions);

                        echo '<a href="' . $loginUrl . '"><span><i class="fab fa-facebook-square"></i></span></a>'; ''
                    ?>
                    <!-- <span><i class="fab fa-facebook-square"></i></span> -->
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form id="login-form" action="../../app/includes/user/auth/login.inc.php" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="username" type="text" class="form-control" placeholder="username" name="username" required>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control" placeholder="password" name="password" required><br>
                        <div>
                            <span id="result"></span>
                        </div>
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox" name="rememberme" id="rememberme">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
                <?php
                    include "../../app/includes/component/message.php"
                ?>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="/user_pages/auth/register.php">Register Now!</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="/user_pages/auth/forgot-pass.html">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/plugins/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/assets/js/app.js"></script>
<script>
    $('#password').keyup(function(){
        $('#result').html(checkStrength($('#password').val()))
    });
    function checkStrength(password){
        let strength = 0;
        if (password.length < 6) {
            $('#result').removeClass();
            $('#result').addClass('text-danger');
            return 'Too short';
        }
        if (password.length > 7) strength += 1;
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1;
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1;
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
        if (strength < 2 ) {
            $('#result').removeClass();
            $('#result').addClass('text-warning') ;
            return 'Weak';
        } else if (strength == 2 ) {
            $('#result').removeClass();
            $('#result').addClass('text-primary');
            return 'Good';
        } else {
            $('#result').removeClass();
            $('#result').addClass('text-success');
            return 'Strong';
        }
    }
</script>
</body>
</html>