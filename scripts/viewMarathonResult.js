$(document).ready(
		function() {
			$.ajax({
				url : '/' + curLng + '/users/marathon-result',
				dataType : "json",

				success : function(jsonData) {

					var series = new Array();
					for ( var ss in jsonData.series) {
						series.push($.gchart.series(jsonData.series[ss].title,
								jsonData.series[ss].data,
								jsonData.series[ss].color));
					}
					//alert(jsonData.max);
					/* barVertGrouped */
					var cahertConfig = {
						type : 'barVertGrouped',
						legend : 'right',
						maxValue : jsonData.max,
						axes: [$.gchart.axis('left', 0, [jsonData.max,1], '01384d', 'right'), $.gchart.axis('left', ['-'], [50], '01384d', 'right')],
						title : '.                                                                                 '+jsonData.chartLabel,
						titleColor : '01384d',
						legendColor : '01384d',
						backgroundColor : $.gchart.gradient('vertical','71a8be', '127897','004a67'),
						dataLabels : jsonData.dataLabels,
						series : [ series[1], series[0] ]
					};

					$('#basicGChart').gchart(cahertConfig);
				}
			});
		});