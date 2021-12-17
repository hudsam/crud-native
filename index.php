<?php

if (!file_exists('konfigurasi/.crud-native_installed'))
{
    header('Location: konfigurasi/pasang.php');
}
else
{
    header('Location: warga.php');
}
