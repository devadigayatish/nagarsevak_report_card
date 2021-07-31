<?php
    require_once('../_config.php');

    $q = $_GET["q"];

    $function_name = $q;
    call_user_func_array($function_name, array($con));

    function prabhag_no_info($con)
    {
        $prabhag_num = $_POST["i"];
        $query = "SELECT Prabhag_Name, Ward_ofc FROM nagarsevak WHERE Prabhag_No = '" . $prabhag_num . "'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        include("html/prabhag_no_info.php");
    }

    function profile_info($con)
    {
        $prabhag_num = $_POST["i"];

        $list = ["A", "B", "C", "D"];

        foreach($list as $lbl)
        {
            $basic = $info = [];

            $prabhag = $prabhag_num . $lbl;

            $query = "SELECT Nagarsevak_Name, URL FROM nagarsevak WHERE Prabhag_No = '" . $prabhag . "'";
            $result = mysqli_query($con, $query);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $basic = $row;
            }

            $query = "SELECT Party, Total_Questions, Avg_Attendance, Criminal_Records FROM nagarsevak WHERE Prabhag_No = '" . $prabhag . "'";
            $result = mysqli_query($con, $query);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $info = $row;
            }

            include("html/profile_info.php");
            if($basic && $info){
            }
        }
    }

    function details_of_work($con)
    {
        $prabhag_num = $_POST["i"];

        $list = ["A", "B", "C", "D"];

        foreach($list as $lbl)
        {
            $prabhag = $prabhag_num . $lbl;

            $year = [];
            $data = [];
            $total_amt = "";

            $query = "SELECT DISTINCT Year FROM `work_details` WHERE Prabhag_No = '".$prabhag."'";
            $result = mysqli_query($con, $query);

            if ($result->num_rows > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) {
                    $year[] = $row['Year'];
                }

                for ($i=0; $i < count($year); $i++) { 
                    $query = "SELECT Year, Details_Of_Work, Amount FROM work_details WHERE Prabhag_No = '".$prabhag."' && Year = '".$year[$i]."'";
                    $result = mysqli_query($con, $query);
                    if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            $data[$year[$i]][] = $row;
                        }
                    }
                }

                $query = "SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag."'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_array($result);
                $total_amt = $row['Amount'];
            }

            include("html/details_of_work.php");
        }
    }

    function details_of_work_chart($con)
    {
        $prabhag_num = $_POST["i"];

        $list = ["A", "B", "C", "D"];

        foreach($list as $lbl)
        {
            $prabhag = $prabhag_num . $lbl;

            $chart_data = [];

            $details_of_work = [];
            $amount = [];

            $query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` 
                WHERE Prabhag_No = '" . $prabhag . "' GROUP BY `Code` ORDER BY `Amount` DESC";
            $result = mysqli_query($con, $query);

            if($result->num_rows)
            {
                while($row = mysqli_fetch_assoc($result)) {
                    $details_of_work[] = $row['Details_Of_Work'];
                    $amount[] = $row['Amount'];
                }

                $total_amount = array_sum($amount);

                if(count($details_of_work) <= 7)
                {
                    for ($i=0; $i < count($details_of_work); $i++) { 
                        $chart_data[] = [
                            "name" => $details_of_work[$i],
                            "no_of_times" => $amount[$i],
                        ];
                    }
                }
                else
                {
                    $remaining_values = array_slice($amount, 7);
                    $remaining_total = array_sum($remaining_values);
                    
                    for($i=0; $i<7; $i++){
                        $chart_data[] = [
                            "name" => $details_of_work[$i],
                            "no_of_times" => $amount[$i],
                        ];
                    }
                    $chart_data[] = [
                        "name" => "Others",
                        "no_of_times" => $remaining_total,
                    ];
                }
            }

            include("html/details_of_work_chart.php");
        }
    }

    function downloaded_data($con)
    {
        $prabhag_num = $_POST["i"];

        $list = ["A", "B", "C", "D"];

        include("html/downloaded_data.php");
    }

?>