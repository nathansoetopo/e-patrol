{{-- @extends('components.satpam.template') --}}

{{-- @section('title','Scan Barcode') --}}

{{-- @section('main-content') --}}
    




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
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <style>
    @media screen and (max-device-width: 390px) {
      .scan {
        display: none;
      }
    }
  </style>
  <!--
    1. Barcode Ready Input Data (Di Backup)
    2. Camera Scanner Ready  
    3. Icon Scanner  
    4. Flashlight Ready Hidup Mati Bisa only one button
    5. Auto redirect ON untuk OFF (Matikan windows.location)
    6. Auto Redirect (Integrasi di dashboard)
  -->
  <!--Penting(MICEK)-->
  <!--Copy Scrip Di Dashboard-->
  <!--<script type="text/javascript" src="js/detect.min.js"></script>-->
  <!--<script>
    const ua = detect.parse(navigator.userAgent)
    const btn = document.querySelector(ID)
    if(ua.os.family === "iOS"){
      window.location = 'https://javascript.plainenglish.io/how-to-detect-a-mobile-device-with-javascript-1c26e0002b31';
    }
  </script>-->
  <!--Copy Scrip Di Dashboard-->
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg" style="background-color: #737D74"></div>
      <nav id="topNavbar" style="background-color: #737D74" class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg text-dark"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
        </form>
        <!--NAVBAR-->
        <ul class="navbar-nav navbar-right">
          <li>
            <a href="#" class="nav-link nav-link-lg nav-link-user">
              <div class="d-sm-none d-lg-inline-block text-dark">Hi, Ujang Maman</div>
              <img alt="image" style="border-style: solid;" src="../assets/img/avatar/avatar-1.png"
                class="ml-2 border border-dark rounded-circle mr-1">
            </a>
          </li>
          <li>
            <a href="#" class="nav-link notification-toggle nav-link-lg beep text-dark"><i
                class="far fa-bell fa-lg"></i></a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">RUSYIDA MITRA PERKASA</a>
            <img src="../images/logo.jpg" class="block text pl-5 pr-5" style="height: 5em" />
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RMS</a>
          </div>

          <!--SIDEBAR-->
          <ul class="sidebar-menu">
            <li class="menu-header">&nbsp;</li>
            <li class="menu-header">&nbsp;</li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-columns"></i> <span
                  class="ml-3">Dashboard</span></a></li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-user"></i> <span class="ml-3">Profile</span></a>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-recycle"></i> <span class="ml-3">Data
                  Shift</span></a></li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-user-shield"></i> <span class="ml-3">Scan
                  Barcode</span></a>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-map-marked-alt"></i> <span class="ml-3">Presensi
                  Piket</span></a>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-map-marked-alt"></i> <span
                  class="ml-3">Statistik</span></a>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-sign-out-alt"></i> <span
                  class="ml-3">Keluar</span></a></li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Scan Barcode</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="#">
                      <h4>Selesai</h4>
                    </a>
                  </div>
                  <div class="card-body p-4">
                    <center>
                      <div class="container" style="padding: 2%; border-radius: 30px; background-color: #737D74">
                        <video width="100%" class="mt-1 videoScan" id="preview" style="border-radius: 30px;"></video>
                      </div>
                      <label class="text-white scan"
                        style="bottom: 55%; object-position: center; position: absolute; z-index: 10; left: 44%;"
                        id="uploadBtn"><img src="focus.svg" alt=""></label>
                      <div class="container m-2">
                        <h5 id="qrData">Arahkan kameramu ke seluruh kode QR atau Barcode untuk mulai scan</h5>
                      </div>
                    </center>
                  </div>
                  <div class="card-footer text-center">
                      <button type="button" class="btn btn-primary switch" value="OFF" id="switcher"><i class="fab fa-free-code-camp fa-3x"></i></button>
                    <button class="ml-4 btn btn-primary" style="padding-left: 9%; padding-right: 9%;"><i
                        class="fas fa-info fa-3x"></i></button>
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
  <!--Script Qr Code Scanner and Generator-->
  <script type="text/javascript" src="js/qrcode.min.js"></script>
  <script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
    scanner.addListener('scan', function (content) {
      //document.getElementById("qrData").innerHTML = content;
      //Uncoment diatas kalau gamau auto redirect
      window.location = content;
    });
    const supports = navigator.mediaDevices.getSupportedConstraints();
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[1]);
        const SUPPORTS_MEDIA_DEVICES = 'mediaDevices' in navigator;
        const btn = document.querySelector('.switch');
        if (SUPPORTS_MEDIA_DEVICES) {
          navigator.mediaDevices.enumerateDevices().then(devices => {

            const cameras = devices.filter((device) => device.kind === 'videoinput');

            if (cameras.length === 0) {
              throw 'No camera found on this device.';
            }
            const camera = cameras[cameras.length - 1];
            navigator.mediaDevices.getUserMedia({
              video: {
                deviceId: camera.deviceId,
                facingMode: ['environment'],
                height: { ideal: 1080 },
                width: { ideal: 1920 }
              }
            }).then(stream => {
              const track = stream.getVideoTracks()[0];
              const imageCapture = new ImageCapture(track)
              const photoCapabilities = imageCapture.getPhotoCapabilities().then(() => {
                btn.addEventListener('click', function () {
                  param = document.getElementById("switcher").value;
                  if(param == 'OFF'){
                    document.getElementById("switcher").value = 'ON';
                    track.applyConstraints({
                      advanced: [{torch: true}]
                    });
                  }else{
                    document.getElementById("switcher").value = 'OFF';
                    track.applyConstraints({
                      advanced: [{torch: false}]
                    });
                  }
                });
              });
            });
          });
        }
      } else {
        console.error('Cammera Not Found');
      }
    }).catch(function (e) {
      console.error(e);
    });
  </script>
  <!--Script Qr Code Scanner and Generator-->
  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-ui-dist/jquery-ui.min.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
  <!-- Fontawesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/components-table.js"></script>
</body>

</html>