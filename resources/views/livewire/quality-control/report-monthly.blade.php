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
        <h5>Laporan Quality Control</h4>
        @foreach ($quality as $data)
              <h6>Bulan : {{\Carbon\Carbon::parse($data->created_at)->format('M Y')}}</h6>
        @endforeach
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">Komponen Uji</th>
                <th colspan="31" style="text-align:center;vertical-align:middle;">Tanggal</th>
            </tr>
            <tr>
                <th style="text-align:center;vertical-align:middle;">1</th>
                <th style="text-align:center;vertical-align:middle;">2</th>
                <th style="text-align:center;vertical-align:middle;">3</th>
                <th style="text-align:center;vertical-align:middle;">4</th>
                <th style="text-align:center;vertical-align:middle;">5</th>
                <th style="text-align:center;vertical-align:middle;">6</th>
                <th style="text-align:center;vertical-align:middle;">7</th>
                <th style="text-align:center;vertical-align:middle;">8</th>
                <th style="text-align:center;vertical-align:middle;">9</th>
                <th style="text-align:center;vertical-align:middle;">10</th>
                <th style="text-align:center;vertical-align:middle;">11</th>
                <th style="text-align:center;vertical-align:middle;">12</th>
                <th style="text-align:center;vertical-align:middle;">13</th>
                <th style="text-align:center;vertical-align:middle;">14</th>
                <th style="text-align:center;vertical-align:middle;">15</th>
                <th style="text-align:center;vertical-align:middle;">16</th>
                <th style="text-align:center;vertical-align:middle;">17</th>
                <th style="text-align:center;vertical-align:middle;">18</th>
                <th style="text-align:center;vertical-align:middle;">19</th>
                <th style="text-align:center;vertical-align:middle;">20</th>
                <th style="text-align:center;vertical-align:middle;">21</th>
                <th style="text-align:center;vertical-align:middle;">22</th>
                <th style="text-align:center;vertical-align:middle;">23</th>
                <th style="text-align:center;vertical-align:middle;">24</th>
                <th style="text-align:center;vertical-align:middle;">25</th>
                <th style="text-align:center;vertical-align:middle;">26</th>
                <th style="text-align:center;vertical-align:middle;">27</th>
                <th style="text-align:center;vertical-align:middle;">28</th>
                <th style="text-align:center;vertical-align:middle;">29</th>
                <th style="text-align:center;vertical-align:middle;">30</th>
                <th style="text-align:center;vertical-align:middle;">31</th>
            </tr>
        </thead>
        <tbody>
			 <tr>
                <td>TDS Air Baku</td>
                @foreach ($quality as $data)
                <td style="text-align:center;"> {{ number_format($data->tds_airbaku_pagi + $data->tds_airbaku_sore) / 2}}</td>
                @endforeach
            </tr>
			 <tr>
                <td>TDS Setengah Jadi</td>
                @foreach ($quality as $data)
                 <td style="text-align:center;"> {{ number_format($data->tds_setengahjadi_pagi + $data->tds_setengahjadi_sore) / 2}}</td>
                @endforeach
            </tr>
			 <tr>
                <td>TDS Jadi</td>
                @foreach ($quality as $data)
               <td style="text-align:center;"> {{ number_format($data->tds_jadi_pagi + $data->tds_jadi_sore) / 2}}</td>
                @endforeach
            </tr>
			 <tr>
                <td>pH Air Baku</td>
                @foreach ($quality as $data)
                <td style="text-align:center;"> {{ number_format($data->ph_airbaku_pagi + $data->ph_airbaku_sore) / 2}}</td>
                @endforeach
            </tr>
			 <tr>
                <td>pH Setengah Jadi</td>
                @foreach ($quality as $data)
                 <td style="text-align:center;"> {{ number_format($data->ph_setengahjadi_pagi + $data->ph_setengahjadi_sore) / 2}}</td>
                @endforeach
            </tr>
			 <tr>
                <td>pH Jadi</td>
                @foreach ($quality as $data)
               <td style="text-align:center;"> {{ number_format($data->ph_jadi_pagi + $data->ph_jadi_sore) / 2}}</td>
                @endforeach
            </tr>
			 <tr>
                <td>Kekeruhan</td>
                @foreach ($quality as $data)
                <td style="text-align:center;"> {{ $data->kekeruhan }}</td>
                @endforeach
            </tr>		
        </tbody>
    </table> 
</body>
</html>