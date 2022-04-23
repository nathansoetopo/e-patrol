@extends('components.admin.template')

@section('title','Daftar Lokasi')
    
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
                <h1>Daftar Lokasi</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="container" id = "map" style = "width:100%; height:580px;"></div> 
                    </div>
                </div>
            </div>
    </div>
    <!--Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        var data= {!! json_encode($location) !!}
        var map_init = L.map('map', {
            center: [9.0820, 8.6753],
            zoom: 8
        });
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map_init);
        L.Control.geocoder().addTo(map_init);
        if (!navigator.geolocation) {
            console.log("Your browser doesn't support geolocation feature!")
        } else {
            navigator.geolocation.getCurrentPosition(mapRoute);
            navigator.geolocation.getCurrentPosition(getPosition);
        };
        var marker, circle, lat, long, accuracy;

        function getPosition(position) {
            lat = position.coords.latitude
            long = position.coords.longitude
            accuracy = position.coords.accuracy

            marker = L.marker([lat, long])
            circle = L.circle([lat, long], { radius: accuracy })

            var featureGroup = L.featureGroup([marker, circle]).addTo(map_init)

            map_init.fitBounds(featureGroup.getBounds())

            mapRoute();
        }
        //Geo
        function mapRoute(){
            navigator.geolocation.getCurrentPosition(cekFunction);
            function cekFunction(position){
                for (var i = 0; i < data.length; i++){
                    new L.marker([data[i][1],data[i][2]], {
                        win_url: data[i][3],
                    }).bindPopup("Pos "+data[i][0]).addTo(map_init);
                }
            }
        }
    </script>
@endsection 

