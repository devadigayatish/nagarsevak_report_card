<?php
    define('SITE_URL', 'http://localhost/nagarsevak_report_card/');
    define('PROJ_DIR', dirname(__DIR__));

    define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'nrc');

    date_default_timezone_set('Asia/Kolkata');

    ini_set("memory_limit", -1);

    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, DATABASE);

    error_reporting(E_ERROR);

    $contentBuffer = [];

    function print_r_pre($data = []){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
?>