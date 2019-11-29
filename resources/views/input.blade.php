<!DOCTYPE html>
<html>
<head>
	<title>Web Deteksi PH</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h2 class="text-center">Web Deteksi PH </h2>
				<div class="card">
					<div class="card-header">
						<h3>Input PH</h3>
						<div >
						&nbsp<a class="btn btn-primary btn-sm" href="/data"> <i class='fas fa-angle-left'></i> Kembali</a>
					</div>
				</div>
				<br/>

				 
				 <table class="table table-borderless">

					<form action="/store" method="post">
					{{ csrf_field() }}

				<tr>
					<td>&nbsp &nbsp PH</td> 
			
					<td><input type="text" name="ph" required="required" > </td>
				</tr>
				<tr>	

					<td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
					<td><input class="btn btn-success" type="submit" value="Input Data"> </td>

				</tr>
				</form>
			</table>
			</div>

			</div>	
		</div>		
	</div>

</body>


</html>
