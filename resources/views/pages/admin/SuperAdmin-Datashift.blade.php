@extends('components.admin.template')

@section('title','Data Shift')

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
            <h1>Data Shift</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="border-radius: 30px;" class="input-group-text">
                            <input style="border: none;" type="text" class="form-control" id="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-light" type="button"><i style="right: 70px;"
                                    class="fas fa-search"></i></button>
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
                                        <th scope="col">Start</th>
                                        <th scope="col">End</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($shifts as $key => $shift)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $shift->name }}</td>
                                        <td>{{ $shift->start_time }}</td>
                                        <td>{{ $shift->end_time }}</td>
                                        <td>
                                            @if ($shift->status == 'ACTIVE')
                                            <span class="badge badge-success">Aktif</span>
                                            @else
                                            <span class="badge badge-danger">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/data-shift/'.$shift->id.'/data-satpam') }}" id="modal-7"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-user-cog fa-2x"></i>
                                            </a>
                                            <a href="{{ url('/admin/data-shift/'.$shift->id.'/data-hrd') }}" id="modal-7"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-user-shield fa-2x"></i>
                                            </a>
                                            <a href="#" id="modal-7" data-toggle="modal" data-target="#updateData{{ $shift->id }}"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-edit fa-2x"></i>
                                            </a>
                                            <a href="#" id="modal-7" data-toggle="modal" data-target="#updateDataStatus{{ $shift->id }}"
                                                class="btn btn-transparent text-center text-dark">
                                                <i class="fas fa-power-off fa-2x"></i>
                                            </a>
                                            <a href="#" id="modal-7" data-toggle="modal" data-target="#deleteData{{ $shift->id }}"
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
                                            class="{{ ($shifts->currentPage() == 1) ? 'page-item disabled' : 'page-item' }}">
                                            <a class="page-link" href="{{ $shifts->url($shifts->currentPage()-1) }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $shifts->lastPage(); $i++)
                                            <li
                                                class="{{ ($shifts->currentPage() == $i) ? 'page-item active' : 'page-item' }}">
                                                <a class="page-link" href="{{ $shifts->url($i) }}">{{ $i }}</a></li>
                                            @endfor
                                            <li
                                                class="{{ ($shifts->currentPage() == $shifts->lastPage()) ? 'page-item disabled' : 'page-item' }}">
                                                <a class="page-link"
                                                    href="{{ $shifts->url($shifts->currentPage()+1) }}"
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
</div>
</div>
</div>
</section>

@include('pages.admin.modal.create-shift')
@include('pages.admin.modal.update-shift')
@include('pages.admin.modal.update-shift-status')
@include('pages.admin.modal.delete-shift')
<!--Script Search-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>  
    function fetch_user_data(query = '')
    {
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
       url:"{{ url('/search-shift') }}",
       method:'POST',
       data:{query:query},
       success:function(response)
       {
        $('#tbody').html(response);
       }
      })
    }
    $(document).on('keyup', '#search', function(){
      var word = $(this).val();
      fetch_user_data(word);
    });
</script>
@endsection
