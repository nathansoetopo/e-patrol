@extends('components.hrd.template')

@section('title','Data Satpam')
    
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
                          <input style="border: none;" id="search" type="text" class="form-control" placeholder="Cari"
                            aria-label="Search">
                          <button class="btn btn-light" type="button"><i style="right: 70px;" class="fas fa-search"
                              disabled></i></button>
                        </div>
                      </div>
                    </form>
                    {{-- <div style="border-radius: 30px; position: absolute; object-position: center; left: 25%;">
                      <a target="_blank" href="{{ url('hrd/data-satpam/pdf') }}" style="padding-top: 2%; padding-bottom: 2%;" class="btn btn-light" type="button">Export PDF <i
                              class="fa fa-file-pdf" aria-hidden="true"></i></a>
                    </div> --}}
                    <div style="border-radius: 30px; position: absolute; object-position: center; left: 35%;">
                      <a href="{{ url('hrd/data-satpam/excel') }}" style="padding-top: 2%; padding-bottom: 2%;" class="btn btn-light" type="button">Export Excel <i
                        class="fa fa-file-excel" aria-hidden="true"></i></a>
                    </div>
                    <div style="border-radius: 30px; position: absolute; object-position: center; left: 84%;">
                      <button style="padding-top: 2%; padding-bottom: 2%;" data-toggle="modal" data-target="#addData"
                        class="btn btn-light" type="button">Tambah Data <i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="card-body p-4">
                    <div class="table-responsive table-bordered">
                      <table class="table table-bordered table-md">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($satpam as $key => $s)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->nik }}</td>
                                <td>{{ $s->username }}</td>
                                <td>{{ $s->email }}</td>
                                <td>{{ $s->phone }}</td>
                                <td>
                                    @if ($s->status == 'ACTIVE')
                                    <span class="badge badge-success">Aktif</span>
                                    @else
                                    <span class="badge badge-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" id="modal-7" data-toggle="modal" data-target="#updateData{{ $s->id }}"
                                        class="btn btn-transparent text-center text-dark">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                    <a href="#" id="modal-7" data-toggle="modal" data-target="#updateDataStatus{{ $s->id }}"
                                        class="btn btn-transparent text-center text-dark">
                                        <i class="fas fa-power-off fa-2x"></i>
                                    </a>
                                    <a href="#" id="modal-7" data-toggle="modal" data-target="#deleteData{{ $s->id }}"
                                        class="btn btn-transparent text-center text-dark">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center">
                    <div class="buttons">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li
                                    class="{{ ($satpam->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                                    <a class="page-link" href="{{ $satpam->url($satpam->currentPage()-1) }}"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $satpam->lastPage(); $i++)
                                    <li
                                        class="{{ ($satpam->currentPage() == $i) ? 'page-item active' : 'page-item' }}">
                                        <a class="page-link" href="{{ $satpam->url($i) }}">{{ $i }}</a></li>
                                    @endfor
                                    <li
                                        class="{{ ($satpam->currentPage() == $satpam->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                                        <a class="page-link"
                                            href="{{ $satpam->url($satpam->currentPage()+1) }}"
                                            aria-label="Next">
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
  @include('pages.hrd.modal.create-satpam')
  @include('pages.hrd.modal.update-satpam')
  @include('pages.hrd.modal.update-satpam-status')
  @include('pages.hrd.modal.delete-satpam')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
    function fetch_user_data(query = '')
    {
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
       url:"{{ url('/search-satpam') }}",
       method:'POST',
       data:{query:query},
       success:function(response)
       {
        $('#tbody').html(response);
        //console.log(response);
       }
      })
    }
    $(document).on('keyup', '#search', function(){
      var word = $(this).val();
      fetch_user_data(word);
    });
  </script>
  @endsection