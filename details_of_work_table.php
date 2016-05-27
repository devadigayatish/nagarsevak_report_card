<?php
//connection

$q = intval($_GET['m']);

//MySQL Database Connect
include 'db_connection.php';
echo "<div id= ='name_for_table' align='center' style='width: 1076px;margin-top: 410px; font-size:20px; ' >";
echo "<strong>Utilization of Ward Level Funds</strong>";
echo "</div>";
//=============================================================================================
echo "<div id='tables' style='width: 1076px;'>";
echo "<div id='table1'>";
$prabhag_num_A = $q."A";

$sql="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."'";
$result = mysqli_query($con,$sql);
$sql1="SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."'";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($result1);

echo "<table  width='45%'align='left' border='1'style='margin-top: 5px;'>
<tr>
<th>Year</th>
<th>Details Of Work</th>
<th>Amount</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Year'] . "</td>";
    echo "<td>" . $row['Details_Of_Work'] . "</td>";
    echo "<td>" . $row['Amount'] . "</td>";
    echo "</tr>";
}
echo "<tr>";
echo "<td></td>";
echo "<td><strong>Total Amount</strong></td>";
echo "<td><strong>" . $row1['Amount'] . "</strong></td>";
echo "</tr>";
echo "</table>";

echo "</div>";
//============================================================================================
echo "<div id='table2'>";
$prabhag_num_B = $q."B";
$sql="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."'";
$result = mysqli_query($con,$sql);
$sql1="SELECT  SUM(Amount) AS Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."'";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($result1);
echo "<table  width='45%'align='right' border='1' style='margin-top: 5px;'>
<tr>
<th>Year</th>
<th>Details Of Work</th>
<th>Amount</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Year'] . "</td>";
    echo "<td>" . $row['Details_Of_Work'] . "</td>";
    echo "<td>" . $row['Amount'] . "</td>";
    echo "</tr>";
}
echo "<tr>";
echo "<td></td>";
echo "<td><strong>Total Amount</strong></td>";
echo "<td><strong>" . $row1['Amount'] . "</strong></td>";
echo "</tr>";
echo "</table>";

echo "</div>";

echo "</div>";

mysqli_close($con);
 ?>