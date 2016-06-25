<?php
require_once('includes/db_connection.php');
require_once('includes/functions.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->    <head>
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
                    <div class="row row-bottom-padded-md">
                        <div class="col-md-12 animate-box fadeInUp animated">
                            <h2>Contributors</h2>
                            <br/>
                            <h3> Sharvari Gaikwad </h3>
                            <ul>
                                <li>Profile : Intern at Startup Partner</li>
                                <li>Role    : Lead developer for this project</li>
                                <li>Email   : sharvari.v.gaikwad@gmail.com</li>
                            </ul>
                            <h3> Yatish Devadiga </h3>
                            <ul>
                                <li>Profile : Software Engineer at Startup Partner</li>
                                <li>Role    : Technical guide and developer for this project</li>
                                <li>Email   : devadigayatish@gmail.com</li>
                            </ul>
                            <h3> Nikhil Sheth </h3>
                            <ul>
                                <li>Profile : Freelancer</li>
                                <li>Role    : Helped with majority of the code. Mainly with Mapbox</li>
                                <li>Email   : nikhil.js@gmail.com</li>
                            </ul>
                            <h3> Mahesh Kajale </h3>
                            <ul>
                                <li>Profile : Software Engineer at Better Technology Labs</li>
                                <li>Role    : Helped fixing some issues. Structured the code.</li>
                                <li>Email   : m.s.kajale@gmail.com</li>
                            </ul>
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