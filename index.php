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

    <script>
            function showUser(str)
            {


                if (str == "")
                {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                else
                {
                    if (window.XMLHttpRequest)
                    {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp1 = new XMLHttpRequest();
                        xmlhttp2 = new XMLHttpRequest();
                        xmlhttp3 = new XMLHttpRequest();
                        xmlhttp4 = new XMLHttpRequest();
                        xmlhttp5 = new XMLHttpRequest();
                        xmlhttp6 = new XMLHttpRequest();
                        xmlhttp7 = new XMLHttpRequest();
                        xmlhttp8 = new XMLHttpRequest();

                    }
                    else
                    {
                        // code for IE6, IE5
                        xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp4 = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp5 = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp6 = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp7 = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp8 = new ActiveXObject("Microsoft.XMLHTTP"); 
                    }

                    xmlhttp1.onreadystatechange = function () {
                        if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200)
                        {

                            document.getElementById("prabhag_no_info").innerHTML = xmlhttp1.responseText;
                        }

                    };

                    xmlhttp2.onreadystatechange = function () {
                        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200)
                        {

                            document.getElementById("txtHint").innerHTML = xmlhttp2.responseText;
                        }

                    };
                    xmlhttp3.onreadystatechange = function () {
                        if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200)
                        {

                            document.getElementById("txtHint2").innerHTML = xmlhttp3.responseText;
                        }

                    };
                    xmlhttp4.onreadystatechange = function () {
                         if (xmlhttp4.readyState == 4 && xmlhttp4.status == 200)
                         {

                             document.getElementById("downloaded-data").innerHTML = xmlhttp4.responseText;
                         }
                     };
                    
                    // load piechart 1 for prabhag no A
                    xmlhttp5.onreadystatechange = function () {
                        if (xmlhttp5.readyState == 4 && xmlhttp5.status == 200)
                        {
                            draw_piechart(xmlhttp5.responseText, 'pie_chart_div1');
                        }
                    };
                    
                    // load piechart 2 for prabhag no B
                    xmlhttp6.onreadystatechange = function () {
                        if (xmlhttp6.readyState == 4 && xmlhttp6.status == 200) 
                        {
                            draw_piechart(xmlhttp6.responseText, 'pie_chart_div2');
                        }
                    };

                    xmlhttp7.onreadystatechange = function () {
                         if (xmlhttp7.readyState == 4 && xmlhttp7.status == 200)
                         {

                             document.getElementById("prabhag-A").innerHTML = xmlhttp7.responseText;
                         }
                     };

                     xmlhttp8.onreadystatechange = function () {
                         if (xmlhttp8.readyState == 4 && xmlhttp8.status == 200)
                         {

                             document.getElementById("prabhag-B").innerHTML = xmlhttp8.responseText;
                         }
                     };

                    xmlhttp1.open("GET", "prabhag-ward-ofc-info.php?q=" + str, true);
                    xmlhttp2.open("GET", "photo-info-table.php?n=" + str, true);
                    xmlhttp3.open("GET", "details-of-work-table.php?m=" + str, true);
                    xmlhttp4.open("GET", "downloaded-data-bar.php?a=" + str, true);
                    xmlhttp5.open("GET", "pie-chart-data.php?prabhag_no=" + str + "A", true);
                    xmlhttp6.open("GET", "pie-chart-data.php?prabhag_no=" + str + "B", true);
                    xmlhttp7.open("GET", "title-for-piechart.php?prabhag=" + str + "A", true);
                    xmlhttp8.open("GET", "title-for-piechart.php?prabhag=" + str + "B", true);


                    xmlhttp1.send();
                    xmlhttp2.send();
                    xmlhttp3.send();
                    xmlhttp4.send();
                    xmlhttp5.send();
                    xmlhttp6.send();
                    xmlhttp7.send();
                    xmlhttp8.send();

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
                                <li class="active">
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
            <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo SITE_URL;?>assets/images/home-image.jpg);">
               
            </div>

        </div>
        <!-- end:header-top -->
        <div id="fh5co-work-section" style="padding-top: 50px;">

            <div class="container">
                <div class="row text-center">
                    <h3>An Analysis of the Development Work undertaken every year by the Nagarsevaks of Pune City from the funds available through Nagarsevak Nidhi</h3>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="container animate-box">
                        <div class="col-md-6 col-sm-6">
                        <div class="text-center"><strong>Select Prabhag area on the map</strong></div>
                        <div id="map"></div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 text-center animate-box" style="margin-top: 15px;">
                        <?php
                            require_once('prabhag-dropdown.php');
                        ?>
                        <div id="prabhag_no_info" class="row"></div>
                        <div id="txtHint" class="row"></div>
                    </div>
                    </div>

                    <div class="container animate-box">
                        <div id="txtHint2" class="row"></div>
                    </div>

                    <div class="container animate-box">
                        <div class="row">
                        <div class="col-md-6 col-sm-6">
                        <div id="prabhag-A" class="row"></div>
                            <div id="pie_chart_div1" class="row">
                                <img src="<?php echo SITE_URL ?>assets/images/loader.gif"/>
                            </div> 
                        </div>
                        <div class="col-md-6 col-sm-6">
                        <div id="prabhag-B" class="row"></div>
                            <div id="pie_chart_div2" class="row">
                                <img src="<?php echo SITE_URL ?>assets/images/loader.gif"/>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="col-md-12 col-sm-12">
                        <div class="row">
                            <div id="downloaded-data" class="col-md-8 col-md-offset-2 text-center animate-box">                
                            </div>
                        </div>
                        </div>  
                    </div>

                </div>
            </div>
        </div>
        
        <?php
            require_once('footer.php');
        ?>
    

    </div>
    <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

    <!-- jQuery -->


    </body>

    <script>
    var DATAPATH = "uploads/";
    var wardMAX = 76;
    var wardColumn = 'prabhag_no';

    //########################################
    /* MAP: */
    var MBAttrib = '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors & <a href="https://www.mapbox.com/about/maps/">Mapbox</a>';
    var OsmIndia = L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {id: 'openstreetmap.1b68f018', attribution: MBAttrib});


    var map = L.map('map', {zoomControl: true,
        scrollWheelZoom: false,
        layers: [OsmIndia] //only add one! put the rest in the baselayers group
    }).setView([18.51, 73.86], 12);

    clickLayer = L.geoJson(null, {
        onEachFeature:
                function (feature, layer)
                {

                    var labelText = feature.properties['wardnum'] + ': ' + feature.properties['title'];
                    layer.bindLabel(labelText).addTo(map);
                    layer.setStyle({
                        weight: 1,
                        opacity: 1,
                        color: 'black',
                        dashArray: '0',
                        fillOpacity: 0.4,
                        fillColor: 'orange'
                    });

                    function highlightFeature(e)
                    {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 2,
                            color: '#fff',
                            dashArray: '0',
                            fillOpacity: 0.05
                        });
                        if (!L.Browser.ie && !L.Browser.opera)
                        {
                            layer.bringToFront();
                        }
                    }

                    function resetHighlight(e)
                    {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 1,
                            color: 'black',
                            dashArray: '0',
                            fillOpacity: 0.4
                        });
                    }

                    function prabhagChange(e)
                    {
                        showUser(feature.properties['wardnum']);
                        // from http://stackoverflow.com/a/10029429/4355695
                        var dropdown = document.getElementById("users");
                        for (var i = 0; i < dropdown.options.length; i++)
                        {
                            if (parseInt(dropdown.options[i].value) == parseInt(feature.properties['wardnum']))
                            {
                                dropdown.options[i].selected = true;
                                break;
                            }
                        }
                        var layer = e.target;
                        layer.setStyle({
                            weight: 2,
                            color: 'black',
                            dashArray: '0',
                            fillOpacity: 0.5,
                            fillColor:'yellow'
                        });
                        if (!L.Browser.ie && !L.Browser.opera)
                        {
                            layer.bringToFront();
                        }
                    }
                    layer.on({
                        //mouseover: highlightFeature,
                       // mouseout: resetHighlight,
                        click: prabhagChange
                    });

                } //END OF ON EACH FEATURE
    }); //END of wards geojson layer definition 
    omnivore.geojson(DATAPATH + 'pune-electoral-wards-more.geojson', null, clickLayer);
    clickLayer.addTo(map);

    // MAP PART OVER ######################################## ///

</script>
<!-- ===================================================================================================== -->
<script >
    var selected_dropdown = document.getElementById("users");
    var strUser = selected_dropdown.options[selected_dropdown.selectedIndex].value;
    showUser(strUser);
</script>
 <script>
function nextPrabhag(i) 
{
    var e = document.getElementById("users");
    e.selectedIndex +=i ;
    //loop-around from the top or bottom depending on increment/decrement
    if(e.selectedIndex == -1) {
        if(i>0) e.selectedIndex = 0; 
        else e.selectedIndex = e.length - 1;
    }
    var id = e.options[e.selectedIndex].value;
    console.log('Executing prabhagSelect(' + id + ')');
    showUser(id);
}
nextPrabhag(0);
 </script>
</html>
