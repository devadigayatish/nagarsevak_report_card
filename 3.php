<?php
//connection

$q = intval($_GET['m']);

//MySQL Database Connect
include 'db_connection.php';

//=============================================================================================
echo "<div id='tables' style='width: 1076px;'>";
$prabhag_num_A = $q."A";

$sql="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_A."'";
$result = mysqli_query($con,$sql);

echo "<table  width='45%'align='left' border='1'style='margin-top: 25px;'>
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
echo "</table>";

//============================================================================================

$prabhag_num_B = $q."B";
$sql="SELECT Year , Details_Of_Work , Amount FROM work_details WHERE Prabhag_No = '".$prabhag_num_B."'";
$result = mysqli_query($con,$sql);

echo "<table  width='45%'align='right' border='1' style='margin-top: 25px;'>
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
echo "</table>";
echo "</div>";

mysqli_close($con);
 ?>