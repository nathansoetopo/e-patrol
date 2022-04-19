<!--Modal Tambah Data-->
<div class="modal fade" tabindex="-1" role="dialog" id="addData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Satpam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('/hrd/data-shift/'.$shiftID.'/assign-satpam') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Satpam</label>
                        <select class="form-control select2" multiple="" name='user_id[]'>
                            @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                        class="btn text-white">Assign Satpam</button>
                </div>
            </form>
        </div>
    </div>
</div>
