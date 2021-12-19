<?php
    session_start();
    include 'konfigurasi/koneksi.php';
    $nik = $_GET['nik'];

    if (!isset($nik))
    {
        header('Location: warga.php');
    }
    else
    {
        $sql = "SELECT `nik`, `nama`, `ttl`, `kelamin`, `pekerjaan` FROM `biodata` WHERE `nik` = '$nik'";
        $kueri = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($kueri) === 1)
        {
            while($data = mysqli_fetch_assoc($kueri))
            {
                $nik = $data['nik'];
                $nama = $data['nama'];
                $ttl = json_decode($data['ttl'], true);
                $kelamin = $data['kelamin'];
                $pekerjaan = $data['pekerjaan'];
            }
        }
        else
        {
            header('Location: warga.php');
        }

        $mysqli->close();
    }

    $title = 'Detail Biodata';
    include 'template/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="warga.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <div class="card mt-3 mb-5">
                <h5 class="card-header"><?php echo $title . ' : ' . $nik; ?></h5>
                <div class="card-body">
                    <form action="konfigurasi/pengelolaan.php" method="post">
                        <input type="hidden" name="nik" value="<?php echo $nik; ?>">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" id="" placeholder="" name="nama" value="<?php echo $nama; ?>" required autocomple="off">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tempat dan Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" id="" placeholder="" name="tempat" value="<?php echo $ttl['tempat']; ?>" required autocomple="off">
                                <input type="date" class="form-control form-control-sm" id="" placeholder="" name="tanggal" value="<?php echo $ttl['tanggal']; ?>" required autocomple="off">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="kelamin-l" name="kelamin" value="L" <?php echo ($kelamin === 'L') ? 'checked' : false; ?>>
                                <label class="form-check-label" for="kelamin-l">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="kelamin-p" name="kelamin" value="P" <?php echo ($kelamin === 'P') ? 'checked' : false; ?>>
                                <label class="form-check-label" for="kelamin-p">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control form-control-sm" id="" placeholder="" name="pekerjaan" value="<?php echo $pekerjaan; ?>" required autocomple="off">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" value="ubah" class="btn btn-sm btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
