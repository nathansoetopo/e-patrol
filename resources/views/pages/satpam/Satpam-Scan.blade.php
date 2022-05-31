@extends('components.satpam.template')
@section('title','Scan Barcode')
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
  <!--https://dev.to/capscode/how-to-detect-mobile-device-os-using-javascript-4l9j-->
  <script>
    if (window.navigator.userAgent.indexOf("Mac")!= -1) {
      window.location = 'https://www.online-qr-scanner.com/';
    }
  </script>

  @section('main-content')
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
                        <div id="preview" class="mt-1 videoScan" style="width: 100%; border-radius: 30px;"></div>
                        {{-- <video width="100%" class="mt-1 videoScan" id="preview" style="border-radius: 30px;"></video> --}}
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
                    {{-- <button type="button" class="btn btn-primary switch" value="OFF" id="switcher"><i class="fab fa-free-code-camp fa-3x"></i></button> --}}
                    <center>
                        <button class="ml-4 btn btn-primary" onclick="switchCamera()" style="padding-left: 9%; padding-right: 9%;"><i class="fas fa-camera fa-3x"></i></button>
                    </center>
                    <input type="hidden" value="1" id="camera">
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
    </div>
  </div>
  <!--Script Qr Code Scanner and Generator-->
  <script>
    window.onload = function(){
        startCamera();
    };
    var camera = document.getElementById("camera").value;
    const html5QrCode = new Html5Qrcode("preview");
    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
      //alert(decodedText);
      window.location.href = decodedText;
    };
    const config = { fps: 10, qrbox: { width: 250, height: 250} };
    //If you want to prefer front camera
    function startCamera(){
      if(camera == 0){
        html5QrCode.start({ facingMode: "user"}, config, qrCodeSuccessCallback).catch((err) => {
          window.location = 'https://www.online-qr-scanner.com/';
        });
      }else if(camera==1){
        html5QrCode.start({ facingMode: "environment"}, config, qrCodeSuccessCallback).catch((err) => {
          window.location = 'https://www.online-qr-scanner.com/';
        });
      }
    }
    //Function
    function switchCamera(){
      if(camera == 1){
        camera = 0;
      }else if(camera == 0){
        camera = 1;
      }
      html5QrCode.stop().then((ignore) => {
        startCamera()
        console.log('Stopped')
      }).catch((err) => {
        // Stop failed, handle it.
        window.location = 'https://www.online-qr-scanner.com/';
      });
    }
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
@endsection