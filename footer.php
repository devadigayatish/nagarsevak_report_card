<footer>
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="text-center animate-box">
                    <nav class="nav">
                    <a href="<?php echo SITE_URL ?>index.php" class="btn btn-primary"><strong>Home</strong></a>&nbsp;&nbsp;
                    <a href="<?php echo SITE_URL ?>summary.php" class="btn btn-primary"><strong>Detailed Analysis</strong></a>&nbsp;&nbsp;
                    <a href="<?php echo SITE_URL ?>about-nagarsevak-report-card.php" class="btn btn-primary"><strong>About Nagarsevak Report Card</strong></a>&nbsp;&nbsp;
                    <a target="_blank" href="http://parivartan-pune.blogspot.in/p/about-us.html" class="btn btn-primary"><strong>About Parivartan</strong></a>&nbsp;&nbsp;
                    </nav>
                    <hr/>
                    <p>
                        Website designed, developed, hosted and maintained by <a target="_blank" href="http://startuppartner.co.in/about.html"><strong>Startup Partner Pvt Ltd.</strong></a> Content Provided by <a target="_blank" href="http://parivartan-pune.blogspot.in/p/about-us.html"><strong>Parivartan.</strong></a>
                    </p>
                    <p>
                    <a href="https://github.com/devadigayatish/nagarsevak_report_card" target="_blank"><strong>Source Code</strong></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="<?php echo SITE_URL ?>contributors.php"><strong>Contributors</strong></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="<?php echo SITE_URL ?>disclaimer.php"><strong>Disclaimer</strong></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="<?php echo SITE_URL ?>report-bug.php"><strong>Report Bug</strong></a>
                    </p>
                    <hr/>
                    <p>
                        This project is NOT Copyright protected. You're welcome to fork this project from &nbsp;<a target="_blank" href="https://github.com/devadigayatish/nagarsevak_report_card"><strong>Here</strong></a>&nbsp; and contribute. Also, if you are an NGO and want to do a similar kind of project in your city, we encourage you to copy our work and code.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    function draw_piechart(data, element, showDatalabels, showLegends) {
        if(!data) {
            return $('#'+element).html('No data found');
        }
        if (!showDatalabels) {
            showDatalabels = true;
        }
        if (!showLegends) {
            showLegends = true;
        }
        Highcharts.setOptions({
            colors: ['#3366cc','#dc3912','#ff9900','#109618','#990099','#0099c6','#dd4477','#b82e2e','#66aa00','#316395']
        });
        // $.get(url, function (data) {
    
        data = $.parseJSON(data);
        
        var collection, ele, flag, _i, _j, _len, _len1;
        flag = true;
        for (_i = 0, _len = data.length; _i < _len; _i++) {
            ele = data[_i];
            if (parseInt(ele.no_of_times) <= 0) {
                flag = false;
            } else {
                flag = true;
                break;
            }
        }
        if (data.length === 0 || flag === false) {
            $("#" + element).empty();
            $("#" + element).html("No data found");
            return false;
        }
        collection = [];
        for (_j = 0, _len1 = data.length; _j < _len1; _j++) {
            ele = data[_j];
            collection.push([ele.name, parseInt(ele.no_of_times)]);
        }
        var chart = new Highcharts.Chart({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                renderTo: element,
                plotShadow: false,
            },
            credits: {
                enabled: false
            },
            title: {
                text: ""
            },
            tooltip: {
                pointFormat: "{series.name}: <b>{point.percentage:.1f}% (Rs.{point.y:1f})</b>"
            },
            plotOptions: {
                pie: {
                    point: {
                        events: {
                            legendItemClick: function () {
                                // some code here to achieve my goal
                                this.select();
                                chart.tooltip.refresh(this);
                                return false; // <== returning false will cancel the default action
                            }
                        }
                    },
                    allowPointSelect: true,
                    cursor: "pointer",
                  size:'100%',
                    dataLabels: {
                        enabled: showDatalabels,
                        format: '{point.percentage:.1f} %',
                    },
                    showInLegend: true
                }
            },
            legend: {
                enabled: showLegends,
                layout: 'vertical',
               //  align: 'center',
                 width: 320,
                 
               //  verticalAlign: 'middle',
               //  useHTML: true,
                labelFormatter: function () {
                    return '<div style="text-align: left; ">' + this.name + '</div>';
                }
            },
            series: [
                {
                    type: "pie",
                    name: "Percentage",
                    colorByPoint: true,
                    data: collection
                }
            ]
        });
// });
        return false;
    };

</script>

<script src="<?php echo SITE_URL ?>assets/js/lib/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/jquery.waypoints.min.js"></script>
    <!-- Stellar -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/jquery.stellar.min.js"></script>
    <!-- Superfish -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/hoverIntent.js"></script>
    <script src="<?php echo SITE_URL ?>assets/js/lib/superfish.js"></script>

    <!-- Main JS (Do not remove) -->
    <script src="<?php echo SITE_URL ?>assets/js/lib/main.js"></script>