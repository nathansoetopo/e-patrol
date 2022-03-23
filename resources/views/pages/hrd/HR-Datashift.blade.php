@extends('components.hrd.template')

@section('title','Data Shift')
    
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
                  <div style="border-radius: 30px; position: absolute; object-position: center; left: 84%;">
                    <button style="padding-top: 2%; padding-bottom: 2%;" data-toggle="modal"
                        data-target="#addData" class="btn btn-light" type="button">Tambah Shift <i
                            class="fas fa-plus"></i></button>
                </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Mulai</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Michael Adzan Isnaindra</td>
                        <td>Senin</td>
                        <td>12.00</td>
                        <td>
                          <a href="#" id="modal-7" data-toggle="modal" data-target="#editData"
                          class="btn btn-transparent text-center text-dark">
                          <i class="fas fa-edit fa-2x"></i>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#nonAktifData"
                          class="btn btn-transparent text-center text-dark" data-toggle="tooltip" title="Hapus" data-confirm="Anda yakin nonaktifkan data ini?" data-confirm-yes="alert('Data Terhapus')">
                          <i class="fas fa-power-off fa-2x"></i>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#nonAktifData"
                        class="btn btn-transparent text-center text-dark" data-toggle="tooltip" title="Hapus" data-confirm="Anda yakin menghapus data ini?" data-confirm-yes="alert('Data Terhapus')">
                        <i class="fas fa-trash-alt fa-2x"></i>
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
        </section>
        </div>

<!--Modal Tambah Data-->
<div class="modal fade" tabindex="-1" role="dialog" id="addData">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Tambah Shift</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form method="post">
              <div class="modal-body">
                  <div class="mb-3">
                      <div class="form-group">
                          <label>Nama Shift</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fas fa-pencil-alt"></i>
                                  </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Nama" name="nama">
                          </div>
                      </div>
                  </div>
                  <div class="mb-3">
                      <div class="form-group">
                          <label>Hari</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fas fa-calendar"></i>
                                  </div>
                              </div>
                              <input type="date" class="form-control">
                          </div>
                      </div>
                  </div>

                  <div class="mb-3">
                      <div class="form-group">
                          <label>Mulai</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fas fa-clock"></i>
                                  </div>
                              </div>
                              <input type="time" class="form-control timepicker">
                          </div>
                      </div>
                  </div>

                  <div class="mb-3">
                      <div class="form-group">
                          <label>Selesai</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fas fa-clock"></i>
                                  </div>
                              </div>
                              <input type="time" class="form-control timepicker">
                          </div>
                      </div>
                  </div>
                  <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Data yang dimasukkan sudah benar?</label>
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="submit"
                      style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                      class="btn text-white">Tambah Shift</button>
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
              <h5 class="modal-title">Tambah Shift</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form method="post">
              <div class="modal-body">
                  <div class="mb-3">
                      <div class="form-group">
                          <label>Nama Shift</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fas fa-pencil-alt"></i>
                                  </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Nama" name="nama">
                          </div>
                      </div>
                  </div>
                  <div class="mb-3">
                      <div class="form-group">
                          <label>Hari</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fas fa-calendar"></i>
                                  </div>
                              </div>
                              <input type="date" class="form-control">
                          </div>
                      </div>
                  </div>

                  <div class="mb-3">
                      <div class="form-group">
                          <label>Mulai</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fas fa-clock"></i>
                                  </div>
                              </div>
                              <input type="time" class="form-control timepicker">
                          </div>
                      </div>
                  </div>

                  <div class="mb-3">
                      <div class="form-group">
                          <label>Selesai</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fas fa-clock"></i>
                                  </div>
                              </div>
                              <input type="time" class="form-control timepicker">
                          </div>
                      </div>
                  </div>
                  <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Data yang dimasukkan sudah benar?</label>
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="submit"
                      style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                      class="btn text-white">Tambah Shift</button>
              </div>
          </form>
      </div>
  </div>
</div>

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
        @endsection 

