<html>
    <head>
        <title>KOP LAPORAN DATA</title>
        <style type="text/css">
            body{font-family: Arial, Helvetica, sans-serif; background-color: white; width: 21cm;height: 29.7cm;}
            .rangkasurat{width: 21cm;margin:0 auto;background-color: white;height: 29.7cm;}
            .table{border-bottom: 5px solid black; padding: 2px;width: 72%;}
            .tengah{text-align: center;line-height: 5px;}
            .table2 {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 72%;
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
                <td><img src="{{ asset('images/logo2.png')}}" width="140px"></td>
                <td class="tengah">
                    <h2>PT. RUSYIDA MITRA PERKASA</h2>
                    <h2>TRAINING AND MANPOWER DEVELOPMENT</h2>
                    <h2>Kp. Karanganyar Rt 01/05 No.015B Gunungpati Semarang 50225</h2>
                </td>
            </tr>
        </table>
    </br>
        <table class="table2">
            <tr>
                <th class="th">No</th>
                <th class="th">Nama</th>
                <th class="th">NIK</th>
                <th class="th">Username</th>
                <th class="th">Email</th>
                <th class="th">Phone</th>
            </tr>
            @foreach ($satpam as $key => $s)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $s->name }}</td>
                <td>{{ $s->nik }}</td>
                <td>{{ $s->username }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->no_hp }}</td>
                
            </tr>
            @endforeach
          </table>
    </div>
</body>
</html>

{{-- 

@extends('components.admin.template')

@section('title','Data Satpam')
    
@section('main-content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Satpam</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <form>
                  </div>
                  <div class="card-body p-4">
                    <div class="table-responsive table-bordered">
                      <table class="table table-bordered table-md">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($satpam as $key => $s)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->nik }}</td>
                                <td>{{ $s->username }}</td>
                                <td>{{ $s->email }}</td>
                                <td>{{ $s->no_hp }}</td>
                                <td>
                                    @if ($s->status == 'ACTIVE')
                                    <span class="badge badge-success">Aktif</span>
                                    @else
                                    <span class="badge badge-danger">Nonaktif</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

  @endsection --}}