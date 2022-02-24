@extends('components.admin.template')

@section('title','Data Satpam')
    
@section('main-content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Satpam</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <form>
                      <div class="input-group">
                        <div style="border-radius: 30px;" class="input-group-text">
                          <input style="border: none;" type="text" class="form-control" placeholder="Cari"
                            aria-label="Search">
                          <button class="btn btn-light" type="button"><i style="right: 70px;" class="fas fa-search"
                              disabled></i></button>
                        </div>
                      </div>
                    </form>
                    <div style="border-radius: 30px; position: absolute; object-position: center; left: 84%;">
                      <button style="padding-top: 2%; padding-bottom: 2%;" data-toggle="modal" data-target="#addData"
                        class="btn btn-light" type="button">Tambah Data <i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="card-body p-4">
                    <div class="table-responsive table-bordered">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Shift</th>
                            <th>NIK</th>
                            <th>Nomor HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              1
                            </td>
                            <td><a href="#" class="text-dark" data-toggle="modal" data-target="#info">Nathan gay</a></td>
                            <td class="align-middle">12345678</td>
                            <td>0283829832</td>
                            <td class="align-middle">
                              <div class="badge badge-success">Active</div>
                            </td>
                            <td>
                              <center>
                                <a href="#" data-toggle="modal" data-target="#editData"
                                  class="btn btn-transparent text-center text-dark">
                                  <i class="far fa-edit fa-2x"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteData"
                                  class="btn btn-transparent text-center text-dark">
                                  <i class="far fa-trash-alt fa-2x"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#nonAktifData"
                                  class="btn btn-transparent text-center text-dark">
                                  <i class="fas fa-power-off fa-2x"></i>
                                </a>
                              </center>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Keliling Kontraqun</td>
                            <td class="align-middle">12345678</td>
                            <td>0283829832</td>
                            <td class="align-middle">
                              <div class="badge badge-danger">Non</div>
                            </td>
                            <td>
                              <center>
                                <a href="#" class="btn btn-transparent text-center text-dark">
                                  <i class="far fa-edit fa-2x"></i>
                                </a>
                                <a href="#" class="btn btn-transparent text-center text-dark">
                                  <i class="far fa-trash-alt fa-2x"></i>
                                </a>
                                <a href="#" class="btn btn-transparent text-center text-dark">
                                  <i class="fas fa-power-off fa-2x"></i>
                                </a>
                              </center>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link bg-light text-dark" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link bg-light text-dark" href="#">1 <span
                              class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link bg-light text-dark" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link bg-light text-dark" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link bg-light text-dark" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  
  <!--Modal Tambah Data-->
  <div class="modal fade" tabindex="-1" role="dialog" id="addData">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Satpam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
              <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
                class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">NIK</label>
              <input type="number" style="border-radius: 30px;" placeholder="Masukkan NIK Satpam" class="form-control"
                id="nik" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
              <input type="number" placeholder="Masukkan Nomor HP Satpam" style="border-radius: 30px;"
                class="form-control" id="hp" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">E-mail</label>
              <input type="email" style="border-radius: 30px;" placeholder="Masukkan Email Satpam" class="form-control"
                id="email" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" style="border-radius: 30px;" placeholder="Masukkan Password Satpam"
                class="form-control" id="pw" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Data yang dimasukkan sudah benar?</label>
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
              class="btn text-white">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal Edit Data-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editData">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Satpam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
              <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
                class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">NIK</label>
              <input type="number" style="border-radius: 30px;" placeholder="Masukkan NIK Satpam" class="form-control"
                id="nik" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
              <input type="number" placeholder="Masukkan Nomor HP Satpam" style="border-radius: 30px;"
                class="form-control" id="hp" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">E-mail</label>
              <input type="email" style="border-radius: 30px;" placeholder="Masukkan Email Satpam" class="form-control"
                id="email" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" style="border-radius: 30px;" placeholder="Masukkan Password Satpam"
                class="form-control" id="pw" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Data yang dimasukkan sudah benar?</label>
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
              class="btn text-white">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal Delete Data-->
  <div class="modal fade" tabindex="-1" role="dialog" id="deleteData">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">Delete Data Satpam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <div class="modal-body">
            <center>
              <h4>Nama Satpam</h4>
            </center>
            <br>
            <center>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Anda Yakin Untuk Hapus Data?</label>
              </div>
            </center>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" style="transform: translateX(-80%); width: 174px; border-radius: 30px;"
              class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal Non-aktif Data-->
  <div class="modal fade" tabindex="-1" role="dialog" id="nonAktifData">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">Status Akun Satpam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <div class="modal-body">
            <center>
              <h4>Nama Satpam</h4>
            </center>
            <br>
            <center>
              <div class="mb-3 form-check">
                <label class="form-check-label" for="stat">Status Akun</label><br><br>
                <select style="border-radius: 30px;" id="stat" class="form-control">
                  <option>Aktif</option>
                  <option selected>Non-Aktif</option>
                </select>
              </div>
            </center>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
              class="btn text-white">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Modal Info-->
  <div class="modal fade" tabindex="-1" role="dialog" id="info">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Satpam</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
            <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
              class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">NIK</label>
            <input type="number" style="border-radius: 30px;" placeholder="Masukkan NIK Satpam" class="form-control"
              id="nik" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
            <input type="number" placeholder="Masukkan Nomor HP Satpam" style="border-radius: 30px;"
              class="form-control" id="hp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">E-mail</label>
            <input type="email" style="border-radius: 30px;" placeholder="Masukkan Email Satpam" class="form-control"
              id="email" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" style="border-radius: 30px;" placeholder="Masukkan Password Satpam"
              class="form-control" id="pw" required>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" data-dismiss="modal"
            style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
            class="btn text-white">Close</button>
        </div>
      </div>
    </div>
  </div>
  