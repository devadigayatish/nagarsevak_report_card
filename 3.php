<?php
//connection

$q = intval($_GET['m']);

$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");
//=============================================================================================
echo "<div id='tables' style='width: 1076px;'>";
$prabhag_num_A = $q."A";

$sql="SELECT Year , DOW , Amount FROM finaltable WHERE Prabhag_No = '".$prabhag_num_A."'";
$result = mysqli_query($con,$sql);

echo "<table  width='45%'align='left' border='1'style='margin-top: 25px;'>
<tr>
<th>Year</th>
<th>DOW</th>
<th>Amount</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Year'] . "</td>";
    echo "<td>" . $row['DOW'] . "</td>";
    echo "<td>" . $row['Amount'] . "</td>";
    echo "</tr>";
}
echo "</table>";

//============================================================================================

$prabhag_num_B = $q."B";
$sql="SELECT Year , DOW , Amount FROM finaltable WHERE Prabhag_No = '".$prabhag_num_B."'";
$result = mysqli_query($con,$sql);

echo "<table  width='45%'align='right' border='1' style='margin-top: 25px;'>
<tr>
<th>Year</th>
<th>DOW</th>
<th>Amount</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Year'] . "</td>";
    echo "<td>" . $row['DOW'] . "</td>";
    echo "<td>" . $row['Amount'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";

mysqli_close($con);
 ?>