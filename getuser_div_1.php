<?php
//connection
$q = intval($_GET['n']);

$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");
//====================================================================================

//=====================================================================================


//FOR FETCHING IMAGE of Part A
    $prabhag_num = $q."A";          
    $sql = "SELECT URL,Nagarsevak_Name FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num."' ";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    
    //fetch tha data from the database
    echo "<span id='image_A' style='width: 254px;margin-left: 100px;'><img width='100' align='center' src=". $row['URL'].">
     </span>";

//--------------------------------------------------------------------------------------------------------
 //FOR FETCHING IMAGE of Part B
    $prabhag_num = $q."B";          
    $sql = "SELECT URL,Nagarsevak_Name FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num."' ";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    
    //fetch tha data from the database
    echo "<span id='image_B' style='width: 254px; margin-left: 100px;'><img width='100' align='center'  src=". $row['URL']."></span>";
 //-----------------------------------------------------------------------------------------------------


    echo "<span style='width: 254px;'>" ;
    $prabhag_num = $q."A"; 
     $sql = "SELECT Party,Avg_Questions,Avg_Attendance,Criminal_Records FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num."' ";
    
           
     $result = mysqli_query($con,$sql);
    
     echo "<table  border=1>";
             
     while ($row = mysqli_fetch_array($result)) 
     {
    
    echo "<tr>";
    echo "<td>Party:</td>";
    echo "<td>" . $row['Party']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Avg Questions:</td>";
    echo "<td>" . $row['Avg_Questions']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Avg Attendance:</td>";
    echo "<td>" . $row['Avg_Attendance']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Criminal Records:</td>";
    echo "<td>" . $row['Criminal_Records']."</td>";
    echo "</tr>";

    }
    echo "</table>";    
echo "</span>" ;
    
    
    
//=====================================================================================

    

               
    echo "<span style='width: 254px;'>" ;
    $prabhag_num = $q."B"; 
     $sql = "SELECT Party,Avg_Questions,Avg_Attendance,Criminal_Records FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num."' ";
    
           
     $result = mysqli_query($con,$sql);
    
     echo "<table border=1 >";
             
     while ($row = mysqli_fetch_array($result)) 
     {
    
    echo "<tr>";
    echo "<td>Party:</td>";
    echo "<td>" . $row['Party']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Avg Questions:</td>";
    echo "<td>" . $row['Avg_Questions']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Avg Attendance:</td>";
    echo "<td>" . $row['Avg_Attendance']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Criminal Records:</td>";
    echo "<td>" . $row['Criminal_Records']."</td>";
    echo "</tr>";

    }
    echo "</table>";    
    echo "</span>" ;

//=============================================================================================


mysqli_close($con);
?>