<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$config = $_GET['Konfigurasi'];
$hapus = mysqli_query($konek, "DELETE FROM konfigurasi WHERE ID_Konfigurasi='$_GET[ID_Konfigurasi]'");

if ($hapus) {
	header("location:help_info.php?Konfigurasi=$config");
}
