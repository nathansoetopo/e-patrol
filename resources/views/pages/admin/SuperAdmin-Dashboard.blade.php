@extends('components.admin.template')

@section('title', 'Dashboard Superadmin')
    

@section('main-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>PT. Rusyida Mitra Perkasa</h1>
          </div>
          <div class="row">
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <div style="border-radius: 30px;" class="input-group-text">
                    <input style="border: none;" type="text" class="form-control" placeholder="Search" aria-label="Search">
                      <button class="btn btn-light" type="button"><i style="right: 70px;" class="fas fa-search"></i></button>
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
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach ($users as $item)
                      <tr>
                        <th scope="row">{{ $no }}</th>
                        <td></td>
                        <td></td>
                        <td>082538493848</td>
                        <td>
                          <span class="badge badge-success">Aktif</span>
                        </td>
                        <?php $no++; ?>
                      </tr>
                      @endforeach
                      {{-- <tr>
                        <th scope="row">2</th>
                        <td>Nathan Ari Soetopo</td>
                        <td>3315621005030005</td>
                        <td>082538493848</td>
                        <td>
                          <span class="badge badge-danger">Non</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Ilham Ahmad Setiaji</td>
                        <td>3315621005030005</td>
                        <td>082538493848</td>
                        <td>
                          <span class="badge badge-success">Aktif</span>
                        </td>
                      </tr> --}}
                    </tbody>
                  </table>
                  </div>
                  <div class="row justify-content-center">
                  <div class="buttons">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
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
                  <h4 style="color: black;" >Kalender</h4>
                </div>
                <div class="card-body">
                  <!-- <div class="">
                    <iframe src="https://calendar.google.com/calendar" style="border: none" width="100%" height="350em" frameborder="0" scrolling="no"></iframe>
                    </div> -->
                    <div class="fc-overflow">
                      <div style="position: relative;" id="myEvent"></div>
                    </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      @endsection
