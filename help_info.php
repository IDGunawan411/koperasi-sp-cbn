<?php 
if($_GET['Konfigurasi']!=='Simpanan' && $_GET['Konfigurasi']!=='Pinjaman'){
    $help = "help_guide"; 
}else{
    $help = "help_jasa";
}
$menu = "$help"; 
?>
<?php include 'header.php'; ?>
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
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Help</li>
            <li class="ml-auto active font-weight-bold">Informasi <?= $_GET['Konfigurasi']; ?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="help_tambah.php?Konfigurasi=<?= $_GET['Konfigurasi'] ?>" class="btn btn-primary btn-sm" style="margin-bottom: 10px; height: auto" 
                        data-toggle="tooltip" data-placement="top" title="Tambah Data Konfigurasi<?= $_GET['Konfigurasi']; ?>">
                        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                        <div class="dt-responsive p-4" style="overflow: scroll;">
                            <table class=" table table-bordered" id="alt-pg-dt">
                                <thead>
                                    <tr align="center">
                                        <th>Nama Konfigurasi</th>
                                        <th>Isi Konfigurasi</th>
                                        <th>Update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlk = mysqli_query($konek, "SELECT * FROM konfigurasi WHERE Jenis_Konfigurasi LIKE'%$_GET[Konfigurasi]%'");
                                    while ($dk = mysqli_fetch_array($sqlk)) {
                                    ?>
                                        <tr style="<?= $color; ?>">
                                            <td align="center" width="200px"><?= $dk["Nama_Konfigurasi"]; ?></td>
                                            <td align="center"><?= $dk["Isi_Konfigurasi"]; ?></td>
                                            <td align="center" width="100px"><?= tgl($dk["Tanggal_Ubah"]); ?></td>
                                            <td>
                                                <a href="help_edit.php?ID_Konfigurasi=<?= $dk['ID_Konfigurasi']; ?>&Konfigurasi=<?= $_GET['Konfigurasi'] ?>"><i class="h5 ik ik-edit text-primary"></i></a>
                                                <a href="help_hapus.php?ID_Konfigurasi=<?= $dk['ID_Konfigurasi']; ?>&Konfigurasi=<?= $_GET['Konfigurasi'] ?>"><i class="h5 fas fa-times text-danger"></i></a>
                                            </td>
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