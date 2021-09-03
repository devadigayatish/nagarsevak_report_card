<?php
    require_once('./../_config.php');

    $filename = "../visitors.txt";
    $fp = fopen($filename,"r");

    // $data = file_get_contents("../visitors.txt");

    if($fp && 1){

        $table = "visitors";
        $query = "TRUNCATE TABLE " . $table;
        $result = mysqli_query($con, $query);

        $index = 0;
        while(!feof($fp))
        {
            $data_row = fgets($fp);

            $data_row = trim($data_row);

            if($data_row){

                $query = "SELECT id FROM {$table} WHERE ip_data = '{$data_row}'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                if($row["id"])
                {
                    $query = "UPDATE {$table} SET ip_data = '{$data_row}', updated_on = '". date("Y-m-d H:i:s")."' 
                        WHERE id = " . $row["id"];
                    $result = mysqli_query($con, $query);
                }
                else{
                    $query = "INSERT INTO {$table} (ip_data, created_on) VALUES('{$data_row}', '". date("Y-m-d H:i:s")."')";
                    $result = mysqli_query($con, $query);
                    print_r_pre($query);
                }


            }
        }
    }