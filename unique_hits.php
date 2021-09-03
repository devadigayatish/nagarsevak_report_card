<?php 
    $table = 'visitors';

    // $filename = "visitors.txt"; 

    // $file = file($filename); 
    // $file = array_unique($file); 
    // $hits = count($file); 

    $query = "SELECT COUNT(DISTINCT(ip_data)) as hits FROM {$table}";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $hits = (int)$row["hits"];
    // print_r_pre($query);
?>

<div id='visitor-counter' class='text-center' style='margin-right: 15px;'>
    Unique Visitors : <strong><?=$hits; ?></strong>
</div>

<?php
    // $fd = fopen ($filename , "r"); 
    // $fstring = fread ($fd , filesize ($filename)) ; 
    // fclose($fd) ; 
    // $fd = fopen ($filename , "w"); 
    // $fcounted = $fstring."\n".getenv("REMOTE_ADDR"); 
    // $fout= fwrite ($fd , $fcounted );
    // fclose($fd); 

    $ip = getenv("REMOTE_ADDR");
    if($ip){
        $query = "SELECT id FROM {$table} WHERE ip_data = '{$ip}'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        // print_r_pre($query);

        if($row["id"])
        {
            $query = "UPDATE {$table} SET ip_data = '{$ip}', updated_on = '". date("Y-m-d H:i:s")."' 
                WHERE id = " . $row["id"];
            $result = mysqli_query($con, $query);
            // print_r_pre($query);
        }
        else{
            $query = "INSERT INTO {$table} (ip_data, created_on) VALUES('{$ip}', '". date("Y-m-d H:i:s")."')";
            $result = mysqli_query($con, $query);
            // print_r_pre($query);
        }
    }
?>