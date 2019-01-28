<div class="area">
<div class="col-md-6 chrt-two area">
<h3 class="sub-tittle">Line Multi Chart</h3>
<div style="area">
<canvas id="canvas" style="width:100%;height:100%"></canvas>
</div>
<button id="randomizeData">Randomize Data</button>
<script>
var randomScalingFactor = function() {
return Math.round(Math.random() * 100 * (Math.random() > 0.5 ? -1 : 1));
};
var randomColor = function(opacity) {
return 'rgba(' + Math.round(Math.random() * 255) + ',' + Math.round(Math.random() * 255) + ',' + Math.round(Math.random() * 255) + ',' + (opacity || '.3') + ')';
};

var lineChartData = {
labels: ["January", "February", "March", "April", "May", "June", "July"],
datasets: [{
label: "My First dataset",
data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
yAxisID: "y-axis-1",
}, {
label: "My Second dataset",
data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
yAxisID: "y-axis-2"
}]
};

$.each(lineChartData.datasets, function(i, dataset) {
dataset.borderColor = randomColor(0.4);
dataset.backgroundColor = randomColor(1);
dataset.pointBorderColor = randomColor(0.7);
dataset.pointBackgroundColor = randomColor(0.5);
dataset.pointBorderWidth = 1;
});

console.log(lineChartData);

window.onload = function() {
var ctx = document.getElementById("canvas").getContext("2d");
window.myLine = Chart.Line(ctx, {
data: lineChartData,
options: {

hoverMode: 'label',
stacked: false,
scales: {
xAxes: [{
display: true,
gridLines: {
offsetGridLines: false
}
}],
yAxes: [{
type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
display: true,
position: "left",
id: "y-axis-1",
}, {
type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
display: true,
position: "right",
id: "y-axis-2",

// grid line settings
gridLines: {
drawOnChartArea: false, // only want the grid lines for one axis to show up
},
}],
}
}
});
};

$('#randomizeData').click(function() {
lineChartData.datasets[0].data = [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()];

lineChartData.datasets[1].data = [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()];

window.myLine.update();
});
</script>
<script src="js/Chart.js"></script>
</div>
<div class="col-md-6 chrt-three">
<h3 class="sub-tittle">Stacked bar chart</h3>
<div id="chartdiv1"></div>	
<script>
var chart = AmCharts.makeChart("chartdiv1", {
"type": "serial",
"theme": "light",
"rotate": true,
"marginBottom": 50,
"dataProvider": [{
"age": "85+",
"male": -0.1,
"female": 0.3
}, {
"age": "80-54",
"male": -0.2,
"female": 0.3
}, {
"age": "75-79",
"male": -0.3,
"female": 0.6
}, {
"age": "70-74",
"male": -0.5,
"female": 0.8
}, {
"age": "65-69",
"male": -0.8,
"female": 1.0
}, {
"age": "60-64",
"male": -1.1,
"female": 1.3
}, {
"age": "55-59",
"male": -1.7,
"female": 1.9
}, {
"age": "50-54",
"male": -2.2,
"female": 2.5
}, {
"age": "45-49",
"male": -2.8,
"female": 3.0
}, {
"age": "40-44",
"male": -3.4,
"female": 3.6
}, {
"age": "35-39",
"male": -4.2,
"female": 4.1
}, {
"age": "30-34",
"male": -5.2,
"female": 4.8
}, {
"age": "25-29",
"male": -5.6,
"female": 5.1
}, {
"age": "20-24",
"male": -5.1,
"female": 5.1
}, {
"age": "15-19",
"male": -3.8,
"female": 3.8
}, {
"age": "10-14",
"male": -3.2,
"female": 3.4
}, {
"age": "5-9",
"male": -4.4,
"female": 4.1
}, {
"age": "0-4",
"male": -5.0,
"female": 4.8
}],
"startDuration": 1,
"graphs": [{
"fillAlphas": 0.8,
"lineAlpha": 0.2,
"type": "column",
"valueField": "male",
"title": "Male",
"labelText": "[[value]]",
"clustered": false,
"labelFunction": function(item) {
return Math.abs(item.values.value);
},
"balloonFunction": function(item) {
return item.category + ": " + Math.abs(item.values.value) + "%";
}
}, {
"fillAlphas": 0.8,
"lineAlpha": 0.2,
"type": "column",
"valueField": "female",
"title": "Female",
"labelText": "[[value]]",
"clustered": false,
"labelFunction": function(item) {
return Math.abs(item.values.value);
},
"balloonFunction": function(item) {
return item.category + ": " + Math.abs(item.values.value) + "%";
}
}],
"categoryField": "age",
"categoryAxis": {
"gridPosition": "start",
"gridAlpha": 0.2,
"axisAlpha": 0
},
"valueAxes": [{
"gridAlpha": 0,
"ignoreAxisWidth": true,
"labelFunction": function(value) {
return Math.abs(value) + '%';
},
"guides": [{
"value": 0,
"lineAlpha": 0.2
}]
}],
"balloon": {
"fixedPosition": true
},
"chartCursor": {
"valueBalloonsEnabled": false,
"cursorAlpha": 0.05,
"fullWidth": true
},
"allLabels": [{
"text": "Male",
"x": "28%",
"y": "97%",
"bold": true,
"align": "middle"
}, {
"text": "Female",
"x": "75%",
"y": "97%",
"bold": true,
"align": "middle"
}],
"export": {
"enabled": true
}   

});
</script>
</div>
<div class="clearfix"></div>
</div>