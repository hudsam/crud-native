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
        $sql = "SELECT `nik`, `nama` FROM `biodata` WHERE `nik` = '$nik'";
        $kueri = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($kueri) === 1)
        {
            while($data = mysqli_fetch_assoc($kueri))
            {
                $nik = $data['nik'];
                $nama = $data['nama'];
            }
        }
        else
        {
            header('Location: warga.php');
        }

        $mysqli->close();
    }

    $title = 'Hapus Biodata';
    include 'template/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="warga.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <div class="card mt-3 mb-5">
                <h5 class="card-header"><?php echo $title; ?></h5>
                <div class="card-body">
                    <form action="konfigurasi/pengelolaan.php" method="post">
                        <p class="card-text mb-3">
                            <input type="hidden" name="nik" value="<?php echo $nik; ?>">
                            Apakah Anda yakin ingin menghapus biodata a.n. <strong><?php echo $nama; ?></strong> dengan NIK <strong><?php echo $nik; ?></strong> ?
                        </p>
                        <div class="mb-3">
                            <button type="submit" name="submit" value="hapus" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-check"></i> Iya, saya yakin.
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
