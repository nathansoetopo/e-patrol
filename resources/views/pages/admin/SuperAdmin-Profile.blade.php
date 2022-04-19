@extends('components.admin.template')

@section('title','Profile Admin')
    

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
                        <img alt="image" id="pp" src="../assets/img/avatar/avatar-1.png"
                          class="rounded-circle profile-widget-picture mb-10"
                          style="width: 150px; min-width: 150px; max-width: 150px;min-height: 150px; max-height: 150px;">
                        <input type="file" id="image">
                        <label for="image" class="rounded-circle profile-widget-picture text-white"
                          id="uploadBtn"><br><br><i class="fas fa-plus-circle"></i><br>Ubah Foto</label>
                      </div>
                      <div class="ml-3 col-md-6 col-lg-5">
                        <div class="mt-4 profile-widget-name">Halo <div class="text-muted d-inline font-weight-normal">
                            <b>, </b></div>{{ Auth::user()->name }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    {{-- {{ $data-> }} --}}
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-12 col-12">
                          <label>Nama</label>
                          <input type="text" name="name" class="form-control" value="{{ $data->name }}" required="">
                          <div class="invalid-feedback">
                            Please fill in the first name
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" value="{{ $data->email }}" required="">
                          <div class="invalid-feedback">
                            Please fill in the email
                          </div>
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Nomor Handphone</label>
                          <input type="text" name="no_hp" class="form-control" value="{{ $data->no_hp }}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-12">
                          <label>Bio</label>
                          <textarea style="height: 200px;" name="bio"
                            class="form-control summernote-simple">{{ $data->bio }}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      @endsection