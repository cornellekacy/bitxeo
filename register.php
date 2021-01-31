
<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Copied from https://bitxoe.com/register by Cyotek WebCopy 1.8.0.652, 07 January 2021, 06:25:58 -->
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
    <title>Register - Bitxoe</title>
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
                            <h5 class="nk-block-title">Register</h5>
                            <div class="nk-block-des">
                                                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <?php use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; ?>
                    <?php /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'admin/conn.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['save'])){
 $email = mysqli_real_escape_string($link,$_POST['email']);
 $username = mysqli_real_escape_string($link,$_POST['username']);
 $password = mysqli_real_escape_string($link,$_POST['password']);


 if (empty($email)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong>Email Cannot Be Empty.
    </div>";
}

elseif (empty($username)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Username Cannot Be Empty.
    </div>";
}
elseif (empty($password)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Password Cannot Be Empty.
    </div>";
}


else{
    $me = rand();
// Attempt insert query execution
    $sql = "INSERT INTO user (username,email,password) 
    VALUES ('$username','$email',MD5('$password'))";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> User Account Successfully Created.
        </div>";



// Load Composer's autoloader
require 'autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
 $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.yandex.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "mail@escrow-giant.com";
//Password to use for SMTP authentication
$mail->Password = "escrowgiant45";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('mail@escrow-giant.com', $_POST['username']);
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress($_POST['email'], 'Registration Mail');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
  if ($mail->addReplyTo($_POST['email'], $_POST['username'])) {
        $mail->Subject = 'Escrow Giant Inc';
        //Keep it simple - don't use HTML
        $mail->isHTML(true);
           $mail->AddEmbeddedImage('bar.png', 'logoimg', 'bar.png');
        $mail->AddEmbeddedImage('logo.png', 'logoimg1', 'logo.png');
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        $mail->Body = "
                 <img src=\"cid:logoimg1\" />
                    <h3><strong style='color: rgb(255,153,0);'>HELLO</strong> <strong style='text-transform: capitalize; color: rgb(255,153,0);'> $username, </strong> Welcome to Escrow Giant</h3>
                    <p> You Created an account on Escrow-giant.com. This is your login details, Thanks For trusting us</p>
                    <br><br>
                    Username: $username<br>
                    Password: $password
                    <br><br>
                    login here
                    https://www.escrow-giant.com/login.php
                    
                        ";
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            // echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            // window.location.href = 'mail.php'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}

//phpmailer ends here
    } else{
        // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
       echo "<div class='alert alert-danger'>
        <strong>Error!</strong> Username already taken
        </div>";
    }
}
}
// Close connection
mysqli_close($link);

?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="form-label" for="name">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email address</label>
                            <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email address">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Confirm Password</label>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch" data-target="cpassword">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" id="cpassword" name="cpassword" placeholder="Confirm your password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-control-xs custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="accept_pp_tos" value="1" id="checkbox">
                                <label class="custom-control-label" for="checkbox">I agree to Bitxoe <a href="page/privacy-policy.html">Privacy Policy</a> and <a href="page/terms-and-conditions.html">Terms and Conditions</a></label>
                            </div>
                        </div>
                                                <div class="form-group">
                            <button type="submit" name="save" value="register" class="btn btn-lg btn-primary btn-block">Register</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4"> Already have an account? <a href="login.php"><strong>Login</strong></a>
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
                        <p>&copy; 2020 Escrow for dark Web Users. All Rights Reserved.</p>
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

<!-- Copied from https://bitxoe.com/register by Cyotek WebCopy 1.8.0.652, 07 January 2021, 06:25:58 -->
</html> 