<?php require_once('_config.php'); ?>

<?php ob_start(); ?>
<style>.detailsOfWork, .workType{display:none;}</style>
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
            <!-- <div class="container">
                <div class="well">
                    <div class="text-center"><strong>पुणे महानगर पालिका निवडणूक २०१७ च्या उमेदवारांचे शपथ पत्र  &nbsp;&nbsp;<a class="btn btn-primary" href="https://goo.gl/forms/xCunWwufnTc4H5w93" target="_blank">Click here</a></strong></div>
                </div>
            </div> -->

            <div class="container animate-box">
                <div class="col-lg-12 col-md-12">
                    <div class="text-center"><strong>Select Prabhag area on the map</strong></div>
                    <div id="map"></div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="col-lg-12 col-md-12 text-center animate-box" style="margin-top: 15px;">
                    <a class="btn btn-primary" value="previous" onClick="nextPrabhag(-1)">Previous</a>&nbsp;
                    <select class="input-group-sm text-left" id="users" name="users" style="width:60%;" onchange="showUser(this.value)">
                        <?php
                            // $query = "SELECT Ward_ofc FROM wardoffice GROUP BY Ward_ofc ORDER BY Ward_ofc";
                            // $result = mysqli_query($con, $query);
                            // if ($result->num_rows > 0) {
                            //     while($row = mysqli_fetch_assoc($result)) { // Ward_ofc = '". $row["Ward_ofc"] ."'
                                    ?> <!-- <optgroup label='<?=$row["Ward_ofc"]; ?>'> --> <?php

                                    $query = "SELECT Prabhag_No, Prabhag_Name FROM wardoffice 
                                        WHERE 1 ORDER BY Prabhag_No, Prabhag_Name";
                                    $res = mysqli_query($con, $query);
                                    if ($res->num_rows > 0) {
                                        while($r = mysqli_fetch_assoc($res)) {
                                            ?> <option value='<?=$r["Prabhag_No"]; ?>'>Prabhag <?=$r["Prabhag_No"]; ?>: <?=$r["Prabhag_Name"]; ?></option> <?php
                                        }
                                    }
                                    ?> </optgroup> <?php
                            //     }
                            // }
                        ?>
                    </select>
                    <a class="btn btn-primary"  value="next" onClick="nextPrabhag(1)">Next</a>

                    <div id="prabhag_no_info" class="row"></div>
                    <div id="profile_info" class="row"></div>
                </div>
            </div>
            
            <div class="container-fluid animate-box">
            <div class='text-center'><h2><strong>TOP WORKS</strong></h2></div>
                <div id="details_of_work_chart" class=""></div>
            </div><br>

            <div class="container-fluid animate-box">
                <div class='text-center'><h2><strong>UTILIZATION OF WARD LEVEL FUNDS</strong></h2></div>
                <div id="details_of_work" class=""></div>
            </div><br>

            <div class="container-fluid">
                <div class="col-md-12 col-sm-12">
                    <div id="downloaded-data" class="text-center animate-box">
                        <div class='text-center'><h2>Download Data</h2></div>
                        <div id='downloadList' class='row nav'>
                            <a class='btn btn-primary' target='_self' rel='' 
                                href='uploads/data-files/Nagarsevak_Full_Data.zip' 
                                data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'
                            >All Prabhags</a>&nbsp
                            <a class='btn btn-primary' target='_self' rel='' 
                                href='original-rti-replies.php' 
                                data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'
                            >Original RTI Replies</a>
                        </div>
                    </div>
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