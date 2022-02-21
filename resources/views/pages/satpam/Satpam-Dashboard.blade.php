<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bootstrap Components &rsaquo; Modal &mdash; Stisla</title>
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Forms &rsaquo; Advanced Forms &mdash; Stisla</title>

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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">

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
      <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
      <img alt="image" src="../assets/img/avatar/avatar-1.png" class="ml-2 rounded-circle mr-1"></a>
    </li>
    <li>
      <a href="#" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
    </li>
  </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">RUSYIDA MITRA PERKASA</a>
            <img src="../images/logo.jpeg" class="block text pl-5 pr-5" style="height: 5em" />
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">RMS</a>
          </div>

          <!--SIDEBAR-->
          <ul class="sidebar-menu">
            <li class="menu-header">&nbsp;</li>
              <li class="menu-header">&nbsp;</li>
              <li><a class="nav-link" href=""><i class="fas fa-columns"></i> <span class="ml-3">Blank Page</span></a></li>
              <li><a class="nav-link" href=""><i class="fas fa-user"></i> <span class="ml-3">Profile</span></a></li>
              <li><a class="nav-link" href=""><i class="fas fa-qrcode"></i> <span class="ml-3">Scan Barcode</span></a></li>
              <li><a class="nav-link" href=""><i class="fas fa-book-open"></i> <span class="ml-3">Presensi Piket</span></a></li>
              <li><a class="nav-link" href=""><i class="fas fa-chart-line"></i> <span class="ml-3">Statistik</span></a></li>
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
            <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-md-0">
              <div style="background-color: #E5E5E5;" class="card">
                <div class="card-body">
                  <div class="row justify-content-center pb-3">
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div style="border-radius: 10px; width: 100%; height: 43%;" class="">
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <img src="../images/scanner2.png" style="border-radius: 10px; width: 100%; height: 150%; background-color: white;" />
                        <div>
                          <p class="row justify-content-center"><b>Scan QRcode</b></p>
                        </div>
                        <!-- <div class="avatar-item mb-0">
                          <img alt="image" src="../assets/img/avatar/avatar-5.png" class="img-fluid" data-toggle="tooltip" title="Alfa Zulkarnain">
                          <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                      <div style="border-radius: 10px; width: 100%; height: 43%;" class="">
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
                        <img src="../images/note2.png" style="border-radius: 10px; width: 100%; height: 150%; background-color: white;" />
                        <div>
                          <p class="row justify-content-center"><b>Presensi</b></p>
                        </div>
                        <!-- <div class="avatar-item mb-0">
                          <img alt="image" src="../assets/img/avatar/avatar-5.png" class="img-fluid" data-toggle="tooltip" title="Alfa Zulkarnain">
                          <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div style="background-color: #E5E5E5;" class="card">
                <div class="card-header">
                  <h4>Statistics</h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <a href="#" class="btn btn-primary">Week</a>
                      <a href="#" class="btn">Month</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="182"></canvas>
                  <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                      <div class="detail-value">2</div>
                      <div class="detail-name">Absensi Hari ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                      <div class="detail-value">7</div>
                      <div class="detail-name">Absensi Minggu ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                      <div class="detail-value">50</div>
                      <div class="detail-name">Absensi Bulan ini</div>
                    </div>
                    <div class="statistic-details-item">
                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                      <div class="detail-value">300</div>
                      <div class="detail-name">Absensi Tahun ini</div>
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
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index-0.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>
</html>
