<html>
<head>
	<title>Laporan Logistik | Arsip</title>
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
		<h5>Formulir</h4>
		<h6>Stok Opname Bahan Penolong Bulanan 	@foreach($logistic as $data) {{\Carbon\Carbon::parse($data->created_at)->format('M Y')}} @endforeach</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th style="text-align:center;vertical-align:middle;">No.</th>
                <th style="text-align:center;vertical-align:middle;">Nama Barang</th>
				<th style="text-align:center;vertical-align:middle;">Satuan</th>
                <th style="text-align:center;vertical-align:middle;">Saldo Sebelumnya</th>
                <th style="text-align:center;vertical-align:middle;">Jumlah Pengeluaran</th>
                <th style="text-align:center;vertical-align:middle;">Saldo Sekarang</th>
			</tr>
		</thead>
		<tbody>
			@forelse($logistic as $data)
			<tr>
				<td style="text-align:center;">{{ $loop->iteration }}</td>
                <td style="text-align:center;">{{ $data->nama_barang }}</td>
                <td style="text-align:center;">{{ $data->satuan }}</td>
                <td style="text-align:center;">{{ $data->saldo_sebelumnya }}</td>
                <td style="text-align:center;">{{ $data->jumlah_pengeluaran }}</td>
                <td style="text-align:center;">{{ $data->saldo_sekarang }}</td>
			</tr>
			@empty
            <tr>
            	<td colspan="4" class="text-center">Maaf, belum ada data</td>
    	    </tr>
			@endforelse
		</tbody>
	</table>
 
</body>
</html>