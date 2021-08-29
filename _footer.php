            <footer>
                <div id="footer">
                    <div class="container">
                        <div class="row">
                            <div class="text-center">
                                <nav class="nav">
                                <a href="<?php echo SITE_URL ?>index.php" class="btn btn-primary"><strong>Home</strong></a>&nbsp;&nbsp;
                                <a href="<?php echo SITE_URL ?>summary.php" class="btn btn-primary"><strong>Summary</strong></a>&nbsp;&nbsp;
                                <a href="<?php echo SITE_URL ?>about-nagarsevak-report-card.php" class="btn btn-primary"><strong>About Nagarsevak Report Card</strong></a>&nbsp;&nbsp;
                                <a target="_blank" href="http://www.parivartanbharat.org/about-us" class="btn btn-primary"><strong>About Parivartan</strong></a>&nbsp;&nbsp;
                                </nav>
                                <hr/>
                                <p>
                                <a href="https://github.com/devadigayatish/nagarsevak_report_card" target="_blank"><strong>Source Code</strong></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a href="<?php echo SITE_URL ?>contributors.php"><strong>Contributors</strong></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a href="<?php echo SITE_URL ?>disclaimer.php"><strong>Disclaimer</strong></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a href="<?php echo SITE_URL ?>contact-us.php"><strong>Contact Us</strong></a>&nbsp;&nbsp;
                                <!-- <a href="<?php echo SITE_URL ?>report-bug.php"><strong>Report Bug / Suggestions</strong></a> -->
                                </p>
                                <hr/>
                                <p style="font-size: 15px;">
                                    This project is NOT Copyright protected. You're welcome to fork this project from &nbsp;<a target="_blank" href="https://github.com/devadigayatish/nagarsevak_report_card"><strong>Here</strong></a>&nbsp; and contribute. Also, if you are an NGO and want to do a similar kind of project in your city, we encourage you to copy our work and code.
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php require_once("unique_hits.php"); ?>
                </div>
            </footer>
        </div>
        <!-- END fh5co-page -->
    </div>
    <!-- END fh5co-wrapper -->

    <!-- jQuery min -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous"></script>
    <!-- jQuery Easing -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/jquery.waypoints.min.js"></script>
    <!-- Stellar -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/jquery.stellar.min.js"></script>
    <!-- Superfish -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/hoverIntent.js"></script>
    <script src="<?php echo SITE_URL ?>assets/js/lib/superfish.js"></script>

    <!-- Main JS (Do not remove) -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/main.js"></script>

    <!-- Modernizr JS -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/modernizr-2.6.2.min.js"></script>

    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="<?php echo SITE_URL ?>assets/js/lib/respond.min.js"></script>
    <![endif]-->

    <?php 
        if($contentBuffer["BOTTOM"]){
            foreach($contentBuffer["BOTTOM"] as $row){
                echo $row;
            }
        }
    ?>
</body>
</html>