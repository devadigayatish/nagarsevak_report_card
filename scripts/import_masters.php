<?php
    require_once('./../_config.php');

    $dirCSV = './../uploads/data-files/csv';

    $filename = $dirCSV . "/Expenses Master.csv";
    $fp = fopen($filename,"r");
    if($fp){
        print_r_pre($filename);
        fclose($fp);
        print_r_pre("---------------");
    }

    $filename = $dirCSV . "/Personal Info Master.csv";
    $fp = fopen($filename,"r");
    if($fp){
        print_r_pre($filename);
        import_personal_info($con, $fp);
        fclose($fp);
        print_r_pre("---------------");
    }

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

    function import_personal_info($con, $fp)
    {
        $table = "nagarsevak";
        $query = "TRUNCATE TABLE " . $table;
        $result = mysqli_query($con, $query);

        $table_wardoffice = "wardoffice";
        $query = "TRUNCATE TABLE " . $table_wardoffice;
        $result = mysqli_query($con, $query);

        $Last_Prabhag_No = 0;

        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            if(++$index == 1 || !$data_row){
                continue;
            }
            
            $data_row[0] = str_replace(" Ward Office", "", $data_row[0]);

            $op_data = [];
            $op_data["Ward_ofc"] = $data_row[0];
            $op_data["Prabhag_Name"] = $data_row[1];
            $op_data["Prabhag_No"] = $data_row[2] . $data_row[3];
            $op_data["Codes"] = $data_row[2] . $data_row[3];
            $op_data["Nagarsevak_Name"] = $data_row[4];
            if($data_row[5] && $data_row[5] == "M"){
                $op_data["Gender"] = "Male";
            }
            elseif($data_row[5] && $data_row[5] == "F"){
                $op_data["Gender"] = "Female";
            }
            $op_data["Party"] = $data_row[6];
            $op_data["Criminal_Records"] = $data_row[7];

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

            if($Last_Prabhag_No != $data_row[2]){

                $op_data = [];
                $op_data["Ward_ofc"] = $data_row[0];
                $op_data["Prabhag_Name"] = $data_row[1];
                $op_data["Prabhag_No"] = $data_row[2];

                if(!array_filter($op_data)){
                    continue;
                }

                $array_keys = $array_values = [];
                foreach ($op_data as $key => $value) {
                    $array_keys[] = $key;
                    $array_values[] = '"' . mysqli_real_escape_string($con, $value) . '"';
                }

                $query = "INSERT INTO " . $table_wardoffice . " (". implode(",", $array_keys) .") VALUES(". implode(",", $array_values) .")";
                $result = mysqli_query($con, $query);

                echo "-----" . "<br>";
                echo $query . "<br>";
                print_r_pre($result);

                $Last_Prabhag_No = $data_row[2];
            }
        }
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
            
            $total_attendance_per = [];
            foreach ($yrs as $key => $value) {
                $op_data = [];
                $op_data["Prabhag_No"] = $data_row[1];
                $op_data["Year"] = $value;
                $op_data["GB_Attendance"] = $data_row[$key + 2];
                $op_data["GB_Meetings"] = $total_meetings[$key];
                $total_attendance_per[] = $op_data["Atendance_Percentage"] = str_replace("%", "", $data_row[$key + 6]);

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

            $Avg_Attendance = array_sum($total_attendance_per)/400;
            $query = "UPDATE " . 'nagarsevak' . " SET Avg_Attendance = {$Avg_Attendance} WHERE Prabhag_No = '" . mysqli_real_escape_string($con, $data_row[1]) . "'";
            $result = mysqli_query($con, $query);

            echo $query . "<br>";
            print_r_pre($result);
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

            $total_que = [];
            foreach ($yrs as $key => $value) {
                $op_data = [];
                $total_que[] = $op_data["Questions"] = $data_row[$key + 2];

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
            
            $Total_Questions = array_sum($total_que);
            $query = "UPDATE " . 'nagarsevak' . " SET Total_Questions = {$Total_Questions} WHERE Prabhag_No = '" . mysqli_real_escape_string($con, $data_row[1]) . "'";
            $result = mysqli_query($con, $query);

            echo $query . "<br>";
            print_r_pre($result);
        }
    }
?>