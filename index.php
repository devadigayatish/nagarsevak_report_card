<?php require_once('_config.php'); ?>

<?php ob_start(); ?>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/leaflet.css" />
<link rel="stylesheet"href="<?php echo SITE_URL; ?>assets/css/leaflet.label.css" />
<?php 
    $contentData = ob_get_contents(); 
    ob_end_clean ();
    $contentBuffer["TOP"][] = $contentData;
?>

<?php require_once('_header.php'); ?>

<div id="fh5co-work-section" style="padding-top: 25px;">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="well">
                    <div class="text-center"><strong>पुणे महानगर पालिका निवडणूक २०१७ च्या उमेदवारांचे शपथ पत्र  &nbsp;&nbsp;<a class="btn btn-primary" href="https://goo.gl/forms/xCunWwufnTc4H5w93" target="_blank">Click here</a></strong></div>
                </div>
            </div>

            <div class="container animate-box">
                <div class="col-lg-12 col-md-12">
                    <div class="text-center"><strong>Select Prabhag area on the map</strong></div>
                    <div id="map"></div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="col-lg-12 col-md-12 text-center animate-box" style="margin-top: 15px;">
                    <?php include_once('_prabhag_dropdown.php'); ?>
                    <div id="prabhag_no_info"></div>
                    <div id="profile_info"></div>
                </div>
            </div>

            <div class="container-fluid animate-box">
                <div class='text-center'><h2><strong>UTILIZATION OF WARD LEVEL FUNDS</strong></h2></div>
                <div id="details_of_work" class="row"></div>
            </div>

            <div class="container-fluid animate-box">
                <div id="details_of_work_chart" class="row"></div>
            </div>

            <div class="container-fluid">
                <div class="col-md-12 col-sm-12">
                    <div id="downloaded_data" class="text-center animate-box"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php ob_start(); ?>
<script src="<?php echo SITE_URL ?>assets/js/lib/jsapi.js"></script>
<script src="<?php echo SITE_URL ?>assets/js/lib/leaflet.js"></script>
<script src="<?php echo SITE_URL ?>assets/js/lib/leaflet-omnivore.min.js"></script>
<script src="<?php echo SITE_URL ?>assets/js/lib/leaflet.label.js"></script>
<script src="<?php echo SITE_URL ?>assets/js/lib/highcharts.js"></script>
<script src="<?php echo SITE_URL ?>assets/home.js"></script>
<?php 
    $contentData = ob_get_contents(); 
    ob_end_clean ();
    $contentBuffer["BOTTOM"][] = $contentData;
?>

<?php require_once('_footer.php'); ?>