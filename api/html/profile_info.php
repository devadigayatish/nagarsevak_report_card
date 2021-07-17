<div class='col-sm-6 col-md-3 text-center'>
    <img style='width:100px; height: 125px;' src="<?=SITE_URL.'assets/'. $basic['URL']; ?>">
    <div class='nagarsevak-name'><?=$basic['Nagarsevak_Name']; ?></div>

    <table class='table table-bordered table-striped nagarsevak-short-info'>
        <colgroup> <col style='width:70%;'> <col style='width:30%;'> </colgroup>
        <tr><td>Prabhag No</td><td><?=$prabhag; ?></td></tr>
        <tr><td>Political Party</td><td><?=$info['Party']; ?></td></tr>
        <tr><td>No. of Questions asked in GB meetings</td><td><?=$info['Total_Questions']; ?></td></tr>
        <tr><td>Attendance in GB meetings</td><td><?=$info['Avg_Attendance']; ?> % </td></tr>
        <tr><td>Criminal charges filed?</td><td><?=$info['Criminal_Records']; ?></td></tr>
    </table>
</div>