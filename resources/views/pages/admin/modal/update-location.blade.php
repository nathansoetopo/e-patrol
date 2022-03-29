@foreach ($barcodes as $key => $b)
<div class="modal fade" tabindex="-1" role="dialog" id="updateData{{ $b->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Titik Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('/admin/data-lokasi/'.$b->id.'/update-data') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Nama Titik</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $b->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="">
                                <h5><b>Google Maps</b></h5>
                            </label>
                            <input type="text" id="lat" name="latitude"
                                placeholder="Masukkan Koordinat Latitude" class="form-control" autofocus
                                data-parsley-required="true">
                            {{-- value="{{{ $data->latitude ?? old('latitude') }}}" --}}
                            <input type="text" id="lng" name="longitude"
                                placeholder="Masukkan Koordinat Longitude" class="form-control" autofocus
                                data-parsley-required="true">
                            {{-- value="{{{ $data->longitude ?? old('longitude') }}}" --}}
                        </div>
                        <div id="map{{ $key }}" style="height:400px; width: 450px;" class="my-3"></div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                        class="btn text-white">Simpan Lokasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach