<?php
    require_once('../_config.php');

    $q = $_GET["q"];

    $function_name = $q;
    echo call_user_func_array($function_name, array($con));

    function political_party_wise_number_of_nagarsevaks($con)
    {
        $query = "SELECT Party, COUNT(Party) AS No_of_Nagarsevak FROM nagarsevak GROUP BY Party";
        $result = mysqli_query($con, $query);

        if( $result->num_rows > 0)
        {
            $json_data = [];
            $json_data[] = ['Party', 'No of Nagarsevaks'];

            while( $row = mysqli_fetch_assoc($result) ){
                $json_data[] = [
                    $row["Party"],
                    (float)$row["No_of_Nagarsevak"],
                ];
            }
            return json_encode($json_data);
        }
        else
        {
            return json_encode([]);
        }
    }

    function top_5_works_per_year($con)
    {
        // $details_of_work_data = [];

        $details_of_work = [];
        $query = "SELECT Code, SUM(Amount) FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC LIMIT 5";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($result)) {
            // print_r_pre($row);
            // $details_of_work_data[] = $row;
            $details_of_work[] = $row['Code'];
        }

        $yrs = ['2017 - 2018', '2018 - 2019', '2019 - 2020', '2020 - 2021'];

        $amount = [];
        for ($i=0; $i < count($details_of_work); $i++) { 
            $amount[$i] = [];
            $query = "SELECT Year, SUM(Amount) AS Amount FROM `work_details` 
                        WHERE  Code = '" . $details_of_work[$i] . "' GROUP BY Year";

            $result = mysqli_query($con, $query);
            if($result->num_rows > 0){
                $data = [];
                while($row = mysqli_fetch_assoc($result)) {
                    $data[$row["Year"]] = $row['Amount'];
                }
                $key_array = array_keys($data);

                foreach($yrs as $yr){
                    if(in_array($yr, $key_array)){
                        $amount[$i][] = $data[$yr];
                    }
                    else{
                        $amount[$i][] = 0;
                    }
                }
            }
        }
        
        $final = [];
        for ($i=0; $i < count($details_of_work); $i++) { 
            $row = [];
            for ($j = 0; $j < count($details_of_work); $j++) {
                $row[] = (float)$amount[$j][$i];
            }
            $final[$i] = $row;
        }

        $json_data = [];
        $prepend = ['Year', '2017-2018', '2018-2019', '2019-2020', '2020-2021'];

        $row = $details_of_work;
        array_unshift($row, array_shift($prepend));
        $json_data[] = $row;

        for($i=0; $i<4; $i++)
        {
            $row = $final[$i];
            array_unshift($row, array_shift($prepend));
            $json_data[] = $row;
        }
        return json_encode($json_data);
    }

    function overall_expenditure_pattern($con)
    {
        $details_of_work = [];
        $amount = [];
        $query = "SELECT Code, SUM(Amount) AS Amount FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($result)) {
            $details_of_work[] = $row['Code'];
            $amount[] = $row['Amount'];
        }

        $combine_array = array_combine($details_of_work, $amount);
        $total_amount = array_sum($amount);
        $remaining_values = array_slice($amount, 10);
        $remaining_total = array_sum($remaining_values);
        $chart_array = array();
        for($i = 0; $i < 10; $i++)
        {
            $chart_array[$i][0] = $details_of_work[$i];
            $chart_array[$i][1] = (float)$amount[$i];
        }
        $chart_array[10][0] = "Others";
        $chart_array[10][1] = (float)$remaining_total;

        $json_data = [];
        $json_data[] = ['PL', 'Ratings'];
        for($i=0; $i<=10; $i++)
        {
            $json_data[] = $chart_array[$i];
        }

        return json_encode($json_data);
    }

    function expenditure_pattern_by_male_nagarsevaks($con)
    {
        $query = "SELECT w.Code as Details_Of_Work, SUM(w.Amount) AS Amount 
            FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No 
            WHERE n.Gender = 'M' 
            GROUP BY n.Gender , w.Code 
            ORDER BY SUM(w.Amount) DESC";
        $result = mysqli_query($con, $query);

        if( $result->num_rows > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
                $details_of_work[] = $row['Details_Of_Work'];
                $amount[] = $row['Amount'];
            }

            $combine_array = array_combine($details_of_work, $amount);
            $total_amount = array_sum($amount);
            $remaining_values = array_slice($amount, 10);
            $remaining_total = array_sum($remaining_values);
            $chart_array = array();
            for($i = 0; $i < 10; $i++)
            {
                $chart_array[$i][0] = $details_of_work[$i];
                $chart_array[$i][1] = (float)$amount[$i];
            }
            $chart_array[10][0] = "Others";
            $chart_array[10][1] = (float)$remaining_total;

            $json_data = [];
            $json_data[] = ['PL', 'Ratings'];
            for($i=0; $i<=10; $i++)
            {
                $json_data[] = $chart_array[$i];
            }

            return json_encode($json_data);
        }
        else
        {
            return json_encode([]);
        }
    }

    function expenditure_pattern_by_female_nagarsevaks($con)
    {
        $query = "SELECT w.Code as Details_Of_Work, SUM(w.Amount) AS Amount 
            FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No 
            WHERE n.Gender = 'F' 
            GROUP BY n.Gender , w.Code 
            ORDER BY SUM(w.Amount) DESC";
        $result = mysqli_query($con, $query);

        if( $result->num_rows > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
                $details_of_work[] = $row['Details_Of_Work'];
                $amount[] = $row['Amount'];
            }

            $combine_array = array_combine($details_of_work, $amount);
            $total_amount = array_sum($amount);
            $remaining_values = array_slice($amount, 10);
            $remaining_total = array_sum($remaining_values);
            $chart_array = array();
            for($i = 0; $i < 10; $i++)
            {
                $chart_array[$i][0] = $details_of_work[$i];
                $chart_array[$i][1] = (float)$amount[$i];
            }
            $chart_array[10][0] = "Others";
            $chart_array[10][1] = (float)$remaining_total;

            $json_data = [];
            $json_data[] = ['PL', 'Ratings'];
            for($i=0; $i<=10; $i++)
            {
                $json_data[] = $chart_array[$i];
            }

            return json_encode($json_data);
        }
        else
        {
            return json_encode([]);
        }
    }

    function expenditure_pattern_party_wise($con)
    {
        $data = [];

        $details_of_work = [];
        $amount = [];
        $query = "SELECT Party, Code, SUM(Amount) AS Amount FROM `work_details`
            LEFT JOIN nagarsevak ON nagarsevak.Prabhag_No = work_details.Prabhag_No 
            WHERE nagarsevak.Party <> ''
            GROUP BY nagarsevak.Party, work_details.Code ORDER BY SUM(Amount) DESC";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($result)) {
            $data[$row['Party']][] = $row;
        }

        $response = [];
        foreach($data as $party => $data_row)
        {

            $details_of_work = [];
            $amount = [];

            foreach ($data_row as $key => $row) {
                $details_of_work[] = $row['Code'];
                $amount[] = $row['Amount'];
            }

            $combine_array = array_combine($details_of_work, $amount);
            $total_amount = array_sum($amount);
            $remaining_values = array_slice($amount, 10);
            $remaining_total = array_sum($remaining_values);
            $chart_array = array();
            for($i = 0; $i < 10; $i++)
            {
                $chart_array[$i][0] = $details_of_work[$i];
                $chart_array[$i][1] = (float)$amount[$i];
            }
            $chart_array[10][0] = "Others";
            $chart_array[10][1] = (float)$remaining_total;

            $json_data = [];
            $json_data[] = ['PL', 'Ratings'];
            for($i=0; $i<=10; $i++)
            {
                $json_data[] = $chart_array[$i];
            }
            $response[] = [
                "party" => $party,
                "data" => $json_data
            ];
        }

        return json_encode($response);
    }

    function attendance_of_nagarsevaks_in_gb_meetings($con)
    {
        $percentage_list = ['0%-25%', '25%-50%', '50%-75%', '75%-100%'];
        $total = [];

        foreach($percentage_list as $k => $percentage)
        {
            $percentage = str_replace("%", "", $percentage);
            list($min, $max) = explode("-", $percentage);
            $query = "SELECT COUNT(Avg_Attendance) as total FROM `nagarsevak` WHERE Avg_Attendance BETWEEN {$min} AND {$max}";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($result)) {
                $total[] = (float)$row['total'];
            }
        }

        $final = [];
        for ($i=0; $i <4 ; $i++)
        {
            $final[$i][0] = $percentage_list[$i];
            $final[$i][1] = $total[$i];
        }

        $json_data = [];
        $json_data[] = ['PL', 'No. of Nagarsevaks'];
        for($i=0; $i<4; $i++)
        {
            $json_data[] = $final[$i];
        }

        return json_encode($json_data);
    }

    function attendance_of_nagarsevaks_in_gb_meetings__party_wise_($con)
    {
        $query = "SELECT Party ,SUM(Avg_Attendance) AS Avg_Attendance, COUNT(Party) AS Total_Count FROM `nagarsevak` GROUP BY Party";
        $result = mysqli_query($con, $query);

        $final = [];
        while($row = mysqli_fetch_assoc($result)) {

            $final[] = [
                $row['Party'],
                (float)round($row['Avg_Attendance']/$row['Total_Count'], 2)
            ];
        }
        
        $json_data = [];
        $json_data[] = ['Party', 'Avg Attendance (%)'];
        for($i=0; $i<count($final); $i++)
        {
            $json_data[] = $final[$i];
        }

        return json_encode($json_data);
    }

    function number_of_questions_asked_by_nagarsevaks_in_gb_meetings($con)
    {
        $label = ["0", "1", "2", "3", "4", "5", 'More than 5'];
        $total = [];
        for ($i=0; $i <= 5; $i++) { 
            $query = "SELECT COUNT(Total_Questions) as total FROM `nagarsevak` WHERE Total_Questions = {$i}";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            $total[] = (float)$row["total"];
        }
        $query = "SELECT COUNT(Total_Questions) as total FROM `nagarsevak` WHERE Total_Questions > 5";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $total[] = (float)$row["total"];

        $final = [];
        for ($i=0; $i < 7 ; $i++)
        {
            $final[$i] = [
                $label[$i], 
                $total[$i]
            ];
        }
        
        $json_data = [];
        $json_data[] = ['No. of Questions', 'No. of Nagarsevaks'];
        for($i=0; $i < 7; $i++)
        {
            $json_data[] = $final[$i];
        }

        return json_encode($json_data);
    }

    function number_of_questions_asked_by_nagarsevaks_in_gb_meetings__party_wise_($con)
    {
        $query = "SELECT Party, SUM(Total_Questions) AS Total_Questions, COUNT(Party) AS Total_Count FROM `nagarsevak` GROUP BY Party";
        $result = mysqli_query($con, $query);
        
        $final = [];
        while($row = mysqli_fetch_assoc($result)) {
            $final[] = [
                $row['Party'],
                (float)$row['Total_Questions']
            ];
        }

        $json_data = [];
        $json_data[] = ['Party', 'Total Questions'];
        for($i=0; $i < count($final); $i++)
        {
            $json_data[] = $final[$i];
        }

        return json_encode($json_data);
    }

    function nagarsevaks_who_asked_questions__party_wise_($con)
    {
        $query = "SELECT Party, COUNT(Nagarsevak_Name) AS No_of_nagarsevaks FROM `nagarsevak` WHERE Total_Questions > 0 GROUP BY Party";
        $result = mysqli_query($con, $query);
        
        $final = [];
        while($row = mysqli_fetch_assoc($result)) {
            $final[] = [
                $row['Party'],
                (float)$row['No_of_nagarsevaks']
            ];
        }

        $json_data = [];
        $json_data[] = ['Party', 'Number of Nagarsevaks'];
        for($i=0; $i < count($final); $i++)
        {
            $json_data[] = $final[$i];
        }

        return json_encode($json_data);
    }

    function nagarsevaks_with_criminal_charges__party_wise_($con)
    {
        $query = "SELECT Party, COUNT(Party) AS count FROM `nagarsevak` WHERE Criminal_Records = 'Yes' GROUP BY Party";
        $result = mysqli_query($con, $query);
        
        $json_data = [];

        if( $result->num_rows > 0)
        {
            $json_data[] = ['Party', 'No of Nagarsevaks'];

            while($row = mysqli_fetch_assoc($result)) {
                $json_data[] = [
                    $row['Party'],
                    (float)$row['count']
                ];
            }
        }

        return json_encode($json_data);
    }

?>