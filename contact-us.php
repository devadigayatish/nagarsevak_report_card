<?php
require_once('includes/db_connection.php');
require_once('includes/functions.php');
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
                            <h1 id="fh5co-logo">
                                <img src="<?php echo SITE_URL ?>assets/images/logo/parivartan_logo_black.jpg" style="width: 150px; height: 50px; margin: 0px 15px 10px 0px;">
                                <a href="index.php">
                                    <span>Nagarsevak Report Card</span>
                                </a>
                            </h1>
                            <!-- START #fh5co-menu-wrap -->
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li>
                                        <a href="<?php echo SITE_URL ?>index.php">Home</a>
                                    </li>
                                    <li><a href="<?php echo SITE_URL ?>summary.php">Summary</a></li>
                                    <li><a href="<?php echo SITE_URL ?>about-nagarsevak-report-card.php">About NRC</a></li>
                                    <li><a target="_blank" href="http://parivartan-pune.blogspot.in/p/about-us.html">About Parivartan</a></li>
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

            <div id="fh5co-about" style="padding-top: 25px;">
                <div class="container">
                    <div class="row row-bottom-padded-md">
                        <div class="col-md-12 animate-box fadeInUp animated" style="padding-bottom: 25px;">
                            <h3><strong> CONTACT US </strong></h3>
                        </div>

                        <div class="col-md-6 col-sm-6 animate-box">
                            <div class="text-center">
                            <h3><strong><u> PARIVARTAN </u></strong></h3>
                            <p>
                                Email : parivartan.bharat@gmail.com
                            </p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6 col-sm-6 animate-box">
                            <div class="text-center">
                            <h3><strong><u> STARTUP PARTNER PVT LTD </u></strong></h3>
                            <p>
                                6th Floor, A-Wing, <br>
                                Manikchand Galleria,<br>
                                Near Deep Bangla Chowk, Model Colony,<br>
                                Shivaji Nagar, Pune - 411016<br>
                            </p>
                            <p>
                                Email : info@startuppartner.co.in
                            </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php
                include'footer.php';
            ?>
        </div>
    </div>

</body>
</html>