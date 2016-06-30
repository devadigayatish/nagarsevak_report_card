<?php
$prabhag_no = $_GET['prabhag'];

//MySQL Database Connect
require_once('includes/db_connection.php');

echo "<div class='text-center'><h3><strong>Top Works for Prabhag ".$prabhag_no." </strong></h3></div>";
?>