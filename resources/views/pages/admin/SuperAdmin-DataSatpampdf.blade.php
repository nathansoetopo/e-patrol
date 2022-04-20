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

  @endsection