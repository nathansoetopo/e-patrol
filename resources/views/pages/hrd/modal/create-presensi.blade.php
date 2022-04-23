<!--Modal Tambah Data-->
<div class="modal fade" tabindex="-1" role="dialog" id="addData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Presensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('/hrd/data-presensi') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Shift</label>
                        <select class="form-control select2" name='shiftID'>
                            @foreach ($shifts as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                        class="btn text-white">Tambah Presensi</button>
                </div>
            </form>
        </div>
    </div>
</div>
