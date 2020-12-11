<?php
//commit
// get id anggota untuk proses hapus
include "koneksi.php";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'acc') {
        $ID_Penarikan    = $_GET['ID_Penarikan'];
        $ID_Tabungan     = $_GET['ID_Tabungan'];
        $Besar_Penarikan = $_GET['Besar_Penarikan'];

        $qt = mysqli_query($konek, "SELECT * FROM tabungan WHERE ID_Tabungan = '$ID_Tabungan'");
        $dt = mysqli_fetch_array($qt);
        $Total = $dt['Besar_Tabungan'] - $Besar_Penarikan;

        mysqli_query($konek, "UPDATE penarikan SET
        Status_Penarikan='Konfirmasi'
        WHERE ID_Penarikan='$ID_Penarikan'");

        mysqli_query($konek, "UPDATE tabungan SET
        Besar_Tabungan='$Total'
        WHERE ID_Tabungan='$ID_Tabungan'");

        echo "<script>document.location.href = 'pengajuan_penarikan.php';</script>";
    }
    if ($_GET['act'] == 'batal') {
        $ID_Penarikan    = $_GET['ID_Penarikan'];
        $ID_Tabungan     = $_GET['ID_Tabungan'];
        $Besar_Penarikan = $_GET['Besar_Penarikan'];

        $qt = mysqli_query($konek, "SELECT * FROM tabungan WHERE ID_Tabungan = '$ID_Tabungan'");
        $dt = mysqli_fetch_array($qt);
        $Total = $dt['Besar_Tabungan'] + $Besar_Penarikan;
        //  echo "<a>ID Penarikan : $ID_Penarikan <br> 
        //            ID Tabungan : $ID_Tabungan <br> 
        //         Besar Tabungan : $dt[Besar_Tabungan] <br>
        //        Besar Penarikan : $Besar_Penarikan <br>
        //         Total Tabungan : $Total</a>";

        mysqli_query($konek, "UPDATE penarikan SET
        Status_Penarikan='Menunggu'
        WHERE ID_Penarikan='$ID_Penarikan'");

        mysqli_query($konek, "UPDATE tabungan SET
        Besar_Tabungan='$Total'
        WHERE ID_Tabungan='$ID_Tabungan'");

        echo "<script>document.location.href = 'pengajuan_penarikan.php';</script>";
    }
}
