<!doctype html>
<html>
<body>
 
<?php
    //include the library
    include "libchart/classes/libchart.php";
 
    //new pie chart instance
    $chart = new PieChart( 500, 300 );
 
    //data set instance
    $dataSet = new XYDataSet();
    
    //actual data
    //get data from the database
    
    //include database connection
    $con = mysqli_connect('localhost','root','','csv_db');
    if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
               }

    mysqli_select_db($con,"csv_db");

    //query all records from the database
    $query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` WHERE Prabhag_No ='21B' GROUP BY Code ORDER BY `Amount` DESC ";
    //execute the query
    $result = mysqli_query($con,$query);
 
 
    //get number of rows returned
    $num_results = $result->num_rows;
 
    if( $num_results > 0){
    
        while( $row = mysqli_fetch_assoc($result)){
           // print_r($row);
            extract($row);
print_r($row);
            $dataSet->addPoint(new Point("{$Details_Of_Work} {$Amount})", $Amount));
        }
   // print_r($dataSet);
        //finalize dataset
        $chart->setDataSet($dataSet);
 
        //set chart title
        $chart->setTitle("Tiobe Top Programming Languages for June 2012");
        
        //render as an image and store under "generated" folder
        $chart->render("libchart/generated/1.png");
    
        //pull the generated chart where it was stored
        echo "<img alt='Pie chart'  src='libchart/generated/1.png' style='border: 1px solid gray;'/>";
    
    }else{
        echo "No programming languages found in the database.";
    }
?>
 
</body>
</html>