<?php $menu = 'help_jasa'; ?>
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
                <li class="ml-auto active font-weight-bold">Jasa</li>
            </ol>
        <?php } else { ?>
            <ol class="breadcrumb" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="ml-auto active font-weight-bold">Jasa</li>
            </ol>
        <?php } ?>
        <div class="row">
            <!-- Jenis Simpanan -->
            <div class="col-md-12">
                <div class="card task-board">
                    <div class="card-header">
                        <h3><strong>Simpanan</strong></h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle" data-toggle="tooltip" data-placement="top" title="Geser"></i></li>
                                <li><i class="ik ik-minus minimize-card" data-toggle="tooltip" data-placement="top" title="Minimize"></i></li>
                                <?php if($_SESSION['Level']=='Petugas'){?>
                                    <li><a href="help_info.php?Konfigurasi=Simpanan"><i class="ik ik-info" data-toggle="tooltip" data-placement="top" title="Information"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $sql_s = mysqli_query($konek, "SELECT * FROM konfigurasi WHERE Jenis_Konfigurasi='Simpanan'");
                    while ($k_s  = mysqli_fetch_array($sql_s)) { ?>
                        <div class="card-body todo-task">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">
                                            <h4 class="text-red"><?= $k_s['Nama_Konfigurasi']; ?></h4>
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

            <!-- Jenis Pinjaman -->
            <div class="col-md-12">
                <div class="card task-board">
                    <div class="card-header">
                        <h3><strong>Pinjaman</strong></h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle" data-toggle="tooltip" data-placement="top" title="Geser"></i></li>
                                <li><i class="ik ik-minus minimize-card" data-toggle="tooltip" data-placement="top" title="Minimize"></i></li>
                                <?php if($_SESSION['Level']=='Petugas'){?>
                                    <li><a href="help_info.php?Konfigurasi=Pinjaman"><i class="ik ik-info" data-toggle="tooltip" data-placement="top" title="Information"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $sql_s = mysqli_query($konek, "SELECT * FROM konfigurasi WHERE Jenis_Konfigurasi='Pinjaman'");
                    while ($k_p  = mysqli_fetch_array($sql_s)) { ?>
                        <div class="card-body todo-task">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">
                                            <h4 class="text-red"><?= $k_p['Nama_Konfigurasi']; ?></h4>
                                            <h6><?= $k_p['Isi_Konfigurasi']; ?></h6>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- END Jenis Pinjaman -->

            <div class="col-md-12">
                <div class="card task-board">
                    <div class="card-header">
                        <h3><strong>Jasa yang berlaku</strong></h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle" data-toggle="tooltip" data-placement="top" title="Geser"></i></li>
                                <li><i class="ik ik-minus minimize-card" data-toggle="tooltip" data-placement="top" title="Minimize"></i></li>
                                <li><i class="ik ik-x close-card" data-toggle="tooltip" data-placement="top" title="Close"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body todo-task">
                        <div class="dd" data-plugin="nestable">
                            <ol class="dd-list">
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle h5">
                                        <span><strong>A. Pinjaman dibawah Tabungan</strong></span> <br>
                                        <span style="margin-left: 25px">Efektif / Menurun
                                            <span style="margin-left: 90px">: 1,48 - 1,58%</span>
                                        </span><br><br>
                                        <span><strong>B. Pinjaman diatas Tabungan</strong></span> <br>
                                        <span style="margin-left: 25px">Efektif / Menurun
                                            <span style="margin-left: 90px">: 1,8 - 2,25%</span>
                                        </span><br>
                                        <span style="margin-left: 25px">Flat
                                            <span style="margin-left: 209px">: 0,7 - 1,27%</span>
                                        </span>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($_SESSION['Level']=='Petugas'){?>
                <div class="col-md-12">
                    <div class="card task-board">
                        <div class="card-header">
                            <h3><strong>Konfigurasi Simpanan</strong></h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle" data-toggle="tooltip" data-placement="top" title="Geser"></i></li>
                                    <li><i class="ik ik-minus minimize-card" data-toggle="tooltip" data-placement="top" title="Minimize"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body todo-task">
                            <div class="dd" data-plugin="nestable">
                                <div class="dd-handle h5">
                                    <div class="dt-responsive p-4">
                                            <a href="tambah_jenis_simpanan.php" class="mb-2 btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Simpanan</a>

                                        <table class="table table-bordered display nowrap fixed" style="font-size: 16px;">

                                            <col width="130px">
                                            <col width="150px">
                                            <col width="130px">
                                            <col width="150px">
                                            <thead>
                                                <tr align="center">
                                                    <th>ID Jenis Simpanan</th>
                                                    <th>Nama Simpanan</th>
                                                    <th>Besar Simpanan</th>
                                                    <th>Tanggal Entri</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($konek, "SELECT * FROM jenis_simpanan ORDER BY ID_Jenis_Simpanan ASC");
                                                while ($s = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td align="center"><?= $s["ID_Jenis_Simpanan"]; ?></td>
                                                        <td align="center"><?= $s["Nama_Simpanan"]; ?></td>
                                                        <td align="right"><?= rupiah($s["Besar_Simpanan"]); ?></td>
                                                        <td align="center"><?= $s["Tgl_Entri"]; ?></td>
                                                        <td width="100px">
                                                            <a href="edit_js_simpanan.php?ID_Jenis_Simpanan=<?= $s['ID_Jenis_Simpanan']; ?>"><i class="h5 ik ik-edit text-primary"></i></a>
                                                            <?php if($s['Nama_Simpanan']!=='Simpanan Pokok' && $s['Nama_Simpanan']!=='Simpanan Wajib'){ ?>
                                                                <a href="hapus_jenis_Simpanan.php?ID_Jenis_Simpanan=<?= $s['ID_Jenis_Simpanan']; ?>"><i class="h5 fas fa-times text-danger"></i></a>
                                                            <?php } ?>
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

                <div class="col-md-12">
                    <div class="card task-board">
                        <div class="card-header">
                            <h3><strong>Konfigurasi Jenis Pinjaman</strong></h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle" data-toggle="tooltip" data-placement="top" title="Geser"></i></li>
                                    <li><i class="ik ik-minus minimize-card" data-toggle="tooltip" data-placement="top" title="Minimize"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body todo-task">
                            <div class="dd" data-plugin="nestable">
                                <div class="dd-handle h5">
                                    <div class="dt-responsive p-4">
                                        <a href="tambah_jenis_pinjaman.php" class="mb-2 btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pinjaman</a>

                                        <table class="table table-bordered display nowrap fixed" style="font-size: 16px;">
                                            <col width="130px">
                                            <col width="150px">
                                            <col width="130px">
                                            <col width="150px">
                                            <thead>
                                                <tr align="center">
                                                    <th>ID Jenis Pinjaman</th>
                                                    <th>Nama Pinjaman</th>
                                                    <th>Max Pinjaman</th>
                                                    <th>Bunga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($konek, "SELECT * FROM jenis_pinjaman ORDER BY ID_Jenis_Pinjaman ASC");
                                                while ($p = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td align="center"><?= $p["ID_Jenis_Pinjaman"]; ?></td>
                                                        <td align="center"><?= $p["Nama_Pinjaman"]; ?></td>
                                                        <td width="200px" align="right"><?= rupiah($p["Max_Pinjaman"]); ?></td>
                                                        <td align="center"><?= $p["Bunga"]; ?>%</td>
                                                        <td width="100px">
                                                            <a href="edit_js_pinjaman.php?ID_Jenis_Pinjaman=<?= $p['ID_Jenis_Pinjaman']; ?>"><i class="h5 ik ik-edit text-primary"></i></a>
                                                            <a href="hapus_js_pinjaman.php?ID_Jenis_Pinjaman=<?= $p['ID_Jenis_Pinjaman']; ?>"><i class="h5 fas fa-times text-danger"></i></a>
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
            <?php } ?>
        </div>
    </div>

</div>
</div>
</div>



<?php include 'footer.php'; ?>