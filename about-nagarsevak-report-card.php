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
                                    <li class="active"><a href="<?php echo SITE_URL ?>about-nagarsevak-report-card.php">About NRC</a></li>
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
                            <p style="font-family:Mangal,Verdana; text-align: justify;" >
                                सप्रेम नमस्कार,
                                <br><br>
                                नगरसेवकांचं प्रगतीपुस्तक आज तुमच्या हातात देताना आम्हाला अतिशय आनंद होतो आहे. २०१२ मध्ये आम्ही पहिल्यांदा हा उपक्रम राबवला. त्यावेळी महापालिकेच्या निवडणुका तोंडावर होत्या आणि शासनव्यवस्था सुधारावी या उद्देशाने कार्यरत असणाऱ्या आपल्या परिवर्तन सारख्या संस्थेने मतदारांमध्ये जागरूकता वाढवण्याच्या दिशेने काम करायला हवं हा विचार पुढे आला. त्या मंथनातूनच या कामाला सुरुवात झाली. सजग मतदार (informed electorate) ही प्रगल्भ लोकशाहीसाठी पूर्वअट आहे. मतदान करताना केवळ जाहिरातबाजी आणि घोषणांच्या भपक्यात मतदाराने वाहवत जाऊ नये, तर उमेदवाराने आधी केलेल्या कामाचा पूर्ण आढावा घ्यावा हे लोकशाहीत अपेक्षित आहे. आणि म्हणूनच नगरसेवकाने निवडून आल्यापासून काय काय केले याचा एक वस्तुनिष्ठ लेखाजोखाआम्ही तयार केला. पुणे महापालिकेत ७६ वॉर्ड (म्हणजेच प्रभाग) आहेत. या प्रत्येक वॉर्डमध्ये २ नगरसेवक आहेत. या दोनपैकी किमान एक व्यक्ती महिला असते. असे एकूण १५२ नगरसेवक-नगरसेविका पुणे महापालिकेत पुणेकर मतदारांनी फेब्रुवारी-मार्च २०१२ मध्ये निवडून दिले आहेत. त्यांच्या कामाविषयीचा १ एप्रिल २०१२ ते ३१ मार्च २०१६ या चार वर्षांचाहा अहवाल आहे.
                                <br>
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