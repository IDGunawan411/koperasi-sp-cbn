<?php $menu = 'pengajuanS'; ?>
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
            <li class="breadcrumb-item no-drop active">Simpanan Sukarela</li>
            <li class="ml-auto active font-weight-bold">Simpanan Sukarela</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-4" style="overflow-x: auto;">
                            <table class=" table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                <col width="50px">
                                <col width="150px">
                                <col width="150px">
                                <col width="200px">
                                <col width="150px">
                                <col width="350px">
                                <col width="150px">
                                <col width="0">
                                <col width="150px">
                                <col width="120px">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>ID Simpanan</th>
                                        <th>ID Tabungan</th>
                                        <th>Jenis Simpanan</th>
                                        <th>Nama Anggota</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Saldo Simpanan</th>
                                        <th>Status</th>
                                        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php
                                    if ($_SESSION['Level'] == 'Petugas') {
                                        if (isset($nama)) {
                                            $sql = mysqli_query($konek, "SELECT * FROM simpanan INNER JOIN anggota USING(ID_Tabungan) ORDER BY Status_Simpanan DESC");

                                            $sql_simpanan    = mysqli_query($konek, "SELECT SUM(Saldo_Simpanan) as simpan from simpanan 
                                                            INNER JOIN anggota on anggota.ID_Anggota = simpanan.ID_Anggota WHERE Nama_Anggota LIKE'%$nama%'");
                                            $simpanan        = mysqli_fetch_array($sql_simpanan);
                                            $total_simpanan  = $simpanan['simpan'];
                                        } else {
                                            $sql = mysqli_query($konek, "SELECT * FROM simpanan INNER JOIN anggota USING(ID_Tabungan) ORDER BY Status_Simpanan DESC");

                                            // $sql_simpanan    = mysqli_query($konek, "SELECT SUM(Saldo_Simpanan) as simpan from simpanan 
                                            //                 INNER JOIN anggota on anggota.ID_Tabungan = simpanan.ID_Tabungan");
                                            // $simpanan        = mysqli_fetch_array($sql_simpanan);
                                            // $total_simpanan  = $simpanan['simpan'];
                                        }
                                    } else {
                                        $sql = mysqli_query($konek, "SELECT * FROM simpanan INNER JOIN anggota USING(ID_Tabungan) WHERE Status_Simpanan = 'Menunggu' AND Jenis_Simpanan='Simpanan Sukarela' AND ID_Tabungan = '$da[ID_Tabungan]' ORDER BY ID_Simpanan ASC");
                                    }
                                    while ($s = mysqli_fetch_array($sql)) {
                                        $color = "color:" . ($s['Status_Simpanan'] == 'Konfirmasi' ? 'black' : 'red') . "";
                                    ?>
                                        <tr style="<?= $color; ?>">
                                            <td align="center"><?= $i++; ?></td>
                                            <td align="center"><?= $s["ID_Simpanan"]; ?></td>
                                            <td align="center"><?= $s["ID_Tabungan"]; ?></td>
                                            <td align="center"><?= $s["Jenis_Simpanan"]; ?></td>
                                            <td width="200px"><?= $s["Nama_Anggota"]; ?></td>
                                            <td align="center"><?= $s["Tanggal_Transaksi"]; ?></td>
                                            <td align="right"><?= rupiah($s["Saldo_Simpanan"]); ?></td>
                                            <td align="right"><?= $s["Status_Simpanan"]; ?></td>
                                            <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                                <td align="center">
                                                    <?php if ($s['Status_Simpanan'] == 'Menunggu') { ?>
                                                        <a href="#" type="button" class="btn-sm" data-toggle="modal" data-target="#myModal1<?= $s['ID_Simpanan']; ?>"><button class="btn btn-icon btn-outline-success"><i class='fa fa-image'></i></button></a>
                                                
                                                        <div class="modal fade" id="myModal1<?= $s['ID_Simpanan']; ?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Bukti Pembayaran </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php
                                                                        $id = $s['ID_Simpanan'];
                                                                        $gid=mysqli_query($konek, "SELECT * FROM simpanan WHERE ID_Simpanan='$id'");
                                                                        $g=mysqli_fetch_array($gid);
                                                                        ?>
                                                                        <img id="myImg" src="img/<?= $g['gambar'] ?>" alt="picture" width="100%">,

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="acc_simpanan.php?act=acc_simpanan&ID_Simpanan=<?= $s['ID_Simpanan'] ?>&Saldo_Simpanan=<?= $s['Saldo_Simpanan'] ?>&ID_Tabungan=<?= $s['ID_Tabungan'] ?>" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><button class="btn btn-icon btn-outline-primary"><i class='fa fa-check'></i></button></a> |
                                                        <a href="hapus_simpanan.php?ID_Simpanan=<?= $s['ID_Simpanan'] ?>&gambar=<?= $s['gambar']; ?>" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn-del"><button class="btn btn-icon btn-outline-danger"><i class='fa fa-trash'></i></button></a>
                                                    <?php } else { ?>
                                                        <a href="acc_simpanan.php?act=batal&ID_Simpanan=<?= $s['ID_Simpanan'] ?>&Saldo_Simpanan=<?= $s['Saldo_Simpanan']; ?>&ID_Tabungan=<?= $s['ID_Tabungan']; ?>" data-toggle="tooltip" data-placement="top" title="Batal"><button class="btn btn-icon btn-outline-warning"><i class='fa fa-times-circle'></i></button></a>
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
                        <div class='border'>
                            <!-- <?php
                                    $sql_total  = mysqli_query($konek, "SELECT SUM(Saldo_Simpanan) as Total_Sukarela from simpanan WHERE Jenis_Simpanan='Simpanan Sukarela'");
                                    $total_sk   = mysqli_fetch_array($sql_total);
                                    $sk         = $total_sk['Total_Sukarela'];
                                    ?>
                            <p class="p-2">Total Simpanan Sukarela : <?= rp($total_simpanan); ?></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    // Gambar
    $(document).ready(function() {
        $(document).on('click', '#view', function() {
            var gambar = $(this).data('gambar');
            console.log(gambar);
            $('#gambar').attr('src', 'img/' + gambar);
            $('#view').text(view);
        })
    })
</script>