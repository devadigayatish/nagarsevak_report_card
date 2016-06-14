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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Guardian &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

  <!-- 
    //////////////////////////////////////////////////////

    FREE HTML5 TEMPLATE 
    DESIGNED & DEVELOPED by FREEHTML5.CO
        
    Website:        http://freehtml5.co/
    Email:          info@freehtml5.co
    Twitter:        http://twitter.com/fh5co
    Facebook:       https://www.facebook.com/fh5co

    //////////////////////////////////////////////////////
     -->

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
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
    


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

                    xmlhttp1.open("GET", "prabhag-ward-ofc-info.php?q=" + str, true);
                    xmlhttp2.open("GET", "photo-info-table.php?n=" + str, true);
                    xmlhttp3.open("GET", "details-of-work-table.php?m=" + str, true);
                    xmlhttp4.open("GET", "downloaded-data-bar.php?a=" + str, true);                   
                    xmlhttp5.open("GET", "pie-chart-data.php?prabhag_no=" + str + "A", true);
                    xmlhttp6.open("GET", "pie-chart-data.php?prabhag_no=" + str + "B", true);

                    xmlhttp1.send();
                    xmlhttp2.send();
                    xmlhttp3.send();
                    xmlhttp4.send();
                    xmlhttp5.send();
                    xmlhttp6.send();
                }
            }
        </script>

    </head>
    <body>
    <?php
        require_once('header2.php');
    ?>

        

        <div class="fh5co-hero">
            <div class="fh5co-overlay"></div>
            <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo SITE_URL;?>assets/images/home-image.jpg);">
               
            </div>

        </div>
        <!-- end:header-top -->
        <div id="fh5co-work-section" style="padding-top: 50px;">
            
            <div class="container">
                <div class="row">
                <div class="container">
                <div class="col-md-6 col-sm-6">
                    <div id="map"></div>
                </div>
                    <div class="col-md-6 col-sm-6 text-center">
                     <a class="btn btn-primary" value="previous" onClick="nextPrabhag(-1)">Previous</a>&nbsp;
                        <select class="input-group-sm" id="users" name="users" style="width:60%;"onchange="showUser(this.value)">
                        <optgroup label='Aundh'>
                            <option value='35'>Prabhag 35: Deenanath Mangeshkar Hospital</option>
                            <option value='6'>Prabhag 6: Bopodi Gaonthan</option>
                            <option value='7'>Prabhag 7: Pune University</option>
                            <option value='8'>Prabhag 8: Aundh ITI</option>
                            <option value='9'>Prabhag 9: Baner Balewadi</option>
                            <option value='10'>Prabhag 10: Pashan Sutarwadi</option>
                        </optgroup>
                        <optgroup label='Bhawani Peth'>
                            <option value='39'>Prabhag 39: KEM Hospital</option>
                            <option value='47'>Prabhag 47: Arunkumar Vaidya Stadium</option>
                            <option value='48'>Prabhag 48: Palkhi Vithoba Mandir</option>
                            <option value='59'>Prabhag 59: Kashewadi Gurunanaknagar</option>
                            <option value='60'>Prabhag 60: Mahatma Phule Peth Kashewadi Bhawani Peth</option>
                            <option value='65'>Prabhag 65: Ghorpade Garden</option>
                        </optgroup>
                        <optgroup label='Bibvewadi'>
                            <option value='64'>Prabhag 64: Salisbury Park</option>
                            <option value='70'>Prabhag 70: Bibvewadi and KK Market</option>
                            <option value='71'>Prabhag 71: Shivaji Market, Gultekdi</option>
                            <option value='72'>Prabhag 72: Upper Indiranagar</option>
                        </optgroup>
                        <optgroup label='Dhankawadi'>
                            <option value='69'>Prabhag 69: Dhankawadi Padmavati</option>
                            <option value='73'>Prabhag 73: Balajinagar Vaibhavnagar</option>
                            <option value='74'>Prabhag 74: Bharati Vidyapeeth</option>
                            <option value='75'>Prabhag 75: Katraj Dairy</option>
                            <option value='76'>Prabhag 76: Katraj Maulinagar</option>
                        </optgroup>
                        <optgroup label='Dhole Patil Road'>
                            <option value='20'>Prabhag 20: Magarpatta City</option>
                            <option value='21'>Prabhag 21: Koregaon Park</option>
                            <option value='22'>Prabhag 22: Naidu Hospital</option>
                            <option value='23'>Prabhag 23: Junabazaar Kumbharwada</option>
                            <option value='40'>Prabhag 40: Collectorate</option>
                        </optgroup>
                        <optgroup label='Ghole Road'>
                            <option value='11'>Prabhag 11: Janwadi-Gokhalenagar</option>
                            <option value='12'>Prabhag 12: Model Colony</option>
                            <option value='13'>Prabhag 13: Narveer Tanajiwadi</option>
                            <option value='24'>Prabhag 24: Balgandharva</option>
                            <option value='25'>Prabhag 25: Wadarwadi-Pandavnagar</option>
                            <option value='36'>Prabhag 36: Kamla Nehru Park</option>
                        </optgroup>
                        <optgroup label='Hadapsar'>
                            <option value='42'>Prabhag 42: Lohiya Garden, Vaiduwadi</option>
                            <option value='43'>Prabhag 43: Sadhana Vidyalay</option>
                            <option value='44'>Prabhag 44: Gliding Centre</option>
                            <option value='45'>Prabhag 45: Mohammadwadi</option>
                        </optgroup>
                        <optgroup label='Kasba Vishrambagwada'><option value='37'>Prabhag 37: Shaniwarwada</option>
                            <option value='38'>Prabhag 38: Kasba Peth</option>
                            <option value='49'>Prabhag 49: Dr. Kotnis Hospital</option>
                            <option value='50'>Prabhag 50: Mahatma Phule Mandai</option>
                            <option value='51'>Prabhag 51: Tilak Smarak Mandir</option>
                            <option value='58'>Prabhag 58: Mahatma Phule Smarak</option>
                        </optgroup>
                        <optgroup label='Kondhwa Wanavdi'><option value='41'>Prabhag 41: Sopan Baug - Vikasnagar</option>
                            <option value='46'>Prabhag 46: Wanavdi - Ramtekdi</option>
                            <option value='61'>Prabhag 61: Kedar Vasti - Azadnagar</option>
                            <option value='62'>Prabhag 62: Kondhwa Budruk, Gokulnagar</option>
                            <option value='63'>Prabhag 63: Bhagyodaynagar</option>
                        </optgroup>
                        <optgroup label='Kothrud'>
                            <option value='26'>Prabhag 26: MIT - Kelewadi</option>
                            <option value='27'>Prabhag 27: Sutardara-Kishkindha Naga</option>
                            <option value='28'>Prabhag 28: ARDE - Mhatobanagar</option>
                            <option value='29'>Prabhag 29: Bavdhan Khurd</option>
                            <option value='34'>Prabhag 34: Gujrat Colony</option>
                        </optgroup>
                        <optgroup label='Nagar Road'>
                            <option value='2'>Prabhag 2: Kharadi Infotech Park</option>
                            <option value='3'>Prabhag 3: Vimannagar Sanjay Park</option>
                            <option value='4'>Prabhag 4: Nagpur Chawl</option>
                            <option value='17'>Prabhag 17: Agakhan Palace</option>
                            <option value='18'>Prabhag 18: Vadgaon Sheri</option>
                            <option value='19'>Prabhag 19: Vadgaon Sheri - Ganesh Nagar</option>
                        </optgroup>
                        <optgroup label='Sahakarnagar'>
                            <option value='57'>Prabhag 57: Kadakmal Ali Hirabaug</option>
                            <option value='66'>Prabhag 66: Adinath Society</option>
                            <option value='67'>Prabhag 67: Aranyeshwar Taware Colony</option>
                            <option value='68'>Prabhag 68: Sahakarnagar - Taljai</option>
                        </optgroup>
                        <optgroup label='Tilak Road'>
                            <option value='52'>Prabhag 52: Vaikunth Smashanbhoomi</option>
                            <option value='53'>Prabhag 53: PL Deshpande Udyan</option>
                            <option value='54'>Prabhag 54: Suncity Wadgaon Budruk</option>
                            <option value='55'>Prabhag 55: Janata Vasahat</option>
                            <option value='56'>Prabhag 56: Sarasbaug Parvati</option>
                        </optgroup>
                        <optgroup label='Warje Karvenagar'>
                            <option value='30'>Prabhag 30: Popularnagar Malwadi</option>
                            <option value='31'>Prabhag 31: Shivane - Warje - Ramnagar</option>
                            <option value='32'>Prabhag 32: Karvenagar - Gosavivasti</option>
                            <option value='33'>Prabhag 33: Dahanukar Colony</option>

                        </optgroup>
                        <optgroup label='Yerawda - Sangamwadi'>
                            <option value='1'>Prabhag 1: Lohegaon Airport</option>
                            <option value='5'>Prabhag 5: Vishrantwadi Mhaske Vasti</option>
                            <option value='14'>Prabhag 14: Deccan College</option>
                            <option value='15'>Prabhag 15: Rajguru Road</option>
                            <option value='16'>Prabhag 16: Subhashnagar</option>
                        </optgroup>
                    </select>
                    <a class="btn btn-primary"  value="next" onClick="nextPrabhag(1)">Next</a>
                    <br/>
                    <div id="prabhag_no_info"></div>
                <div id="txtHint"></div>
                    
                    </div>
                    


                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="fh5co-grid animate-box" style="background-image: url(<?php echo SITE_URL;?>assets/images/work-3.jpg);">
                            <a class="image-popup text-center" href="#">
                                <div class="prod-title">
                                    <h3>Don’t Just Stand There</h3>
                                    <span>Illustration, Print</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="fh5co-grid animate-box" style="background-image: url(<?php echo SITE_URL;?>assets/images/work-4.jpg);">
                            <a class="image-popup text-center" href="#">
                                <div class="prod-title">
                                    <h3>Don’t Just Stand There</h3>
                                    <span>Illustration, Print</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="fh5co-grid animate-box" style="background-image: url(<?php echo SITE_URL;?>assets/images/work-4.jpg);">
                            <a class="image-popup text-center" href="#">
                                <div class="prod-title">
                                    <h3>Don’t Just Stand There</h3>
                                    <span>Illustration, Print</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="fh5co-grid animate-box" style="background-image: url(<?php echo SITE_URL;?>assets/images/work-3.jpg);">
                            <a class="image-popup text-center" href="#">
                                <div class="prod-title">
                                    <h3>Don’t Just Stand There</h3>
                                    <span>Illustration, Print</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fh5co-work-section -->
        
        <!-- fh5co-content-section -->
        <div id="fh5co-blog-section" class="fh5co-section-gray">
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="fh5co-blog animate-box">
                            <a href="#"><img class="img-responsive" src="<?php echo SITE_URL;?>assets/images/blog-1.jpg" alt=""></a>
                            <div class="image-popup" href="#">
                                <div class="prod-title">
                                    <h3><a href=""#>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
                                    <span class="posted_by">Posted by: Admin</span>
                                    <span class="comment"><a href="">21<i class="icon-bubble22"></i></a></span>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="fh5co-blog animate-box">
                            <a href="#"><img class="img-responsive" src="<?php echo SITE_URL;?>assets/images/blog-2.jpg" alt=""></a>
                            <div class="image-popup" href="#">
                                <div class="prod-title">
                                    <h3><a href=""#>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
                                    <span class="posted_by">Posted by: Admin</span>
                                    <span class="comment"><a href="">21<i class="icon-bubble22"></i></a></span>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="fh5co-blog animate-box">
                            <a href="#"><img class="img-responsive" src="<?php echo SITE_URL;?>assets/images/blog-3.jpg" alt=""></a>
                            <div class="image-popup" href="#">
                                <div class="prod-title">
                                    <h3><a href=""#>45 Minimal Worksspace Rooms for Web Savvys</a></h3>
                                    <span class="posted_by">Posted by: Admin</span>
                                    <span class="comment"><a href="">21<i class="icon-bubble22"></i></a></span>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                        <h3>Download Data</h3>
                        <a class='btn btn-primary ' target='_self' rel='' href='' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Overall</a>
                        <a class='btn btn-primary ' target='_self' rel='' href='' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Prabhag A</a>
                        <a class='btn btn-primary ' target='_self' rel='' href='' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Prabhag B</a>
                        <a class='btn btn-primary ' target='_self' rel='' href='' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Original RTI Replies</a>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- fh5co-blog-section -->
        <?php
            require_once('footer2.php');
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
                    }
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight,
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







