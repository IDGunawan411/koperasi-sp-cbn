<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "UPDATE anggota SET Status_Aktif='Non Aktif' WHERE ID_Anggota='$_GET[ID_Anggota]'");

if ($hapus) {
	header('location:anggota.php?hapus=success');
}
