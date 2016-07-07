<?php
$q = intval($_GET['m']);;
//MySQL Database Connect
require_once('includes/db_connection.php');
echo "<div class='text-center'><h2><strong>UTILIZATION OF WARD LEVEL FUNDS</strong></h2><br></div>";
//=============================================================================================
echo "<div class='col-md-6 col-sm-6'>";
    $prabhag_num_A = $q."A";
    echo "<div class='text-center'><h3>Prabhag No ".$prabhag_num_A." </h3></div>";

    $sql = "SELECT DISTINCT Year FROM `work_details` WHERE Prabhag_No = '".$prabhag_num_A."'";
    $result = mysqli_query($con,$sql);
    $num_results = $result->num_rows;
    if ($num_results == 0) {
        echo "<div class='text-center'><h3><strong>No data found</strong></h3></div>";
    }
    else
    {
     $YEAR =array();
     for ($i=0; $i<$num_results; $i++)
     { 
        $row = mysqli_fetch_array($result);
        $YEAR[$i] = $row['Year'];
     }
     $sql_for_total_amt="SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."'";
     $result_for_total_amt = mysqli_query($con,$sql_for_total_amt);
     $row_for_total_amt = mysqli_fetch_array($result_for_total_amt);

        echo "<table class='table-bordered table-condensed'>";
            echo "<colgroup><col style='width:19%;'><col style='width:61%;'><col style='width:20%;'></colgroup>";
            echo "<thead><tr><th><strong>Year</strong></th><th><strong>Details Of Work</strong></th><th><strong>Amount (Rs.)</strong></th></tr></thead>";
            for ($i=0; $i < $num_results; $i++)
            { 
                $sql_for_select = "SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."' && Year = '".$YEAR[$i]."' ";
                $result_for_select = mysqli_query($con,$sql_for_select);
                $num_of_rows = $result_for_select->num_rows;
                if ($i%2==0)
                {
                    echo "<tbody class='table-even'>";
                    while($row_for_select = mysqli_fetch_array($result_for_select))
                    {
                        echo "<tr><td>" . $row_for_select['Year'] . "</td><td>" . $row_for_select['Details_Of_Work'] . "</td><td>" . $row_for_select['Amount'] . "</td></tr>";
                    }
                    echo "</tbody>";   
                }
                else
                {
                    echo "<tbody class='table-odd'>";
                    while($row_for_select = mysqli_fetch_array($result_for_select))
                    {
                        echo "<tr><td>" . $row_for_select['Year'] . "</td><td>" . $row_for_select['Details_Of_Work'] . "</td><td>" . $row_for_select['Amount'] . "</td></tr>";
                    }
                    echo "</tbody>";
                    }
            }
            echo "<tr><td></td><td><strong>Total Amount</strong></td><td><strong>" . $row_for_total_amt['Amount'] . "</strong></td></tr>";
        echo "</table>";
    }
echo "</div>";
//============================================================================================
echo "<div class='col-md-6 col-sm-6'>";
    $prabhag_num_B = $q."B";
    echo "<div class='text-center'><h3>Prabhag No ".$prabhag_num_B." </h3></div>";

    $sql = "SELECT DISTINCT Year FROM `work_details` WHERE Prabhag_No = '".$prabhag_num_B."'";
    $result = mysqli_query($con,$sql);
    $num_results = $result->num_rows;
    if ($num_results == 0) {
        echo "<div class='text-center'><h3><strong>No data found</strong></h3></div>";
    }
    else
    {
     $YEAR =array();
     for ($i=0; $i<$num_results; $i++)
     { 
        $row = mysqli_fetch_array($result);
        $YEAR[$i] = $row['Year'];
     }
     $sql_for_total_amt="SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."'";
     $result_for_total_amt = mysqli_query($con,$sql_for_total_amt);
     $row_for_total_amt = mysqli_fetch_array($result_for_total_amt);

        echo "<table class='table-bordered table-condensed'>";
            echo "<colgroup><col style='width:19%;'><col style='width:61%;'><col style='width:20%;'></colgroup>";
            echo "<thead><tr><th><strong>Year</strong></th><th><strong>Details Of Work</strong></th><th><strong>Amount (Rs.)</strong></th></tr></thead>";
            for ($i=0; $i < $num_results; $i++)
            { 
                $sql_for_select = "SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."' && Year = '".$YEAR[$i]."' ";
                $result_for_select = mysqli_query($con,$sql_for_select);
                $num_of_rows = $result_for_select->num_rows;
                if ($i%2==0)
                {   
                    echo "<tbody class='table-even'>";
                    while($row_for_select = mysqli_fetch_array($result_for_select))
                    {
                        echo "<tr><td>" . $row_for_select['Year'] . "</td><td>" . $row_for_select['Details_Of_Work'] . "</td><td>" . $row_for_select['Amount'] . "</td></tr>";
                    }
                    echo "</tbody>";  
                }
                else
                {   
                    echo "<tbody class='table-odd'>";
                    while($row_for_select = mysqli_fetch_array($result_for_select))
                    {
                        echo "<tr><td>" . $row_for_select['Year'] . "</td><td>" . $row_for_select['Details_Of_Work'] . "</td><td>" . $row_for_select['Amount'] . "</td></tr>";
                    }
                    echo "</tbody>";
                }
            }
            echo "<tr><td></td><td><strong>Total Amount</strong></td><td><strong>" . $row_for_total_amt['Amount'] . "</strong></td></tr>";
        echo "</table>";
    }
echo "</div>";
?>