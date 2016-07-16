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
    <script>
    function checkEmail()
    {
        var email = document.getElementById('txtEmail');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value))
        {
        alert('Please provide a valid email address');
        email.focus;
        return false;
        }
        
    }
    </script>
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

                
                <div class="container animate-box">
                    <div class="row row-bottom-padded-md">
                        <div class="col-md-8">
                            <h2><strong> REPORT BUG / GIVE SUGGESTIONS</strong></h2>
                            <br>
                            <p>
                                Thanks for coming here !!!
                                <br>
                                We welcome your suggestions to improve this website. Let us know what more information you would like to see on this website. Also if you find any errors or bugs, kindly bring it to our notice. We would try to fix it as early as possible.
                            </p>

                            <?php
                            require_once('includes/email-sender.php')
                            ?>
                            <form action="" method="post" enctype='multipart/form-data' onsubmit="return checkEmail();">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" id="txtEmail"  name="email" required="" class="form-control" placeholder="Your Email ID">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" required="" class="form-control" id="" cols="30" rows="7" placeholder="Please give a detailed description about the issue or suggestion"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type='file' name='userFile'> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Send Email" name="submit" class="btn btn-primary" /> 
                                </div>
                            </div>
                            </form>          
                        </div>
                    </div>
                
                </div>
            </div>
            <?php
                require_once('footer.php');
                
            ?>
        </div>
    </div>

</body>
</html>