var $chart = $('#chart');
var $ordersSelect = $('[name="ordersSelect"]');
var labelItem=[];
var dataItem=[];
$.ajax({
	type: "GET",
	url: APP_URL+"/Chart",
	dataType: "json",
	success: function (response) {
		labelItem=response.label;
		dataItem=response.data;
		function initChart($chart) {
			var ordersChart = new Chart($chart, {
				type: 'bar',
				options: {
					scales: {
						yAxes: [{
							ticks: {
								callback: function(value) {
									if (!(value % 10)) {
											//return '$' + value + 'k'
											return value
										}
									}
								}
							}]
						},
						tooltips: {
							callbacks: {
								label: function(item, data) {
									var label = data.datasets[item.datasetIndex].label || '';
									var yLabel = item.yLabel;
									var content = '';
									if (data.datasets.length > 1) {
										content += '<span class="popover-body-label mr-auto">' + label + '</span>';
									}
									content += '<span class="popover-body-value">' + yLabel + '</span>';
									
									return content;
								}
							}
						}
					},
					data: {
						labels: labelItem,
						datasets: [{
							label: 'Sales',
							data: dataItem
						}]
					}
				});
			$chart.data('chart', ordersChart);
		}

		if ($chart.length) {
			initChart($chart);
		}
	}
});

var SalesChart = (function() {

	// Variables
	var dataItems=[];
	var dataS=[];
	var labelS=[];
	var labelItems=[];
	var $charts = $('#chart-sales');


	// Methods
	$.ajax({
		type: "GET",
		url: APP_URL+"/ChartDownload",
		dataType: "json",
		success: function (response) {
			dataItems=response.data;
			labelItems=response.label;
			dataS=response.dataS;
			labelS=response.labelS;
			function init($chart) {
				
				var salesChart = new Chart($charts, {
					type: 'line',
					options: {
						scales: {
							yAxes: [{
								gridLines: {
									color: Charts.colors.gray[100],
									zeroLineColor: Charts.colors.gray[100],

								},
								ticks: {
									callback: function(value) {
										if (!(value % 10)) {
											return value ;
										}
									}
								}
							}]
						},
						tooltips: {
							callbacks: {
								label: function(item, data) {
									var label = data.datasets[item.datasetIndex].label || '';
									var yLabel = item.yLabel;
									var content = '';

									if (data.datasets.length > 1) {
										content += '<span class="popover-body-label mr-auto">' + label + '</span>';
									}

									content += '<span class="popover-body-value">' + yLabel + '</span>';
									return content;
								}
							}
						}
					},
					data: {
						labels: labelItems,
						datasets: [{
							label: 'Mensual',
							data: dataItems,
							borderColor:'#2dce89',
							radius: 4,
							borderWidth: 2
						}
						]
					}
				});


		// Save to jQuery object

		$chart.data('chart', salesChart);

	};


	// Events

	if ($chart.length) {
		init($chart);
	}
}
});


})();
