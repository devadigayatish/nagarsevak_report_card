<?php
require_once('includes/db_connection.php');
require_once('includes/functions.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
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
                                    <li class="active"><a href = "about-nagarsevak-report-card.php">About Nagarsevak Report Card</a></li>
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
                            <p>
                                <strong>About Project - Nagarsevak Report Card 2016</strong>
                                <br><br>
                                Nowadays it has become a cliché to bash politicians just for the sake of it. The uninitiated don’t even know what the work is that our corporators really do. So we at Parivartan came up with an idea to investigate how the corporators spend the funds that are allocated to them, which in case of Pune city corporators is 50 lakhs per year per prabhag. Though this amount may seem small, but in 5 years it accounts to a staggering Rs 2.5 crore, an amount sufficient for implementing and executing various good projects successfully. The only question is “do the corporators have the vision and will to utilize the funds and do the citizens think that this vision is aligned with the needs of their own prabhag”?
                                <br><br>
                                In this project, with the help of RTI, we collected all the information of 152 Corporators of Pune about the work that they have executed from the funds they were bound to get between years 2012 to 2016. Then we deduced facts and depicted them in percentage so that common citizen can understand. This report card, as you will see, includes utilization of funds, highlights of the funds utilized, attendance in General Body(GB) meetings of PMC and the number of questions asked in GB meetings by the corporators.
                                <br><br>
                                This Project’s objectives are in complete resonance with Parivartan’s core principles of good governance and are mentioned below : 1) Complete Transparency in the functioning. 2) Accountability of the Government. 3) Proper Planning. 4) Participation of Citizens. 5) Voters Awareness.
                                <br><br>
                                Thus by this Project we are hoping that citizens would think twice before casting their vote. If you look into the report cards we are not trying to give grades or claim any corporator good or bad.We are nobody to make a comment on that. We are just trying to state the facts and we are resting it on the collective intelligence of all the people to decide who has done a better Job.
                                <br><br>
                                We all have got our report cards since school and college. Even in the corporate world, companies have an appraisal system to evaluate an employee. It’s high time that our elected representatives are evaluated and who better than us common citizens to do it!! So we present you with Corporators Report Card. I Think and I Vote. DO YOU?
                            </p>
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