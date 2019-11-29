<!DOCTYPE html>
<html>
<head> 
<!-- 	<title> Membuat CRUD Pada Laravel </title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css')}}"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    	<!-- Javascript -->
	<script src="{{asset('template/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('template/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('template/assets/scripts/klorofil-common.js')}}"></script>


<!-- 
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->
</head>

<body>

<style type="text/css">
	.pagination li{
		float: left;
		list-style-type: none;
		margin:5px;
	}

</style>
	<div class="container">
		<div class="card">
			<div class="card-body">


				<h2 class="text-center">Web Deteksi PH </h2>
				<h3>Data Record PH</h3>
				<br/>
			<!-- 	<p>Cari Data Pegawai : </p> -->
				<form action="/laravelweb/public/pegawai/cari" method="GET">
					<input type="text" name="cari" placeholder="Cari Record ..." value="{{ old('cari' )}}">
					<input type="submit" value="Cari">

			
					<br/>
					<br/>

				<div class="row">
<!-- 					<div class="col-md-6">
						<div class="panel panel-body">
							<div id="chartterbaru"></div>
						</div>
					</div> -->
					<div class="col-md-12">
						<div class="panel panel-body">
							
							<div id="chartminggu"></div>
						</div>
					</div>
				</div>
				<a class="btn btn-success" href="/input"> + Input PH </a> 
<!-- 				<a class="btn btn-primary pull-right" href="/laravelweb/public/pegawai/tambah"> CRUD Eloquent </a> -->
				<br/>
				<br/>

				<table class="table table-bordered table-hover table-striped">
					<thead class="thead-dark" >
						<tr>

							<th>ID_Record</th>
							<th>ID_Larutan</th>
							<th>Nama_Larutan</th>
							<th>PH</th>
							<th>Tanggal</th>
							<th>Action</th>

						</tr>
					</thead>
					@foreach($data as $d)
					<tr>
						<td>{{ $d -> ID_Record}}</td>
						<td>{{ $d -> ID_Larutan}}</td>
						<td>{{ $d -> Nama_Larutan}}</td>
						<td>{{ $d -> PH}}</td>
						<td>{{ $d -> Tanggal}}</td>


						<td>
							<a class="btn btn-warning btn-sm" href="/laravelweb/public/pegawai/edit/{{$d->ID_Record}}">
								<span class="glyphicon glyphicon-pencil"></span>
								Edit
							</a>

							<a class="btn btn-danger btn-sm" href="/laravelweb/public/pegawai/hapus/{{$d->ID_Record}}"><span class="glyphicon glyphicon-trash"></span>
								Hapus
							</a>
						</td>
					</tr>
					@endforeach

				</table>
		
				Halaman: {{ $data->currentPage() }} <br/>
				Jumlah data: {{ $data->total() }} <br/>
				Data Per Halaman: {{ $data->perPage() }} <br/>

				{{ $data->links() }}
			</div>

		</div>

	</div>
</body>
</html>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<script>
	Highcharts.chart('chartterbaru', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Data Persent Technician Terbaru'
		},
		xAxis: {
			text: 'test'
		},
		yAxis: {
			min: 0,
			title: {
				text: 'persentase teknisi (%)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			'<td style="padding:0"><b>{point.y:.2f} </b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		}
	});
</script>

<script>
// Create the chart
Highcharts.chart('chartminggu', {
	chart: {
		type: 'column'
	},
	title: {
		text: 'Chart Frekeunsi Data Larutan'
	},
	xAxis: {
		type: 'category'
	},
	yAxis: {
		title: {
			text: 'Jumlah'
		}

	},
	legend: {
		enabled: false
	},
	plotOptions: {
		series: {
			borderWidth: 0,
			dataLabels: {
				enabled: true,
				format: '{point.y:.0f}'
			}
		}
	},

	tooltip: {
		headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
		pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
	},

	series: [
	{
		name: "Browsers",
		colorByPoint: true,
		data: [
		{
			name: "Asam Kuat",
			y: 62.74,
			drilldown: "1"
		},
		{
			name: "Asam Lemah",
			y: 10.57,
			drilldown: "2"
		},
		{
			name: "Netral",
			y: 7.23,
			drilldown: "3"
		},
		{
			name: "Basa Lemah",
			y: 5.58,
			drilldown: "4"
		},
		{
			name: "Basa Kuat",
			y: 5.58,
			drilldown: "5"
		},
		]
	}
	],
	drilldown: {
		series: [
		{
			name: "Minggu1",
			id: "1",
			data: {!!json_encode($errors)!!}},
			{
				name: "Minggu 2",
				id: "2",
				data: {!!json_encode($errors)!!}},
				{
					name: "Minggu 3",
					id: "3",
					data: {!!json_encode($errors)!!}},
					{
						name: "Minggu 4",
						id: "4",
						data: {!!json_encode($errors)!!}},
						]
					}
				});
			</script>