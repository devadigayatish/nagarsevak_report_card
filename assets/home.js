function draw_chart(data, element, showDatalabels, showLegends) {
    if(!data) {
        return $("#" + element).html('No data found');
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

    return false;
};

function showUser(str)
{
    if (str == "")
    {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    else
    {
        $.post("api/home.php?q=prabhag_no_info", {"i" : str + "A"}, function (response, status) {
            document.getElementById('prabhag_no_info').innerHTML = response;
        });

        $.post("api/home.php?q=profile_info", {"i" : str}, function (response, status) {
            document.getElementById('profile_info').innerHTML = response;
        });

        $.post("api/home.php?q=details_of_work", {"i" : str}, function (response, status) {
            document.getElementById('details_of_work').innerHTML = response;
        });

        $.post("api/home.php?q=details_of_work_chart", { "i": str }, function (response, status) {
            
            $("#details_of_work_chart").html("");

            let data_list = [];

            html = $.parseHTML(response);

            $(html).each(function (i, section) {
                let data_c = $(section).find(".data");
                $(data_c).attr("id", "data_" + (i + 1));
                let data = $(data_c).text();
                data = data.trim();
                data_list.push(data);
                $("#details_of_work_chart").append(section);
            });

            $(html).each(function (i, section) {
                let target = "data_" + (i + 1);
                draw_chart(data_list[i], target);
            });
        });
        
        $.post("api/home.php?q=downloaded_data", {"i" : str}, function (response, status) {
            document.getElementById('downloaded_data').innerHTML = response;
        });
    }
}

var map = L.map('map', {
    zoomControl: true,
    scrollWheelZoom: false,
}).setView([18.51, 73.86], 12);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

function style(feature) {
    return {
        weight: 1,
        opacity: 1,
        color: 'black',
        dashArray: '0',
        fillOpacity: 0.4,
        fillColor: 'orange'
    };
}

var geojson;

$.get('uploads/pune-electoral-wards-more.geojson', [], function(data, status){
    geojson = L.geoJson(data, {
        style: style,
        onEachFeature: onEachFeature
    }).addTo(map);
}, "json");

function onEachFeature(feature, layer) {
    var labelText = feature.properties['prabhag_number'] + ': ' + feature.properties['prabhag_name'];
    layer.bindLabel(labelText).addTo(map);
    layer.on({
        click: function(e){
            
            $.each(layer._map._layers, function(i, it){
                geojson.resetStyle(it);
            });    

            selectedLayer = e.target;

            selectedLayer.setStyle({
                weight: 1,
                color: 'black',
                dashArray: '0',
                fillOpacity: 0.5,
                fillColor:'yellow'
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                selectedLayer.bringToFront();
            }

            showUser(feature.properties['prabhag_number']);
            var dropdown = document.getElementById("users");
            for (var i = 0; i < dropdown.options.length; i++)
            {
                if (parseInt(dropdown.options[i].value) == parseInt(feature.properties['prabhag_number']))
                {
                    dropdown.options[i].selected = true;
                    break;
                }
            }
        }
    });
}

var selected_dropdown = document.getElementById("users");
var strUser = selected_dropdown.options[selected_dropdown.selectedIndex].value;
showUser(strUser);

function nextPrabhag(i) 
{
    var e = document.getElementById("users");
    e.selectedIndex +=i ;
    //loop-around from the top or bottom depending on increment/decrement
    if(e.selectedIndex == -1) {
        if(i>0) e.selectedIndex = 0; 
        else e.selectedIndex = e.length - 1;
    }
    var id = e.options[e.selectedIndex].value;
    console.log('Executing prabhagSelect(' + id + ')');
    showUser(id);
}
nextPrabhag(0);

