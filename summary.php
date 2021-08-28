<?php require_once('_header.php'); ?>

<div id="fh5co-work-section" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 table-bordered animate-box ">
                <div class="text-center">
                    <?php
                        $query = "SELECT COUNT(Prabhag_No) AS Count FROM `nagarsevak`";
                        $result = mysqli_query($con, $query);
                        $result_array = mysqli_fetch_array($result);
                        $nagarsevak_count = $result_array["Count"];
                    ?>
                    <?php
                        $query = "SELECT SUM(Amount) AS Amount FROM `work_details`";
                        $result = mysqli_query($con, $query);
                        $result_array = mysqli_fetch_array($result);
                        $amount_overall_expense = round($result_array['Amount'], 2);
                    ?>
                    <h3>Total Amount spent by All Nagarsevaks : Rs <?php echo $amount_overall_expense; ?></h3>

                    <?php $amount_avg_nagarsevak = round($amount_overall_expense / $nagarsevak_count, 2);?>
                    <h3>Average Amount spent by Each Nagarsevak : Rs <?php echo $amount_avg_nagarsevak; ?></h3>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 table-bordered animate-box">
                <div class="text-center"><h3>Political Party-wise number of Nagarsevaks</h3></div>
                <div id="political_party_wise_number_of_nagarsevaks"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center"><h3>Top 5 Works per Year</h3></div>
                <div id="top_5_works_per_year"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box ">
                <div class="text-center"><h3>Overall Expenditure Pattern</h3></div>
                <div id="overall_expenditure_pattern"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center"><h3>Expenditure Pattern by Male Nagarsevaks</h3></div>
                <div id="expenditure_pattern_by_male_nagarsevaks"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center"><h3>Expenditure Pattern by Female Nagarsevaks</h3></div>
                <div id="expenditure_pattern_by_female_nagarsevaks"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center summary-titles"><h3>Attendance of Nagarsevaks in GB Meetings</h3></div>
                <div id="attendance_of_nagarsevaks_in_gb_meetings"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center summary-titles"><h3>Attendance of Nagarsevaks in GB Meetings (Party-wise)</h3></div>
                <div id="attendance_of_nagarsevaks_in_gb_meetings__party_wise_"></div>
            </div>
            
            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class='text-center'><h3>Nagarsevaks with Least Attendance in GB Meetings</h3></div>
                <div id="nagarsevaks_with_least_attendance_in_gb_meetings" class="row">
                    <?php
                        $data = [];
                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Avg_Attendance, Party FROM nagarsevak 
                            WHERE Gender = 'M' AND Avg_Attendance=(SELECT MIN(Avg_Attendance) FROM nagarsevak WHERE Gender = 'M')";
                        $result = mysqli_query($con, $query);
                        $data[] = mysqli_fetch_array($result);

                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Avg_Attendance, Party FROM nagarsevak 
                            WHERE Gender = 'F' AND Avg_Attendance=(SELECT MIN(Avg_Attendance) FROM nagarsevak WHERE Gender = 'F')";
                        $result = mysqli_query($con, $query);
                        $data[] = mysqli_fetch_array($result);
                    
                        for ($i=0; $i < 2; $i++) { 
                            ?>
                            <div class='col-sm-6 col-md-6 text-center'>
                                <?php
                                    $row = $data[$i];
                                    if($row){
                                        $url = 'assets/images/photos/'. $row["Prabhag_No"] . '.jpg';
                                        if(!file_get_contents(SITE_URL . $url)){
                                            $url = 'assets/images/profile_pic.png';
                                        } ?>
                                        <img style='width:100px; height: 125px;' src="<?=SITE_URL . $url; ?>">
                                        <div class='nagarsevak-name'><?=$row['Nagarsevak_Name']; ?></div>

                                        <table class='table table-bordered table-striped nagarsevak-short-info'>
                                            <colgroup> <col style='width:70%;'> <col style='width:30%;'> </colgroup>
                                            <tr><td>Prabhag No</td><td><?=$row["Prabhag_No"]; ?></td></tr>
                                            <tr><td>Political Party</td><td><?=$row['Party']; ?></td></tr>
                                            <tr><td>Attendance</td><td><?=$row['Avg_Attendance']; ?> % </td></tr>
                                        </table>
                                <?php
                                    } else {   ?>
                                        <h3 style='text-align:center; height:170px;'> <br><br>No Data found</h3>
                                <?php
                                    }   ?>
                            </div>
                    <?php
                        }   ?>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class='text-center'><h3>Nagarsevaks with Highest Attendance in GB Meetings</h3></div>
                <div id="nagarsevaks_with_highest_attendance_in_gb_meetings" class="row">
                    <?php
                        $data = [];
                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Avg_Attendance, Party FROM nagarsevak 
                            WHERE Gender = 'M' AND Avg_Attendance=(SELECT MAX(Avg_Attendance) FROM nagarsevak WHERE Gender = 'M')";
                        $result = mysqli_query($con, $query);
                        $data[] = mysqli_fetch_array($result);

                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Avg_Attendance, Party FROM nagarsevak 
                            WHERE Gender = 'F' AND Avg_Attendance=(SELECT MAX(Avg_Attendance) FROM nagarsevak WHERE Gender = 'F')";
                        $result = mysqli_query($con, $query);
                        $data[] = mysqli_fetch_array($result);
                    
                        for ($i=0; $i < 2; $i++) { 
                            ?>
                            <div class='col-sm-6 col-md-6 text-center'>
                                <?php
                                    $row = $data[$i];
                                    if($row){
                                        $url = 'assets/images/photos/'. $row["Prabhag_No"] . '.jpg';
                                        if(!file_get_contents(SITE_URL . $url)){
                                            $url = 'assets/images/profile_pic.png';
                                        } ?>
                                        <img style='width:100px; height: 125px;' src="<?=SITE_URL . $url; ?>">
                                        <div class='nagarsevak-name'><?=$row['Nagarsevak_Name']; ?></div>

                                        <table class='table table-bordered table-striped nagarsevak-short-info'>
                                            <colgroup> <col style='width:70%;'> <col style='width:30%;'> </colgroup>
                                            <tr><td>Prabhag No</td><td><?=$row["Prabhag_No"]; ?></td></tr>
                                            <tr><td>Political Party</td><td><?=$row['Party']; ?></td></tr>
                                            <tr><td>Attendance</td><td><?=$row['Avg_Attendance']; ?> % </td></tr>
                                        </table>
                                <?php
                                    } else {   ?>
                                        <h3 style='text-align:center; height:170px;'> <br><br>No Data found</h3>
                                <?php
                                    }   ?>
                            </div>
                    <?php
                        }   ?>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center summary-titles"><h3>Number of Questions asked by Nagarsevaks in GB Meetings</h3></div>
                <div id="number_of_questions_asked_by_nagarsevaks_in_gb_meetings"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center summary-titles"><h3>Number of Questions asked by Nagarsevaks in GB Meetings (Party-wise)</h3></div>
                <div id="number_of_questions_asked_by_nagarsevaks_in_gb_meetings__party_wise_"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class='text-center'><h3>Nagarsevaks who asked the Lowest Questions in GB Meetings</h3></div>
                <div id="nagarsevaks_who_asked_the_lowest_questions_in_gb_meetings" class="row">
                    <?php
                        $data = [];
                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Total_Questions, Party FROM nagarsevak 
                            WHERE Gender = 'M' AND Total_Questions=(SELECT MIN(Total_Questions) FROM nagarsevak WHERE Gender = 'M')";
                        $result = mysqli_query($con, $query);
                        $data[] = mysqli_fetch_array($result);

                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Total_Questions, Party FROM nagarsevak 
                            WHERE Gender = 'F' AND Total_Questions=(SELECT MIN(Total_Questions) FROM nagarsevak WHERE Gender = 'F')";
                        $result = mysqli_query($con, $query);
                        $data[] = mysqli_fetch_array($result);
                    
                        for ($i=0; $i < 2; $i++) { 
                            ?>
                            <div class='col-sm-6 col-md-6 text-center'>
                                <?php
                                    $row = $data[$i];
                                    if($row){
                                        $url = 'assets/images/photos/'. $row["Prabhag_No"] . '.jpg';
                                        if(!file_get_contents(SITE_URL . $url)){
                                            $url = 'assets/images/profile_pic.png';
                                        } ?>
                                        <img style='width:100px; height: 125px;' src="<?=SITE_URL . $url; ?>">
                                        <div class='nagarsevak-name'><?=$row['Nagarsevak_Name']; ?></div>

                                        <table class='table table-bordered table-striped nagarsevak-short-info'>
                                            <colgroup> <col style='width:70%;'> <col style='width:30%;'> </colgroup>
                                            <tr><td>Prabhag No</td><td><?=$row["Prabhag_No"]; ?></td></tr>
                                            <tr><td>Political Party</td><td><?=$row['Party']; ?></td></tr>
                                            <tr><td>No. of Questions asked</td><td><?=$row['Total_Questions']; ?></td></tr>
                                        </table>
                                <?php
                                    } else {   ?>
                                        <h3 style='text-align:center; height:170px;'> <br><br>No Data found</h3>
                                <?php
                                    }   ?>
                            </div>
                    <?php
                        }   ?>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class='text-center'><h3>Nagarsevaks who asked the Highest Questions in GB Meetings</h3></div>
                <div id="nagarsevaks_who_asked_the_highest_questions_in_gb_meetings" class="row">
                    <?php
                        $data = [];
                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Total_Questions, Party FROM nagarsevak 
                            WHERE Gender = 'M' AND Total_Questions=(SELECT MAX(Total_Questions) FROM nagarsevak WHERE Gender = 'M')";
                        $result = mysqli_query($con, $query);
                        $data[] = mysqli_fetch_array($result);

                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Total_Questions, Party FROM nagarsevak 
                            WHERE Gender = 'F' AND Total_Questions=(SELECT MAX(Total_Questions) FROM nagarsevak WHERE Gender = 'F')";
                        $result = mysqli_query($con, $query);
                        $data[] = mysqli_fetch_array($result);
                    
                        for ($i=0; $i < 2; $i++) { 
                            ?>
                            <div class='col-sm-6 col-md-6 text-center'>
                                <?php
                                    $row = $data[$i];
                                    if($row){
                                        $url = 'assets/images/photos/'. $row["Prabhag_No"] . '.jpg';
                                        if(!file_get_contents(SITE_URL . $url)){
                                            $url = 'assets/images/profile_pic.png';
                                        } ?>
                                        <img style='width:100px; height: 125px;' src="<?=SITE_URL . $url; ?>">
                                        <div class='nagarsevak-name'><?=$row['Nagarsevak_Name']; ?></div>

                                        <table class='table table-bordered table-striped nagarsevak-short-info'>
                                            <colgroup> <col style='width:70%;'> <col style='width:30%;'> </colgroup>
                                            <tr><td>Prabhag No</td><td><?=$row["Prabhag_No"]; ?></td></tr>
                                            <tr><td>Political Party</td><td><?=$row['Party']; ?></td></tr>
                                            <tr><td>No. of Questions asked</td><td><?=$row['Total_Questions']; ?></td></tr>
                                        </table>
                                <?php
                                    } else {   ?>
                                        <h3 style='text-align:center; height:170px;'> <br><br>No Data found</h3>
                                <?php
                                    }   ?>
                            </div>
                    <?php
                        }   ?>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center summary-titles"><h3>Nagarsevaks who asked Questions (Party-wise)</h3></div>
                <div id="nagarsevaks_who_asked_questions__party_wise_"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box">
                <div class="text-center summary-titles"><h3>Nagarsevaks with Criminal Charges (Party-wise)</h3></div>
                <div id="nagarsevaks_with_criminal_charges__party_wise_"></div>
            </div>
        </div>
    </div>
</div>

<?php ob_start(); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo SITE_URL ?>assets/summary.js"></script>
<?php 
    $contentData = ob_get_contents(); 
    ob_end_clean ();
    $contentBuffer["BOTTOM"][] = $contentData;
?>

<?php require_once('_footer.php'); ?>