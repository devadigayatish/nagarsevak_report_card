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

            <div id="fh5co-about" style="padding-top: 50px;">
                <div class="container">
                    <div class="row row-bottom-padded-md">
                        <div class="col-md-12 animate-box fadeInUp animated">
                            <h3><strong> ORIGINAL RTI REPLIES </strong></h3>
                            <p>
                                Applications under Right To Information Act (RTI) were filed in 15 ward offices of Pune Municipal Corporation. The ward offices provided us with hard copies of the information. We have scanned those copies and are providing the same as it is for reference. Please download the file by clicking on the appropriate Ward office name.
                            </p>
                            <br>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Aundh_2012-2016.pdf" target="_blank"><h3><strong> Aundh </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Bhavani_Peth_2012-2016.pdf" target="_blank"><h3><strong> Bhawani Peth </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Bibwewadi_2012-2016.pdf" target="_blank"><h3><strong> Bibvewadi </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Dhankawadi_2012-2016.pdf" target="_blank"><h3><strong> Dhankawadi </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Dhole_Patil_Road_2012-2016.pdf" target="_blank"><h3><strong> Dhole Patil Road </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Ghole_Road_2012-2016.pdf" target="_blank"><h3><strong> Ghole Road </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Hadapsar_2012-2016.pdf" target="_blank"><h3><strong> Hadapsar </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Kasba_Vishrambaugwada_2012-2016.pdf" target="_blank"><h3><strong> Kasba Vishrambaugwada </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Kondhwa_2012-2016.pdf" target="_blank"><h3><strong> Kondhwa Wanavdi </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Kothrud_2012-2016.pdf" target="_blank"><h3><strong> Kothrud </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Nagar_Road_2012-2016.pdf" target="_blank"><h3><strong> Nagar Road </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Sahkarnagar_2012-2016.pdf" target="_blank"><h3><strong> Sahakarnagar </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Tilak_Road_2012-2016.pdf" target="_blank"><h3><strong> Tilak Road </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Warje_Karvenagar_2012-2016.pdf" target="_blank"><h3><strong> Warje Karvenagar </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Yerawda_2012-16.pdf" target="_blank"><h3><strong> Yerawda Sangamwadi </strong></h3></a>
                            <hr>
                            <p>
                                Applications under Right To Information Act (RTI) were filed in main building of Pune Municipal Corporation & Commissioner of Police, Pune. The respective offices provided us with hard copies of the information. We have scanned those copies and are providing the same as it is for reference. Please download the required files.
                            </p>
                            <br>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Nagarsevak_List_Nov_2015.pdf" target="_blank"><h3><strong> Nagarsevak List (Updated till November 2015) </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Attendance_2012-2016.pdf" target="_blank"><h3><strong> Attendance List </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Questions_raised_2012-2016.pdf" target="_blank"><h3><strong> Questions Raised </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/criminal_record_2012-2016.pdf" target="_blank"><h3><strong> Criminal Record List </strong></h3></a>
                            <a href="<?php echo SITE_URL ?>uploads/original-rti-replies/Govt_Guidelines_for_utilization_of_ward_level_funds.pdf" target="_blank"><h3><strong> Government Guidelines For Utilization Of Ward Level Funds </strong></h3></a>
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