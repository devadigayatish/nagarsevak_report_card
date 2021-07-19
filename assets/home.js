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

var DATAPATH = "uploads/";
var wardMAX = 76;
var wardColumn = 'prabhag_no';

var MBAttrib = '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors & <a href="https://www.mapbox.com/about/maps/">Mapbox</a>';
var OsmIndia = L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {id: 'openstreetmap.1b68f018', attribution: MBAttrib});

var map = L.map('map', {zoomControl: true,
    scrollWheelZoom: false,
    layers: [OsmIndia] //only add one! put the rest in the baselayers group
}).setView([18.51, 73.86], 12);

clickLayer = L.geoJson(null, {
    onEachFeature:
            function (feature, layer)
            {
                var labelText = feature.properties['wardnum'] + ': ' + feature.properties['title'];
                layer.bindLabel(labelText).addTo(map);
                layer.setStyle({
                    weight: 1,
                    opacity: 1,
                    color: 'black',
                    dashArray: '0',
                    fillOpacity: 0.4,
                    fillColor: 'orange'
                });

                function highlightFeature(e)
                {
                    var layer = e.target;
                    layer.setStyle({
                        weight: 2,
                        color: '#fff',
                        dashArray: '0',
                        fillOpacity: 0.05
                    });
                    if (!L.Browser.ie && !L.Browser.opera)
                    {
                        layer.bringToFront();
                    }
                }

                function resetHighlight(e)
                {
                    var layer = e.target;
                    layer.setStyle({
                        weight: 1,
                        color: 'black',
                        dashArray: '0',
                        fillOpacity: 0.4
                    });
                }

                function prabhagChange(e)
                {
                    showUser(feature.properties['wardnum']);
                    // from http://stackoverflow.com/a/10029429/4355695
                    var dropdown = document.getElementById("users");
                    for (var i = 0; i < dropdown.options.length; i++)
                    {
                        if (parseInt(dropdown.options[i].value) == parseInt(feature.properties['wardnum']))
                        {
                            dropdown.options[i].selected = true;
                            break;
                        }
                    }
                    var layer = e.target;
                    layer.setStyle({
                        weight: 2,
                        color: 'black',
                        dashArray: '0',
                        fillOpacity: 0.5,
                        fillColor:'yellow'
                    });
                    if (!L.Browser.ie && !L.Browser.opera)
                    {
                        layer.bringToFront();
                    }
                }
                layer.on({
                    //mouseover: highlightFeature,
                    // mouseout: resetHighlight,
                    click: prabhagChange
                });

            } //END OF ON EACH FEATURE
}); //END of wards geojson layer definition 
omnivore.geojson(DATAPATH + 'pune-electoral-wards-more.geojson', null, clickLayer);
clickLayer.addTo(map);

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
