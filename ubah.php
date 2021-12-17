<?php
    $title = 'Detail Biodata';
    include 'template/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="warga.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <div class="card mt-3 mb-5">
                <h5 class="card-header"><?php echo $title; ?></h5>
                <div class="card-body">
                    <form action="ubah.php" method="post">
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
                                <input class="form-check-input" type="radio" id="kelamin-l" name="kelamin" required>
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
                            <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
