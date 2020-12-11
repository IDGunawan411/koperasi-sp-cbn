<?php $menu = 'data_anggota'; ?>
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
            <li class="breadcrumb-item no-drop active">Anggota</li>
            <li class="ml-auto active font-weight-bold">Anggota</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $a = mysqli_query($konek, "SELECT * FROM anggota WHERE ID_Anggota = '$_GET[ID_Anggota]'");
                        $da = mysqli_fetch_array($a);
                        ?>

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong class=>ID Anggota</strong><br>
                                    <p class="text-danger h5"><?= $da['ID_Anggota']; ?></p>
                                </address>
                                <address>
                                    <strong class=>ID Tabungan</strong><br>
                                    <p class="text-danger h5"><?= $da['ID_Tabungan']; ?></p>
                                </address>
                                <address>
                                    <strong class=>Nama Anggota</strong><br>
                                    <p class="text-danger h5"><?= $da['Nama_Anggota']; ?></p>
                                </address>
                                <address>
                                    <strong class=>Tempat, Tanggal lahir</strong><br>
                                    <p class="text-danger h5"><?= $da['Tempat_Lahir'] . ", " . $da['Tanggal_Lahir']; ?></p>
                                </address>
                                <address>
                                    <strong class=>Alamat</strong><br>
                                    <p class="text-danger h5"><?= $da['Alamat']; ?></p>
                                </address>

                            </div>
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong class=>Jenis Kelamin</strong><br>
                                    <p class="text-danger h5"><?= $da['Jenis_Kelamin']; ?></p>
                                </address>
                                <address>
                                    <strong class=>Pendidikan Terakhir</strong><br>
                                    <p class="text-danger h5"><?= $da['Pendidikan_Terakhir']; ?></p>
                                </address>
                                <address>
                                    <strong class=>Status</strong><br>
                                    <p class="text-danger h5"><?= $da['Status_Perkawinan']; ?></p>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong class=>No.KTP</strong><br>
                                    <p class="text-danger h5"><?= $da['No_KTP']; ?></p>
                                </address>
                                <address>
                                    <strong class=>No.KK</strong><br>
                                    <p class="text-danger h5"><?= $da['No_KK']; ?></p>
                                </address>
                                <address>
                                    <strong class=>No.Telp</strong><br>
                                    <p class="text-danger h5"><?= $da['No_Telp']; ?></p>
                                </address>
                                <address>
                                    <strong class=>No Rekening</strong><br>
                                    <p class="text-danger h5"><?= $da['No_Rek']; ?></p>
                                </address>
                            </div>
                        </div>

                        <hr style=" border: 0; height: 5px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), black, red, black, rgba(0, 0, 0, 0));">
                        <br>
                        <div style="overflow-x: auto;">
                            <table class=" table table-bordered display nowrap fixed" id="tabel-data" style="font-size: 16px;">
                                <col width="50px">
                                <col width="300px">
                                <col width="500px">
                                <col width="130px">
                                <col width="150px">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Waktu History</th>
                                        <th>Jenis History</th>
                                        <th>Jumlah History</th>
                                        <th>Saldo Terakhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    $sql = mysqli_query($konek, "SELECT * FROM history WHERE ID_Tabungan = '$_GET[ID_Tabungan]' ORDER BY ID_History ASC");
                                    while ($d = mysqli_fetch_array($sql)) {
                                    ?>

                                        <tr>
                                            <td align="center"><?= $i; ?></td>
                                            <td align="center"><?= $d["Waktu_History"]; ?></td>
                                            <td align="center"><?= $d["Jenis_History"]; ?></td>
                                            <td align="right"><?= rupiah($d["Jumlah_History"]); ?></td>
                                            <td align="right"><?= rupiah($d["Saldo_Terakhir"]); ?></td>

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

    <?php include 'footer.php'; ?>