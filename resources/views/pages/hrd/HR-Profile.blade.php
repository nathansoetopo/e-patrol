@extends('components.hrd.template')

@section('title','Profile HRD')


<!--Kurang
  1. Responsive button ubah foto (Aman Gan)
  2. Menggunakan form awesome dan string ubah gambar (Sedikit beda dari UI)
  2. Form get file aman, form get text number email aman, cek console log untuk cek data file upload
  3. Js Script ada di bawah
  -->
<style>
  #image {
    display: none;
  }

  #uploadBtn {
    height: 150px;
    width: 150px;
    position: absolute;
    object-position: center;
    bottom: 0;
    text-align: center;
    transform: translateX(-0%);
    z-index: 9;
    opacity: 0.8;
    cursor: pointer;
    display: none;
    padding: 10%;
    background-color: black;
  }

  #pp {
    z-index: 1;
  }

  @media screen and (max-device-width: 320px) {

    #image {
      display: none;
    }

    #uploadBtn {
      display: none;
    }

    #pp {
      display: none;
    }

  }
</style>


@section('main-content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
    </div>
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-6">
          <div class="card profile-widget">
            <div class="profile-widget-header">
              <div class="row">
                <div class="human col-md-5 col-sm-4">
                  <img alt="image" id="pp" src="{{ asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture mb-10" style="width: 150px; min-width: 150px; max-width: 150px;min-height: 150px; max-height: 150px;">
                  <label for="image" class="rounded-circle profile-widget-picture text-white" id="uploadBtn"><br><br><i class="fas fa-plus-circle"></i><br>Ubah Foto</label>
                </div>
                <div class="ml-3 col-md-6 col-lg-5">
                  <div class="mt-4 profile-widget-name">Halo <div class="text-muted d-inline font-weight-normal">
                      <b>,</b>
                    </div>{{$data->name}}</div>
                </div>
              </div>
            </div>
            <div class="profile-widget-description">
              {{$data->bio}}
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
          <div class="card">
            <form method="post" class="needs-validation" action="{{url('hrd/update-profile-hrd')}}">
              @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Nama Depan</label>
                    <input type="text" name="name" class="form-control" value="{{$data->name}}" required>
                    <div class="invalid-feedback">
                      Please fill in the first name
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{$data->email}}" required="">
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Nomor Handphone</label>
                    <input type="text" name="no_hp" class="form-control" value="{{$data->no_hp}}">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-12">
                    <label>Bio</label>
                    <textarea style="height: 200px;" class="form-control summernote-simple" name="bio">{{$data->bio}}</textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer text-center">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  const imgDiv = document.querySelector('.human');
  const img = document.querySelector('#pp');
  const uploadBtn = document.querySelector('#uploadBtn');
  const file = document.querySelector('#image');
  imgDiv.addEventListener('mouseenter', function() {
    uploadBtn.style.display = "block";
  })

  imgDiv.addEventListener('mouseleave', function() {
    uploadBtn.style.display = "none";
  })

  file.addEventListener('change', function() {
    const choosedFile = this.files[0];
    if (choosedFile) {
      const reader = new FileReader();
      reader.addEventListener('load', function() {
        img.setAttribute('src', reader.result);
      })
      reader.readAsDataURL(choosedFile)
      console.log(file.value);
      //Nama File atau Src bisa masuk ke dalam input value
    }
  })
</script>
@endsection
{{-- <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval
            Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div> --}}

<!-- General JS Scripts -->