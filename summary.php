
<?php
require_once('includes/db_connection.php');
require_once('includes/functions.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php
            require_once('header.php');
        ?>
    </head>
    <body>
        
        <div id="fh5co-wrapper">
        <div id="fh5co-page">

        <div id="fh5co-header">
            <header id="fh5co-header-section">
                <div class="container">
                    <div class="nav-header">
                        <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
                        <h1 id="fh5co-logo"><a href="index.php">Nagarsevak <span>Report Card</span></a></h1>
                        <!-- START #fh5co-menu-wrap -->
                        <nav id="fh5co-menu-wrap" role="navigation">
                            <ul class="sf-menu" id="fh5co-primary-menu">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li><a target="_blank" href="http://parivartan-pune.blogspot.in/p/about-us.html">About Parivartan</a></li>
                                <li><a href = "about-nagarsevak-report-card.php">About Nagarsevak Report Card</a></li>
                                <li class="active"><a href = "summary.php">Summary</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
        </div>

        <div class="fh5co-hero">
            <div class="fh5co-overlay"></div>
            <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo SITE_URL;?>assets/images/home-image.jpg);"></div>
        </div>

        <div id="fh5co-work-section" style="padding-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Amount spent by each Party</h3></div>
                                <div id="visualization" ></div>
                                    <?php
                                        $query = "SELECT n.Party, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No GROUP BY n.Party ORDER BY `Amount` DESC";       //query all records from the database
                                        $result = mysqli_query($con,$query );     //execute the query
                                        $num_results = $result->num_rows;         //get number of rows returned
                                        if( $num_results > 0)
                                        { 
                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']}); 
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization() 
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['PL', 'Ratings'],
                                                            <?php
                                                                while( $row = mysqli_fetch_assoc($result) )
                                                                {
                                                                    extract($row);
                                                                    echo "['{$Party}', {$Amount}],";
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.PieChart(document.getElementById('visualization')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script>
                                    <?php
                                        }
                                        else
                                        {
                                            echo "No related data found in the database.";
                                        }
                                    ?>   
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Amount spent on each type of work</h3></div>
                                <div id="visualization2" ></div>
                                    <?php
                                        $query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC"; 
                                            //query all records from the database
                                        $result = mysqli_query($con,$query );  //execute the query
                                        $num_results = $result->num_rows;      //get number of rows returned
                                        $Details_of_work = array();
                                        $Amount = array();
                                        for($i=0; $i<$num_results;$i++)
                                        {
                                            $row = mysqli_fetch_assoc($result);
                                            $Details_of_work[$i] = $row['Details_Of_Work'];
                                            $Amount[$i] = $row['Amount'];
                                        }
                                        $combine_array = array_combine($Details_of_work, $Amount);
                                        $total_Amount = array_sum($Amount);
                                        $remaining_values = array_slice($Amount, 7);
                                        $remaining_total = array_sum($remaining_values);
                                        $chart_array = array(array());
                                        for($i=0; $i<10; $i++)
                                        {
                                            $chart_array[$i][0] = $Details_of_work[$i];
                                            $chart_array[$i][1] = $Amount[$i];
                                        }
                                        $chart_array[10][0] = "Others";
                                        $chart_array[10][1] = $remaining_total;

                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']});      
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization()
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['PL', 'Ratings'],
                                                            <?php
                                                                for($i=0; $i<=10; $i++)
                                                                {
                                                                    echo "['{$chart_array[$i][0]}', {$chart_array[$i][1]}],";
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.PieChart(document.getElementById('visualization2')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script>               
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Female : Amount spent on each type of work</h3></div>
                                <div id="visualization3"></div>
                                    <?php   
                                        $query = "SELECT w.Details_Of_Work, SUM(w.Amount) AS Amount FROM 
                                                 `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = 
                                                  n.Prabhag_No WHERE n.Gender = 'Female' GROUP BY n.Gender , 
                                                  w.Code ORDER BY SUM(w.Amount) DESC ";                    
                                                  //query all records from the database
                                        $result = mysqli_query($con,$query );     //execute the query
                                        $num_results = $result->num_rows;        //get number of rows returned
                                        $Details_of_work = array();
                                        $Amount = array();
                                        for($i=0; $i<$num_results;$i++)
                                        {
                                            $row = mysqli_fetch_assoc($result);
                                            $Details_of_work[$i] = $row['Details_Of_Work'];
                                            $Amount[$i] = $row['Amount'];
                                        }
                                        $combine_array = array_combine($Details_of_work, $Amount);
                                        $total_Amount = array_sum($Amount);
                                        $remaining_values = array_slice($Amount, 7);
                                        $remaining_total = array_sum($remaining_values);
                                        $chart_array = array(array());
                                        for($i=0; $i<10; $i++)
                                        {
                                            $chart_array[$i][0] = $Details_of_work[$i];
                                            $chart_array[$i][1] = $Amount[$i];
                                        }
                                        $chart_array[10][0] = "Others";
                                        $chart_array[10][1] = $remaining_total;    
                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']});
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization() 
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['PL', 'Ratings'],
                                                            <?php
                                                                for($i=0; $i<=10; $i++)
                                                                {
                                                                    echo "['{$chart_array[$i][0]}', {$chart_array[$i][1]}],";
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.PieChart(document.getElementById('visualization3')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Male : Amount spent on each type of work</h3></div>
                                <div id="visualization4"></div>
                                    <?php
                                        $query = "SELECT w.Details_Of_Work, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No WHERE n.Gender = 'Male' GROUP BY n.Gender , w.Code ORDER BY SUM(w.Amount) DESC ";  //query all records from the database
                                        $result = mysqli_query($con,$query );   //execute the query
                                        $num_results = $result->num_rows;       //get number of rows returned
                                        $Details_of_work = array();
                                        $Amount = array();
                                        for($i=0; $i<$num_results;$i++)
                                        {
                                            $row = mysqli_fetch_assoc($result);
                                            $Details_of_work[$i] = $row['Details_Of_Work'];
                                            $Amount[$i] = $row['Amount'];
                                        }
                                        $combine_array = array_combine($Details_of_work, $Amount);
                                        $total_Amount = array_sum($Amount);
                                        $remaining_values = array_slice($Amount, 7);
                                        $remaining_total = array_sum($remaining_values);
                                        $chart_array = array(array());
                                        for($i=0; $i<10; $i++)
                                        {
                                            $chart_array[$i][0] = $Details_of_work[$i];
                                            $chart_array[$i][1] = $Amount[$i];
                                        }
                                        $chart_array[10][0] = "Others";
                                        $chart_array[10][1] = $remaining_total; 
                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']});
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization() 
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['PL', 'Ratings'],
                                                            <?php
                                                                for($i=0; $i<=10; $i++)
                                                                {
                                                                    echo "['{$chart_array[$i][0]}', {$chart_array[$i][1]}],";
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.PieChart(document.getElementById('visualization4')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Party wise Attendance</h3></div>
                                <div id="visualization5"></div>
                                    <?php
                                        $query = "SELECT Party ,SUM(Avg_Attendance) AS Avg_Attendance, COUNT(Party) AS Total_Count FROM `nagarsevak`GROUP BY Party";
                                        //query all records from the database
                                        $result = mysqli_query($con,$query );       //execute the query
                                        $Party = array();
                                        $final_attendance = array();
                                        $num_results = $result->num_rows;
                                        for($i=0; $i<$num_results;$i++)
                                        {
                                            $row = mysqli_fetch_assoc($result);
                                            $Party[$i] = $row['Party'];
                                            $final_attendance[$i] = round($row['Avg_Attendance']/$row['Total_Count'],2);
                                        }
                                        $print_array = array(array());
                                        for($i=0; $i<$num_results; $i++)
                                        {
                                            $print_array[$i][0] = $Party[$i];
                                            $print_array[$i][1] = $final_attendance[$i];
                                        } 
                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']});
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization() 
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['PL', 'Avg Attendance',],
                                                            <?php
                                                                for($i=0; $i<$num_results; $i++)
                                                                {
                                                                    echo "['{$print_array[$i][0]}', {$print_array[$i][1]}],";
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.ColumnChart(document.getElementById('visualization5')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script> 
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Party wise Questions asked.</h3></div>
                                <div id="visualization6"></div>
                                    <?php
                                        $query = "SELECT Party ,SUM(Total_Questions) AS Total_Questions, COUNT(Party) AS Total_Count FROM `nagarsevak`GROUP BY Party";
                                        //query all records from the database
         
                                        $result = mysqli_query($con,$query );      //execute the query
                                        $Party = array();
                                        $final_questions = array();
                                        $num_results = $result->num_rows;
                                        for($i=0; $i<$num_results;$i++)
                                        {
                                            $row = mysqli_fetch_assoc($result);
                                            $Party[$i] = $row['Party'];
                                            $final_questions[$i] = $row['Total_Questions'];
                                        }
                                        $print_array = array(array());
                                        for($i=0; $i<$num_results; $i++)
                                        {
                                            $print_array[$i][0] = $Party[$i];
                                            $print_array[$i][1] = $final_questions[$i];
                                        }
                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']});
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization() 
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['PL', 'Total Questions',],
                                                            <?php
                                                                for($i=0; $i<$num_results; $i++)
                                                                {
                                                                    echo "['{$print_array[$i][0]}', {$print_array[$i][1]}],";
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.ColumnChart(document.getElementById('visualization6')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Party wise Criminal Charges</h3></div>
                                <div id="visualization7"></div>
                                    <?php
                                        $query = "SELECT Party, COUNT(Party) AS count FROM `nagarsevak` WHERE Criminal_Records = 'Yes' GROUP BY Party ";
                                        //query all records from the database
                                        $result = mysqli_query($con,$query );  //execute the query
                                        $num_results = $result->num_rows;      //get number of rows returned
                                        if( $num_results > 0){ 
                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']});
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization()
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['PL', 'Count'],
                                                            <?php
                                                                while( $row = mysqli_fetch_assoc($result) )
                                                                {
                                                                    extract($row);
                                                                    echo "['{$Party}', {$count}],";     
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.ColumnChart(document.getElementById('visualization7')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script>
                                    <?php
                                        }
                                        else
                                        {
                                            echo "No related data found in the database.";
                                        }
                                    ?>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Top 5 Works per Year</h3></div>
                                <div id="visualization8">
                                    <?php
                                        $query = "SELECT Details_Of_Work FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC ";
                                            $result = mysqli_query($con,$query );           //execute the query
                                            $Details_of_work = array();
                                            for ($i=0; $i <5 ; $i++)
                                            { 
                                                $row = mysqli_fetch_assoc($result);
                                                $Details_of_work[$i] = $row['Details_Of_Work'];
                                            }
                                            $query1 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[0]."' GROUP BY Year ";
                                            $query2 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[1]."' GROUP BY Year ";
                                            $query3 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[2]."' GROUP BY Year ";
                                            $query4 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[3]."' GROUP BY Year ";
                                            $query5 = "SELECT SUM(Amount) AS Amount FROM `work_details` WHERE Details_Of_Work = '".$Details_of_work[4]."' GROUP BY Year ";

                                            $result1 = mysqli_query($con,$query1 ); //execute the queries
                                            $result2 = mysqli_query($con,$query2 );
                                            $result3 = mysqli_query($con,$query3 );
                                            $result4 = mysqli_query($con,$query4 );
                                            $result5 = mysqli_query($con,$query5 );

                                            $Amount1 = array();
                                            for ($i=0; $i <5 ; $i++)
                                            { 
                                                $row1 = mysqli_fetch_assoc($result1);
                                                $Amount1[$i] = $row1['Amount'];
                                            }
                                            $Amount2 = array();
                                            for ($i=0; $i <5 ; $i++) 
                                            { 
                                                $row2 = mysqli_fetch_assoc($result2);
                                                $Amount2[$i] = $row2['Amount'];
                                            }
                                            $Amount3 = array();
                                            for ($i=0; $i <5 ; $i++) 
                                            { 
                                                $row3 = mysqli_fetch_assoc($result3);
                                                $Amount3[$i] = $row3['Amount'];
                                            }
                                            $Amount4 = array();
                                            for ($i=0; $i <5 ; $i++) 
                                            { 
                                                $row4 = mysqli_fetch_assoc($result4);
                                                $Amount4[$i] = $row4['Amount'];
                                            }
                                            $Amount5 = array();
                                            for ($i=0; $i <5 ; $i++) 
                                            { 
                                                $row5 = mysqli_fetch_assoc($result5);
                                                $Amount5[$i] = $row5['Amount'];
                                            }

                                            $final_array = array(array());
                                            for($i=0; $i <4 ; $i++)
                                            {
                                                $final_array[$i][0]= $Amount1[$i];
                                                $final_array[$i][1]= $Amount2[$i];
                                                $final_array[$i][2]= $Amount3[$i];
                                                $final_array[$i][3]= $Amount4[$i];
                                                $final_array[$i][4]= $Amount5[$i];
                                            }
                                        ?>
                                        <script type="text/javascript">
                                            google.load('visualization', '1', {packages: ['corechart']});
                                            //load package
                                        </script>
                                        <script type="text/javascript">
                                            function drawVisualization()
                                            {// Create and populate the data table.
                                                var data = google.visualization.arrayToDataTable
                                                            ([
                                                                <?php
                                                                    echo "['Year', '".$Details_of_work[0]."' , '".$Details_of_work[1]."' , '".$Details_of_work[2]."' , '".$Details_of_work[3]."' , '".$Details_of_work[4]."'],";
                                                                    for($i=0; $i<1; $i++)
                                                                    {
                                                                        echo "['2012-2013', {$final_array[$i][0]} , {$final_array[$i][1]} , {$final_array[$i][2]} , {$final_array[$i][3]} , {$final_array[$i][4]} ],";
                                                                    }
                                                                    for($i=1; $i<2; $i++)
                                                                    {
                                                                        echo "['2013-2014', {$final_array[$i][0]} , {$final_array[$i][1]} , {$final_array[$i][2]} , {$final_array[$i][3]} , {$final_array[$i][4]} ],";
                                                                    }
                                                                    for($i=2; $i<3; $i++)
                                                                    {
                                                                        echo "['2014-2015', {$final_array[$i][0]} , {$final_array[$i][1]} , {$final_array[$i][2]} , {$final_array[$i][3]} , {$final_array[$i][4]} ],";
                                                                    }
                                                                    for($i=3; $i<4; $i++)
                                                                    {
                                                                        echo "['2015-2016', {$final_array[$i][0]} , {$final_array[$i][1]} , {$final_array[$i][2]} , {$final_array[$i][3]} , {$final_array[$i][4]} ],";
                                                                    }
                                                                ?>
                                                            ]);
                                                // Create and draw the visualization.
                                                new google.visualization.ColumnChart(document.getElementById('visualization8')).draw(data, {title:""});
                                            }
                                            google.setOnLoadCallback(drawVisualization);
                                        </script>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>Attendance of Nagarsevaks</h3></div>
                                <div id="visualization9">
                                    <?php
                                        $query_0to25 = "SELECT COUNT(Avg_Attendance) FROM `nagarsevak` WHERE Avg_Attendance BETWEEN 0 AND 25 ";
                                        $query_26to50 = "SELECT COUNT(Avg_Attendance) FROM `nagarsevak` WHERE Avg_Attendance BETWEEN 26 AND 50 ";
                                        $query_51to75 = "SELECT COUNT(Avg_Attendance) FROM `nagarsevak` WHERE Avg_Attendance BETWEEN 51 AND 75 ";
                                        $query_76to100 = "SELECT COUNT(Avg_Attendance) FROM `nagarsevak` WHERE Avg_Attendance BETWEEN 76 AND 100 ";

                                        $result_0to25 = mysqli_query($con,$query_0to25 );//execute the query
                                        $result_26to50 = mysqli_query($con,$query_26to50 );
                                        $result_51to75 = mysqli_query($con,$query_51to75 );
                                        $result_76to100 = mysqli_query($con,$query_76to100 );

                                        $row_0to25 = mysqli_fetch_assoc($result_0to25);
                                        $row_26to50 = mysqli_fetch_assoc($result_26to50);
                                        $row_51to75 = mysqli_fetch_assoc($result_51to75);
                                        $row_76to100 = mysqli_fetch_assoc($result_76to100);

                                        $print_array_0 = array('0' => '0%-25%', '1' => '26%-50%' , '2' => '51%-75%' , '3' =>'76%-100%');
                                        $print_array_1= array('0' => $row_0to25['COUNT(Avg_Attendance)'] ,'1' =>$row_26to50['COUNT(Avg_Attendance)'] ,'2' => $row_51to75['COUNT(Avg_Attendance)'] , '3' => $row_76to100['COUNT(Avg_Attendance)']); 

                                        $final_array= array(array());
                                        for ($i=0; $i <4 ; $i++)
                                        {
                                            $final_array[$i][0] = $print_array_0[$i];
                                            $final_array[$i][1] = $print_array_1[$i];
                                        }
                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']});
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization()
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['PL', 'No. of Nagarsevaks'],
                                                            <?php
                                                                for($i=0; $i<4; $i++)
                                                                {
                                                                    echo "['{$final_array[$i][0]}', {$final_array[$i][1]}],";
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.ColumnChart(document.getElementById('visualization9')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center"><h3>No. of Questions asked by Nagarsevaks</h3></div>
                                <div id="visualization10">
                                    <?php
                                        //query all records from the database
                                        $query_0 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions = 0 ";
                                        $query_1 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions = 1 ";
                                        $query_2 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions = 2 ";
                                        $query_3 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions = 3";
                                        $query_4 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions = 4";
                                        $query_5 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions = 5";
                                        $query_6 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 6 AND 100 ";

                                        $result_0 = mysqli_query($con,$query_0 );//execute the query
                                        $result_1 = mysqli_query($con,$query_1 );
                                        $result_2 = mysqli_query($con,$query_2 );
                                        $result_3 = mysqli_query($con,$query_3 );
                                        $result_4 = mysqli_query($con,$query_4 );
                                        $result_5 = mysqli_query($con,$query_5 );
                                        $result_6 = mysqli_query($con,$query_6 );

                                        $row_0 = mysqli_fetch_assoc($result_0);
                                        $row_1 = mysqli_fetch_assoc($result_1);
                                        $row_2 = mysqli_fetch_assoc($result_2);
                                        $row_3 = mysqli_fetch_assoc($result_3);
                                        $row_4 = mysqli_fetch_assoc($result_4);
                                        $row_5 = mysqli_fetch_assoc($result_5);
                                        $row_6 = mysqli_fetch_assoc($result_6);

                                        $print_array_0 = array('0' => '0', '1' => '1' , '2' => '2' , '3' =>'3', '4' =>'4', '5' =>'5', '6' =>'6 - 100');
                                        $print_array_1= array('0' => $row_0['COUNT(Total_Questions)'] ,'1' =>$row_1['COUNT(Total_Questions)'] ,'2' => $row_2['COUNT(Total_Questions)'] , '3' => $row_3['COUNT(Total_Questions)'], '4' => $row_4['COUNT(Total_Questions)'], '5' => $row_5['COUNT(Total_Questions)'], '6' => $row_6['COUNT(Total_Questions)']);

                                        $final_array= array(array());
                                        for ($i=0; $i <7 ; $i++)
                                        {
                                            $final_array[$i][0] = $print_array_0[$i];
                                            $final_array[$i][1] = $print_array_1[$i];
                                        }
                                    ?>
                                    <script type="text/javascript">
                                        google.load('visualization', '1', {packages: ['corechart']});
                                        //load package
                                    </script>
                                    <script type="text/javascript">
                                        function drawVisualization()
                                        {// Create and populate the data table.
                                            var data = google.visualization.arrayToDataTable
                                                        ([
                                                            ['No. of Questions', 'No. of Nagarsevaks'],
                                                            <?php
                                                                for($i=0; $i<7; $i++)
                                                                {
                                                                    echo "['{$final_array[$i][0]}', {$final_array[$i][1]}],";
                                                                }
                                                            ?>
                                                        ]);
                                            // Create and draw the visualization.
                                            new google.visualization.ColumnChart(document.getElementById('visualization10')).draw(data, {title:""});
                                        }
                                        google.setOnLoadCallback(drawVisualization);
                                    </script>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div id="visualization11">
                                <?php
                                    echo"<div class='text-center'><h3>MAX Attendance (Gender-wise)</h3></div>";
                                        echo "<div class='col-lg-12 col-md-4'>";
                                            echo "<div class='col-lg-6 col-md-4 text-center'>";
                                                $sql_M = "SELECT Prabhag_No , Nagarsevak_Name , Avg_Attendance ,URL ,Party FROM nagarsevak WHERE Avg_Attendance=(SELECT MAX(Avg_Attendance) FROM nagarsevak WHERE Gender = 'Male')";
                                                $result_M = mysqli_query($con,$sql_M);
                                                $row_M = mysqli_fetch_array($result_M);
                                                echo "<div class=''><img width='70' src=".SITE_URL.'assets/'. $row_M['URL']." ></div>" ;
                                                echo "<span>". $row_M['Nagarsevak_Name']."</span>";
                                            echo "</div>";
                                            echo "<div class='col-lg-6 col-md-4 text-center'>";
                                                $sql_F = "SELECT Prabhag_No , Nagarsevak_Name , Avg_Attendance ,URL ,Party FROM nagarsevak WHERE Avg_Attendance=(SELECT MAX(Avg_Attendance) FROM nagarsevak WHERE Gender = 'Female')";
                                                $result_F = mysqli_query($con,$sql_F);
                                                $row_F = mysqli_fetch_array($result_F);
                                                echo "<div class=''><img width='70' src=".SITE_URL.'assets/'. $row_F['URL']." ></div>" ;
                                                echo "<span>". $row_F['Nagarsevak_Name']."</span>";
                                            echo "</div>";
                                        echo "</div>";

                                        echo "<div class='col-lg-12 col-md-4'>";
                                            echo "<div class='col-lg-6 col-md-4 text-center'>";
                                                echo "<table class='table table-bordered table-striped'>";
                                                    echo "<tr><td>Prabhag No</td><td>" .$row_M['Prabhag_No'] ."</td></tr>";
                                                    echo "<tr><td>Party</td><td>" . $row_M['Party']."</td></tr>";
                                                    echo "<tr><td>Attendance</td><td>" . $row_M['Avg_Attendance']." % </td></tr>";
                                                echo "</table>";
                                            echo "</div>";
                                            echo "<div class='col-lg-6 col-md-4 text-center'>";
                                                echo "<table class='table table-bordered table-striped'>";
                                                    echo "<tr><td>Prabhag No</td><td>" .$row_F['Prabhag_No'] ."</td></tr>";
                                                    echo "<tr><td>Party</td><td>" . $row_F['Party']."</td></tr>";
                                                    echo "<tr><td>Attendance</td><td>" . $row_F['Avg_Attendance']." % </td></tr>";
                                                echo "</table>";
                                            echo "</div>";
                                        echo "</div>";
                                ?>
                            </div>   
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div id="visualization12">
                                <?php
                                    echo"<div class='text-center'><h3>MAX Questions Asked (Gender-wise)</h3></div>";
                                        echo "<div class='col-lg-12 col-md-4'>";
                                            echo "<div class='col-lg-6 col-md-4 text-center'>";
                                                $sql_M = "SELECT Prabhag_No , Nagarsevak_Name , Total_Questions ,URL ,Party FROM nagarsevak WHERE Total_Questions=(SELECT MAX(Total_Questions) FROM nagarsevak WHERE Gender = 'Male')";
                                                $result_M = mysqli_query($con,$sql_M);
                                                $row_M = mysqli_fetch_array($result_M);
                                                echo "<div class=''><img width='70' src=".SITE_URL.'assets/'. $row_M['URL']." ></div>" ;
                                                echo "<span>". $row_M['Nagarsevak_Name']."</span>";
                                            echo "</div>";
                                            echo "<div class='col-lg-6 col-md-4 text-center'>";
                                                $sql_F = "SELECT Prabhag_No , Nagarsevak_Name , Total_Questions ,URL ,Party FROM nagarsevak WHERE Total_Questions=(SELECT MAX(Total_Questions) FROM nagarsevak WHERE Gender = 'Female')";
                                                $result_F = mysqli_query($con,$sql_F);
                                                $row_F = mysqli_fetch_array($result_F);
                                                echo "<div class=''><img width='70' src=".SITE_URL.'assets/'. $row_F['URL']." ></div>" ;
                                                echo "<span>". $row_F['Nagarsevak_Name']."</span>";
                                            echo "</div>";
                                        echo "</div>";

                                        echo "<div class='col-lg-12 col-md-4'>";
                                            echo "<div class='col-lg-6 col-md-4 text-center'>";
                                                echo "<table class='table table-bordered table-striped'>";
                                                    echo "<tr><td>Prabhag No:</td><td>" .$row_M['Prabhag_No'] ."</td></tr>";
                                                    echo "<tr><td>Party:</td><td>" . $row_M['Party']."</td></tr>";
                                                    echo "<tr><td>Total Questions:</td><td>" . $row_M['Total_Questions']."</td></tr>";
                                                echo "</table>";
                                            echo "</div>";
                                            echo "<div class='col-lg-6 col-md-4 text-center'>";
                                                echo "<table class='table table-bordered table-striped'>";
                                                    echo "<tr><td>Prabhag No:</td><td>" .$row_F['Prabhag_No'] ."</td></tr>";
                                                    echo "<tr><td>Party:</td><td>" . $row_F['Party']."</td></tr>";
                                                    echo "<tr><td>Total Questions:</td><td>" . $row_F['Total_Questions']."</td></tr>";
                                                echo "</table>";
                                            echo "</div>";
                                        echo "</div>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- fh5co-work-section -->

        <?php
            require_once('footer.php');
        ?>
    
        </div><!-- END fh5co-page -->
        </div><!-- END fh5co-wrapper -->
    </body>
</html>

