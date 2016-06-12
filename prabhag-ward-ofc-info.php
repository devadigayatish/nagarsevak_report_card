<?php

//connection
$q = intval($_GET['q']);

//MySQL Database Connect
require_once('includes/db_connection.php');

//====================================================================================
{ // prabhag name info
    $prabhag_num = $q . "A";

    $sql = "SELECT Prabhag_Name,Ward_ofc FROM nagarsevak WHERE Prabhag_No = '" . $prabhag_num . "' ";

    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {

        echo "<strong>Prabhag : " . $row['Prabhag_Name'] . "</strong>";
        echo "<br/>";
        echo "<strong>Ward Office : " . $row['Ward_ofc'] . "</strong>";
    }
}

mysqli_close($con);
?>