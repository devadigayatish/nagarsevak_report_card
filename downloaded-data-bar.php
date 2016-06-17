<?php
//This script loads the downloaded data bar

$q = intval($_GET['a']);
require_once('includes/db_connection.php');
$prabhag_num_A = $q . "A";
$prabhag_num_B = $q . "B";


echo "<div class='text-center'><h2>Download Data</h2></div>";
echo "<div id='downloadList'>";
        echo "<a class='btn btn-primary' target='_self' rel='' href='' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Overall</a>&nbsp";
        echo "<a class='btn btn-primary' target='_self' rel='' href='csv/" . $prabhag_num_A . ".csv' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Prabhag " . $prabhag_num_A . "</a>&nbsp";
        echo "<a class='btn btn-primary' target='_self' rel='' href='csv/" . $prabhag_num_B . ".csv' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Prabhag " . $prabhag_num_B . "</a>&nbsp";
        echo "<a class='btn btn-primary' target='_self' rel='' href='' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Original RTI Replies</a>&nbsp";
echo "</div>";
?>