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
                            <b>,</b></div>Ujang Maman</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente, temporibus? Eius, consequatur
                    explicabo, culpa a harum suscipit ad excepturi repellat qui, temporibus esse sapiente vero beatae
                    magnam eaque tenetur. Harum?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, eos debitis illum tempora
                    iusto unde quam voluptates ipsum quae ut ipsa dolores amet ea, nostrum culpa non qui, error
                    repudiandae.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta distinctio suscipit, ratione hic
                    aliquam iste sunt fugiat autem explicabo pariatur dignissimos! Quisquam pariatur laboriosam commodi
                    possimus amet odio ipsa hic.
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
                        <div class="form-group col-md-6 col-12">
                          <label>Nama Depan</label>
                          <input type="text" class="form-control" value="Ujang" required="">
                          <div class="invalid-feedback">
                            Please fill in the first name
                          </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Nama Belakang</label>
                          <input type="text" class="form-control" value="Maman" required="">
                          <div class="invalid-feedback">
                            Please fill in the last name
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Email</label>
                          <input type="email" class="form-control" value="ujang@maman.com" required="">
                          <div class="invalid-feedback">
                            Please fill in the email
                          </div>
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Nomor Handphone</label>
                          <input type="number" class="form-control" value="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-12">
                          <label>Bio</label>
                          <textarea style="height: 200px;"
                            class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
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
      @endsection