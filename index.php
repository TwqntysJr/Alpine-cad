
<?php
    require('includes/db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>ALPINERP CAD - Login</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- 
            
        Alpine RP California County.
        Copyright (C) 2020 Oliver Wake
        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, or
        (at your option) any later version.
        This program comes with ABSOLUTELY NO WARRANTY; Use at your own risk.

        // ID - EMAIL - USERNAME - PASSWORD - ROLE - BANNED
        -->
        <!--===============================================================================================-->	
            <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="/includes/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="includes/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="includes/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="includes/vendor/animate/animate.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="includes/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="includes/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="includes/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="includes/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="includes/css/util.css">
            <link rel="stylesheet" type="text/css" href="includes/css/main.css">
        <!--===============================================================================================-->
        </head>
        <body>
            
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100 p-b-160 p-t-50">
                        <form class="login100-form validate-form" method="post" name="login">
                            <span class="login100-form-title p-b-43">
                                Account Login
                            </span>
                            
                            <div class="wrap-input100 rs1 validate-input" data-validate = "Username is required">
                                <input class="input100" type="text" name="username">
                                <span class="label-input100">Username</span>
                            </div>
                            
                            
                            <div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
                                <input class="input100" type="password" name="pass">
                                <span class="label-input100">Password</span>
                            </div>

                            <div class="container-login100-form-btn">
                            
                                <input type="submit" value="Login" name="submit" class="login100-form-btn"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            

            
            
        <!--===============================================================================================-->
            <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
            <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
            <script src="vendor/bootstrap/js/popper.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
            <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
            <script src="vendor/daterangepicker/moment.min.js"></script>
            <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
            <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
            <script src="js/main.js"></script>

        </body>
        </html>
        <?php
    }
?>