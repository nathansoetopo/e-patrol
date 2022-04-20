@extends('components.hrd.template')

@section('title','Data Presensi')

@section('main-content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Presensi</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Start</th>
                                        <th scope="col">End</th>
                                        <th scope="col">Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($presensi as $p)
                                    {{-- @foreach ($item->presensi as $p) --}}
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->start_time }}</td>
                                        <td>{{ $p->end_time }}</td>
                                        <td>
                                            @if ($p->status == 'ACTIVE')
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
</div>
</div>
</div>
</section>
@endsection
