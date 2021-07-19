<?php require_once('_config.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nagarsevak Report Card</title>

    <meta name="keywords" content="nagarsevak, nagarsevak report card, nagarsevak report, report card, pune city, pune, pmc, pune municipal corporation, pune corporation, transparency, governance, ngo, good governance, parivartan" />
    <meta name="description" content="Nagarsevak Report Card by Parivartan" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- <link rel="shortcut icon" href="favicon.ico"> -->

    <link href="<?php echo SITE_URL; ?>assets/css/fonts-googleapis.css" rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/bootstrap.css">
    <!-- Superfish -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/superfish.css">
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/style.css">
    
    <?php 
        if($contentBuffer["TOP"]){
            foreach($contentBuffer["TOP"] as $row){
                echo $row;
            }
        }
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
                                <?php 
                                    $segments = explode("/", $_SERVER["PHP_SELF"]);
                                    $file_name = $segments[count($segments)-1]; 
                                ?>
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li class="<?=($file_name == "index.php") ? "active" : ""; ?>">
                                        <a href="<?php echo SITE_URL ?>index.php">Home</a>
                                    </li>
                                    <li class="<?=($file_name == "summary.php") ? "active" : ""; ?>">
                                        <a href="<?php echo SITE_URL ?>summary.php">Summary</a>
                                    </li>
                                    <li class="<?=($file_name == "about-nagarsevak-report-card.php") ? "active" : ""; ?>">
                                        <a href="<?php echo SITE_URL ?>about-nagarsevak-report-card.php">About NRC</a>
                                    </li>
                                    <li><a target="_blank" href="http://www.parivartanbharat.org/about-us">About Parivartan</a></li>
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