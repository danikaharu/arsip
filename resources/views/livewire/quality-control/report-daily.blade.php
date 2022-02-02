<html>
<head>
	<title>Laporan Quality Control | Arsip</title>
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
            <h6>Uji Kualitas Air</h6>
        </h5>
    </center>

    <p>Tanggal : {{$quality->tanggal}}</p>

	<p>Pengecekan Jam Pagi : {{$quality->jam_pagi}}</p>
	
	<p>Pengecekan Jam Sore : {{$quality->jam_sore}}</p>
		

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">Komponen Uji</th>
                <th colspan="3" style="text-align:center;vertical-align:middle;">Pagi</th>
                <th colspan="3" style="text-align:center;vertical-align:middle;">Sore</th>
                <th colspan="3" style="text-align:center;vertical-align:middle;">Rata - Rata</th>
            </tr>
            <tr>
                <th style="text-align:center;vertical-align:middle;">Air Baku</th>
                <th style="text-align:center;vertical-align:middle;">Setengah Jadi</th>
                <th style="text-align:center;vertical-align:middle;">Jadi</th>
                <th style="text-align:center;vertical-align:middle;">Air Baku</th>
                <th style="text-align:center;vertical-align:middle;">Setengah Jadi</th>
                <th style="text-align:center;vertical-align:middle;">Jadi</th>
                <th style="text-align:center;vertical-align:middle;">Air Baku</th>
                <th style="text-align:center;vertical-align:middle;">Setengah Jadi</th>
                <th style="text-align:center;vertical-align:middle;">Jadi</th>
            </tr>
        </thead>
        <tbody>
			 <tr>
                <td>TDS</td>
                <td style="text-align:center;">{{ $quality->tds_airbaku_pagi }}</td>
                <td style="text-align:center;">{{ $quality->tds_setengahjadi_pagi }}</td>
                <td style="text-align:center;">{{ $quality->tds_jadi_pagi }}</td>
                <td style="text-align:center;">{{ $quality->tds_airbaku_sore }}</td>
                <td style="text-align:center;">{{ $quality->tds_setengahjadi_sore }}</td>
                <td style="text-align:center;">{{ $quality->tds_jadi_sore }}</td>
                <td style="text-align:center;"> {{ number_format($quality->tds_airbaku_pagi + $quality->tds_airbaku_sore) / 2}}</td>
                <td style="text-align:center;"> {{ number_format($quality->tds_setengahjadi_pagi + $quality->tds_setengahjadi_sore) / 2}}</td>
                <td style="text-align:center;"> {{ number_format($quality->tds_jadi_pagi + $quality->tds_jadi_sore) / 2}}</td>
            </tr>
            <tr>
                <td>pH</td>
                 <td style="text-align:center;">{{ $quality->ph_airbaku_pagi }}</td>
                <td style="text-align:center;">{{ $quality->ph_setengahjadi_pagi }}</td>
                <td style="text-align:center;">{{ $quality->ph_jadi_pagi }}</td>
                <td style="text-align:center;">{{ $quality->ph_airbaku_sore }}</td>
                <td style="text-align:center;">{{ $quality->ph_setengahjadi_sore }}</td>
                <td style="text-align:center;">{{ $quality->ph_jadi_sore }}</td>
                <td style="text-align:center;"> {{ number_format($quality->ph_airbaku_pagi + $quality->ph_airbaku_sore) / 2}}</td>
                <td style="text-align:center;"> {{ number_format($quality->ph_setengahjadi_pagi + $quality->ph_setengahjadi_sore) / 2}}</td>
                <td style="text-align:center;"> {{ number_format($quality->ph_jadi_pagi + $quality->ph_jadi_sore) / 2}}</td>
            </tr>
            <tr>
                <td>Kekeruhan</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">{{ $quality->kekeruhan }}</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">{{ $quality->kekeruhan }}</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">{{ $quality->kekeruhan }}</td>
            </tr>
            <tr>
                <td>Rasa</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">@if($quality->rasa == 1)
                                                <p>Berasa</p>
                                                @else 
                                                <p>Tidak Berasa </p>
                                                @endif
                </td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                 <td style="text-align:center;">@if($quality->rasa == 1)
                                                <p>Berasa</p>
                                                @else 
                                                <p>Tidak Berasa </p>
                                                @endif
                </td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                 <td style="text-align:center;">@if($quality->rasa == 1)
                                                <p>Berasa</p>
                                                @else 
                                                <p>Tidak Berasa </p>
                                                @endif
                </td>
            </tr>
            <tr>
                <td>Bau</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">@if($quality->bau == 1)
                                                <p>Berbau</p>
                                                @else 
                                                <p>Tidak Berbau </p>
                                                @endif
                </td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">@if($quality->bau == 1)
                                                <p>Berbau</p>
                                                @else 
                                                <p>Tidak Berbau </p>
                                                @endif
                </td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">-</td>
                <td style="text-align:center;">@if($quality->bau == 1)
                                                <p>Berbau</p>
                                                @else 
                                                <p>Tidak Berbau </p>
                                                @endif
                </td>
            </tr>
			{{-- @empty
            <tr>
    			<td colspan="7" class="text-center">Maaf, belum ada data</td>
    	    </tr> --}}
		
        </tbody>
    </table> 
</body>
</html>