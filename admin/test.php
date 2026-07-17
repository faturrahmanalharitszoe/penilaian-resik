<!DOCTYPE html>
<html>
<head>
 <title>Bar Chart</title>
 <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
 <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
 <style>
 canvas {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
 }
 </style>
</head>

<body>
 <div id="container" style="width: 75%;">
  <canvas id="canvas"></canvas>
 </div>

 <?php 
 //misal ada 3 dealer
 include "koneksi.php";
 ?>

 <script>
		var ctx = document.getElementById("canvas").getContext('2d');
		var myAreaChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Accounting", "Operasional", "GA"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_marketing = mysqli_query($koneksi,"select * from karyawan");
					echo mysqli_num_rows($jumlah_marketing);
					?>, 
					<?php 
					$jumlah_ops = mysqli_query($koneksi,"select * from jabatan");
					echo mysqli_num_rows($jumlah_ops);
					?>, 
					<?php 
					$jumlah_finance = mysqli_query($koneksi,"select * from penilaian");
					echo mysqli_num_rows($jumlah_finance);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>

</html>