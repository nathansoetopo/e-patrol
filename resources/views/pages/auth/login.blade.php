<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

  <style>
    body{
      background-image: url('../images/bg-rms.jpg');
      background-size: 100%;
      background-repeat: no-repeat;
    }
  </style>
</head>

<body>
  <div id="app">
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
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-3 of
          fset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="../images/logo2.png" class="block text pl-5 pr-5" style="height: 5em" />
              <a style="color: black;" class=""><h5>PT. RUSYIDA MITRA PERKASA</h5></a>
            </div>

            <div class="card card-primary">
              <div class="card-header row justify-content-center"><h3>Login</h3></div>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input style="border-radius: 30px;" id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Isi email anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a style="color: black;" href="auth-forgot-password.html" class="text-small">
                          Lupa Password?
                        </a>
                      </div>
                    </div>
                    <input style="border-radius: 30px;" id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Isi password anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-light btn-lg btn-block" tabindex="4">
                      Login
                    </button>
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

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
