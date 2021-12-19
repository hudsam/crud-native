<?php

session_start();
include 'koneksi.php';

if (isset($_POST['submit']))
{
    if ($_POST['submit'] === 'simpan')
    {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $ttl = array(
            'tanggal' => $_POST['tanggal'],
            'tempat' => $_POST['tempat'],
        );
        $ttl = json_encode($ttl);
        $kelamin = $_POST['kelamin'];
        $pekerjaan = $_POST['pekerjaan'];

        $sql = "SELECT COUNT(`biodata`.`nik`) AS `nik` FROM `biodata` WHERE `biodata`.`nik` = '$nik'";
        $kueri = mysqli_query($mysqli, $sql);

        while($data = mysqli_fetch_assoc($kueri))
        {
            $jumlah = $data['nik'];
        }

        if ($jumlah === '0')
        {
            $sql = "INSERT INTO `biodata`(`nik`, `nama`, `ttl`, `kelamin`, `pekerjaan`) VALUES ('$nik', '$nama', '$ttl', '$kelamin', '$pekerjaan')";
            $kueri = mysqli_query($mysqli, $sql);
            if ($kueri)
            {
                $_SESSION['simpan'] = "Swal.fire({'icon': 'success', 'title': 'Berhasil !', 'text': 'NIK $nik sudah ditambah.'});";
            }
        }
        else
        {
            $_SESSION['simpan'] = "Swal.fire({'icon': 'error', 'title': 'Gagal !', 'text': 'NIK $nik sudah ada.'});";
        }

        $mysqli->close();
        header('Location: ../warga.php');
    }
    else
    {
    }
}
else
{
	header('Location: ../index.php');
}