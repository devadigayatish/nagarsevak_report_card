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
                                <img src="http://nagarsevak.info/assets/images/logo/parivartan-logo.jpg" style="width: 150px; height: 50px; margin: 0px 15px 10px 0px;">
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
                            <h3><strong> DISCLAIMER </strong></h3>
                            <p>
                                Although information and contents on this portal have been put with care and diligence, Startup Partner Pvt Ltd and Parivartan does not take responsibility on how this information is used or the consequences of its use. In case of any inconsistency/confusion, the user should contact the concerned Department/Officer of Pune Municipal Corporation for further clarifications.
                            </p>
                            <hr>
                            <h3><strong> TERMS And CONDITIONS </strong></h3>
                            <p>
                                This Website is designed, developed, hosted and maintained by Startup Partner Pvt Ltd. The content of this website is provided by Parivartan NGO and it is for information purposes only, enabling the public at large to have a quick and an easy access to information. Parivartan has obtained this data from various departments of Pune Municipal Corporation through Right to Information Act (RTI) 2005.
                                <br>
                                Efforts have been made to ensure the accuracy and correctness of the content on this website. However, the same should not be interpreted as a statement of law or used for any legal purposes. In case of any ambiguity or doubts, users are advised to verify / check with the concerned Department(s) and / or other source(s), and obtain appropriate professional advice.
                                <br>
                                Under no circumstances Startup Partner Pvt Ltd will be liable for any expense, loss or damage including, without limitation, indirect or consequential loss or damage or any expense, loss or damage whatsoever arising from use, or loss of use, of data, arising out of or in connection with the use of this website.
                                <br>
                                These terms and conditions shall be governed by and interpreted in accordance with the Indian Laws. Any dispute arising under these terms and conditions shall be subject to the jurisdiction of the courts of India.
                            </p>
                            <hr>
                            <h3><strong> PRIVACY POLICY </strong></h3>
                            <p>
                                As a general rule, this portal does not automatically capture any specific personal information from you, (like name, phone number or e-mail address), that allows us to identify you individually. This portal records your visit and logs the following information for statistical purposes, such as Internet Protocol (IP) addresses, domain name, browser type, operating system, the date and time of the visit and the pages visited. We make no attempt to link these addresses with the identity of individuals visiting our site unless an attempt to damage the site has been detected. We will not identify users or their browsing activities, except when a law enforcement agency may exercise a warrant to inspect the service provider's logs. If this portal requests you to provide personal information, you will be informed how it will be used if you choose to give it and adequate security measures will be taken to protect your personal information.
                            </p>
                            <hr>
                            <h3><strong> COPYRIGHT POLICY </strong></h3>
                            <p>
                                Material featured on this portal may be reproduced free of charge in any format or media without requiring specific permission. This is subject to the material being reproduced accurately and not being used in a derogatory manner or in a misleading context. Where the material is being published or issued to others, the source must be prominently acknowledged. However, the permission to reproduce this material does not extend to any material on this site which is identified as being the copyright of the third party. Authorisation to reproduce such material is obtained from the copyright holders concerned.
                            </p>
                            <hr>
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