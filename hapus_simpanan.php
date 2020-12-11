<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM simpanan WHERE ID_Simpanan='$_GET[ID_Simpanan]'");

header('location:pengajuan_simpanan.php');
