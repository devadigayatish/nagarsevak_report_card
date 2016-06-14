<?php
$q = intval($_GET['m']);
//MySQL Database Connect
require_once('includes/db_connection.php');
echo "<div class='text-center'><h2>Utilization of Ward Level Funds</h2></div>";
//=============================================================================================
echo "<div class='col-md-6 col-sm-6'>";
    $prabhag_num_A = $q."A";
    echo "<div class='text-center'><h3>Prabhag No ".$prabhag_num_A." </h3></div>";
    $sql="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."'";
    $result = mysqli_query($con,$sql);
    $sql_for_total_amt="SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."'";
    $result_for_total_amt = mysqli_query($con,$sql_for_total_amt);
    $row_for_total_amt = mysqli_fetch_array($result_for_total_amt);

    echo "<table class='table table-bordered table-striped'><tr><th>Year</th><th>Details Of Work</th><th>Amount</th></tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr><td>" . $row['Year'] . "</td><td>" . $row['Details_Of_Work'] . "</td><td>" . $row['Amount'] . "</td></tr>";
        }
        echo "<tr><td></td><td><strong>Total Amount</strong></td><td><strong>" . $row_for_total_amt['Amount'] . "</strong></td></tr>";
    echo "</table>";
echo "</div>";
//============================================================================================
echo "<div class='col-md-6 col-sm-6'>";
    $prabhag_num_B = $q."B";
    echo "<div class='text-center'><h3>Prabhag No ".$prabhag_num_B." </h3></div>";
    $sql="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."'";
    $result = mysqli_query($con,$sql);
    $sql_for_total_amt="SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."'";
    $result_for_total_amt = mysqli_query($con,$sql_for_total_amt);
    $row_for_total_amt = mysqli_fetch_array($result_for_total_amt);

    echo "<table class='table table-bordered table-striped'><tr><th>Year</th><th>Details Of Work</th><th>Amount</th></tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr><td>" . $row['Year'] . "</td><td>" . $row['Details_Of_Work'] . "</td><td>" . $row['Amount'] . "</td></tr>";
        }
        echo "<tr><td></td><td><strong>Total Amount</strong></td><td><strong>" . $row_for_total_amt['Amount'] . "</strong></td></tr>";
    echo "</table>";
echo "</div>";
?>