<?php
    error_reporting(0);
    $title = 'Instalasi Aplikasi';
    include '../template/header.php';
    include 'env-variables.php';

    if (file_exists('.crud-native_installed'))
    {
        header('Location: ../index.php');
    }

    $koneksi = mysqli_connect($ALAMAT, $PENGGUNA, $KATASANDI);
?>

<div class="container">
    <div class="row">
        <div class="col-md">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Data Warga</li>
                    <li class="breadcrumb-item">Instalasi</li>
                    <li class="breadcrumb-item active">Cek Spesifikasi</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Cek Spesifikasi</h5>
                <div class="card-body">
                    <form action="pasang.php" method="post">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <font>Versi PHP <i class="bi bi-info-circle-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Optimal: ^7.0.0"></i></font>
                                <?php
                                echo (version_compare(PHP_VERSION, '7.0.0', '>='))
                                    ? '<span class="badge bg-success rounded-pill"><i class="bi bi-check"></i> '. phpversion() .'</span>'
                                    : '<span class="badge bg-danger rounded-pill"><i class="bi bi-x-circle"></i> '. phpversion() .'</span>';
                                ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <font>Layanan MySQL <i class="bi bi-info-circle-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Optimal: Tersambung"></i></font>
                                <?php
                                echo (!$koneksi)
                                    ? '<span class="badge bg-danger rounded-pill" data-bs-toggle="tooltip" data-bs-placement="right" title="Alasan: '. mysqli_connect_error() .'"><i class="bi bi-x-circle"></i> Gagal</span>'
                                    : '<span class="badge bg-success rounded-pill"><i class="bi bi-check"></i> Tersambung</span>';
                                ?>
                            </li>
                        </ul>
                        <div class="mb-3 mt-3">
                        <?php
                        $is_PHPValidation = (version_compare(PHP_VERSION, '7.0.0', '>=')) ? true : false;
                        $is_MySqlConnection = (!mysqli_connect_error()) ? true : false;

                        echo ($is_PHPValidation === true & $is_MySqlConnection === true)
                            ? (file_exists('.crud-native_installed'))
                                ? false
                                : '<button type="submit" class="btn btn-sm btn-outline-primary" name="submit" value="pasang"><i class="bi bi-save"></i> Pasang</button>'
                            : '<a href="pasang.php" class="btn btn-sm btn-dark"><i class="bi bi-arrow-clockwise"></i> Muat Ulang Halaman</a>';
                        ?>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit']))
{
    if ($_POST['submit'] === 'pasang')
    {
        $kueri = 'CREATE DATABASE IF NOT EXISTS ' . $DATABASE;
        $buatDatabase = mysqli_query($koneksi, $kueri);

        $kueri = 'USE ' . $DATABASE;
        $pilihDatabase = mysqli_query($koneksi, $kueri);

        $kueri = "CREATE TABLE `biodata` (
            `nik` INT(20) NOT NULL,
            `nama` VARCHAR(50) NOT NULL,
            `ttl` JSON NULL DEFAULT NULL,
            `kelamin` ENUM('L','P') NULL DEFAULT NULL COMMENT 'tempat dan tanggal lahir',
            `pekerjaan` VARCHAR(25) NULL DEFAULT NULL,
            PRIMARY KEY (`nik`)
        )
        COLLATE='latin1_swedish_ci';";
        $buatTabel = mysqli_query($koneksi, $kueri);

        $kueri = 'SHOW TABLES FROM ' . $DATABASE;
        $cekTabel = mysqli_query($koneksi, $kueri);
        while ($tables = mysqli_fetch_assoc($cekTabel))
        {
            $tabelBiodata = ($tables['Tables_in_' . $DATABASE] === 'biodata') ? true : false;
        }

        echo ($tabelBiodata === true)
            ? fopen('.crud-native_installed', 'w', '.')
            : 'Tabel biodata tidak ditemukan.';

        mysqli_close($koneksi);
        $_SESSION['instalasi'] = true;
    }
}

include '../template/footer.php';
?>
