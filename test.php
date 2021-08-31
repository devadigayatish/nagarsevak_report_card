<?php
    require_once('_config.php');

    $data = [];

    $query = "SELECT Prabhag_No, Nagarsevak_Name FROM nagarsevak WHERE Municipal_Committee = '' ORDER BY Nagarsevak_Name";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;

            echo $row["Nagarsevak_Name"] . " : " . $row["Prabhag_No"] . "<br>";
        }
    }
    print_r_pre($data);