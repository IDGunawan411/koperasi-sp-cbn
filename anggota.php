<?php $menu = 'data_anggota'; ?>
<?php include 'header.php'; ?>
<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Anggota</li>
            <li class="ml-auto active font-weight-bold">Anggota</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive p-4" style="overflow: scroll;">
                            <table class="table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                <col width="50px">
                                <col width="130px">
                                <col width="300px">
                                <col width="130px">
                                <col width="250px">
                                <col width="150px">
                                <col width="250px">
                                <col width="200px">
                                <col width="150px">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>No Telp</th>
                                        <th>Tanggal Entri</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    $sql = mysqli_query($konek, "SELECT * FROM anggota ORDER BY ID_Anggota ASC");
                                    while ($d = mysqli_fetch_array($sql)) {
                                        if ($d['Status_Aktif'] == 'Aktif') {
                                            $status = "text-black";
                                        } else {
                                            $status = "text-danger";
                                        }
                                    ?>
                                        <tr class="<?= $status; ?>">
                                            <td align="center"><?= $i; ?></td>
                                            <td align="center"><?= $d["Tanggal_Entri"]; ?></td>
                                            <?php if ($d['Status_Aktif'] == 'Aktif') { ?>
                                                <td><a href="history_anggota.php?ID_Tabungan=<?= $d['ID_Tabungan']; ?>&ID_Anggota=<?= $d['ID_Anggota']; ?>" style="color: blue; font-weight:bold" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat Detail <?= $d['Nama_Anggota']; ?>"><?= $d["Nama_Anggota"]; ?></a></td>
                                            <?php } else { ?>
                                                <td><a href="history_anggota.php?ID_Tabungan=<?= $d['ID_Tabungan']; ?>&ID_Anggota=<?= $d['ID_Anggota']; ?>" style="color: red; font-weight:bold" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat Detail"><?= $d["Nama_Anggota"]; ?></a></td>
                                            <?php } ?>
                                            <td align="center"><?= $d["Jenis_Kelamin"]; ?></td>
                                            <td align="left"><?= $d["Tempat_Lahir"]; ?>, <?= $d["Tanggal_Lahir"]; ?></td>
                                            <td align="center"><?= $d["No_Telp"]; ?></td>
                                            <td align="center"><?= $d["Tanggal_Entri"]; ?></td>
                                            <td align="center"><?= $d["Alamat"]; ?></td>
                                            <td align="center">
                                                <a href="edit_anggota.php?ID_Anggota=<?= $d['ID_Anggota'] ?>" title="Edit"><button class="btn btn-icon btn-outline-primary"><i class='fas fa-edit'></i></button></a> |
                                                <?php if ($d['Status_Aktif'] == 'Aktif') { ?>
                                                    <a href="status_anggota.php?act=non_aktif&ID_Anggota=<?= $d['ID_Anggota'] ?>"><button class="btn btn-icon btn-outline-danger"><i class='fas fa-trash'></i></button></a>
                                                <?php } else { ?>
                                                    <a href="status_anggota.php?act=aktif&ID_Anggota=<?= $d['ID_Anggota'] ?>"><button class="btn btn-icon btn-outline-success"><i class='fas fa-check'></i></button></a>
                                                <?php } ?>
                                            </td>
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