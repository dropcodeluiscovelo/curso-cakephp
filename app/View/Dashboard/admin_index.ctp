<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<div class="col-md-12 box">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<center><p>Métricas</p></center>
			<canvas id="myChart"></canvas>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
	    // The type of chart we want to create
	    type: 'bar',

	    // The data for our dataset
	    data: {
	        labels: [<?php echo $labels ?>],
	        datasets: [{
	            label: 'Volume de Vendas',
	            backgroundColor: 'rgb(255, 99, 132)',
	            borderColor: 'rgb(255, 99, 132)',
	            data: [<?php echo $valores ?>]
	        }]
	    },

	    // Configuration options go here
	    options: {}
	});
</script>