@extends('components.admin.template')

@section('title', 'Dashboard Superadmin')


@section('main-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ $error }}
            </div>
        </div>
        @endforeach
        @endif
        @if (session('status'))
        <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('status') }}
            </div>
        </div>
        @endif
        <div class="section-header">
            <h1>PT. Rusyida Mitra Perkasa</h1>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="border-radius: 30px;" class="input-group-text">
                            <input style="border: none;" type="text" class="form-control" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-light" type="button"><i style="right: 70px;"
                                    class="fas fa-search"></i></button>
                        </div>
                        <!-- <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $u)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->nik }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            <span class="badge badge-success">Aktif</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">
                            <div class="buttons">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li
                                            class="{{ ($users->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                                            <a class="page-link" href="{{ $users->url($users->currentPage()-1) }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                                            <li
                                                class="{{ ($users->currentPage() == $i) ? 'page-item active' : 'page-item' }}">
                                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                            <li
                                                class="{{ ($users->currentPage() == $users->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                                                <a class="page-link" href="{{ $users->url($users->currentPage()+1) }}"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="color: black;">Buka Presensi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Shift <code></code></label>
                                <select class="form-control form-control-lg" name="shiftID">
                                    @foreach ($shifts as $shift)
                                    <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center pt-1 pb-1">
                                <button type="submit" class="btn btn-light btn-lg btn-round">
                                    Buka Presensi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 style="color: black;">Presensi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Presensi</th>
                                        <th scope="col">Start</th>
                                        <th scope="col">End</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($presensi as $key => $u)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->start_time }}</td>
                                        <td>{{ $u->end_time }}</td>
                                        <td>
                                            @if ($u->status == 'ACTIVE')
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
                        <div class="row justify-content-center">
                            <div class="buttons">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li
                                            class="{{ ($presensi->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                                            <a class="page-link" href="{{ $presensi->url($presensi->currentPage()-1) }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $presensi->lastPage(); $i++)
                                            <li
                                                class="{{ ($presensi->currentPage() == $i) ? 'page-item active' : 'page-item' }}">
                                                <a class="page-link" href="{{ $presensi->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                            <li
                                                class="{{ ($presensi->currentPage() == $presensi->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                                                <a class="page-link"
                                                    href="{{ $presensi->url($presensi->currentPage()+1) }}"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
</div>
@endsection
