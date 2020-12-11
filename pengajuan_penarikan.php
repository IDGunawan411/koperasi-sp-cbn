<?php $menu = 'pengajuanP'; ?>
<?php include 'header.php'; ?>
<?php
//membuat format rupiah dengan PHP
//tutorial www.malasngoding.com

function rupiah($angka)
{

    $hasil_rupiah = "" . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Pengajuan Penarikan</li>
            <li class="ml-auto active font-weight-bold">Pengajuan Penarikan</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-4" class="dt-responsive p-4">
                            <table class=" table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                <col width="130px">
                                <col width="130px">
                                <col width="350px">
                                <col width="130px">
                                <col width="130px">

                                <thead>
                                    <tr align="center">
                                        <th>ID Penarikan</th>
                                        <th>ID Tabungan</th>
                                        <th>Nama Anggota</th>
                                        <th>Besar Penarikan</th>
                                        <th>Tanggal Penarikan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_SESSION['Level'] == 'Petugas') {
                                        $sql = mysqli_query($konek, "SELECT * FROM penarikan INNER JOIN anggota USING(ID_Tabungan) ORDER BY penarikan.Status_Penarikan DESC");
                                    } else {
                                        $sql = mysqli_query($konek, "SELECT * FROM penarikan INNER JOIN anggota USING(ID_Tabungan) WHERE 
                                        ID_Tabungan = '$da[ID_Tabungan]' ORDER BY ID_Penarikan ASC");
                                    }
                                    while ($ps = mysqli_fetch_array($sql)) {
                                        $color = "color:" . ($ps['Status_Penarikan'] == 'Konfirmasi' ? 'black' : 'red') . "";
                                    ?>
                                        <tr style="<?= $color; ?>">
                                            <td align="center"><?= $ps["ID_Penarikan"]; ?></td>
                                            <td align="center"><?= $ps["ID_Tabungan"]; ?></td>
                                            <td><?= $ps["Nama_Anggota"]; ?></td>
                                            <td align="right"><?= rupiah($ps["Besar_Penarikan"]); ?></td>
                                            <td align="center"><?= $ps["Tgl_Entri"]; ?></td>
                                            <td align="center"><?= $ps["Status_Penarikan"]; ?></td>
                                            <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                                <td align="center">
                                                    <?php if ($ps['Status_Penarikan'] == 'Menunggu') { ?>
                                                        <a href="acc_penarikan.php?act=acc&ID_Penarikan=<?= $ps['ID_Penarikan'] ?>&ID_Tabungan=<?= $ps['ID_Tabungan'] ?>&Besar_Penarikan=<?= $ps['Besar_Penarikan'] ?>" data-toggle="tooltip" data-placement="top" title="Konfirmasi">
                                                            <button class="btn btn-icon btn-outline-primary"><i class='fa fa-check'></i></button></a>
                                                    <?php } else { ?>
                                                        <a href="acc_penarikan.php?act=batal&ID_Penarikan=<?= $ps['ID_Penarikan'] ?>&ID_Tabungan=<?= $ps['ID_Tabungan'] ?>&Besar_Penarikan=<?= $ps['Besar_Penarikan'] ?>" data-toggle="tooltip" data-placement="top" title="Batal">
                                                            <button class="btn btn-icon btn-outline-warning"><i class='fa fa-times'></i></button></a>
                                                    <?php } ?>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
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