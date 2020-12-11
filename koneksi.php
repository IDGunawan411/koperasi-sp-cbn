<?php
//variabel koneksi
$konek = mysqli_connect("localhost", "root", "", "koperasi");

if (!$konek) {
	echo "Koneksi Database Gagal...!!!";
}
