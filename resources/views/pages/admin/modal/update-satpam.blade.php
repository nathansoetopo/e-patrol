@foreach ($satpam as $s)
<div class="modal fade" tabindex="-1" role="dialog" id="updateData{{ $s->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Data Satpam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('/admin/data-satpam/'.$s->id.'/update-data') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
                            class="form-control" name="name" value="{{ $s->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
                            class="form-control" name="username" value="{{ $s->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">NIK</label>
                        <input type="text" style="border-radius: 30px;" placeholder="Masukkan NIK Satpam"
                            class="form-control" id="nik" name="nik" value="{{ $s->nik }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">BPJS</label>
                        <input type="text" style="border-radius: 30px;" placeholder="Masukkan BPJS Satpam"
                            class="form-control" id="nik" name="bpjs" value="{{ $s->bpjs }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
                        <input type="number" placeholder="Masukkan Nomor HP Satpam" style="border-radius: 30px;"
                            class="form-control" id="hp" name="phone" value="{{ $s->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">E-mail</label>
                        <input type="email" style="border-radius: 30px;" placeholder="Masukkan Email Satpam"
                            class="form-control" id="email" name="email" value="{{ $s->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" style="border-radius: 30px;" placeholder="Masukkan Password Satpam"
                            class="form-control" id="pw" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
                        <input type="password" style="border-radius: 30px;" placeholder="Masukkan Password Konfirmasi"
                            class="form-control" id="pw" name="password_confirmation" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit"
                        style="transform: translateX(-80%); width: 174px; border-radius: 30px; background-color: #4285F4;"
                        class="btn text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach