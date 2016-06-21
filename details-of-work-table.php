<?php
$q = intval($_GET['m']);
//MySQL Database Connect
require_once('includes/db_connection.php');
echo "<div class='text-center'><h2>Utilization of Ward Level Funds</h2></div>";
//=============================================================================================
echo "<div class='col-md-6 col-sm-6'>";
    $prabhag_num_A = $q."A";
    echo "<div class='text-center'><h3>Prabhag No ".$prabhag_num_A." </h3></div>";
    $sql_for_2012_2013="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."' && Year = '2012 - 2013'";
    $sql_for_2013_2014="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."' && Year = '2013 - 2014'";
    $sql_for_2014_2015="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."' && Year = '2014 - 2015'";
    $sql_for_2015_2016="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."' && Year = '2015 - 2016'";

    $result_for_2012_2013 = mysqli_query($con,$sql_for_2012_2013);
    $result_for_2013_2014 = mysqli_query($con,$sql_for_2013_2014);
    $result_for_2014_2015 = mysqli_query($con,$sql_for_2014_2015);
    $result_for_2015_2016 = mysqli_query($con,$sql_for_2015_2016);

    $sql_for_total_amt="SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."'";
    $result_for_total_amt = mysqli_query($con,$sql_for_total_amt);
    $row_for_total_amt = mysqli_fetch_array($result_for_total_amt);

        echo "<table class='table-bordered table-striped'>";
            echo "<colgroup><col style='width:18%;'><col style='width:60%;'><col style='width:20%;'></colgroup>";
            echo "<thead><tr><th>Year</th><th>Details Of Work</th><th>Amount</th></tr></thead>";
            echo "<tbody>";
                while($row_for_2012_2013 = mysqli_fetch_array($result_for_2012_2013))
                {
                    echo "<tr><td>" . $row_for_2012_2013['Year'] . "</td><td>" . $row_for_2012_2013['Details_Of_Work'] . "</td><td>" . $row_for_2012_2013['Amount'] . "</td></tr>";
                }
                while($row_for_2013_2014 = mysqli_fetch_array($result_for_2013_2014))
                {
                    echo "<tr><td>" . $row_for_2013_2014['Year'] . "</td><td>" . $row_for_2013_2014['Details_Of_Work'] . "</td><td>" . $row_for_2013_2014['Amount'] . "</td></tr>";
                }
                while($row_for_2014_2015 = mysqli_fetch_array($result_for_2014_2015))
                {
                    echo "<tr><td>" . $row_for_2014_2015['Year'] . "</td><td>" . $row_for_2014_2015['Details_Of_Work'] . "</td><td>" . $row_for_2014_2015['Amount'] . "</td></tr>";
                }
                while($row_for_2015_2016 = mysqli_fetch_array($result_for_2015_2016))
                {
                    echo "<tr><td>" . $row_for_2015_2016['Year'] . "</td><td>" . $row_for_2015_2016['Details_Of_Work'] . "</td><td>" . $row_for_2015_2016['Amount'] . "</td></tr>";
                }
                echo "<tr><td></td><td><strong>Total Amount</strong></td><td><strong>" . $row_for_total_amt['Amount'] . "</strong></td></tr>";
            echo "</tbody>";
        echo "</table>";
echo "</div>";
//============================================================================================
echo "<div class='col-md-6 col-sm-6'>";
    $prabhag_num_B = $q."B";
    echo "<div class='text-center'><h3>Prabhag No ".$prabhag_num_B." </h3></div>";
    $sql_for_2012_2013="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."' && Year = '2012 - 2013'";
    $sql_for_2013_2014="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."' && Year = '2013 - 2014'";
    $sql_for_2014_2015="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."' && Year = '2014 - 2015'";
    $sql_for_2015_2016="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."' && Year = '2015 - 2016'";

    $result_for_2012_2013 = mysqli_query($con,$sql_for_2012_2013);
    $result_for_2013_2014 = mysqli_query($con,$sql_for_2013_2014);
    $result_for_2014_2015 = mysqli_query($con,$sql_for_2014_2015);
    $result_for_2015_2016 = mysqli_query($con,$sql_for_2015_2016);

    $sql_for_total_amt="SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."'";
    $result_for_total_amt = mysqli_query($con,$sql_for_total_amt);
    $row_for_total_amt = mysqli_fetch_array($result_for_total_amt);

        echo "<table class='table-bordered table-striped'>";
            echo "<colgroup><col style='width:18%;'><col style='width:60%;'><col style='width:20%;'></colgroup>";
            echo "<thead><tr><th>Year</th><th>Details Of Work</th><th>Amount</th></tr></thead>";
            echo "<tbody>";
                while($row_for_2012_2013 = mysqli_fetch_array($result_for_2012_2013))
                {
                    echo "<tr><td>" . $row_for_2012_2013['Year'] . "</td><td>" . $row_for_2012_2013['Details_Of_Work'] . "</td><td>" . $row_for_2012_2013['Amount'] . "</td></tr>";
                }
                while($row_for_2013_2014 = mysqli_fetch_array($result_for_2013_2014))
                {
                    echo "<tr><td>" . $row_for_2013_2014['Year'] . "</td><td>" . $row_for_2013_2014['Details_Of_Work'] . "</td><td>" . $row_for_2013_2014['Amount'] . "</td></tr>";
                }
                while($row_for_2014_2015 = mysqli_fetch_array($result_for_2014_2015))
                {
                    echo "<tr><td>" . $row_for_2014_2015['Year'] . "</td><td>" . $row_for_2014_2015['Details_Of_Work'] . "</td><td>" . $row_for_2014_2015['Amount'] . "</td></tr>";
                }
                while($row_for_2015_2016 = mysqli_fetch_array($result_for_2015_2016))
                {
                    echo "<tr><td>" . $row_for_2015_2016['Year'] . "</td><td>" . $row_for_2015_2016['Details_Of_Work'] . "</td><td>" . $row_for_2015_2016['Amount'] . "</td></tr>";
                }
                echo "<tr><td></td><td><strong>Total Amount</strong></td><td><strong>" . $row_for_total_amt['Amount'] . "</strong></td></tr>";
            echo "</tbody>";      
        echo "</table>";
echo "</div>";
?>