<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/selectric/public/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script> 
  <style>
    #myMap {
      width: 100%;
      height: 380px;
    }
  </style>


</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div style="background-color: #737D74;" class="navbar-bg"></div>

      @include('components.satpam.navbar')

      @include('components.satpam.sidebar')


      @yield('main-content')

      @include('components.footer')


    </div>
  </div>

  <!--script js map-->
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false">
  </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
  </script>
  <script type="text/javascript">
    var map;
    var marker;
    var myLatlng = new google.maps.LatLng(20.268455824834792, 85.84099235520011);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();

    function initialize() {
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

      geocoder.geocode({
        'latLng': myLatlng
      }, function(results, status) {
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

        geocoder.geocode({
          'latLng': marker.getPosition()
        }, function(results, status) {
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
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('node_modules/fullcalendar/dist/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('node_modules/prismjs/prism.js') }}"></script>
  <script src="{{ asset('node_modules/cleave.js/dist/cleave.min.js') }}"></script>
  <script src="{{ asset('node_modules/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
  <script src="{{ asset('node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <script src="{{ asset('node_modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('node_modules/selectric/public/jquery.selectric.min.js') }}"></script>



  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.j')}}s"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/modu')}}les-calendar.js"></script>
  <script src="{{ asset('assets/js/page/bootstrap-modal.js')}}"></script>
  <script src="{{ asset('assets/js/page/forms-advanced-forms.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>