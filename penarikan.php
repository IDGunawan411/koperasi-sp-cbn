<?php $menu = 'penarikan'; ?>
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

<script>
    function showSuccessToast() {
        'use strict';
        resetToastPosition();
        toastr.success({
            heading: 'Success',
            text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
            showHideTransition: 'slide',
            icon: 'success',
            loaderBg: '#f96868',
            position: 'top-right'
        })
    };
</script>
<div class="main-content">
    <div class="container-fluid">
        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
            <ol class="breadcrumb mb-4" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item no-drop active">Penarikan</li>
                <li class="ml-auto active font-weight-bold">Penarikan</li>
            </ol>
        <?php } else { ?>
            <ol class="breadcrumb" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="ml-auto active font-weight-bold">Penarikan</li>
            </ol>
        <?php } ?>
        <div class="row">
            <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="tambah_penarikan.php" class="btn btn-primary btn-sm" style="margin-bottom: 10px; height: auto" data-toggle="tooltip" data-placement="top" title="Tambah Data Penarikan"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                            <div class="dt-responsive p-4" style="overflow: scroll;">
                                <table class=" table table-bordered display nowrap" id="alt-pg-dt" style="font-size: 16px;">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($konek, "SELECT * FROM penarikan INNER JOIN anggota USING(ID_Tabungan) WHERE Status_Penarikan='Konfirmasi'");
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
            <?php } else { ?>
                <div class="col-md-12">
                    <a href="tambah_penarikan.php" data-toggle="tooltip" data-placement="top" title="Tambah Pengajuan Penarikan">
                        <button class="mb-10 btn btn-sm ik ik-plus bg-primary text-white"></button></a>

                    <?php
                    $sql = mysqli_query($konek, "SELECT * FROM penarikan INNER JOIN anggota USING(ID_Tabungan) WHERE ID_Tabungan = '$da[ID_Tabungan]' ORDER BY ID_Penarikan DESC");
                    while ($ps = mysqli_fetch_array($sql)) {
                        $color = ($ps['Status_Penarikan'] == 'Konfirmasi' ? 'text-success' : 'text-danger');
                    ?>
                        <div class="widget border shadow-sm" style="margin-bottom:2px">
                            <div class="widget-header bg-purple text-white">
                                <h3 class="widget-title h5 font-weight-bold">- <?= $ps['ID_Penarikan'] ?> -</h3>
                                <div class="widget-tools pull-right">
                                    <!-- Modal Info Penarikan -->
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Info"><button class="btn btn-sm btn-widget-tool ik ik-info text-white" data-toggle="modal" data-target="#exampleModal<?= $ps['ID_Penarikan'] ?>"></button></a>
                                    <button type="button" class="btn btn-sm btn-widget-tool minimize-widget text-white ik ik-minus" data-toggle="tooltip" data-placement="top" title="Minimize"></button>
                                </div>
                            </div>
                            <div class="widget-body" style="padding: 0px 10px;">
                                <table class="table">
                                    <tr>
                                        <td><i class="fas fa-clipboard-list text-primary"></i></td>
                                        <td>Tanggal Penarikan</td>
                                        <td><?= $ps['Tgl_Entri']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-clipboard-check text-success"></i></td>
                                        <td>Besar Penarikan</td>
                                        <td><?= rp($ps['Besar_Penarikan']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="ik ik-info text-info"></i></td>
                                        <td>Status Penarikan</td>
                                        <td class="<?= $color; ?>"><?= $ps['Status_Penarikan']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $ps['ID_Penarikan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">INFORMASI PENARIKAN</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php
                                    $id = $ps['ID_Penarikan'];
                                    $gid = mysqli_query($konek, "SELECT * FROM penarikan WHERE ID_Penarikan='$id'");
                                    $g = mysqli_fetch_array($gid);
                                    ?>
                                    <div class="modal-body">
                                        <div class="row invoice-info">
                                            <div class="col-sm-12 invoice-col">
                                                <address>
                                                    <strong>ID Penarikan</strong><br>
                                                    <p class="text-danger h5"><?= $ps['ID_Penarikan']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>ID Tabungan</strong><br>
                                                    <p class="text-danger h5"><?= $ps['ID_Tabungan']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Besar Penarikan</strong><br>
                                                    <p class="text-danger h5"><?= rp($ps['Besar_Penarikan']); ?></p>
                                                </address>
                                                <address>
                                                    <strong>Tanggal Entri</strong><br>
                                                    <p class="text-danger h5"><?= $ps['Tgl_Entri']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Status Penarikan</strong><br>
                                                    <p class="text-danger h5"><?= $ps['Status_Penarikan']; ?></p>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>