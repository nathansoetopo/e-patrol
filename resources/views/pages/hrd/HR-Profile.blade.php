@extends('components.hrd.template')

@section('title','Profile')

<style>
  #image {
    display: none;
  }

  #uploadBtn {
    position: absolute;
    object-position: center;
    text-align: center;
    transform: translateX(-0%);
    transform: translateY(8%);
    z-index: 9;
    opacity: 0.8;
    cursor: pointer;
    padding: 10%;
    display: none;
    background-color: black;
  }

  .form-control {
    background-color: #E5E5E5;
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
      <div class="row">
        <div class="col-12">
          <div class="card bg-transparent">
            <form method="post" class="needs-validation" novalidate="" action="{{url('hrd/update-profile-hrd')}}" enctype="multipart/form-data">
            <div class="card-body" style="padding: 0%;">
              <div class="container-fluid" style="background-color: #DFE3E0;">
                <div class="row human" style="padding: 3%;">
                  @if ($data->image == null)
                  <img alt="image" id="pp" src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture mb-3 mt-3" style="width: 100px; min-width: 100px; max-width: 100px;min-height: 100px; max-height: 100px;">
                  @else
                  <img alt="image" id="pp" src="{{ asset('data_users/'.$data->name.'/image/'.$data->image) }}" class="rounded-circle profile-widget-picture mb-3 mt-3" style="width: 100px; min-width: 100px; max-width: 100px;min-height: 100px; max-height: 100px;">
                  @endif
                  <input type="file" id="image" name="image" value="">
                  <label for="image" class="rounded-circle text-white profile-widget-picture mt-2" id="uploadBtn" style="width: 100px; min-width: 100px; max-width: 100px;min-height: 100px; max-height: 100px; padding: 40px;"><i class="fas fa-plus-circle" id="iconPlus"></i></label>
                  <!--Hi, Ujang Maman-->
                  <div class="ml-3 mt-3 profile-widget-name">Halo <div class="text-muted d-inline font-weight-normal">
                      <b>, </b>
                    </div>{{ Auth::user()->name }}</div>
                </div>
              </div>
              <br>
              <div class="container-fluid bg-white">
                <!--Untuk Form-->
                {{-- <form method="post" class="needs-validation" novalidate="" action="{{url('satpam/update-profile-satpam')}}"> --}}
                  @csrf
                  <div class="card-header">
                    <h4>Edit Profile</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-12 col-12">
                        <label>Nama</label>
                        <input type="text" name="name" style="border-radius: 30px;" class="form-control" value="{{$data->name}}" required="">
                        <div class="invalid-feedback">
                          Please fill in the first name
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Email</label>
                        <input type="email" name="email" style="border-radius: 30px;" class="form-control" value="{{$data->email}}" required="">
                        <div class="invalid-feedback">
                          Please fill in the email
                        </div>
                      </div>
                      <div class="form-group col-md-5 col-12">
                        <label>Nomor Handphone</label>
                        <input type="text" name="phone" style="border-radius: 30px;" class="form-control" value="{{$data->phone}}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Bio</label>
                        <textarea style="height: 150px;" name="bio" class="form-control summernote-simple">{{$data->bio}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <button type="submit" class="btn text-white" style="background-color: #4285F4; border-radius: 30px;">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!--Script Qr Code Scanner and Generator-->
<!-- General JS Scripts -->
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