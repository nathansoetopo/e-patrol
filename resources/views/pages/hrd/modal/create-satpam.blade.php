<!--Modal Tambah Data-->
<div class="modal fade" tabindex="-1" role="dialog" id="addData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Satpam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('/hrd/data-satpam') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
                            class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" placeholder="Masukkan Nama Lengkap Satpam" style="border-radius: 30px;"
                            class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">NIK</label>
                        <input type="number" style="border-radius: 30px;" placeholder="Masukkan NIK Satpam"
                            class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nomor HP</label>
                        <input type="number" placeholder="Masukkan Nomor HP Satpam" style="border-radius: 30px;"
                            class="form-control" id="hp" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">E-mail</label>
                        <input type="email" style="border-radius: 30px;" placeholder="Masukkan Email Satpam"
                            class="form-control" id="email" name="email" required>
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
                        class="btn text-white">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
