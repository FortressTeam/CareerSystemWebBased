<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<div class="card col-sm-6">
	<div class="card-head">
		<header>Statistic Feedbacks by month in 2016</header>
	</div>
	<div class="card-body">
		<div id="monthlyLineChart" data-url="<?= $this->Url->build('/api/feedbacks/month'); ?>"></div>
	</div>
</div>

<div class="card col-sm-6">
	<div class="card-head">
		<header>Statistic Feedbacks by type in 2016</header>
	</div>
	<div class="card-body">
		<div id="typeDonutChart" data-url="<?= $this->Url->build('/api/feedbacks/type'); ?>"></div>
	</div>
</div>

<script type="text/javascript">

	// Get Monthly Line Chart Statistic
	$.getJSON( $( '#monthlyLineChart' ).data('url'), function( return_data ){
		new Morris.Line({
			element: 'monthlyLineChart',
			data: return_data.dataByMonth,
			xkey: 'monthSubmited',
			xLabelFormat: function (x) { 
				var m_names = new Array("Jan", "Feb", "Mar", 
										"Apr", "May", "Jun", 
										"Jul", "Aug", "Sep", 
										"Oct", "Nov", "Dec");
				return m_names[x.getMonth()] + '-' + x.getFullYear();
			},
			xLabels: "month",
			ykeys: ['totalFeedbacks'],
			labels: ['Feedbacks'],
			resize: true
		});
	});

	// Get Monthly Line Chart Statistic
	$.getJSON( $( '#typeDonutChart' ).data('url'), function( return_data ){
		new Morris.Donut({
			element: 'typeDonutChart',
			data: return_data.dataByType,
			colors: ['#2196f3', '#ff9800', '#9c27b0', '#4caf50'],
			resize: true
		});
	});
</script>

