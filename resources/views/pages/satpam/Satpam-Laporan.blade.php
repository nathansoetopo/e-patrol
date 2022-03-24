@extends('components.satpam.template')

@section('title', 'Dashboard Satpam')
    

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
          <div class="section-header">
            <h1>PT. Rusyida Mitra Perkasa</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div>
                    <label style="color: black;">Laporan Keadaan</label>
                    <div class="form-group">
                      <input type="text" class="form-control">
                    </div>
                    <label style="color: black;">Detail Keadaan</label>
                    <div class="form-group row mb-4">
                      <div class="col-sm-12 col-md-12">
                        <textarea class="summernote-simple"></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div style="color: #DFE3E0; background-color: #DFE3E0;" class="card">
                          <div class="card-body">
                            <div class="row justify-content-center">
                                  <input type="file" />
                                  <i style="color: black;" class="fas fa-cloud-upload-alt fa-7x"></i>
                              </div>
                              <p class="row justify-content-center" style="color: black;">Buka Kamera atau Cari Foto</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
 @endsection
