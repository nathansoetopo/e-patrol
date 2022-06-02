<html>
    <head>
        <title>KOP LAPORAN DATA</title>
        <style type="text/css">
          body{font-family: Arial, Helvetica, sans-serif;background-color: white;}
          .rangkasurat{width:595px;margin:0 auto;background-color: white;height: 500px;padding: 20px;}
          .table{border-bottom: 5px solid black; padding: 2px;}
          .tengah{text-align: center;line-height: 20px;}
          .tengah .h2{text-align: center; line-height: 5px;}
          .table2 {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                  margin-top: 30px;
                  }

                  .td, .th {
                  border: 1px solid black;
                  text-align: left;
                  padding: 8px;
                  }

                  tr:nth-child(even) {
                  background-color: #dddddd;
                  }
      </style>
    </head>
<body>
    <div class="rangkasurat">
        <table class="table" style="width: 100%;">
            <tr style="border: none;">
                <img src="{{ storage_path('app/public/absensi.jpg ') }}" width="140px">
                <td class="tengah">
                    <h2 class="h2">PT. RUSYIDA MITRA PERKASA</h2>
                    <h3>TRAINING AND MANPOWER DEVELOPMENT</h3>
                    <h4>Kp. Karanganyar Rt 01/05 No.015B Gunungpati Semarang 50225</h4>
                </td>
            </tr>
        </table>
    </br>
        <table class="table2">
            <tr>
                <th class="th">No</th>
                <th class="th">Nama</th>
                <th class="th">NIK</th>
                <th class="th">Email</th>
                <th class="th">Phone</th>
            </tr>
            @foreach ($satpam as $key => $s)
            <tr>
                <th class="td" scope="row">{{ $key+1 }}</th>
                <td class="td">{{ $s->name }}</td>
                <td class="td">{{ $s->nik }}</td>
                <td class="td">{{ $s->email }}</td>
                <td class="td">{{ $s->no_hp }}</td>
                
            </tr>
            @endforeach
          </table>
    </div>
</body>
</html>
