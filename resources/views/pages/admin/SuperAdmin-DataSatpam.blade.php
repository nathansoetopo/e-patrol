<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Components &rsaquo; Table &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Libraries -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg" style="background-color: #737D74;"></div>
      <nav id="topNavbar" style="background-color: #737D74;" class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg text-white"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
        </form>
        <!--NAVBAR-->
        <ul class="navbar-nav navbar-right">
          <li>
            <a href="#" class="nav-link nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block text-white">Hi, Ujang Maman</div>
            <img alt="image" style="border-style: solid;" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="ml-2 border border-white rounded-circle mr-1"></a>
          </li>
          <li>
            <a href="#" class="nav-link notification-toggle nav-link-lg beep text-white"><i class="far fa-bell fa-lg"></i></a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">RUSYIDA MITRA PERKASA</a>
            <img src="{{ asset('images/logo.jpg') }}" class="block text pl-5 pr-5" style="height: 5em" />
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RMS</a>
          </div>

          <!--SIDEBAR-->
          <ul class="sidebar-menu">
            <li class="menu-header">&nbsp;</li>
            <li class="menu-header">&nbsp;</li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-columns"></i> <span class="ml-3">Dashboard</span></a></li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-user"></i> <span class="ml-3">Profile</span></a></li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-recycle"></i> <span class="ml-3">Data Shift</span></a></li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-user-shield"></i> <span class="ml-3">Data Satpam</span></a>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-laptop"></i> <span class="ml-3">Data HRD</span></a>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-map-marked-alt"></i> <span class="ml-3">Data Lokasi</span></a>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-sign-out-alt"></i> <span class="ml-3">Keluar</span></a></li>
          </ul>
        </aside>
      </div>
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
                      <div class="input-group">
                        <div style="border-radius: 30px;" class="input-group-text">
                          <input style="border: none;" type="text" class="form-control" placeholder="Cari"
                            aria-label="Search">
                          <button class="btn btn-light" type="button"><i style="right: 70px;" class="fas fa-search"
                              disabled></i></button>
                        </div>
                      </div>
                    </form>
                    <div style="border-radius: 30px; position: absolute; object-position: center; left: 84%;">
                      <button style="padding-top: 2%; padding-bottom: 2%;" data-toggle="modal" data-target="#addData"
                        class="btn btn-light" type="button">Tambah Data <i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="card-body p-4">
                    <div class="table-responsive table-bordered">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Shift</th>
                            <th>NIK</th>
                            <th>Nomor HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              1
                            </td>
                            <td><a href="#" class="text-dark" data-toggle="modal" data-target="#info">Nathan gay</a></td>
                            <td class="align-middle">12345678</td>
                            <td>0283829832</td>
                            <td class="align-middle">
                              <div class="badge badge-success">Active</div>
                            </td>
                            <td>
                              <center>
                                <a href="#" data-toggle="modal" data-target="#editData"
                                  class="btn btn-transparent text-center text-dark">
                                  <i class="far fa-edit fa-2x"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteData"
                                  class="btn btn-transparent text-center text-dark">
                                  <i class="far fa-trash-alt fa-2x"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#nonAktifData"
                                  class="btn btn-transparent text-center text-dark">
                                  <i class="fas fa-power-off fa-2x"></i>
                                </a>
                              </center>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Keliling Kontraqun</td>
                            <td class="align-middle">12345678</td>
                            <td>0283829832</td>
                            <td class="align-middle">
                              <div class="badge badge-danger">Non</div>
                            </td>
                            <td>
                              <center>
                                <a href="#" class="btn btn-transparent text-center text-dark">
                                  <i class="far fa-edit fa-2x"></i>
                                </a>
                                <a href="#" class="btn btn-transparent text-center text-dark">
                                  <i class="far fa-trash-alt fa-2x"></i>
                                </a>
                                <a href="#" class="btn btn-transparent text-center text-dark">
                                  <i class="fas fa-power-off fa-2x"></i>
                                </a>
                              </center>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link bg-light text-dark" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link bg-light text-dark" href="#">1 <span
                              class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link bg-light text-dark" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link bg-light text-dark" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link bg-light text-dark" href="#"><i class="fas fa-chevron-right"></i></a>
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
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval
            Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
  <!--Modal Tambah Data-->
  <div class="modal fade" tabindex="-1" role="dialog" id="addData">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Satpam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
              <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
                class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">NIK</label>
              <input type="number" style="border-radius: 30px;" placeholder="Masukkan NIK Satpam" class="form-control"
                id="nik" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
              <input type="number" placeholder="Masukkan Nomor HP Satpam" style="border-radius: 30px;"
                class="form-control" id="hp" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">E-mail</label>
              <input type="email" style="border-radius: 30px;" placeholder="Masukkan Email Satpam" class="form-control"
                id="email" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" style="border-radius: 30px;" placeholder="Masukkan Password Satpam"
                class="form-control" id="pw" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Data yang dimasukkan sudah benar?</label>
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
              class="btn text-white">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal Edit Data-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editData">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Satpam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
              <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
                class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">NIK</label>
              <input type="number" style="border-radius: 30px;" placeholder="Masukkan NIK Satpam" class="form-control"
                id="nik" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
              <input type="number" placeholder="Masukkan Nomor HP Satpam" style="border-radius: 30px;"
                class="form-control" id="hp" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">E-mail</label>
              <input type="email" style="border-radius: 30px;" placeholder="Masukkan Email Satpam" class="form-control"
                id="email" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" style="border-radius: 30px;" placeholder="Masukkan Password Satpam"
                class="form-control" id="pw" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Data yang dimasukkan sudah benar?</label>
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
              class="btn text-white">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal Delete Data-->
  <div class="modal fade" tabindex="-1" role="dialog" id="deleteData">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">Delete Data Satpam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <div class="modal-body">
            <center>
              <h4>Nama Satpam</h4>
            </center>
            <br>
            <center>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Anda Yakin Untuk Hapus Data?</label>
              </div>
            </center>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" style="transform: translateX(-80%); width: 174px; border-radius: 30px;"
              class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal Non-aktif Data-->
  <div class="modal fade" tabindex="-1" role="dialog" id="nonAktifData">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">Status Akun Satpam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <div class="modal-body">
            <center>
              <h4>Nama Satpam</h4>
            </center>
            <br>
            <center>
              <div class="mb-3 form-check">
                <label class="form-check-label" for="stat">Status Akun</label><br><br>
                <select style="border-radius: 30px;" id="stat" class="form-control">
                  <option>Aktif</option>
                  <option selected>Non-Aktif</option>
                </select>
              </div>
            </center>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
              class="btn text-white">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal Info-->
  <div class="modal fade" tabindex="-1" role="dialog" id="info">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Satpam</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
            <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
              class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">NIK</label>
            <input type="number" style="border-radius: 30px;" placeholder="Masukkan NIK Satpam" class="form-control"
              id="nik" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
            <input type="number" placeholder="Masukkan Nomor HP Satpam" style="border-radius: 30px;"
              class="form-control" id="hp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">E-mail</label>
            <input type="email" style="border-radius: 30px;" placeholder="Masukkan Email Satpam" class="form-control"
              id="email" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" style="border-radius: 30px;" placeholder="Masukkan Password Satpam"
              class="form-control" id="pw" required>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" data-dismiss="modal"
            style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
            class="btn text-white">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-ui-dist/jquery-ui.min.js"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- Fontawesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/components-table.js') }}"></script>
</body>

</html>