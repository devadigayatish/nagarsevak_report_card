<?php
    require_once('./../_config.php');

    $dirCSV = './../uploads/data-files/csv';

    // codes
    $filename = $dirCSV . "/Codes.csv";
    $fp = fopen($filename,"r");
    if($fp && 1){
                
        $table = "codes";
        $query = "TRUNCATE TABLE " . $table;
        $result = mysqli_query($con, $query);

        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            if(++$index == 1 || !$data_row){
                continue;
            }
            
            $op_data = [];
            $op_data["Work_Type"] = $data_row[7];
            $op_data["Code"] = $data_row[6];

            if(!array_filter($op_data)){
                continue;
            }

            $array_keys = $array_values = [];
            foreach ($op_data as $key => $value) {
                $array_keys[] = $key;
                $array_values[] = '"' . mysqli_real_escape_string($con, $value) . '"';
            }

            $query = "INSERT INTO " . $table . " (". implode(",", $array_keys) .") VALUES(". implode(",", $array_values) .")";
            $result = mysqli_query($con, $query);

            // echo $query . "<br>";
            // print_r_pre($result);
        }

        fclose($fp);
        print_r_pre("---------------");
    }

    // ward / prabhag / nagarsevak
    $filename = $dirCSV . "/Attendance Master.csv";
    $fp = fopen($filename,"r");
    if($fp && 1){

        $table_wardoffice = "wardoffice";
        $query = "TRUNCATE TABLE " . $table_wardoffice;
        $result = mysqli_query($con, $query);

        $tbl_nagarsevak = "nagarsevak";
        $query = "TRUNCATE TABLE " . $tbl_nagarsevak;
        $result = mysqli_query($con, $query);

        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            $index++;

            if(!$data_row[0] || $index <= 2) continue;

            $Prabhag_No = (int)$data_row[1];

            $query = "SELECT Prabhag_No FROM {$table_wardoffice} WHERE Prabhag_No = {$Prabhag_No}";
            $result = mysqli_query($con, $query);
            if(!($result->num_rows))
            {
                $data_row[0] = str_replace(" Ward Office", "", $data_row[0]);

                $op_data = [];
                $op_data["Ward_ofc"] = $data_row[0];
                $op_data["Prabhag_No"] = $Prabhag_No;
                $op_data["Prabhag_Name"] = $data_row[2];
                if(array_filter($op_data))
                {
                    $array_keys = $array_values = [];
                    foreach ($op_data as $key => $value) {
                        $array_keys[] = $key;
                        $array_values[] = '"' . mysqli_real_escape_string($con, $value) . '"';
                    }

                    $query = "INSERT INTO " . $table_wardoffice . " (". implode(",", $array_keys) .") VALUES(". implode(",", $array_values) .")";
                    $result = mysqli_query($con, $query);
                }
            }

            $op_data = [];
            $op_data["Ward_ofc"] = $data_row[0];
            $op_data["Prabhag_No"] = $data_row[1];
            $op_data["Codes"] = $data_row[1];
            $op_data["Prabhag_Name"] = $data_row[2];
            $op_data["Nagarsevak_Name"] = $data_row[3];
            $op_data["Party"] = $data_row[4];

            $array_keys = $array_values = [];
            foreach ($op_data as $key => $value) {
                $array_keys[] = $key;
                $array_values[] = '"' . mysqli_real_escape_string($con, $value) . '"';
            }

            $query = "INSERT INTO " . $tbl_nagarsevak . " (". implode(",", $array_keys) .") VALUES(". implode(",", $array_values) .")";
            $result = mysqli_query($con, $query);
        }
    }

    // attendance
    $filename = $dirCSV . "/Attendance Master.csv";
    $fp = fopen($filename,"r");
    if($fp && 1){

        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            $index++;

            if(!$data_row[0] || $index <= 2) continue;

            $tbl_nagarsevak = "nagarsevak";
            $query = "UPDATE " . $tbl_nagarsevak . " SET Avg_Attendance = ". (float)$data_row[15] 
                ." WHERE Prabhag_No = '" . mysqli_real_escape_string($con, $data_row[1]) . "'";
            $result = mysqli_query($con, $query);
        }
    }

    // questions
    $filename = $dirCSV . "/QuestionsAsked Master.csv";
    $fp = fopen($filename,"r");
    if($fp && 1){

        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            $index++;

            if(!$data_row[0] || $index <= 2) continue;

            $tbl_nagarsevak = "nagarsevak";
            $query = "UPDATE " . $tbl_nagarsevak . " SET Total_Questions = ". (float)$data_row[9] 
                ." WHERE Prabhag_No = '" . mysqli_real_escape_string($con, $data_row[1]) . "'";
            $result = mysqli_query($con, $query);
        }
    }

    echo "Done.." . mt_rand();
?>