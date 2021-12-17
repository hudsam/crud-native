<?php
    $title = 'Daftar Warga';
    include 'template/header.php';
?>

<div class="p-3 pb-md-4 mx-auto text-center" style="max-width: 700px;">
    <h1 class="display-4 fw-normal">Daftar Warga</h1>
    <p class="fs-5 text-muted">Aplikasi sederhana untuk mengelola biodata warga yang menerapkan CRUD menggunakan PHP Native.</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md">
            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                <i class="bi bi-person-plus-fill"></i> Tambah
            </button>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover table-bordered data-warga" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Pekerjaan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Hud Sam</td>
                            <td>Laki-laki</td>
                            <td>Fresh Graduate</td>
                            <td class="text-center">
                                <a href="ubah.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i> Ubah</a>
                                <a href="hapus.php" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Pekerjaan</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah biodata warga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="warga.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" class="form-control form-control-sm" id="" placeholder="" name="" required maxlength="16">
                        <small class="form-text text-danger">NIK harus mengandung angka.</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-sm" id="" placeholder="" name="" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tempat dan Tanggal Lahir</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="" placeholder="" name="" required>
                            <input type="date" class="form-control form-control-sm" id="" placeholder="" name="" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="kelamin-l" name="kelamin" required checked>
                            <label class="form-check-label" for="kelamin-l">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="kelamin-p" name="kelamin">
                            <label class="form-check-label" for="kelamin-p">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control form-control-sm" id="" placeholder="" name="" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-secondary d-none" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle-fill"></i> Batal
                </button>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>