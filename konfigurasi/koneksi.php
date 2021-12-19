<?php

include 'env-variables.php';

$mysqli = mysqli_connect($ALAMAT, $PENGGUNA, $KATASANDI, $DATABASE);
if (!$mysqli)
{
	die('Failed ! ' . mysqli_connect_error());
}
