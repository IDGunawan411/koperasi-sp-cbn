<?php $menu = 'tabungan'; ?>
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
            <li class="breadcrumb-item no-drop active">Tabungan</li>
            <li class="ml-auto active font-weight-bold">Tabungan</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-4" style="overflow: scroll;">
                            <table class="table table-bordered display nowrap" id="alt-pg-dt" style="font-size: 16px;">
                                <col width="50px">
                                <col width="130px">
                                <col width="130px">
                                <col width="350px">
                                <col width="130px">
                                <col width="130px">
                                <col width="150px">

                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>ID Tabungan</th>
                                        <th>ID Anggota</th>
                                        <th>Nama Anggota</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Simpanan Pokok</th>
                                        <th>Saldo Tabungan</th>

                                    </tr>
                                </thead>
                                <tbody style="font-size: 13px;">
                                    <?php $i = 1; ?>
                                    <?php
                                    if (isset($nama)) {
                                        $query           = "SELECT * FROM tabungan INNER JOIN anggota on anggota.ID_Anggota = tabungan.ID_Anggota WHERE ID_Anggota ";

                                        $sql_pokok       = mysqli_query($konek, "SELECT SUM(Simpanan_Pokok) as pokok FROM anggota WHERE ID_Anggota ");
                                        $total_pk        = mysqli_fetch_array($sql_pokok);
                                        $total_pokok     = $total_pk['pokok'];

                                        $sql_total       = mysqli_query($konek, "SELECT SUM(Besar_Tabungan) as tabungan from tabungan 
                                                            INNER JOIN anggota on anggota.ID_Anggota = tabungan.ID_Anggota WHERE ID_Anggota ");
                                        $total_tb        = mysqli_fetch_array($sql_total);
                                        $total_tabungan  = $total_tb['tabungan'];

                                        $sql_penarikan   = mysqli_query($konek, "SELECT SUM(Besar_Penarikan) as penarikan from penarikan 
                                                            INNER JOIN anggota on anggota.ID_Tabungan = penarikan.ID_Tabungan WHERE ID_Anggota ");
                                        $penarikan       = mysqli_fetch_array($sql_penarikan);
                                        $total_penarikan = $penarikan['penarikan'];

                                        $sql_simpanan    = mysqli_query($konek, "SELECT SUM(Saldo_Simpanan) as simpan from simpanan 
                                                            INNER JOIN anggota on anggota.ID_Anggota = simpanan.ID_Anggota WHERE ID_Anggota ");
                                        $simpanan        = mysqli_fetch_array($sql_simpanan);
                                        $total_simpanan  = $simpanan['simpan'];
                                    } else {
                                        $query           = "SELECT * FROM tabungan INNER JOIN anggota on anggota.ID_Anggota = tabungan.ID_Anggota ORDER BY tabungan.ID_Tabungan ASC";

                                        $sql_pokok       = mysqli_query($konek, "SELECT SUM(Simpanan_Pokok) as pokok FROM anggota");
                                        $total_pk        = mysqli_fetch_array($sql_pokok);
                                        $total_pokok     = $total_pk['pokok'];

                                        $sql_total       = mysqli_query($konek, "SELECT SUM(Besar_Tabungan) as tabungan from tabungan 
                                                            INNER JOIN anggota on anggota.ID_Anggota = tabungan.ID_Anggota");
                                        $total_tb        = mysqli_fetch_array($sql_total);
                                        $total_tabungan  = $total_tb['tabungan'];

                                        $sql_penarikan   = mysqli_query($konek, "SELECT SUM(Besar_Penarikan) as penarikan from penarikan 
                                                            INNER JOIN anggota on anggota.ID_Tabungan = penarikan.ID_Tabungan");
                                        $penarikan       = mysqli_fetch_array($sql_penarikan);
                                        $total_penarikan = $penarikan['penarikan'];

                                        $sql_simpanan    = mysqli_query($konek, "SELECT SUM(Saldo_Simpanan) as simpan from simpanan 
                                                            INNER JOIN anggota on anggota.ID_Tabungan = simpanan.ID_Tabungan");
                                        $simpanan        = mysqli_fetch_array($sql_simpanan);
                                        $total_simpanan  = $simpanan['simpan'];
                                    }

                                    $sql = mysqli_query($konek, "$query");
                                    while ($tb = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $i; ?></td>
                                            <td align="center"><?= $tb["ID_Tabungan"]; ?></td>
                                            <td align="center"><?= $tb["ID_Anggota"]; ?></td>
                                            <td><a href="history_anggota.php?ID_Tabungan=<?= $tb['ID_Tabungan']; ?>&ID_Anggota=<?= $tb['ID_Anggota']; ?>" style="color: blue;" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat Detail <?= $tb["Nama_Anggota"]; ?>"><?= $tb["Nama_Anggota"]; ?></a></td>
                                            <td align="center"><?= $tb["Tgl_Mulai"]; ?></td>
                                            <td align="right"><?= rupiah($tb["Simpanan_Pokok"]); ?></td>
                                            <td align="right"><?= rupiah($tb["Besar_Tabungan"]); ?></td>
                                            <!-- <td  align="center">
                                                <a class="btn btn-warning btn-sm" href="edit_anggota.php?ID_Anggota=<?= $tb['ID_Anggota'] ?>"><i class='fas fa-edit'></i> EDIT</a> |
                                                <a class="btn btn-danger btn-sm" href="hapus_anggota.php?ID_Anggota=<?= $tb['ID_Anggota'] ?>"><i class='fas fa-trash'></i> HAPUS</a>
                                            </td> -->
                                        </tr>

                                        <?php $i++ ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot style="color: #879099; font-size: 14px">
                                    <tr style="border-style: solid;">
                                        <td colspan="5" align="center"><b>Total Tabungan</b></td>
                                        <td align="right"><b><?php if (isset($total_pokok)) {
                                                                    echo rp($total_pokok);
                                                                } ?></b></td>
                                        <td align="right"><b><?php if (isset($total_tabungan)) {
                                                                    echo rp($total_tabungan);
                                                                } ?></b></td>
                                    </tr>

                                </tfoot>

                            </table>
                            <table>

                            </table>
                        </div>
                        <div class='border'>
                            <p class="p-2">Total Simpanan : <?php if (isset($total_simpanan)) {
                                                                echo rp($total_simpanan + $total_pokok);
                                                            } ?></p>
                            <p class="p-2">Total Penarikan : <?php if (isset($total_penarikan)) {
                                                                    echo rp($total_penarikan);
                                                                } ?></p>
                            <hr>
                            <p class="p-2 text-danger">Total Tabungan : <?php if (isset($total_tabungan)) {
                                                                            echo rp($total_tabungan);
                                                                        } ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>



<?php include 'footer.php'; ?>