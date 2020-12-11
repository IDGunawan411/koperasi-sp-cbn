<?php
// get id anggota untuk proses hapus
include "koneksi.php";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'acc_simpanan') {
        $ID_Simpanan    = $_GET['ID_Simpanan'];
        $saldoSimpanan  = $_GET['Saldo_Simpanan'];
        $ID_Tabungan    = $_GET['ID_Tabungan'];
        $update = mysqli_query($konek, "UPDATE simpanan SET Status_Simpanan='Konfirmasi' WHERE ID_Simpanan='$ID_Simpanan'");
        $sql_tb         = mysqli_query($konek, "SELECT * FROM tabungan WHERE ID_Tabungan='$ID_Tabungan'");
        $tb             = mysqli_fetch_array($sql_tb);
        $id_tb          = $tb['ID_Tabungan'];
        $tambah_saldo   = $tb['Besar_Tabungan'] + $saldoSimpanan;
        $update = mysqli_query($konek, "UPDATE tabungan SET Besar_Tabungan='$tambah_saldo' WHERE ID_Tabungan='$id_tb'");

        echo "<script>document.location.href = 'pengajuan_simpanan.php';</script>";
    }

    if ($_GET['act'] == 'batal') {
        $ID_Simpanan    = $_GET['ID_Simpanan'];
        $saldoSimpanan  = $_GET['Saldo_Simpanan'];
        $ID_Tabungan    = $_GET['ID_Tabungan'];
        $update = mysqli_query($konek, "UPDATE simpanan SET Status_Simpanan='Menunggu' WHERE ID_Simpanan='$ID_Simpanan'");
        $sql_tb         = mysqli_query($konek, "SELECT * FROM tabungan WHERE ID_Tabungan='$ID_Tabungan'");
        $tb             = mysqli_fetch_array($sql_tb);
        $id_tb          = $tb['ID_Tabungan'];
        $tambah_saldo   = $tb['Besar_Tabungan'] - $saldoSimpanan;
        $update = mysqli_query($konek, "UPDATE tabungan SET Besar_Tabungan='$tambah_saldo' WHERE ID_Tabungan='$id_tb'");

        echo "<script>document.location.href = 'pengajuan_simpanan.php';</script>";
    }
}
