<html>

<head>
    <title>Laporan Produksi Galon | Arsip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Formulir</h4>
            <h6>Pelaksana Produksi Galon Bulan
                @foreach ($gallon as $data) {{ \Carbon\Carbon::parse($data->created_at)->format('M Y') }} @endforeach
            </h6>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">No.</th>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">Tanggal</th>
                <th colspan="3" style="text-align:center;vertical-align:middle;">Nama Staff Pelaksana</th>
                <th style="text-align:center;vertical-align:middle;">Diserahkan ke logistik</th>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">Petugas Produksi</th>
            </tr>
            <tr>
                <th style="text-align:center;vertical-align:middle;">Cuci</th>
                <th style="text-align:center;vertical-align:middle;">Noxel</th>
                <th style="text-align:center;vertical-align:middle;">QC</th>
                <th style="text-align:center;vertical-align:middle;">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gallon as $data)
                <tr>
                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                    <td style="text-align:center;">{{ $data->tanggal_produksi }}</td>
                    <td style="text-align:center;">{{ $data->staff_cuci }}</td>
                    <td style="text-align:center;">{{ $data->staff_noxel }}</td>
                    <td style="text-align:center;">{{ $data->staff_qc }}</td>
                    <td style="text-align:center;">{{ $data->jumlah_produksi }}</td>
                    <td style="text-align:center;">{{ $data->petugas_produksi }}</td>
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
