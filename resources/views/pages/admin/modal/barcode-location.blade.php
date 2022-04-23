<!--Modal Tambah Data-->
@foreach ($barcodes as $b)
<div class="modal fade" tabindex="-1" role="dialog" id="barcodeLocation{{ $b->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="text-center">
                        {!! QrCode::size(250)->generate(env('APP_URL') . '/satpam/scan/' . $b->id . '/detail'); !!}
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a type="button" href="{{ url('/admin/data-lokasi/'.$b->id.'/download-barcode') }}"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                        class="btn text-white">Download</a>
                </div>
        </div>
    </div>
</div>
@endforeach