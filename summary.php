<?php require_once('_header.php'); ?>

<div id="fh5co-work-section" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 table-bordered animate-box-1 ">
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
                    <h3>Total Amount spent by All Nagarsevaks : Rs <?php echo moneyFormatIndia($amount_overall_expense); ?></h3>

                    <?php $amount_avg_nagarsevak = round($amount_overall_expense / $nagarsevak_count, 2);?>
                    <h3>Average Amount spent by Each Nagarsevak : Rs <?php echo moneyFormatIndia($amount_avg_nagarsevak); ?></h3>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 table-bordered animate-box-1">
                <div class="text-center"><h3>Political Party-wise number of Nagarsevaks</h3></div>
                <div id="political_party_wise_number_of_nagarsevaks"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class="text-center"><h3>Top 5 Works per Year</h3></div>
                <div id="top_5_works_per_year"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1 ">
                <div class="text-center"><h3>Overall Expenditure Pattern</h3></div>
                <div id="overall_expenditure_pattern"></div>
            </div>

            <div class="col-md-4 col-sm-6 table-bordered animate-box-1">
                <div class="text-center"><h3>Expenditure Pattern by Male Nagarsevaks</h3></div>
                <div id="expenditure_pattern_by_male_nagarsevaks"></div>
            </div>

            <div class="col-md-4 col-sm-6 table-bordered animate-box-1">
                <div class="text-center"><h3>Expenditure Pattern by Female Nagarsevaks</h3></div>
                <div id="expenditure_pattern_by_female_nagarsevaks"></div>
            </div>

            <?php
                $data = [];
                $query = "SELECT Party FROM nagarsevak WHERE nagarsevak.Party <> ''
                    GROUP BY nagarsevak.Party ORDER BY nagarsevak.Party ASC";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-md-4 col-sm-6 table-bordered animate-box-1">
                            <div class="text-center"><h3>Expenditure Pattern by <?=$row['Party']; ?> Nagarsevaks</h3></div>
                            <div id='party_<?=$row['Party']; ?>' style='text-align:center; height:200px;'>
                                <h3> <br><br>No related data found.</h3>
                            </div>
                        </div>
                    <?php
                }
            ?>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class="text-center summary-titles"><h3>Attendance of Nagarsevaks in GB Meetings</h3></div>
                <div id="attendance_of_nagarsevaks_in_gb_meetings"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class="text-center summary-titles"><h3>Attendance of Nagarsevaks in GB Meetings (Party-wise)</h3></div>
                <div id="attendance_of_nagarsevaks_in_gb_meetings__party_wise_"></div>
            </div>
            
            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class='text-center'><h3>Nagarsevaks with Least Attendance in GB Meetings</h3></div>
                <div id="nagarsevaks_with_least_attendance_in_gb_meetings" class="row">
                    <?php
                        $data = [];
                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Avg_Attendance, Party FROM nagarsevak 
                            WHERE Avg_Attendance < 50 ORDER BY Avg_Attendance DESC";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                        }
                    ?>
                    <div class="col-md-12">
                        <table class='table table-bordered table-striped nagarsevak-short-info'>
                            <tr>
                                <td>Sr. No.</td>
                                <td>Prabhag No.</td>
                                <td>Name</td>
                                <td>Political Party</td>
                                <td>Attendance</td>
                            </tr>
                            <?php
                                if($data){
                                    foreach($data as $k => $row){
                                        ?>
                                            <tr>
                                                <td><?=$k+1; ?></td>
                                                <td><?=$row["Prabhag_No"]; ?></td>
                                                <td><?=$row["Nagarsevak_Name"]; ?></td>
                                                <td><?=$row['Party']; ?></td>
                                                <td><?=$row['Avg_Attendance']; ?> % </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class='text-center'><h3>Nagarsevaks with Highest Attendance in GB Meetings</h3></div>
                <div id="nagarsevaks_with_highest_attendance_in_gb_meetings" class="row">
                    <?php
                        $data = [];
                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Avg_Attendance, Party FROM nagarsevak 
                            WHERE Avg_Attendance >= 93 ORDER BY Avg_Attendance DESC";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                        }
                    ?>
                    <div class="col-md-12">
                        <table class='table table-bordered table-striped nagarsevak-short-info'>
                            <tr>
                                <td>Sr. No.</td>
                                <td>Prabhag No.</td>
                                <td>Name</td>
                                <td>Political Party</td>
                                <td>Attendance</td>
                            </tr>
                            <?php
                                if($data){
                                    foreach($data as $k => $row){
                                        ?>
                                            <tr>
                                                <td><?=$k+1; ?></td>
                                                <td><?=$row["Prabhag_No"]; ?></td>
                                                <td><?=$row["Nagarsevak_Name"]; ?></td>
                                                <td><?=$row['Party']; ?></td>
                                                <td><?=$row['Avg_Attendance']; ?> % </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class="text-center summary-titles"><h3>Number of Questions asked by Nagarsevaks in GB Meetings</h3></div>
                <div id="number_of_questions_asked_by_nagarsevaks_in_gb_meetings"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class="text-center summary-titles"><h3>Number of Questions asked by Nagarsevaks in GB Meetings (Party-wise)</h3></div>
                <div id="number_of_questions_asked_by_nagarsevaks_in_gb_meetings__party_wise_"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class='text-center'><h3>Nagarsevaks who asked the Lowest Questions in GB Meetings</h3></div>
                <div id="nagarsevaks_who_asked_the_lowest_questions_in_gb_meetings" class="row">
                    <?php
                        $data = [];
                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Total_Questions, Party FROM nagarsevak 
                            WHERE Total_Questions > 0 ORDER BY Total_Questions DESC";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                        }
                    ?>
                    <div class="col-md-12">
                        <table class='table table-bordered table-striped nagarsevak-short-info'>
                            <tr>
                                <td>Sr. No.</td>
                                <td>Prabhag No.</td>
                                <td>Name</td>
                                <td>Political Party</td>
                                <td>Total Questions</td>
                            </tr>
                            <?php
                                if($data){
                                    foreach($data as $k => $row){
                                        ?>
                                            <tr>
                                                <td><?=$k+1; ?></td>
                                                <td><?=$row["Prabhag_No"]; ?></td>
                                                <td><?=$row["Nagarsevak_Name"]; ?></td>
                                                <td><?=$row['Party']; ?></td>
                                                <td><?=$row['Total_Questions']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class='text-center'><h3>Nagarsevaks who asked the Highest Questions in GB Meetings</h3></div>
                <div id="nagarsevaks_who_asked_the_highest_questions_in_gb_meetings" class="row">
                    <?php
                        $data = [];
                        $query = "SELECT Prabhag_No, Nagarsevak_Name, Total_Questions, Party FROM nagarsevak 
                            WHERE Total_Questions > 0 ORDER BY Total_Questions DESC";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                        }
                    ?>
                    <div class="col-md-12">
                        <table class='table table-bordered table-striped nagarsevak-short-info'>
                            <tr>
                                <td>Sr. No.</td>
                                <td>Prabhag No.</td>
                                <td>Name</td>
                                <td>Political Party</td>
                                <td>Total Questions</td>
                            </tr>
                            <?php
                                if($data){
                                    foreach($data as $k => $row){
                                        ?>
                                            <tr>
                                                <td><?=$k+1; ?></td>
                                                <td><?=$row["Prabhag_No"]; ?></td>
                                                <td><?=$row["Nagarsevak_Name"]; ?></td>
                                                <td><?=$row['Party']; ?></td>
                                                <td><?=$row['Total_Questions']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class="text-center summary-titles"><h3>Nagarsevaks who asked Questions (Party-wise)</h3></div>
                <div id="nagarsevaks_who_asked_questions__party_wise_"></div>
            </div>

            <div class="col-md-6 col-sm-6 table-bordered animate-box-1">
                <div class="text-center summary-titles"><h3>Nagarsevaks with Criminal Charges (Party-wise)</h3></div>
                <div id="nagarsevaks_with_criminal_charges__party_wise_"></div>
            </div>
        </div>
    </div>
</div>

<?php ob_start(); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo SITE_URL ?>assets/summary.js?_<?=mt_rand(); ?>"></script>
<?php 
    $contentData = ob_get_contents(); 
    ob_end_clean ();
    $contentBuffer["BOTTOM"][] = $contentData;
?>

<?php require_once('_footer.php'); ?>