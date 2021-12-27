<html>
<head>
	<title>Laporan Produksi | Arsip</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Quality Control</h4>
		<h6>PT. Gorontalo Minerals</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No.</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Tanggal Produksi</th>
			</tr>
		</thead>
		<tbody>
			@forelse($qualities as $data)
			<tr>
				<td style="text-align:center;">{{ $loop->iteration }}</td>
                <td style="text-align:center;">{{ $data->judul }}</td>
                <td style="text-align:center;">{{ $data->tanggal }}</td>
                <td style="text-align:center;">{{ $data->deskripsi}}</td>
                <td style="text-align:center;">{{ $data->tanggal_produksi}}</td>
			</tr>
			@empty
            <tr>
    			<td colspan="5" class="text-center">Maaf, belum ada data</td>
    	    </tr>
			@endforelse
		</tbody>
	</table>
 
</body>
</html>