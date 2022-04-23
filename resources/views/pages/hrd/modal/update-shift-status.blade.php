<!--Modal Tambah Data-->
@foreach ($shifts as $shift)
<div class="modal fade" tabindex="-1" role="dialog" id="updateDataStatus{{ $shift->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status Shift</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengubah status dari {{ $shift->name }}?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a type="button" href="{{ url('/hrd/data-shift/'.$shift->id.'/update-status') }}"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                        class="btn text-white">Update Shift</a>
                </div>
        </div>
    </div>
</div>
@endforeach