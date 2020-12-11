<?php $menu = 'pinjaman'; ?>
<?php include 'header.php'; ?>

<?php
//membuat format rupiah dengan PHP
//tutorial www.malasngoding.com

function rupiah($angka)
{
    $hasil_rupiah = "" . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

function rp($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
?>
<style>
    @media (min-width: 992px) {
        .nav {
            font-size: 20px;
        }
    }
</style>
<div class="main-content">
    <div class="container-fluid">
        <!-- <div class="page-header" style="margin-bottom: 20px; color: #fff; background-color: #e74a3b!important; border-color: #e74a3b!important; padding: 10px 15px; border: 2px solid red; border-radius: 10px;">
            <h3>ANGSURAN</h3>
        </div> -->
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="pinjaman.php">Pinjaman</a></li>
            <li class="breadcrumb-item no-drop active">Angsuran</li>
            <li class="ml-auto active font-weight-bold">Angsuran</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php

                        $qa = mysqli_query($konek, "SELECT * FROM angsuran INNER JOIN anggota on anggota.ID_Anggota = angsuran.ID_Anggota INNER JOIN pinjaman ON pinjaman.ID_Pinjaman = angsuran.ID_Pinjaman WHERE pinjaman.ID_Pinjaman='$_GET[ID_Pinjaman]'");
                        $da = mysqli_fetch_array($qa);

                        $ql = mysqli_query($konek, "SELECT SUM(Besar_Angsuran) as Total_Lunas,ID_Pinjaman,anggota.ID_Anggota, anggota.Nama_Anggota FROM angsuran INNER JOIN anggota on anggota.ID_Anggota = angsuran.ID_Anggota WHERE ID_Pinjaman='$_GET[ID_Pinjaman]' AND Status_Angsuran='Lunas'");
                        $dl = mysqli_fetch_array($ql);
                        $total_lunas = $dl['Total_Lunas'];

                        $qbl = mysqli_query($konek, "SELECT SUM(Besar_Angsuran) as Total_Belum_Lunas FROM angsuran WHERE ID_Pinjaman='$_GET[ID_Pinjaman]' AND Status_Angsuran='Belum Lunas'");
                        $dbl = mysqli_fetch_array($qbl);
                        $total_belum_lunas = $dbl['Total_Belum_Lunas'];
                        ?>

                        <div class="nav col-md-0 float-left">
                            <table>

                                <tr>
                                    <td width="150px">Nama Anggota</td>
                                    <td> : <?= $da['Nama_Anggota']; ?></td>
                                </tr>
                                <tr>
                                    <td height="50px">ID Pinjaman</td>
                                    <td> : <?= $da['ID_Pinjaman']; ?></td>
                                </tr>
                                <tr>
                                    <td>ID Anggota</td>
                                    <td> : <?= $da['ID_Anggota']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="nav col-md-0 float-right mb-4">
                            <table border="1">
                                <tr>
                                    <td align="right" width="200px">Bunga Pinjaman</td>
                                    <td align="right" width="250px"><?= $da['Bunga']; ?>%</td>
                                </tr>
                                <tr>
                                    <td align="right">Lama Angsuran</td>
                                    <td align="right"><?= $da['Lama_Angsuran']; ?> Bulan</td>
                                </tr>
                                <tr>
                                    <td align="right">Pokok Pinjaman</td>
                                    <td align="right"><?= rupiah($da['Besar_Pinjaman']); ?></td>
                                </tr>
                                <tr>
                                    <td align="right">Tanggal Pinjaman</td>
                                    <td align="right"><?= $da['Tgl_Entri']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right">Angsuran Perbulan</td>
                                    <td align="right"><?= rupiah($da['Besar_Angsuran']); ?></td>
                                </tr>
                            </table>
                        </div>
                        <br><br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="dt-responsive p-4" style="overflow: scroll;">
                            <table class="table table-bordered" id="alt-pg-dt">
                                <col width="50">
                                <col width="120">
                                <col width="180">
                                <col width="170">
                                <col width="100">
                                <col width="100">
                                <col width="120">
                                <col width="150">
                                <col width="200">
                                <thead>
                                    <tr align="center">
                                        <td>ID Angsuran</td>
                                        <td>Angsuran</td>
                                        <td>Besaran Angsuran</td>
                                        <td>Jatuh Tempo</td>
                                        <td>Konfirmasi</td>
                                        <td>Denda</td>
                                        <td>Telat Denda</td>
                                        <td>Status</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($konek, "SELECT * FROM angsuran INNER JOIN anggota on anggota.ID_Anggota = angsuran.ID_Anggota
                                        WHERE ID_Pinjaman='$_GET[ID_Pinjaman]'");
                                    while ($a = mysqli_fetch_array($sql)) {
                                        if ($a['Telat_Denda'] == null) {
                                            $telatDenda = '';
                                        } else {
                                            $telatDenda = $a['Telat_Denda'] . " Hari";
                                        }

                                        if ($a['Jatuh_Tempo'] == date('Y-m-d') && $a['Status_Angsuran'] == 'Belum Lunas') {
                                            $keterangan = "text-danger";
                                        } elseif ($a['Status_Angsuran'] == 'Belum Lunas') {
                                            $keterangan = "text-danger";
                                        } else {
                                            $keterangan = "text-primary";
                                        }
                                        if($a['Tgl_Entri']==null){
                                            $tgl_konfirmasi = "";
                                        }else{
                                            $tgl_konfirmasi = tgl($a['Tgl_Entri']);
                                        }
                                    ?>
                                        <tr class="<?= $keterangan ?>">
                                            <td align="center"><?= $a['ID_Angsuran'] ?></td>
                                            <td align="center"><?= $a['Angsuran'] ?></td>
                                            <td align="right"><?= rupiah($a['Besar_Angsuran']) ?></td>
                                            <td align="center"><?= tgl($a['Jatuh_Tempo']) ?></td>
                                            <td align="center"><?= $tgl_konfirmasi; ?></td>
                                            <td align="right"><?= $a['Denda'] ?></td>
                                            <td align="center"><? $telatDenda; ?></td>
                                            <td align="center"><?= $a['Status_Angsuran'] ?></td>
                                            <td align="center">
                                                <?php if($a['Status_Angsuran']=='Belum Lunas'){?>
                                                <a href="acc_angsuran.php?act=acc&ID_Angsuran=<?= $a['ID_Angsuran']; ?>&idp=<?= $_GET['ID_Pinjaman']; ?>&Jatuh_Tempo=<?= $a['Jatuh_Tempo']; ?>" data-toggle="tooltip" data-placement="top" title="Konfirmasi">
                                                    <button class="btn btn-icon btn-outline-primary"><i class='fas fa-check'></i></button>
                                                </a>
                                                <?php } else{ ?>
                                                <a href="acc_angsuran.php?act=batal&ID_Angsuran=<?= $a['ID_Angsuran']; ?>&idp=<?= $_GET['ID_Pinjaman']; ?>" data-toggle="tooltip" data-placement="top" title="Batal">
                                                    <button class="btn btn-icon btn-outline-danger"><i class='fas fa-times'></i></button>
                                                </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<?php include 'footer.php'; ?>