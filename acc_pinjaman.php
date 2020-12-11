<?php
include "koneksi.php";
if (isset($_GET['act'])) {
    //act
    if ($_GET['act'] == 'acc') {
        $idPinjaman = $_GET['ID_Pinjaman'];
        $sql_p = mysqli_query($konek, "SELECT * FROM pinjaman WHERE ID_Pinjaman='$idPinjaman'");
        $p = mysqli_fetch_array($sql_p);

        $besarAngsuran = $p['Besar_Angsuran'];
        $bunga         = $p['Bunga'];
        $lamaAngsuran  = $p['Lama_Angsuran'];
        $idAnggota     = $p['ID_Anggota'];

        //simpan data angsuran
        $sql_ma = mysqli_query($konek, "SELECT max(ID_Angsuran) as maxa FROM angsuran");
        $ma = mysqli_fetch_array($sql_ma);
        $max_angsur = substr($ma['maxa'], 2, 4);
        $no         = $max_angsur;

        for ($i = 1; $i <= $lamaAngsuran; $i++) {
            $idAngsuran         = $no + $i;
            $max_angsur         = "AS" . sprintf('%04s', $idAngsuran);
            $tempo_bulan        = mktime(0, 0, 0, date('m') + $i, date('d') + 0, date('Y') + 0);
            $tempo              = date('Y-m-d', $tempo_bulan);
            $as_ke              = "AS KE-" . sprintf('%02s', $i);
            $bunga_angsuran     = $besarAngsuran * $bunga;

            $simpan = mysqli_query(
                $konek,
                "INSERT INTO `angsuran` (`ID_Angsuran`, `ID_Pinjaman`, `Angsuran`, `Besar_Angsuran`, `Denda`, `ID_Anggota`, `Tgl_Entri`, `Jatuh_Tempo`, `Status_Angsuran`) 
            VALUES ('$max_angsur', '$idPinjaman', '$as_ke', '$bunga_angsuran', '', '$idAnggota', '', '$tempo', 'Belum Lunas')"
            );
        }

        $update = mysqli_query($konek, "UPDATE pinjaman SET
                                            Status_Pinjaman='Konfirmasi'
                                            WHERE ID_Pinjaman='$idPinjaman'");

        echo "<script>document.location.href = 'pengajuan_pinjaman.php';</script>";
    }

    if ($_GET['act'] == 'batal') {
        $ID_Pinjaman = $_GET['ID_Pinjaman'];
        mysqli_query($konek, "DELETE FROM angsuran WHERE ID_Pinjaman='$ID_Pinjaman'");

        $update = mysqli_query($konek, "UPDATE pinjaman SET
                                            Status_Pinjaman='Menunggu'
                                            WHERE ID_Pinjaman='$ID_Pinjaman'");


        echo "<script>document.location.href = 'pengajuan_pinjaman.php';</script>";
    }
}
