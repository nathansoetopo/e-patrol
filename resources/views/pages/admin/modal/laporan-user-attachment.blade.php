<!--Modal Tambah Data-->
@foreach ($satpam as $b)
<div class="modal fade" tabindex="-1" role="dialog" id="showUserImage{{ $b->pivot->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bukti Patroli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('data/' . $b->name . '/laporan/'.$b->pivot->attachment) }}" class="img-fluid" alt="...">
                    </div>
                    <br>
                    <div class="text-center">
                        <img src="{{ asset('data/' . $b->name . '/laporan/'.$b->pivot->selfie) }}" class="img-fluid" alt="{{$b->pivot->selfie}}">
                    </div>
                    <br>
                    <b>Nama Petugas</b>
                    <br>
                    <p>{{$b->name}}</p>
                    <br>
                    <b>Deskripsi</b>
                    <br>
                    <p>{{$b->pivot->deskripsi}}</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                </div>
        </div>
    </div>
</div>
@endforeach