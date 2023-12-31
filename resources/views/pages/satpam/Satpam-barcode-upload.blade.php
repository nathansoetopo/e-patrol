@extends('components.satpam.template')

@section('title', 'Barcode Satpam')
    

<style>
  html{
    height:100%;
  }
  
  body{
    height:100%;
  }
  
  .wrapper{
  
    width:100%;
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
  
  }
    .file-upload{
  
      height:200px;
      width:40em;
      border-radius: 30px;
      position:relative;
  
      display:flex;
      justify-content:center;
      align-items: center;
  
      border:4px solid #FFFFFF;
      overflow:hidden;
      background-image: linear-gradient(to bottom, #DFE3E0 50%, #FFFFFF 50%);
      background-size: 100% 200%;
      transition: all 1s;
      color: #FFFFFF;
      font-size:100px;
    }
      input[type='file']{
  
        height:200px;
        width:64em;
        position:absolute;
        top:0;
        left:0;
        opacity:0;
        cursor:pointer;
  
      }
  
      &:hover{
  
        background-position: 0 -100%;
  
        color:white;
  
      }
  
  
  
  
    </style>



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
            <h1>PT. Rusyida Mitra Perkasa</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div>
                    <form id="createRecord" action="{{ url('satpam/scan/'.$barcode->id.'/upload') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <label style="color: black;">Nama Titik</label>
                    <div class="form-group">
                      <input type="text" class="form-control" value="{{ $barcode->name }}" readonly>
                    </div>
                    <label style="color: black;">Nama Pelapor</label>
                    <div class="form-group">
                      <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                    </div>
                    <!--LatLong-->
                    <div class="form-group">
                      <input type="hidden" id="lat" class="form-control" name="latitude">
                    </div>
                    <div class="form-group">
                      <input type="hidden" id="long" class="form-control" name="longitude">
                    </div>
                    {{-- Kamera Belakang --}}
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div style="color: #DFE3E0; background-color: #DFE3E0;" class="card">
                          <div class="card-body">
                            <div class="row justify-content-center">
                                  <input type="file" name="attachment" value="">
                                  <i style="color: black;" class="fas fa-cloud-upload-alt fa-7x"></i>
                              </div>
                              <p class="row justify-content-center" style="color: black;">Buka Kamera Belakang</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- Foto Selfie --}}
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div style="color: #DFE3E0; background-color: #DFE3E0;" class="card">
                          <div class="card-body">
                            <div class="row justify-content-center">
                                  <input type="file" name="attachment_selfie" value="">
                                  <i style="color: black;" class="fas fa-cloud-upload-alt fa-7x"></i>
                              </div>
                              <p class="row justify-content-center" style="color: black;">Lakukan Selfie</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- Deskripsi --}}
                    <textarea name="deskripsi" class="form-control mb-3" style="height: 200px" required>Masukkan Deskripsi Keadaan</textarea>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<script>
  navigator.geolocation.getCurrentPosition(getLatLon);
  function getLatLon(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var input1 = document.getElementById('lat');
    var input2 = document.getElementById('long');
    input1.value = latitude;
    input2.value = longitude;
    console.log(latitude);
    console.log(longitude);
  }
</script>
 @endsection
