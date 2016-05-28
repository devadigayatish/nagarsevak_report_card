<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto;border-style: inset; border-width: 1px;">
<!-- ===================================== footer ========================================================= -->
<div id="footer">       

    <footer class="">

        <h4 style="margin-left: 20px;">Website designed, developed, hosted and maintained by 
            <a target="_blank" href="http://startuppartner.co.in/about.html">
                <strong style="color: blue">Startup Partner Pvt Ltd. </strong>
            </a>Content Provided by <a target="_blank" href="http://parivartan-pune.blogspot.in/p/about-us.html">
                <strong style="color: blue">Parivartan</strong>
            </a>
        </h4>
        <h4 align="center" style="c">
            <nav>

                <a class="" target="_blank" href="https://github.com/devadigayatish/nagarsevak_report_card" style="color: black;">Source Code</a>
                |
                <a href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display = 'block';
                        document.getElementById('fade2').style.display = 'block'" style="color: black;">Contributors</a>
                <div id="light2" class="white_content1" style="text-align: justify; font-size: 15px;">
                    <strong style="text-align: justify; font-size: 20px;">Contributors</strong>
                    <button style="top: 0%; float: right;"onclick = "document.getElementById('light2').style.display = 'none';
                            document.getElementById('fade2').style.display = 'none'">
                        <img style="width:20px; height: 20px;" src="<?php echo SITE_URL; ?>assets/images/logo/close_button_red.png"></button>
                    <br><br>
                    <ul>
                        <li><strong>Sharvari Gaikwad </strong>(sharvari.v.gaikwad@gmail.com), Intern for Startup Partner. Main developer for this project.</li>
                        <br><br>
                        <li><strong>Yatish Devadiga </strong>(devadigayatish@gmail.com), Software Engineer - Startup Partner. Technical guide for this project.</li>
                        <br><br>
                        <li><strong>Nikhil Sheth </strong>(nikhil.js@gmail.com), Helped with majority of the code.. mainly with Mapbox.</li>
                    </ul>
                </div>
                <div id="fade2" class="black_overlay"></div>
                |
                <a href = "javascript:void(0)" onclick = "document.getElementById('light3').style.display = 'block';
                        document.getElementById('fade3').style.display = 'block'" style="color: black;">Disclaimer</a>
                <div id="light3" class="white_content2" style="text-align: justify; font-size: 15px;">
                    <strong style="text-align: justify; font-size: 20px;">Disclaimer</strong>
                    <button style="top: 0%; float: right;"onclick = "document.getElementById('light3').style.display = 'none';
                            document.getElementById('fade3').style.display = 'none'">
                        <img style="width:20px; height: 20px;" src="<?php echo SITE_URL; ?>assets/images/logo/close_button_red.png"></button>
                    <br><br>
                    This Website is designed, developed, hosted and maintained by Startup Partner Pvt Ltd. The content of this website is provided by Parivartan and it is for information purposes only, enabling the public at large to have a quick and an easy access to information and do not have any legal sanctity.
                </div>
                <div id="fade3" class="black_overlay"></div>
                |
                <a href = "javascript:void(0)" onclick = "document.getElementById('light4').style.display = 'block';
                        document.getElementById('fade4').style.display = 'block'" style="color: black;">Report Bug</a>
                <div id="light4" class="white_content3" style="text-align: justify; font-size: 15px;">
                    <strong style="text-align: justify; font-size: 20px;">Report Bug</strong>
                    <button style="top: 0%; float: right;"onclick = "document.getElementById('light4').style.display = 'none';
                            document.getElementById('fade4').style.display = 'none'">
                        <img style="width:20px; height: 20px;" src="<?php echo SITE_URL; ?>assets/images/logo/close_button_red.png"></button>
                    <br><br>
                    We welcome your suggestions to improve this website and request that error(if any) may kindly be brought to our notice.
                    <br><br>
                    Email id : devadigayatish@gmail.com  
                </div>
                <div id="fade4" class="black_overlay"></div>
            </nav></h4>

        <h8 style="margin-left: 30px; margin-right: 30px;">
            <p style="text-align:center; margin-left: 30px; margin-right: 30px;">
                This project is completely free. No Copyrights. You're welcome to fork this project from 
                <a target="_blank" href="https://github.com/devadigayatish/nagarsevak_report_card">
                    <strong style="color: blue">Here</strong>
                </a> and send pull requests. We would love you to contribute in this project and improve the code quality. Also, if you are an NGO and want to do a similar kind of project in your city, we encourage you to copy our work and code.
            </p>
        </h8>
    </footer>
</div>

<hr style="display: block; margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto;border-style: inset; border-width: 1px;">

<script type="text/javascript">
    $(document).ready(function () {
        // pie chart 1
        var piechart_data1 = '<?php echo $piechart_data1; ?>';
        draw_piechart(piechart_data1, 'pie_chart_div1');
        // pie chart 2
        var piechart_data2 = '<?php echo $piechart_data2; ?>';
        draw_piechart(piechart_data2, 'pie_chart_div2');
    });

    function draw_piechart(data, element, showDatalabels, showLegends) {
        if (!showDatalabels) {
            showDatalabels = false;
        }
        if (!showLegends) {
            showLegends = true;
        }
        Highcharts.setOptions({
            colors: ['#0D91D0', '#04D314', '#ABDB08', '#FDD102', '#FF9F00', '#FF6600', '#FF0D00', "#79d4da", "#f487a7", "#a8acda", "#f1d97d", "#ccefe1", "#a285c5", "#78dac6", "#f8a36c", "#afd26f"]
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
                plotShadow: false
            },
            credits: {
                enabled: false
            },
            title: {
                text: ""
            },
            tooltip: {
                pointFormat: "{series.name}: <b>{point.percentage:.1f}% ({point.y:1f})</b>"
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
//          size:'100%',
                    dataLabels: {
                        enabled: showDatalabels,
                    },
                    showInLegend: true
                }
            },
            legend: {
                enabled: showLegends,
                // layout: 'vertical',
                // align: 'right',
                // width: 350,
                // verticalAlign: 'middle',
                // useHTML: true,
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
    }
    ;

</script>
</html>
