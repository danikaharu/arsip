<html>

<head>
    <title>Laporan Produksi Cup 240 ml | Arsip</title>
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
            <h6>Pelaksana Produksi Cup 240 ml Bulan
                @foreach ($cup as $data) {{ \Carbon\Carbon::parse($data->created_at)->format('M Y') }} @endforeach
            </h6>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">No.</th>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">Tanggal</th>
                <th colspan="4" style="text-align:center;vertical-align:middle;">Nama Staff Pelaksana</th>
                <th style="text-align:center;vertical-align:middle;">Diserahkan ke logistik</th>
                <th colspan="2" style="text-align:center;vertical-align:middle;">Reject Produksi</th>
            </tr>
            <tr>
                <th style="text-align:center;vertical-align:middle;">Operator</th>
                <th style="text-align:center;vertical-align:middle;">Packer</th>
                <th style="text-align:center;vertical-align:middle;">Sealing</th>
                <th style="text-align:center;vertical-align:middle;">Palet</th>
                <th style="text-align:center;vertical-align:middle;">Jumlah</th>
                <th style="text-align:center;vertical-align:middle;">Miring</th>
                <th style="text-align:center;vertical-align:middle;">Bocor</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cup as $data)
                <tr>
                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                    <td style="text-align:center;">{{ $data->tanggal_produksi }}</td>
                    <td style="text-align:center;">{{ $data->staff_operator }}</td>
                    <td style="text-align:center;">{{ $data->staff_packer }}</td>
                    <td style="text-align:center;">{{ $data->staff_sealing }}</td>
                    <td style="text-align:center;">{{ $data->staff_palet }}</td>
                    <td style="text-align:center;">{{ $data->jumlah_produksi }}</td>
                    <td style="text-align:center;">{{ $data->miring }}</td>
                    <td style="text-align:center;">{{ $data->bocor }}</td>
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
