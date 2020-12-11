<?php $menu = 'help_guide'; ?>
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
    .border-left-danger {
        border-right: 5px solid red;
    }

    .border-danger {
        border: 5px solid red;
    }
</style>

<div class="main-content">
    <div class="container-fluid">
        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
            <ol class="breadcrumb mb-4" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item no-drop active">Help</li>
                <li class="ml-auto active font-weight-bold">Guide</li>
            </ol>
        <?php } else { ?>
            <ol class="breadcrumb" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="ml-auto active font-weight-bold">Guide</li>
            </ol>
        <?php } ?>
        <div class="row">
            <!-- Jenis Simpanan -->
            <div class="col-md-12">
                <div class="card task-board">
                    <div class="card-header">
                        <h3><strong>Panduan Koperasi</strong></h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle" data-toggle="tooltip" data-placement="top" title="Geser"></i></li>
                                <li><i class="ik ik-minus minimize-card" data-toggle="tooltip" data-placement="top" title="Minimize"></i></li>
                                <?php if($_SESSION['Level']=='Petugas'){?>
                                    <li><a href="help_info.php?Konfigurasi=Panduan"><i class="ik ik-info" data-toggle="tooltip" data-placement="top" title="Information"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $sql_s = mysqli_query($konek, "SELECT * FROM konfigurasi WHERE Jenis_Konfigurasi='Panduan'");
                    while ($k_s  = mysqli_fetch_array($sql_s)) { ?>
                    <div class="card-body">
                        <div class="dd" data-plugin="nestable">
                            <ol class="dd-list">
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle border-left-primary border shadow-sm bg-white">
                                        <h4 class="text-primary"><?= $k_s['Nama_Konfigurasi']; ?></h4>
                                        <h6 class=""><?= $k_s['Isi_Konfigurasi']; ?></h6>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- END Jenis Simpanan -->
        </div>
    </div>

</div>
</div>
</div>



<?php include 'footer.php'; ?>