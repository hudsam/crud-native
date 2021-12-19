</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        $('.data-warga').DataTable({
            'language': {
                'paginate': {
                    'previous': '<i class="bi bi-arrow-left"></i>',
                    'next': '<i class="bi bi-arrow-right"></i>'
                }
            },
        });

        <?php if (isset($_SESSION['instalasi'])): ?>
        Swal.fire({
            'icon': 'success',
            'title': 'Berhasil !',
            'text': 'Instalasi aplikasi crud-native selesai.',
            'confirmButtonText': 'Yeay !',
        }).then((result) => {
            if (result.isConfirmed)
            {
                window.location = '../index.php';
            }
        });
        <?php endif; unset($_SESSION['instalasi']); ?>

        <?php
            if ($_SESSION['simpan']) { echo $_SESSION['simpan']; } unset($_SESSION['simpan']);
            if ($_SESSION['ubah']) { echo $_SESSION['ubah']; } unset($_SESSION['ubah']);
            if ($_SESSION['hapus']) { echo $_SESSION['hapus']; } unset($_SESSION['hapus']);
        ?>
    });
</script>
</html>
