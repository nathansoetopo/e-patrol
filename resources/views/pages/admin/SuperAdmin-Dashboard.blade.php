<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SuperAdmin Dashboad</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/fullcalendar/dist/fullcalendar.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div style="background-color: #737D74;" class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <div class="search-backdrop"></div>
            <div class="search-result">
            </div>
          </div>
        </form>

  <!--NAVBAR-->
  <ul class="navbar-nav navbar-right">
    <li>
      <a href="#" class="nav-link nav-link-lg nav-link-user">
      <div class="d-sm-none d-lg-inline-block text-white">Hi, Ujang Maman</div>
      <img alt="image" style="border-style: solid;" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="ml-2 border border-dark rounded-circle mr-1"></a>
    </li>
    <li>
      <a href="#" class="nav-link notification-toggle nav-link-lg beep text-dark"><i class="far fa-bell fa-lg"></i></a>
    </li>
  </ul>
</nav>
<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">RUSYIDA MITRA PERKASA</a>
      <img src="{{ asset('images/logo.jpeg') }}" class="block text pl-5 pr-5" style="height: 5em" />
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">RMS</a>
    </div>

    <!--SIDEBAR-->
    <ul class="sidebar-menu">
      <li class="menu-header">&nbsp;</li>
      <li class="menu-header">&nbsp;</li>
      <li><a class="nav-link" href="HR-dashboard.html"><i class="fas fa-columns"></i> <span class="ml-3">Dashboard</span></a></li>
      <li><a class="nav-link" href=""><i class="fas fa-user"></i> <span class="ml-3">Profile</span></a></li>
      <li><a class="nav-link" href="HR-datashift.html"><i class="fas fa-recycle"></i> <span class="ml-3">Data Shift</span></a></li>
      <li><a class="nav-link" href=""><i class="fas fa-user-shield"></i> <span class="ml-3">Data Satpam</span></a></li>
      <li><a class="nav-link" href="HR-Datalokasi.html"><i class="fas fa-map-marked-alt"></i> <span class="ml-3">Data Lokasi</span></a></li>
      <li><a class="nav-link" href=""><i class="fas fa-sign-out-alt"></i> <span class="ml-3">Keluar</span></a></li>
    </ul>
  </aside>
</div>

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
                      <tr>
                        <th scope="row">1</th>
                        <td>Michael Adzan Isnaindra</td>
                        <td>3315621005030005</td>
                        <td>082538493848</td>
                        <td>
                          <span class="badge badge-success">Aktif</span>
                        </td>
                      </tr>
                      <tr>
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
                      </tr>
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
                  <div class="form-group">
                    <label>Hari</label>
                    <select class="form-control">
                      <option>Option 1</option>
                      <option>Option 2</option>
                      <option>Option 3</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Shift <code></code></label>
                    <select class="form-control form-control-lg">
                      <option>Option 1</option>
                      <option>Option 2</option>
                      <option>Option 3</option>
                    </select>
                  </div>
                  <div class="text-center pt-1 pb-1">
                    <a href="#" class="btn btn-light btn-lg btn-round">
                      Buka Presensi
                    </a>
                  </div>
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
      <footer class="main-footer">
        <div class="footer-left">

        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/fullcalendar/dist/fullcalendar.min.js"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
	<script src="{{ asset('assets/js/page/modules-calendar.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>
</html>
