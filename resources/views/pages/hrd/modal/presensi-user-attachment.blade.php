<!--Modal Tambah Data-->
@foreach ($satpam as $b)
<div class="modal fade" tabindex="-1" role="dialog" id="showUserImage{{ $b->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate User Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('data/'.$b->name.'/'.$presensi->name.'/'.$b->pivot->attachment) }}" class="img-fluid" alt="...">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    {{-- <a type="button" href="#"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                        class="btn text-white">Download</a> --}}
                </div>
        </div>
    </div>
</div>
@endforeach