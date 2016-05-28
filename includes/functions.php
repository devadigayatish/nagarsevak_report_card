 <?php
 /**
* @param prabhag_no string
* return json encoded data
*/
function get_pie_chart_data($prabhag_no = '35A') {
  global $con;
        //query all records from the database
  $query = "SELECT Details_Of_Work ,SUM(Amount) AS Amount FROM `work_details` WHERE Prabhag_No ='$prabhag_no' GROUP BY Code ORDER BY `Amount` DESC ";
        //execute the query
  $result = mysqli_query($con,$query);

        //get number of rows returned
  $num_results = $result->num_rows;

  $Details_of_work = array();
  $Amount = array();

  for($i=0; $i<$num_results;$i++)
  {
    $row = mysqli_fetch_assoc($result);

    $Details_of_work[$i] = $row['Details_Of_Work'];
    $Amount[$i] = $row['Amount'];
  }

  $combine_array = array_combine($Details_of_work, $Amount);
  $total_Amount = array_sum($Amount);
  $remaining_values = array_slice($Amount, 7);
  $remaining_total = array_sum($remaining_values);
  $chart_array = array(array());
  for($i=0; $i<7; $i++)
  {
    $chart_array[$i]['name'] = $Details_of_work[$i];
    $chart_array[$i]['no_of_times'] = $Amount[$i];
  }
  $chart_array[7]['name'] = "Others";
  $chart_array[7]['no_of_times'] = $remaining_total;
  return json_encode($chart_array);
}

?>