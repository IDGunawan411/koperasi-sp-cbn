<?php
// get id anggota untuk proses hapus
include "koneksi.php";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'aktif') {
        $ID_Anggota = $_GET['ID_Anggota'];
        mysqli_query($konek, "UPDATE anggota SET Status_Aktif='Aktif' WHERE ID_Anggota='$ID_Anggota'");

        echo "<script>document.location.href = 'anggota.php';</script>";
    }

    if ($_GET['act'] == 'non_aktif') {
        $ID_Anggota = $_GET['ID_Anggota'];
        mysqli_query($konek, "UPDATE anggota SET Status_Aktif='Non Aktif' WHERE ID_Anggota='$ID_Anggota'");

        echo "<script>document.location.href = 'anggota.php';</script>";
    }
}
