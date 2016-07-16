<?php
//This script loads the downloaded data bar

$q = intval($_GET['a']);
require_once('includes/db_connection.php');
$prabhag_num_A = $q . "A";
$prabhag_num_B = $q . "B";


echo "<div class='text-center'><h2>Download Data</h2></div>";
echo "<div id='downloadList' class='row nav'>";
        echo "<a class='btn btn-primary' target='_self' rel='' href='uploads/Nagarsevak_Full_Data.zip' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Overall</a>&nbsp";
        echo "<a class='btn btn-primary' target='_self' rel='' href='csv/" . $prabhag_num_A . ".csv' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Prabhag " . $prabhag_num_A . "</a>&nbsp";
        echo "<a class='btn btn-primary' target='_self' rel='' href='csv/" . $prabhag_num_B . ".csv' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Prabhag " . $prabhag_num_B . "</a>&nbsp";
        echo "<a class='btn btn-primary' target='_self' rel='' href='original-rti-replies.php' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Original RTI Replies</a>&nbsp";
        echo "<a class='btn btn-primary' target='_blank' rel='' href='uploads/Nagarsevak_Contact_Info.pdf' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Nagarsevak Contact Info</a>&nbsp";
echo "</div>";
?>