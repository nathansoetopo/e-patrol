@extends('components.admin.template')

@section('title','Data Lokasi')



    <style>
      #myMap {
        width:100%;
        height:380px;
      }
      </style>

@section('main-content')
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

@endsection