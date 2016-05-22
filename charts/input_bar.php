<?php
//connection
//$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");
//====================================================================================

//$prabhag_num = $q."A";

$sql="SELECT * FROM `finaltable` where Prabhag_No = '21B' ORDER BY Year ORDER BY Amount DESC ";
$result = mysqli_query($con,$sql);
echo "hiiii";
print_r($result);
mysqli_close($con);
?>