<?php
//connection
$q = intval($_GET['n']);

$con = mysqli_connect('localhost','root','','csv_db');
if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
           }

mysqli_select_db($con,"csv_db");
//====================================================================================

 //FOR FETCHING IMAGE of Part A
    $prabhag_num_A = $q."A";          
    $sql = "SELECT Nagarsevak_Name,URL FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num_A."' ";
    $result = mysqli_query($con,$sql);
    $row_A = mysqli_fetch_array($result);
    
    //fetch tha data from the database
    echo "<div class=''><img width='100' align='left'  src=". $row_A['URL']." style='margin-left: 100px; margin-top: 10px;'></div>" ;
    
    
//=====================================================================================

 //FOR FETCHING IMAGE of Part B
    $prabhag_num_B = $q."B";          
    $sql = "SELECT Nagarsevak_Name,URL FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num_B."' ";
    $result = mysqli_query($con,$sql);
    $row_B = mysqli_fetch_array($result);
    //fetch tha data from the database
    echo "<div class=''><img width='100' align='right' src=". $row_B['URL']." style='margin-right: 100px; margin-top: 10px;'></div>" ;
    


//=====================================================================================
 //for fetching names
 
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<br>";
    echo "<div class='' style='width: 500px;'>";
    echo "<div align='center' style='width: 250px; float : left'>";
    echo "".$prabhag_num_A." : ";
    $name_A = "". $row_A['Nagarsevak_Name']."";
    echo wordwrap($name_A,20,"<br>\n");
    echo "</div>";

    echo "<div align='center' style='width: 250px; float : right'>";
    echo "".$prabhag_num_B." : ";
    $name_B = "". $row_B['Nagarsevak_Name']."";
    echo wordwrap($name_B,20,"<br>\n");
    echo "</div>";
    echo "</div>";
  
//=============================================================================

    echo "<div id='tables' style='width: 500px;margin-top: 60px;'>";
    { // nagarsevak info part A
    
    
    $sql = "SELECT Party,Avg_Questions,Avg_Attendance,Criminal_Records FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num_A."' ";
    
           
    $result = mysqli_query($con,$sql);
    
    echo "<table align='left' width='35%' border='1' style='margin-left: 50px;'>";
             
    while ($row = mysqli_fetch_array($result)) 
    {
    //fetch tha data from the database
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
    }

//=======================================================================================


 { // nagarsevak info part B
    
    $sql = "SELECT Party,Avg_Questions,Avg_Attendance,Criminal_Records FROM nagarsevak WHERE Prabhag_No = '".$prabhag_num_B."' ";
    
            
    $result = mysqli_query($con,$sql);
    
    echo "<table align='right' width='35%' border='1' style='margin-right: 50px;'>";
             
    while ($row = mysqli_fetch_array($result)) 
    {
    //fetch tha data from the database
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
    }
    echo "</div>";
//=============================================================================================

  