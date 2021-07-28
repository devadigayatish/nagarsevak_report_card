<?php
    require_once('./../_config.php');

    $dirCSV = './../documents/data-files/csv';

    $table = "work_details";
    $query = "TRUNCATE TABLE " . $table;
    $result = mysqli_query($con, $query);

    $list = scandir($dirCSV);
    for ($i=0; $i < count($list); $i++) 
    { 
        $filename = $list[$i];
        if(!is_dir($filename))
        {
            if(!in_array($filename, [
                    "Expenses Master.csv", 
                    "Personal Info Master.csv", 
                    "Codes.csv", 
                    "Attendance Master.csv", 
                    "QuestionsAsked Master.csv"
                ])
            )
            {
                $file = $dirCSV . "/" . $filename;
                $fp = fopen($file,"r");
                if($fp)
                {
                    print_r_pre($file);
                    import_work_details($con, $fp);
                    fclose($fp);
                    print_r_pre("---------------");
                }
            }
        }
    }

    function import_work_details($con, $fp)
    {
        $table = "work_details";
        
        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgetcsv($fp);

            if(++$index <= 2 || !$data_row){
                continue;
            }

            $yr = explode("-", $data_row[1]);
            $yr[0] = str_pad($yr[0], 4, "20", STR_PAD_LEFT);
            $yr[1] = str_pad($yr[1], 4, "20", STR_PAD_LEFT);
            $yr = implode(" - ", $yr);

            $op_data = [];
            $op_data["Prabhag_No"] = $data_row[0];
            $op_data["Year"] = $yr;
            $op_data["Details_Of_Work"] = $data_row[3];
            $op_data["Amount"] = str_replace(",", "", $data_row[4]);
            $op_data["Code"] = $data_row[5];

            if(!$op_data["Prabhag_No"]){
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
?>