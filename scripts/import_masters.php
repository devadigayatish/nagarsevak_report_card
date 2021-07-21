<?php
    require_once('./../_config.php');

    $dirCSV = './../documents/data-files/csv';

    $filename = $dirCSV . "/Expenses Master.csv";
    // $fp = fopen($filename,"r");
    // if($fp){
    //     print_r_pre($filename);
    //     fclose($fp);
    //     print_r_pre("---------------");
    // }

    $filename = $dirCSV . "/Codes.csv";
    $fp = fopen($filename,"r");
    if($fp){
        print_r_pre($filename);
        import_code($con, $fp);
        fclose($fp);
        print_r_pre("---------------");
    }

    $filename = $dirCSV . "/Attendance Master.csv";
    $fp = fopen($filename,"r");
    if($fp){
        print_r_pre($filename);
        import_attendance($con, $fp);
        fclose($fp);
        print_r_pre("---------------");
    }

    $filename = $dirCSV . "/QuestionsAsked Master.csv";
    $fp = fopen($filename,"r");
    if($fp){
        print_r_pre($filename);
        import_que_asked($con, $fp);
        fclose($fp);
        print_r_pre("---------------");
    }


    function import_code($con, $fp)
    {
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

            echo $query . "<br>";
            print_r_pre($result);
        }
    }

    function import_attendance($con, $fp)
    {
        $table = "attendance";
        $query = "TRUNCATE TABLE " . $table;
        $result = mysqli_query($con, $query);

        $total_meetings = [];
        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            $index++;

            $yrs = [
                "2017 - 2018",	
                "2018 - 2019",	
                "2019 - 2020",	
                "2020 - 2021",
            ];

            if($index == 1){
                $total_meetings = [];
                foreach ($yrs as $key => $value) {
                    $total_meetings[] = $data_row[$key + 6];
                }
            }

            if($index <= 2){
                continue;
            }

            if(!$data_row || !array_filter($data_row)){
                continue;
            }
            
            foreach ($yrs as $key => $value) {
                $op_data = [];
                $op_data["Prabhag_No"] = $data_row[1];
                $op_data["Year"] = $value;
                $op_data["GB_Attendance"] = $data_row[$key + 2];
                $op_data["GB_Meetings"] = $total_meetings[$key];
                $op_data["Atendance_Percentage"] = str_replace("%", "", $data_row[$key + 6]);

                $array_keys = $array_values = [];
                foreach ($op_data as $key => $value) {
                    $array_keys[] = $key;
                    $array_values[] = '"' . mysqli_real_escape_string($con, $value) . '"';
                }

                $query = "INSERT INTO " . $table . " (". implode(",", $array_keys) .") VALUES(". implode(",", $array_values) .")";
                $result = mysqli_query($con, $query);

                echo $query . "<br>";
                print_r_pre($result);
            }
        }
    }

    function import_que_asked($con, $fp)
    {
        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            $index++;

            $yrs = [
                "2017 - 2018",	
                "2018 - 2019",	
                "2019 - 2020",	
                "2020 - 2021",
            ];

            if($index <= 2){
                continue;
            }

            if(!$data_row || !array_filter($data_row)){
                continue;
            }
            
            $table = "attendance";

            foreach ($yrs as $key => $value) {
                $op_data = [];
                $op_data["Questions"] = $data_row[$key + 2];

                $set_data = [];
                foreach ($op_data as $k => $val) {
                    $set_data[] = $k . ' = "' . mysqli_real_escape_string($con, $val) . '"';
                }

                $where = [];
                $where[] = "Prabhag_No = '" . mysqli_real_escape_string($con, $data_row[1]) . "'";
                $where[] = "Year = '" . mysqli_real_escape_string($con, $value) . "'";

                $query = "UPDATE " . $table . " SET ". implode(", ", $set_data) ." WHERE ". implode(" AND ", $where);
                $result = mysqli_query($con, $query);

                echo $query . "<br>";
                print_r_pre($result);
            } 
        }
    }
?>