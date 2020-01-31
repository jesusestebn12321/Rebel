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

