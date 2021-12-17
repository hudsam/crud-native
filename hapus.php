<?php
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
                    <form action="hapus.php" method="post">
                        <p class="card-text mb-3">
                            Apakah Anda yakin ingin menghapus biodata a.n. XYZ dengan NIK 123 ?
                        </p>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-outline-danger">
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
