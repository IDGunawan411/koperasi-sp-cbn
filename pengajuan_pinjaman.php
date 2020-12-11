<?php $menu = 'pengajuanPI'; ?>
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
<div class="main-content">
    <div class="container-fluid">

        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Pinjaman</li>
            <li class="ml-auto active font-weight-bold">Pinjaman</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2 bg-dark rounded text-white p-2 text-center">
                            <a>PENGAJUAN PINJAMAN</a>
                        </div>
                        <!-- <a href="tambah_pinjaman.php" class="mb-2 btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a> -->
                        <div class="dt-responsive p-4" style="overflow-y: scroll;">
                            <table id="alt-pg-dt" class="table nowrap table-bordered">
                                <col width="50">
                                <col width="130">
                                <col width="130">
                                <col width="300">
                                <col width="150">
                                <col width="150">
                                <col width="100">
                                <col width="100">
                                <col width="150">
                                <col width="100">
                                <col width="150">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>ID Pinjaman</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Nama Anggota</th>
                                        <th>Jenis Pinjaman</th>
                                        <th>Jumlah Pinjaman</th>
                                        <th>Angsuran</th>
                                        <th>Bunga</th>
                                        <th>Jumlah Angsuran</th>
                                        <th>Status</th>
                                        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    if ($_SESSION['Level'] == 'Petugas') {
                                        $sql = mysqli_query($konek, "SELECT * FROM pinjaman INNER JOIN anggota USING(ID_Anggota)  ORDER BY Status_Pinjaman DESC");
                                    } else {
                                        $sql = mysqli_query($konek, "SELECT * FROM pinjaman INNER JOIN anggota USING(ID_Anggota) WHERE ID_Anggota = '$da[ID_Anggota]' ORDER BY ID_Pinjaman ASC");
                                    }
                                    while ($p = mysqli_fetch_array($sql)) {
                                        $color = "color:" . ($p['Status_Pinjaman'] == 'Konfirmasi' ? 'black' : 'red') . "";
                                    ?>
                                        <tr style="<?= $color; ?>">
                                            <td align="center" style="font-size: 14px;"><?= $i; ?></td>
                                            <td align="center" style="font-size: 14px;"><?= $p["ID_Pinjaman"]; ?></td>
                                            <td align="center" style="font-size: 14px;"><?= $p["Tgl_Entri"]; ?></td>
                                            <td align="center" style="font-size: 14px;"><?= $p["Nama_Anggota"]; ?></td>
                                            <td align="center" style="font-size: 14px;"><?= $p["Nama_Pinjaman"]; ?></td>
                                            <td align="right" style="font-size: 14px;"><?= rupiah($p["Besar_Pinjaman"]); ?></td>
                                            <td align="center" style="font-size: 14px;"><?= $p["Lama_Angsuran"]; ?>x</td>
                                            <td align="right" style="font-size: 14px;"><?= $p["Bunga"]; ?>%</td>
                                            <td align="right" style="font-size: 14px;"><?= rupiah($p["Besar_Angsuran"]); ?></td>
                                            <td align="center" style="font-size: 14px;"><?= $p["Status_Pinjaman"] ?></td>
                                            <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                                <td align="center">
                                                    <?php if ($p['Status_Pinjaman'] == 'Menunggu') { ?>
                                                        <a href="acc_pinjaman.php?act=acc&ID_Pinjaman=<?= $p['ID_Pinjaman']; ?>" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><button class="btn btn-icon btn-outline-primary"><i class='fa fa-check'></i></button></a>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="acc_pinjaman.php?act=batal&ID_Pinjaman=<?= $p['ID_Pinjaman']; ?>" data-toggle="tooltip" data-placement="top" title="Batal">
                                                            <button class="btn btn-icon btn-outline-danger"><i class='fa fa-times'></i></button>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <?php $i++ ?>
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