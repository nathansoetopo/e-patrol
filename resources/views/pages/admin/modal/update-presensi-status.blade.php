<!--Modal Tambah Data-->
@foreach ($presensi as $shift)
<div class="modal fade" tabindex="-1" role="dialog" id="updateDataStatus{{ $shift->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Presensi Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengubah status dari {{ $shift->name }}?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a type="button" href="{{ url('/admin/data-presensi/'.$shift->id.'/update-status') }}"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                        class="btn text-white">Update Presensi</a>
                </div>
        </div>
    </div>
</div>
@endforeach