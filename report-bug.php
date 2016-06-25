<?php
require_once('includes/db_connection.php');
require_once('includes/functions.php');
require_once('includes/email-settings.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php
        require_once('header.php');
    ?>

   
    </head>
    <body>

        <div id="fh5co-wrapper">
        <div id="fh5co-page">

            <div id="fh5co-header">
                <header id="fh5co-header-section">
                    <div class="container">
                        <div class="nav-header">
                            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
                            <h1 id="fh5co-logo"><a href="index.php">Nagarsevak <span>Report Card</span></a></h1>
                            <!-- START #fh5co-menu-wrap -->
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li>
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li><a target="_blank" href="http://parivartan-pune.blogspot.in/p/about-us.html">About Parivartan</a></li>
                                    <li><a href = "about-nagarsevak-report-card.php">About Nagarsevak Report Card</a></li>
                                    <li><a href = "summary.php">Summary</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>
            </div>

            <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo SITE_URL;?>assets/images/home-image.jpg);"></div>
            </div>

            <div id="fh5co-about" style="padding-top: 50px;">

                
                <div class="container">
                
                <form name="form" method="post" action="">
                    <div class="row row-bottom-padded-md">
                        <div class="col-md-6">
                            <h2><strong> REPORT BUG </strong></h2>
                            <br>
                            <p>
                                We welcome your suggestions to improve this website and request that error (if any) may kindly be brought to our notice.
                            </p>
                            <br>

                            <?php
                                /*** This example shows settings to use when sending via Google's Gmail servers.*/
                                //SMTP needs accurate times, and the PHP time zone MUST be set
                                //This should be done in your php.ini, but this is how to do it if you don't have access to that
                                date_default_timezone_set('Etc/UTC');
                                require_once('includes/lib/PHPMailer-master/PHPMailerAutoload.php');
                                //Create a new PHPMailer instance
                                $mail = new PHPMailer;
                                //Tell PHPMailer to use SMTP
                                $mail->isSMTP();
                                //Enable SMTP debugging
                                // 0 = off (for production use)
                                // 1 = client messages
                                // 2 = client and server messages
                                $mail->SMTPDebug = 0;
                                //Ask for HTML-friendly debug output
                                $mail->Debugoutput = 'html';
                                //Set the hostname of the mail server
                                $mail->Host = 'smtp.gmail.com';
                                // use
                                // $mail->Host = gethostbyname('smtp.gmail.com');
                                // if your network does not support SMTP over IPv6
                                //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                                $mail->Port = 465;
                                //Set the encryption system to use - ssl (deprecated) or tls
                                $mail->SMTPSecure = 'ssl';
                                //Whether to use SMTP authentication
                                $mail->SMTPAuth = true;
                                //Username to use for SMTP authentication - use full email address for gmail
                                $mail->Username = Sender;
                                //Password to use for SMTP authentication
                                $mail->Password = Password;
                                //Set who the message is to be sent from
                                $mail->setFrom(@$_POST['email']);
                                //Set an alternative reply-to address
                                $mail->addReplyTo(@$_POST['email']);
                                //Set who the message is to be sent to
                                $mail->addAddress(Recipient);
                                //Set the subject line
                                $mail->Subject = 'Error : Nagarsevak_Report_Card';
                                //Read an HTML message body from an external file, convert referenced images to embedded,
                                //convert HTML into a basic plain-text alternative body
                                $mail->msgHTML(@$_POST['message']);
                                //Replace the plain text body with one created manually
                                $mail->AltBody = 'This is a plain-text message body';
                                //send the message, check for errors
                                if ($mail->send())
                                {
                                    echo "<div class='text-center'><h4>Thanks for reporting the issue. We will fix it ASAP !!</h4></div>";
                                }
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="txtEmail" required="" pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"name="email" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" required="" class="form-control" id="" cols="30" rows="7" placeholder="Please give a detailed description about the issue."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Send Email" class="btn btn-primary"  /> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                </div>
            </div>

            <?php
                include'footer.php';
            ?>
        </div>
    </div>

</body>
</html>