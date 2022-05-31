<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>-->
    {{-- <script src="html5-qrcode.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Test Scanner</h1>
    <div id="qr-reader" style="width: 100%"></div>
    <input type="hidden" value="0" id="camera">
    <button class="btn btn-primary" id="switch" onclick="switchCamera()">Switch Camera</button>
    <br>
    <button class="btn btn-primary switch" id="flash">FlashLight</button>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <!-- <script>
      var html5QrcodeScanner;
      try {
        html5QrcodeScanner;
        console.log('Camera Ok');
      } catch (error) {
        console.error(error);
        alert('Error');
      }
    </script>
    <script>
    function onScanSuccess(decodedText, decodedResult) {
      alert(`Code scanned = ${decodedText}`, decodedResult);
      html5QrcodeScanner.clear();
    }
    function onScanError(errorMessage) {
      console.log('Arahkan Ke Barcode');
    }
    html5QrcodeScanner = new Html5QrcodeScanner(
	  "qr-reader", { fps: 10, qrbox: 250, formatsToSupport: 0});
    html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script> -->
    <script>
      window.onload = function(){
        startCamera();
      };
    </script>
    <script>
      var camera = document.getElementById("camera").value;
      const html5QrCode = new Html5Qrcode("qr-reader");
      const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        alert(decodedText);
      };
      const config = { fps: 10, qrbox: { width: 250, height: 250} };
      //If you want to prefer front camera
      function startCamera(){
        if(camera == 0){
          html5QrCode.start({ facingMode: "user"}, config, qrCodeSuccessCallback).catch((err) => {
            console.log('Redirect');
          });
        }else if(camera==1){
          html5QrCode.start({ facingMode: "environment"}, config, qrCodeSuccessCallback).catch((err) => {
            console.log('Redirect');
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
        });
      }
    </script>
  </body>
</html>