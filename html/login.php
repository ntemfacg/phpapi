<?php
ob_start();
session_start();
// require_once '../API/login.php';

// Session storage verification
// TO DO: include web tokens and token verification

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>
<body>

<div class="container">


    <div id="login-form">
        <form id="login_form" method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Login:</h2>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div id="response" class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                    </div>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="btn-login">Login</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="register.php" type="button" class="btn btn-block btn-danger"
                       name="btn-login">Register</a>
                </div>

            </div>

        </form>
    </div>

</div>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).on('submit', '#login_form', function(){
 
 // get form data
 var login_form=$(this);
 var form_data=JSON.stringify(login_form.serialize());

 // http request here
 // submit form data to api
$.ajax({
    url: "../API/handle.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result){
 
        // store jwt to cookie
        // setCookie("jwt", result.jwt, 1);
 
        // show home page & tell the user it was a successful login
        // showHomePage();
        // window.Location("index.php");
        $('#response').html("<div class='alert alert-success'>Successful login.</div>");
 
    },
    // error response will be here
    error: function(xhr, resp, text){
    // on error, tell the user login has failed & empty the input boxes
    $('#response').html("<div class='alert alert-danger'>Login failed. Email or password is incorrect.</div>");
    // login_form.find('input').val('');
    console.log(resp);
    console.log(text);
}
});

 return false;
});
</script>
</body>
</html>
