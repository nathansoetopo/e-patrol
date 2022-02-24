{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Components &rsaquo; Table &mdash; Stisla</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Libraries -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <!--Style--> --}}

    @extends('components.satpam.template')

    @section('title','Profile')

    <style>
        #image{
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

        .form-control{
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
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-transparent">
                                    <div class="card-body" style="padding: 0%;">
                                        <div class="container" style="background-color: #DFE3E0;">
                                            <div class="row human" style="padding: 3%;">
                                                <img alt="image" id="pp" src="../assets/img/avatar/avatar-1.png"
                                                    class="rounded-circle profile-widget-picture mb-3 mt-3"
                                                    style="width: 100px; min-width: 100px; max-width: 100px;min-height: 100px; max-height: 100px;">
                                                    <input type="file" id="image">
                                                    <label for="image" class="rounded-circle text-white profile-widget-picture mt-2"
                                                    id="uploadBtn" style="width: 100px; min-width: 100px; max-width: 100px;min-height: 100px; max-height: 100px; padding: 40px;"><i class="fas fa-plus-circle" id="iconPlus"></i></label>
                                                    <!--Hi, Ujang Maman-->
                                                    <div class="ml-3 mt-3 profile-widget-name">Halo <div
                                                        class="text-muted d-inline font-weight-normal">
                                                        <b>,</b>
                                                    </div>Ujang Maman</div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="container bg-white">
                                            <!--Untuk Form-->
                                            <form method="post" class="needs-validation" novalidate="">
                                                <div class="card-header">
                                                  <h4>Edit Profile</h4>
                                                </div>
                                                <div class="card-body">
                                                  <div class="row">
                                                    <div class="form-group col-md-6 col-12">
                                                      <label>Nama Depan</label>
                                                      <input type="text" style="border-radius: 30px;" class="form-control" value="Ujang" required="">
                                                      <div class="invalid-feedback">
                                                        Please fill in the first name
                                                      </div>
                                                    </div>
                                                    <div class="form-group col-md-6 col-12">
                                                      <label>Nama Belakang</label>
                                                      <input type="text" style="border-radius: 30px;" class="form-control" value="Maman" required="">
                                                      <div class="invalid-feedback">
                                                        Please fill in the last name
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="form-group col-md-7 col-12">
                                                      <label>Email</label>
                                                      <input type="email" style="border-radius: 30px;" class="form-control" value="ujang@maman.com" required="">
                                                      <div class="invalid-feedback">
                                                        Please fill in the email
                                                      </div>
                                                    </div>
                                                    <div class="form-group col-md-5 col-12">
                                                      <label>Nomor Handphone</label>
                                                      <input type="number" style="border-radius: 30px;" class="form-control" value="">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="form-group col-12">
                                                      <label>Bio</label>
                                                      <textarea style="height: 150px;"
                                                        class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                  <button class="btn text-white" style="background-color: #4285F4; border-radius: 30px;">Simpan</button>
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
        imgDiv.addEventListener('mouseenter', function () {
          uploadBtn.style.display = "block";
        })
    
        imgDiv.addEventListener('mouseleave', function () {
          uploadBtn.style.display = "none";
        })
    
        file.addEventListener('change', function () {
          const choosedFile = this.files[0];
          if (choosedFile) {
            const reader = new FileReader();
            reader.addEventListener('load', function () {
              img.setAttribute('src', reader.result);
            })
            reader.readAsDataURL(choosedFile)
            console.log(file.value);
            //Nama File atau Src bisa masuk ke dalam input value
          }
        })
      </script>
    