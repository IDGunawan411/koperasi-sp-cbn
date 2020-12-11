<?php
// get id anggota untuk proses hapus
include "koneksi.php";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'acc') {
        $ID_Angsuran = $_GET['ID_Angsuran'];
        $Konfirmasi  = date('Y-m-d');
        $src_id      = $_GET['idp'];
        $jt          = $_GET['Jatuh_Tempo'];

        if ($Konfirmasi > $jt) {
            $jatuhTempo = '2020-09-07';
            $konfirm = date('Y-m-d');
            $jatuhTempo = new DateTime($jatuhTempo);
            $selesai =  new DateTime($konfirm);
            $selisih = $selesai->diff($jatuhTempo);
            $hari =  $selisih->days;

            $denda = 2000 * $hari;
        } else {
            $denda = "0";
            $hari  = "";
        }

        $update = mysqli_query($konek, "UPDATE angsuran SET
                                            Tgl_Entri='$Konfirmasi',
                                            Denda='$denda',
                                            Telat_Denda = '$hari',
                                            Status_Angsuran='Lunas'
                                            WHERE ID_Angsuran='$ID_Angsuran'");

        echo "<script>document.location.href = 'angsuran.php?ID_Pinjaman=$src_id';</script>";
    }

    if ($_GET['act'] == 'batal') {
        $ID_Angsuran = $_GET['ID_Angsuran'];
        $Konfirmasi  = date('Y-m-d');
        $src_id      = $_GET['idp'];

        $update = mysqli_query($konek, "UPDATE angsuran SET
                                            Tgl_Entri='',
                                            Denda='',
                                            Telat_Denda='',
                                            Status_Angsuran='Belum Lunas'
                                            WHERE ID_Angsuran='$ID_Angsuran'");
        echo "<script>document.location.href = 'angsuran.php?ID_Pinjaman=$src_id';</script>";
    }
}