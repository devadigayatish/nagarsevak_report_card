<?php
    require_once('_config.php');

    $data = [];

    $query = "SELECT Code, SUM(Amount) FROM work_details GROUP BY Code ORDER BY Code";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
    }
    print_r_pre($data);