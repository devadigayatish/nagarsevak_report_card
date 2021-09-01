
// $("h3").each(function (i, it) {
//     t = $(it).text();
//     t = t.toLowerCase();
//     t = t.split(" ").join("_");
//     t = t.split("-").join("_");
//     t = t.split("(").join("_");
//     t = t.split(")").join("_");
//     console.log(t);
// });

$(document).find('span.code').tooltip();

google.charts.load('current', { packages: ['corechart'] });

google.setOnLoadCallback(political_party_wise_number_of_nagarsevaks);
function political_party_wise_number_of_nagarsevaks()
{
    $.get("api/summary.php?q=political_party_wise_number_of_nagarsevaks", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        color: 'black',
                        fontSize: 12
                    }
                },
                vAxis: {
                    title: 'Number of Nagarsevaks',
                    titleTextStyle: {
                        bold: 'true',
                        fontSize: 14
                    }
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('political_party_wise_number_of_nagarsevaks'));
            chart.draw(data, options);
        }
        else
        {
            document.getElementById('political_party_wise_number_of_nagarsevaks').innerHTML = "No related data found in the database.";
        }
    });
}

google.setOnLoadCallback(top_5_works_per_year);
function top_5_works_per_year()
{
    $.get("api/summary.php?q=top_5_works_per_year", function (response, status) {
        let res_data = JSON.parse(response);
        
        var data = google.visualization.arrayToDataTable(res_data);

        var options = {
            legend: {
                position: 'top',
                maxLines: 5,
                textStyle: {
                    color: 'black',
                    fontSize: 12
                }
            },
            vAxis: {
                title: 'Amount Spent Rs',
                titleTextStyle: {
                    bold: 'true',
                    fontSize: 14
                }
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('top_5_works_per_year'));
        chart.draw(data, options);
    });
}

google.setOnLoadCallback(overall_expenditure_pattern);
function overall_expenditure_pattern()
{
    $.get("api/summary.php?q=overall_expenditure_pattern", function (response, status) {
        let res_data = JSON.parse(response);
        
        var data = google.visualization.arrayToDataTable(res_data);

        var options = {};

        var chart = new google.visualization.PieChart(document.getElementById('overall_expenditure_pattern'));
        chart.draw(data, options);
    });
}

google.setOnLoadCallback(expenditure_pattern_by_male_nagarsevaks);
function expenditure_pattern_by_male_nagarsevaks()
{
    $.get("api/summary.php?q=expenditure_pattern_by_male_nagarsevaks", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {};

            var chart = new google.visualization.PieChart(document.getElementById('expenditure_pattern_by_male_nagarsevaks'));
            chart.draw(data, options);
        }
        else
        {
            document.getElementById('expenditure_pattern_by_male_nagarsevaks').innerHTML = "No related data found in the database.";
        }
    });
}

google.setOnLoadCallback(expenditure_pattern_by_female_nagarsevaks);
function expenditure_pattern_by_female_nagarsevaks()
{
    $.get("api/summary.php?q=expenditure_pattern_by_female_nagarsevaks", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {};

            var chart = new google.visualization.PieChart(document.getElementById('expenditure_pattern_by_female_nagarsevaks'));
            chart.draw(data, options);
        }
        else
        {
            document.getElementById('expenditure_pattern_by_female_nagarsevaks').innerHTML = "No related data found in the database.";
        }
    });
}

google.setOnLoadCallback(expenditure_pattern_party_wise);
function expenditure_pattern_party_wise()
{
    $.get("api/summary.php?q=expenditure_pattern_party_wise", function (response, status) {
        let res_data = JSON.parse(response);
        if (res_data.length)
        {
            $.each(res_data, function(i, item){
                draw_chart("party_"+ item["party"], item.data);
            });
        }
    });
}

function draw_chart(element_id, res_data)
{
    if (res_data.length)
    {
        var data = google.visualization.arrayToDataTable(res_data);

        var options = {};

        var chart = new google.visualization.PieChart(document.getElementById(element_id));
        chart.draw(data, options);
    }
}

google.setOnLoadCallback(attendance_of_nagarsevaks_in_gb_meetings);
function attendance_of_nagarsevaks_in_gb_meetings()
{
    $.get("api/summary.php?q=attendance_of_nagarsevaks_in_gb_meetings", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        color: 'black',
                        fontSize: 12
                    }
                },
                vAxis: {
                    title: 'Number of Nagarsevaks',
                    titleTextStyle: {
                        bold: 'true',
                        fontSize: 14
                    }
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('attendance_of_nagarsevaks_in_gb_meetings'));
            chart.draw(data, options);
        }
        else
        {
            document.getElementById('attendance_of_nagarsevaks_in_gb_meetings').innerHTML = "No related data found in the database.";
        }
    });
}

google.setOnLoadCallback(attendance_of_nagarsevaks_in_gb_meetings__party_wise_);
function attendance_of_nagarsevaks_in_gb_meetings__party_wise_()
{
    $.get("api/summary.php?q=attendance_of_nagarsevaks_in_gb_meetings__party_wise_", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        color: 'black',
                        fontSize: 12
                    }
                },
                vAxis: {
                    minValue: 50,
                    title: '% Attendance',
                    titleTextStyle: {
                        bold: 'true',
                        fontSize: 14
                    }
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('attendance_of_nagarsevaks_in_gb_meetings__party_wise_'));
            chart.draw(data, options);
        }
        else
        {
            document.getElementById('attendance_of_nagarsevaks_in_gb_meetings__party_wise_').innerHTML = "No related data found in the database.";
        }
    });
}

google.setOnLoadCallback(number_of_questions_asked_by_nagarsevaks_in_gb_meetings);
function number_of_questions_asked_by_nagarsevaks_in_gb_meetings()
{
    $.get("api/summary.php?q=number_of_questions_asked_by_nagarsevaks_in_gb_meetings", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        color: 'black',
                        fontSize: 12
                    }
                },
                vAxis: {
                    minValue: 50,
                    title: 'Nagarsevak',
                    titleTextStyle: {
                        bold: 'true',
                        fontSize: 14
                    }
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('number_of_questions_asked_by_nagarsevaks_in_gb_meetings'));
            chart.draw(data, options);
        }
        else
        {
            document.getElementById('number_of_questions_asked_by_nagarsevaks_in_gb_meetings').innerHTML = "No related data found in the database.";
        }
    });
}

google.setOnLoadCallback(number_of_questions_asked_by_nagarsevaks_in_gb_meetings__party_wise_);
function number_of_questions_asked_by_nagarsevaks_in_gb_meetings__party_wise_()
{
    $.get("api/summary.php?q=number_of_questions_asked_by_nagarsevaks_in_gb_meetings__party_wise_", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        color: 'black',
                        fontSize: 12
                    }
                },
                vAxis: {
                    minValue: 50,
                    title: 'Questions',
                    titleTextStyle: {
                        bold: 'true',
                        fontSize: 14
                    }
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('number_of_questions_asked_by_nagarsevaks_in_gb_meetings__party_wise_'));
            chart.draw(data, options);
        }
        else
        {
            document.getElementById('number_of_questions_asked_by_nagarsevaks_in_gb_meetings__party_wise_').innerHTML = "No related data found in the database.";
        }
    });
}


google.setOnLoadCallback(nagarsevaks_who_asked_questions__party_wise_);
function nagarsevaks_who_asked_questions__party_wise_()
{
    $.get("api/summary.php?q=nagarsevaks_who_asked_questions__party_wise_", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        color: 'black',
                        fontSize: 12
                    }
                },
                vAxis: {
                    title: '% Nagarsevaks',
                    titleTextStyle: {
                        bold: 'true',
                        fontSize: 14
                    }
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('nagarsevaks_who_asked_questions__party_wise_'));
            chart.draw(data, options);
        }
        else
        {
            document.getElementById('nagarsevaks_who_asked_questions__party_wise_').innerHTML = "No related data found in the database.";
        }
    });
}

google.setOnLoadCallback(nagarsevaks_with_criminal_charges__party_wise_);
function nagarsevaks_with_criminal_charges__party_wise_()
{
    $.get("api/summary.php?q=nagarsevaks_with_criminal_charges__party_wise_", function (response, status) {
        let res_data = JSON.parse(response);
        
        if (res_data.length)
        {
            var data = google.visualization.arrayToDataTable(res_data);

            var options = {
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        color: 'black',
                        fontSize: 12
                    }
                },
                vAxis: {
                    title: 'Number of Nagarsevaks',
                    titleTextStyle: {
                        bold: 'true',
                        fontSize: 14
                    }
                }
            };

            // var chart = new google.visualization.ColumnChart(document.getElementById('nagarsevaks_with_criminal_charges__party_wise_'));
            chart.draw(data, options);
        }
        else
        {
            // document.getElementById('nagarsevaks_with_criminal_charges__party_wise_').innerHTML = "<h3 style='text-align:center; height:170px;'> <br><br>Data not provided by Govt.</h3>";
        }
    });
}