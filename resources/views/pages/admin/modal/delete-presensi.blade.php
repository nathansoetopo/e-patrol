<!--Modal Tambah Data-->
@foreach ($presensi as $shift)
<div class="modal fade" tabindex="-1" role="dialog" id="deleteData{{ $shift->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Presensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus {{ $shift->name }}?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a type="button" href="{{ url('/admin/data-presensi/'.$shift->id.'/delete-data') }}"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #ff0000;"
                        class="btn text-white">Delete Presensi</a>
                </div>
        </div>
    </div>
</div>
@endforeach