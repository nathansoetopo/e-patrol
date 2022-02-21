<!DOCTYPE html>
<html lan'/g="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Data Lokasi</title>
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Data Lokasi</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="../node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <style>
      #myMap {
        width:100%;
        height:380px;
      }
      </style>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false">
</script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
      </script>
      <script type="text/javascript">
      var map;
      var marker;
      var myLatlng = new google.maps.LatLng(20.268455824834792,85.84099235520011);
      var geocoder = new google.maps.Geocoder();
      var infowindow = new google.maps.InfoWindow();
      function initialize(){
      var mapOptions = {
      zoom: 18,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

      marker = new google.maps.Marker({
      map: map,
      position: myLatlng,
      draggable: true
      });

      geocoder.geocode({'latLng': myLatlng }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      if (results[0]) {
      $('#latitude,#longitude').show();
      $('#address').val(results[0].formatted_address);
      $('#latitude').val(marker.getPosition().lat());
      $('#longitude').val(marker.getPosition().lng());
      infowindow.setContent(results[0].formatted_address);
      infowindow.open(map, marker);
      }
      }
      });

      google.maps.event.addListener(marker, 'dragend', function() {

      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      if (results[0]) {
      $('#address').val(results[0].formatted_address);
      $('#latitude').val(marker.getPosition().lat());
      $('#longitude').val(marker.getPosition().lng());
      infowindow.setContent(results[0].formatted_address);
      infowindow.open(map, marker);
      }
      }
      });
      });

      }
      google.maps.event.addDomListener(window, 'load', initialize);
      </script>
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
      <img alt="image" style="border-style: solid;" src="../assets/img/avatar/avatar-1.png" class="ml-2 border border-dark rounded-circle mr-1"></a>
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
      <img src="../images/logo.jpeg" class="block text pl-5 pr-5" style="height: 5em" />
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
      <li><a class="nav-link" href=""><i class="fas fa-user-shield"></i> <span class="ml-3">Data Satpam</span></a>
      </li>
      <li><a class="nav-link" href="HR-Datalokasi.html"><i class="fas fa-map-marked-alt"></i> <span class="ml-3">Data Lokasi</span></a>
      </li>
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
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <div style="border-radius: 30px;" class="input-group-text">
                    <input style="border: none;" type="text" class="form-control" placeholder="Search" aria-label="Search">
                      <button class="btn btn-light" type="button"><i style="right: 70px;" class="fas fa-search"></i></button>
                  </div>
                  <div class="col-lg-8">

                  </div>
                  <div class="">
                    <button id="modal-8" style="width: max-content; height: 3em;" class="btn btn-light">Tambah Titik   <i class="fa fa-plus"></i></button>
                    </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lokasi</th>
                        <th scope="col">Koordinat</th>
                        <th scope="col">Detail</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Titik A1</td>
                        <td>abs183y873391jww</td>
                        <td>
                          <button id="modal-5" style="" class="btn btn-light content-center">Detail</button>
                        </td>
                        <td>
                          <!-- <a href=""><i href="" class="far fa-edit fa-2x"></i></a> -->
                          <a href="#" data-toggle="modal" data-target="#nonAktifData"
                                  class="btn btn-transparent text-center text-dark" data-toggle="tooltip" title="Hapus" data-confirm="Anda yakin menghapus data ini?" data-confirm-yes="alert('Data Terhapus')">
                                  <i class="fas fa-trash-alt fa-2x"></i>
                                </a>
                          <a href="#" data-toggle="modal" data-target="#nonAktifData"
                                  class="btn btn-transparent text-center text-dark" data-toggle="tooltip" title="Hapus" data-confirm="Anda yakin nonaktifkan data ini?" data-confirm-yes="alert('Data Terhapus')">
                                  <i class="fas fa-power-off fa-2x"></i>
                                </a>
                          <!-- <button class="btn btn-danger btn-action mr-1" data-toggle="tooltip" title="Hapus" data-confirm="Anda yakin menghapus data ini?" data-confirm-yes="alert('Data Terhapus')"><i class="fas fa-trash"></i></button>
                          <button class="btn btn-primary btn-action " id="modal-7" title="Edit"><i class="fas fa-power-off"></i></button> -->
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Titik A2</td>
                        <td>abs183y873391jww</td>
                        <td>
                          <button id="modal-5" style="" class="btn btn-light content-center">Detail</button>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#nonAktifData"
                          class="btn btn-transparent text-center text-dark">
                          <i class="fas fa-trash-alt fa-2x"></i>
                        </a>
                  <a href="#" data-toggle="modal" data-target="#nonAktifData"
                          class="btn btn-transparent text-center text-dark">
                          <i class="fas fa-power-off fa-2x"></i>
                        </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Titik A3</td>
                        <td>abs183y873391jww</td>
                        <td>
                          <button id="modal-5" style="" class="btn btn-light content-center">Detail</button>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#nonAktifData"
                          class="btn btn text-center text-dark">
                          <i class="fas fa-trash-alt fa-2x"></i>
                        </a>
                  <a href="#" data-toggle="modal" data-target="#nonAktifData"
                          class="btn btn-transparent text-center text-dark">
                          <i class="fas fa-power-off fa-2x"></i>
                        </a>
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
          </div>
        </div>
            </div>
          </div>
        </section>

        <!--Modal Form Tambah-->
        <form class="modal-part" id="modal-tambahlokasi-part">
          <div class="form-group">
            <label>Nama Titik</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-pencil-alt"></i>
                </div>
              </div>
              <input type="text" class="form-control" placeholder="Nama" name="nama">
            </div>
          </div>
          <!-- <div id="googleMap" style="width:100%;height:380px;"></div> -->
          <div id="myMap"></div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-location-arrow"></i>
              </div>
            </div>
            <input type="text" class="form-control" placeholder="Koordinat" name="Koordinat">
          </div>
        </div>
      </div>
      </div>
      <div class="form-group mb-0">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
          <label class="custom-control-label" for="remember-me">Data yang dimasukan sudah benar?</label>
        </div>
      </div>
        </form>

        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div style="background-color: #737D74; color: #737D74;" class="modal-header">
                <h5 style="background-color: #737D74; color: #737D74;" class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/prismjs/prism.js"></script>
  <script src="../node_modules/cleave.js/dist/cleave.min.js"></script>
  <script src="../node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="../node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="../node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="../node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="../node_modules/select2/dist/js/select2.full.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/bootstrap-modal.js"></script>
  <script src="../assets/js/page/forms-advanced-forms.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>


</body>
</html>
