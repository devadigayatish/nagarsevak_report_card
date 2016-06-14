
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Guardian &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

  <!-- 
    //////////////////////////////////////////////////////

    FREE HTML5 TEMPLATE 
    DESIGNED & DEVELOPED by FREEHTML5.CO
        
    Website:        http://freehtml5.co/
    Email:          info@freehtml5.co
    Twitter:        http://twitter.com/fh5co
    Facebook:       https://www.facebook.com/fh5co

    //////////////////////////////////////////////////////
     -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
    

<script src="<?php echo SITE_URL ?>assets/js/lib/jsapi.js"></script>

   

    </head>
    <body>
    <?php
        require_once('header2.php');
    ?>

        

        <div class="fh5co-hero">
            <div class="fh5co-overlay"></div>
            <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo SITE_URL;?>assets/images/home-image.jpg);">
               
            </div>

        </div>
        <!-- end:header-top -->
        <div id="fh5co-work-section" style="padding-top: 50px;">
            
            <div class="container">
                <div class="row">
                <div class="container">
                    <div class="col-md-6 col-sm-6">
                        <div class="text-center"><h3>Amount spent by each Party</h3></div>
                            <div id="visualization" ></div>
                                <?php
                                    $query = "SELECT n.Party, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No GROUP BY n.Party ";       //query all records from the database
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
<!-- ============================================================================================== -->
                    <div class="col-md-6 col-sm-6">
                        <div class="text-center"><h3>Amount spent on each type of work</h3></div>
                            <div id="visualization2" ></div>
                                <?php
                                    $query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` GROUP BY Code ORDER BY SUM(Amount) DESC"; 
                                        //query all records from the database
                                        $result = mysqli_query($con,$query );  //execute the query
                                        $num_results = $result->num_rows;      //get number of rows returned
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
                                                                echo "['{$Details_Of_Work}', {$Amount}],";
                                                            }
                                                        ?>
                                                    ]);
                                        // Create and draw the visualization.
                                        new google.visualization.PieChart(document.getElementById('visualization2')).draw(data, {title:""});
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
<!-- ============================================================================================ -->
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
                                                                echo "['{$Details_Of_Work}',{$Amount}],";
                                                            }
                                                        ?>
                                                    ]);
                                        // Create and draw the visualization.
                                        new google.visualization.PieChart(document.getElementById('visualization3')).draw(data, {title:""});
                                    }
                                    google.setOnLoadCallback(drawVisualization);
                                </script>
                                <?php
                                    }
                                    else
                                        {
                                            echo "No programming languages found in the database.";
                                        }
                                ?>
                    </div>
<!-- ============================================================================================ -->
                    <div class="col-md-6 col-sm-6">
                        <div class="text-center"><h3>Male : Amount spent on each type of work</h3></div>
                            <div id="visualization4"></div>
                                <?php
                                    $query = "SELECT w.Details_Of_Work, SUM(w.Amount) AS Amount FROM `nagarsevak` n INNER JOIN work_details w ON w.Prabhag_No = n.Prabhag_No WHERE n.Gender = 'Male' GROUP BY n.Gender , w.Code ORDER BY SUM(w.Amount) DESC ";  //query all records from the database
                                    $result = mysqli_query($con,$query );   //execute the query
                                    $num_results = $result->num_rows;       //get number of rows returned
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
                                                                echo "['{$Details_Of_Work}',{$Amount}],";
                                                            }
                                                        ?>
                                                    ]);
                                        // Create and draw the visualization.
                                        new google.visualization.PieChart(document.getElementById('visualization4')).draw(data, {title:""});
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
<!-- ============================================================================================== -->
                    <div class="col-md-6 col-sm-6">
                        <div class="text-center"><h3>Party wise Average Attendance</h3></div>
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
<!-- ============================================================================================= -->
                    <div class="col-md-6 col-sm-6">
                        <div class="text-center"><h3>Party wise Total Questions asked.</h3></div>
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
<!-- ============================================================================================== -->
                    <div class="col-md-6 col-sm-6">
                        <div class="text-center"><h3>Partywise Criminal Charges</h3></div>
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
<!-- ============================================================================================== -->
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
<!-- ============================================================================================== -->
                    <div class="col-md-6 col-sm-6">
                        <div class="text-center"><h3>No. of nagarsevak's in each attendance range</h3></div>
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

                                    $print_array_0 = array('0' => '0-25', '1' => '26-50' , '2' => '51-75' , '3' =>'76-100');
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
                                                        ['PL', 'COUNT'],
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
<!-- ============================================================================================== -->
                    <div class="col-md-6 col-sm-6">
                        <div class="text-center"><h3>No. of nagarsevak's in each question range</h3></div>
                            <div id="visualization10">
                                <?php
                                    //query all records from the database
                                    $query_0to5 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 0 AND 5 ";
                                    $query_6to10 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 6 AND 10 ";
                                    $query_11to15 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 11 AND 15 ";
                                    $query_16to100 = "SELECT COUNT(Total_Questions) FROM `nagarsevak` WHERE Total_Questions BETWEEN 16 AND 100 ";

                                    $result_0to5 = mysqli_query($con,$query_0to5 );//execute the query
                                    $result_6to10 = mysqli_query($con,$query_6to10 );
                                    $result_11to15 = mysqli_query($con,$query_11to15 );
                                    $result_16to100 = mysqli_query($con,$query_16to100 );

                                    $row_0to5 = mysqli_fetch_assoc($result_0to5);
                                    $row_6to10 = mysqli_fetch_assoc($result_6to10);
                                    $row_11to15 = mysqli_fetch_assoc($result_11to15);
                                    $row_16to100 = mysqli_fetch_assoc($result_16to100);

                                    $print_array_0 = array('0' => '0-5', '1' => '6-10' , '2' => '11-15' , '3' =>'16-100');
                                    $print_array_1= array('0' => $row_0to5['COUNT(Total_Questions)'] ,'1' =>$row_6to10['COUNT(Total_Questions)'] ,'2' => $row_11to15['COUNT(Total_Questions)'] , '3' => $row_16to100['COUNT(Total_Questions)']);

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
                                                        ['PL', 'COUNT'],
                                                        <?php
                                                            for($i=0; $i<4; $i++)
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
<!-- ============================================================================================== -->
                    <div class="col-md-6 col-sm-6">
                        <div id="visualization11">
                            <?php
                                echo"<div class='text-center'><h3>MAX Average Attendance (Gender-wise)</h3></div>";
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
                                                echo "<tr><td>Prabhag No:</td><td>" .$row_M['Prabhag_No'] ."</td></tr>";
                                                echo "<tr><td>Party:</td><td>" . $row_M['Party']."</td></tr>";
                                                echo "<tr><td>Avg Attendance:</td><td>" . $row_M['Avg_Attendance']."</td></tr>";
                                            echo "</table>";
                                        echo "</div>";
                                        echo "<div class='col-lg-6 col-md-4 text-center'>";
                                            echo "<table class='table table-bordered table-striped'>";
                                                echo "<tr><td>Prabhag No:</td><td>" .$row_F['Prabhag_No'] ."</td></tr>";
                                                echo "<tr><td>Party:</td><td>" . $row_F['Party']."</td></tr>";
                                                echo "<tr><td>Avg Attendance:</td><td>" . $row_F['Avg_Attendance']."</td></tr>";
                                            echo "</table>";
                                        echo "</div>";
                                    echo "</div>";
                            ?>
                        </div>   
                    </div>
<!-- ============================================================================================= -->
                    <div class="col-md-6 col-sm-6">
                        <div id="visualization12">
                            <?php
                                echo"<div class='text-center'><h3>MAX Total Qustions Asked (Gender-wise)</h3></div>";
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
<!-- ============================================================================================= -->
                </div>
            </div>
        </div>
        <!-- fh5co-work-section -->
        
        <!-- fh5co-blog-section -->
        <?php
            require_once('footer2.php');
        ?>
    

    </div>
    <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

    <!-- jQuery -->


    </body>


</html>

