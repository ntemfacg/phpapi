<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</head>
<body>
<div class="form-group">
                    <h2 class="">Register API Header for NaturalHR</h2>
                </div>
                <div>
                    <?php
                    //    $_SESSION['client_id'] = 1; 
                        if (!isset($_SESSION['client_id'])) {
                            ?>
                            <li><a href="/login">login </a></li>
                            <?php
                        }else {
                            ?>
                            <h2>Login</h2>
     <form id='login_form'>
         <div class='form-group'>
             <label for='email'>Email address</label>
             <input type='email' class='form-control' id='email' name='email' placeholder='Enter email'>
         </div>

         <div class='form-group'>
             <label for='password'>Password</label>
             <input type='password' class='form-control' id='password' name='password' placeholder='Password'>
         </div>

         <button type='submit' class='btn btn-primary'>Login</button>
     </form>
                            <li><a href="/login">Link1</a></li>
                            <?php
                        }?>
                </div>
</body>