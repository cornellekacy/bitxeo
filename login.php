﻿<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Copied from https://bitxoe.com/login by Cyotek WebCopy 1.8.0.652, 07 January 2021, 06:25:58 -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bitxoe is a bitcoin escrow platform, work as mediator, holds money for a transaction between strangers in safekeeping until bitcoins are handed over.">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="app/templates/BitcoinEscrow/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="app/templates/BitcoinEscrow/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="app/templates/BitcoinEscrow/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="app/templates/BitcoinEscrow/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="app/templates/BitcoinEscrow/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="app/templates/BitcoinEscrow/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="app/templates/BitcoinEscrow/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="app/templates/BitcoinEscrow/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="app/templates/BitcoinEscrow/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="app/templates/BitcoinEscrow/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="app/templates/BitcoinEscrow/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="app/templates/BitcoinEscrow/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="app/templates/BitcoinEscrow/favicon/favicon-16x16.png">
    <link rel="manifest" href="app/templates/BitcoinEscrow/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffd600">
    <meta name="msapplication-TileImage" content="https://bitxoe.com/app/templates/BitcoinEscrow/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffd600">
    <!-- Page Title  -->
    <title>Login - Escrow for dark Web Users</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="app/templates/BitcoinEscrow/assets/css/dashlite.css?ver=1.1.0">
    <link rel="stylesheet" href="app/templates/BitcoinEscrow/assets/css/theme.css?ver=1.1.0">
    <link rel="stylesheet" href="app/templates/BitcoinEscrow/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="app/templates/BitcoinEscrow/assets/flags/css/flag-icon.min.css">
</head>

<body class="nk-body bg-white npc-crypto pg-auth">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-5">
                        <a href="index.htm" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="logoblack1.png" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="logoblack1.png" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Login</h5>
                            <div class="nk-block-des">
                                <p>Access the <b>Escrow for dark Web Users</b> using your username and password.</p>                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                              <?php
//our included config file
include "admin/conn.php";
//starting our session to preserve our login


//check whether data with the session name username has already been created
//if so redirect to hhomepage
if (isset($_SESSION['username'])) {
    //redirecting if there is already a session with the name username
    // header("Location: home.php");
  echo '   <script> window.location = "admin/index.php";</script>';
   
}

//check whether data with the name username has been submitted
if (isset($_POST['save'])) {

    //variables to hold our submitted data with post
    $username = $_POST['username'];
        //Encrypting our login password
    $password = md5($_POST['password']);

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);

    //our sql statement that we will execute
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    //Executing the sql query with the connection
    $re = mysqli_query($link, $sql);

    //check to see if there is any record / row in the database
    //if there is then the user exists
    if (mysqli_num_rows($re)) {
        //echo "Welcome";
        //creating a session name with username ad inserting the submitted username
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        //redirecting to homepage
       echo '   <script> window.location = "admin/index.php";</script>';
    }else{
        //display error if no record exists
        echo "<div class='alert alert-danger' role='alert' align='center'>
  <strong>Oh snap!</strong> check Your Credentials.
</div>";
    }
}
?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Username</label>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="default-01" name="username" placeholder="Enter your username">
                        </div><!-- .foem-group -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Password</label>
                                <a class="link link-primary link-sm" href="#">Forgot Password?</a>
                            </div>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password">
                            </div>
                        </div><!-- .foem-group -->
                                                <input type="hidden" name="csrf" value="5b58994b1696ae285059dca9c2d1f89d">
								<input type="hidden" name="passcode" value="">
                        <div class="form-group">
                            <button type="submit" name="save" value="login" class="btn btn-lg btn-primary btn-block">Login</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4"> New on our platform? <a href="register.php">Create an account</a>
                    </div>
                </div><!-- .nk-block -->
                <div class="nk-block nk-auth-footer">
                    <div class="nk-block-between">
                        <ul class="nav nav-sm">
                            <li class="nav-item">
                                <a class="nav-link" href="page/terms-and-conditions.html">Terms and Conditions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="page/privacy-policy.html">Privacy Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="support/index.htm">Support</a>
                            </li>
                            <li class="nav-item dropup">
                                <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><small> <span class="flag-icon flag-icon-us flag-icon-squared"></span> English</small></a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="language-list">
                                        <li>
					<a href="index.htm" class="language-item">
						<span class="flag-icon flag-icon-us flag-icon-squared" class="language-flag"></span>&nbsp;<span class="language-name">English</span>
					</a>
				</li>                                    </ul>
                                </div>
                            </li>
                        </ul><!-- .nav -->
                    </div>
                    <div class="mt-3">
                        <p>&copy; 2020 Bitxoe. All Rights Reserved.</p>
                    </div>
                </div><!-- .nk-block -->
            </div><!-- .nk-split-content -->
            <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                    <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="app/templates/BitcoinEscrow/images/slides/promo-a.png" alt="">
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="https://bitxoe.com/app/templates/BitcoinEscrow/images/slides/promo-b.png" alt="">
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="app/templates/BitcoinEscrow/images/slides/promo-c.png" alt="">
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                    </div><!-- .slider-init -->
                    <div class="slider-dots"></div>
                    <div class="slider-arrows"></div>
                </div><!-- .slider-wrap -->
            </div><!-- .nk-split-content -->
        </div><!-- .nk-split -->
    </div><!-- app body @e -->
    <!-- JavaScript -->
    <script src="app/templates/BitcoinEscrow/assets/js/bundle.js?ver=1.1.0"></script>
    <script src="app/templates/BitcoinEscrow/assets/js/scripts.js?ver=1.1.0"></script>
</body>

<!-- Copied from https://bitxoe.com/login by Cyotek WebCopy 1.8.0.652, 07 January 2021, 06:25:58 -->
</html>
 