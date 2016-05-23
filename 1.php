<?php
//connection
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");
//====================================================================================

{ // prabhag name info

     $prabhag_num = $q."A";          
    
    
     $sql = "SELECT Prabhag_Name,Ward_ofc FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num."' ";
    
           
     $result = mysqli_query($con,$sql);
    
     echo "<table align='center' style='font:Times New Roman; font-size: 20;'>";
             
     while ($row = mysqli_fetch_array($result)) 
     {
    echo "<tr>";
    echo "<td>Prabhag :</td>";

    echo "<td>" . $row['Prabhag_Name']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>Ward Ofc: </td>";
    echo "<td>" . $row['Ward_ofc']."</td>";
    echo "</tr>";
    
    }
    echo "</table>";        
    }

mysqli_close($con);
?>