<?php

session_start();
include 'koneksi.php';

if (isset($_POST['submit']))
{
    if ($_POST['submit'] === 'tambah')
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
    elseif ($_POST['submit'] === 'ubah')
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

        $pesan = mysqli_connect_error();

        $sql = "UPDATE `biodata` SET `nama` = '$nama', `ttl` = '$ttl', `kelamin` = '$kelamin', `pekerjaan` = '$pekerjaan' WHERE `nik` = '$nik'";
        $kueri = mysqli_query($mysqli, $sql);
        if ($kueri)
        {
        	$_SESSION['ubah'] = "Swal.fire({'icon': 'success', 'title': 'Berhasil !', 'text': 'Pembaruan data dari NIK $nik sudah selesai.'});";
        }
        else
        {
        	$_SESSION['ubah'] = "Swal.fire({'icon': 'error', 'title': 'Gagal !', 'text': 'Penyebab: $pesan.'});";
        }

        $mysqli->close();
        header('Location: ../ubah.php?nik=' . $nik);
    }
    elseif ($_POST['submit'] === 'hapus')
    {
    	$nik = $_POST['nik'];

    	$pesan = mysqli_connect_error();

    	$sql = "SELECT `nik` FROM `biodata` WHERE `nik` = '$nik'";
    	$kueri = mysqli_query($mysqli, $sql);

    	if (mysqli_num_rows($kueri) === 1)
    	{
    		$sql = "DELETE FROM `biodata` WHERE `nik` = '$nik'";
    		$kueri = mysqli_query($mysqli, $sql);

    		if ($kueri)
    		{
    			$_SESSION['hapus'] = "Swal.fire({'icon': 'success', 'title': 'Berhasil !', 'text': 'Data dengan NIK $nik sudah dihapus.'});";
    		}
    		else
    		{
    			$_SESSION['hapus'] = "Swal.fire({'icon': 'error', 'title': 'Gagal !', 'text': 'Penyebab: $pesan.'});";
    		}

    		header('Location: ../warga.php');
    	}
    	else
    	{
    		header('Location: ../warga.php');
    	}

    	$mysqli->close();
    }
    else
    {
    	header('Location: ../warga.php');
    }
}
else
{
	header('Location: ../index.php');
}