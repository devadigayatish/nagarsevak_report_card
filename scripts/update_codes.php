<?php
    require_once('./../_config.php');

    $dirCSV = './../uploads/data-files';

    // codes
    $filename = $dirCSV . "/Codes Final.csv";
    $fp = fopen($filename,"r");
    if($fp && 1){

        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            if(++$index == 1 || !$data_row){
                continue;
            }
            
            $op_data = [];
            $op_data["Code"] = $data_row[1] ? $data_row[1] : $data_row[0];
            if($data_row[2]){ $op_data["Work_Type"] = $data_row[2]; }

            if(!array_filter($op_data)){
                continue;
            }

            $set = [];

            $array_keys = $array_values = [];
            foreach ($op_data as $key => $value) {
                $set[] = $key . ' = "' . mysqli_real_escape_string($con, $value) . '"';
            }

            $query = "UPDATE codes SET " . implode(",", $set) . " WHERE Code = '" . mysqli_real_escape_string($con, $data_row[0]) . "'";
            $result = mysqli_query($con, $query);
            
            $query = "UPDATE work_details SET Code = '" . $op_data["Code"] . "' WHERE Code = '" . mysqli_real_escape_string($con, $data_row[0]) . "'";
            $result = mysqli_query($con, $query);

            $query . "<br>";
            print_r_pre($result);
        }

        fclose($fp);
        print_r_pre("---------------");
    }

?>


