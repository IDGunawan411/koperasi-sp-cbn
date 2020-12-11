<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM penarikan WHERE ID_Penarikan='$_GET[ID_Penarikan]'");


header('location:pengajuan_penarikan.php');
