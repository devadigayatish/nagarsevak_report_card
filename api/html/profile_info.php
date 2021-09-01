<div class='<?=$config["class_name"]; ?> text-center'>
    <?php
        $url = 'assets/images/photos/'. $row["Prabhag_No"] . '.jpg';
        if(!file_get_contents(SITE_URL . $url)){
            $url = 'assets/images/photos/'. $row["Prabhag_No"] . '.jpeg';
            if(!file_get_contents(SITE_URL . $url)){
                $url = 'assets/images/profile_pic.png';
            }
        }
    ?>
    <img style='width:100px; height: 125px;' src="<?=SITE_URL . $url; ?>">
    <div class='nagarsevak-name'><?=$row['Nagarsevak_Name']; ?></div>

    <table class='table table-bordered table-striped nagarsevak-short-info'>
        <colgroup> <col style='width:60%;'> <col style='width:40%;'> </colgroup>
        <tr><td>Prabhag No</td><td><?=$row["Prabhag_No"]; ?></td></tr>
        <tr><td>Political Party</td><td><?=$row['Party']; ?></td></tr>
        <tr>
            <td>No. of Questions asked in GB meetings</td>
            <td>
                <?php
                    $query = "SELECT (SUM(Total_Questions)/(SELECT COUNT(id) FROM nagarsevak)) as cw_avg FROM nagarsevak";
                    $result = mysqli_query($con, $query);
                    $cw_row = mysqli_fetch_assoc($result);
                ?>
                <?=$row['Total_Questions']; ?> 
                <div style="margin-top:10px;">(City-wide avg is <?=round($cw_row["cw_avg"], 2); ?>)</d>
            </td>
        </tr>
        <!-- (city-wide avg) -->
        <tr>
            <td>Attendance in GB meetings</td>
            <td>
                <?php
                    $query = "SELECT (SUM(Avg_Attendance)/(SELECT COUNT(id) FROM nagarsevak)) as cw_avg FROM nagarsevak";
                    $result = mysqli_query($con, $query);
                    $cw_row = mysqli_fetch_assoc($result);
                ?>
                <?=$row['Avg_Attendance']; ?> % 
                <div style="margin-top:10px;">(City-wide avg is <?=round($cw_row["cw_avg"], 2); ?>)</d>
            </td>
        </tr>
        <!-- (city-wide avg) -->
        <tr><td>Served on any Municipal Committee?</td><td><?php echo $row['Municipal_Committee'] ? $row['Municipal_Committee'] : "None"; ?></td></tr>
        <tr><td>Criminal charges filed?</td><td><?php echo "Data not provided by Govt."; // $row['Criminal_Records']; ?></td></tr>
    </table>
</div>