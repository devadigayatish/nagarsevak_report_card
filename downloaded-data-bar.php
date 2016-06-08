<!-- 
    File:           downloaded-data-bar.php
    Date:           03-06-2016

    This script loads the downloaded data bar.
-->
<?php
$q = intval($_GET['a']);
require_once('includes/db_connection.php');
$prabhag_num_A = $q . "A";
$prabhag_num_B = $q . "B";


echo "<h4 style='text-align: center;margin-top: 100px;'>Download Data:</h4>";
echo "<div id='downloadList' class='btn-group' style='text-align: center;'>";
        echo "<a class='btn btn-default ' target='_self' rel='' href='' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Overall</a>";
        echo "<a class='btn btn-default ' target='_self' rel='' href='csv/" . $prabhag_num_A . ".csv' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Prabhag" . $prabhag_num_A . "</a>";
        echo "<a class='btn btn-default ' target='_self' rel='' href='csv/" . $prabhag_num_B . ".csv' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Prabhag" . $prabhag_num_B . "</a>";
        echo "<a class='btn btn-default ' target='_self' rel='' href='' data-slimstat-clicked='false' data-slimstat-type='2' data-slimstat-tracking='false' data-slimstat-callback='false' data-slimstat-async='false'>Original RTI Replies</a>";
echo "</div>";
?>