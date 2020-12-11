<?php $menu = 'wajib'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">

        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
            <ol class="breadcrumb mb-4" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item no-drop active"><a href="simpanan_wajib.php">Simpanan</li></a>
                <li class="breadcrumb-item no-drop active">Tambah Simpanan</li>
                <li class="ml-auto active font-weight-bold">Simpanan</li>
            </ol>
        <?php } else { ?>
            <ol class="breadcrumb" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="ml-auto active font-weight-bold">Tambah Simpanan</li>
            </ol>
        <?php } ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card bg-form-tambah-simpanan">
                    <div class="card-body">

                        <div class="row clearfix">
                            <a href="simpanan_wajib.php" data-toggle="tooltip" data-placement="top" title="Kembali"><button type=" button" class="btn btn-danger btn-sm"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</button></a>
                        </div>

                        <br>
                        <form method="post" action="" class="was-validated font-weight-small" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="p-3 font-weight-bold bg-danger text-center">
                                            <a class="h6 text-left text-white col-md-10">Pengajuan Simpanan</a>
                                        </div>
                                        <div class="card-body shadow p-3 rounded">
                                            <?php
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                                function upload()
                                                {

                                                    $namaFile = $_FILES['gambar']['name'];
                                                    $ukuranFile = $_FILES['gambar']['size'];
                                                    $error = $_FILES['gambar']['error'];
                                                    $tmpName = $_FILES['gambar']['tmp_name'];

                                                    // cek apakah tidak ada gambar yang diupload
                                                    if ($error === 4) {
                                                        echo "<script>
                                                            alert('Pilih gambar terlebih dahulu!');
                                                        </script>";
                                                        return false;
                                                    };

                                                    // cek apakah yang diupload adalah gambar
                                                    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
                                                    $ekstensiGambar = explode('.', $namaFile);
                                                    $ekstensiGambar = strtolower(end($ekstensiGambar));
                                                    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                                                        echo "<script>
                                                            alert('yang anda upload bukan gambar!');
                                                        </script>";
                                                        return false;
                                                    }

                                                    // cek ika ukurannya terlalu besar 
                                                    if ($ukuranFile > 10000000) {
                                                        echo "<script>
                                                            alert('ukuran gambar terlalu besar!');
                                                        </script>";
                                                        return false;
                                                    }


                                                    // jika lolos pengecekan, gambar siap diupload
                                                    // generate nama gambar baru
                                                    $namaFileBaru = uniqid();
                                                    $namaFileBaru .= '.';
                                                    $namaFileBaru .= $ekstensiGambar;


                                                    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);


                                                    return $namaFileBaru;
                                                }


                                                $idSimpanan         = $_POST['ID_Simpanan'];
                                                $idTabungan         = $_POST['ID_Tabungan'];
                                                $jenisSimpanan      = $_POST['Jenis_Simpanan'];
                                                $tanggalTransaksi   = $_POST['Tanggal_Transaksi'];
                                                $saldoSimpanan      = $_POST['Saldo_Simpanan'];
                                                $gambar             = upload();
                                                if (!$gambar) {
                                                    return false;
                                                }


                                                if ($idTabungan == '0' | $jenisSimpanan == '0' | $tanggalTransaksi == '' | $saldoSimpanan == '' | $gambar == '') {
                                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                                    Data Belum lengkap !!!
                                                </div>";
                                                } else {
                                                    //simpan data simpanan
                                                    $simpan = mysqli_query(
                                                        $konek,
                                                        "INSERT INTO `simpanan` (`ID_Simpanan`,`ID_Tabungan`, `Jenis_Simpanan`, `Tanggal_Transaksi`, `Saldo_Simpanan`, `Status_Simpanan`, `gambar`)
                                                        VALUES ('$idSimpanan','$idTabungan', '$jenisSimpanan', '$tanggalTransaksi', '$saldoSimpanan', 'Menunggu', '$gambar')"
                                                    );


                                                    // history saldo
                                                    $sql_hs         = mysqli_query($konek, "SELECT * FROM tabungan WHERE ID_Tabungan='$idTabungan'");
                                                    $hs             = mysqli_fetch_array($sql_hs);
                                                    $id_hs          = $hs['Besar_Tabungan'];
                                                    $Saldo_Terakhir = $id_hs + $saldoSimpanan;
                                                    //simpan data history
                                                    mysqli_query(
                                                        $konek,
                                                        "INSERT INTO `history` (`ID_History`, `ID_Tabungan`, `Jenis_History`, `Jumlah_History`, `Saldo_Terakhir`, `Waktu_History`)
                                                    VALUES (NULL, '$idTabungan', '$jenisSimpanan', '$saldoSimpanan', '$Saldo_Terakhir', '$tanggalTransaksi');"
                                                    );


                                                    // update data tabungan
                                                    // $sql_tb         = mysqli_query($konek, "SELECT * FROM tabungan WHERE ID_Tabungan='$idTabungan'");
                                                    // $tb             = mysqli_fetch_array($sql_tb);
                                                    // $id_tb          = $tb['ID_Tabungan'];
                                                    // $tambah_saldo   = $tb['Besar_Tabungan'] + $saldoSimpanan;

                                                    // $update = mysqli_query($konek, "UPDATE tabungan SET
                                                    //                         Besar_Tabungan='$tambah_saldo'
                                                    //                         WHERE ID_Tabungan='$id_tb'");

                                                    if ($simpan) {
                                                        if ($_SESSION['Level'] == 'Petugas') {
                                                            echo "<script>document.location.href = 'pengajuan_simpanan.php';</script>";
                                                        } else {
                                                            if ($jenisSimpanan == 'Simpanan Wajib') {
                                                                echo "<script>document.location.href = 'simpanan_wajib.php';</script>";
                                                            } else {
                                                                echo "<script>document.location.href = 'simpanan_sukarela.php';</script>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            //membuat ID Simpanan
                                            $text1          = "KSS29";
                                            $query1         = mysqli_query($konek, "SELECT max(ID_Simpanan) AS last1 FROM simpanan WHERE ID_Simpanan LIKE '$text1%'");
                                            $data1          = mysqli_fetch_array($query1);
                                            $lastNoAnggota  = $data1['last1'];
                                            $lastNoUrut1    = substr($lastNoAnggota, 5, 4);
                                            $nextNoUrut1    = $lastNoUrut1 + 1;
                                            $nextNoSimpanan = $text1 . sprintf('%04s', $nextNoUrut1);

                                            ?>
                                            <br>
                                            <div class="form-group row">
                                                <label for="ID_Simpanan" class="col-sm-3 col-form-label text-left">ID Simpanan :</label>
                                                <div class="col-sm-7">
                                                    <div class="md-form mt-0">
                                                        <input class="form-control" type="text" value="<?= $nextNoSimpanan; ?>" name="ID_Simpanan" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                                <div class="form-group row">
                                                    <label for="ID_Tabungan" class="col-sm-3 col-form-label text-left">Anggota :</label>
                                                    <div class="col-sm-7">
                                                        <div class="md-form mt-0">
                                                            <select name="ID_Tabungan" class="form-control select2">
                                                                <option selected value="0" readonly>-- Pilih Anggota --</option>
                                                                <?php
                                                                $sql_a = mysqli_query($konek, "SELECT * FROM anggota");
                                                                while ($a = mysqli_fetch_array($sql_a)) {
                                                                ?>
                                                                    <option value="<?= $a['ID_Tabungan'] ?>"><?= $a['Nama_Anggota'] . " - " . $a['ID_Tabungan'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                                $sql_t = mysqli_query($konek, "SELECT * FROM tabungan INNER JOIN anggota on anggota.ID_Tabungan = tabungan.ID_Tabungan
                                            WHERE anggota.ID_User = '$_SESSION[ID_User]'");
                                                $dt = mysqli_fetch_array($sql_t); ?>

                                                <input type="hidden" value="<?= $dt['ID_Tabungan'] ?>" name="ID_Tabungan">
                                            <?php } ?>

                                            <div class="form-group row">
                                                <label for="Jenis_Simpanan" class="col-sm-3 col-form-label text-left">Pilih Jenis Simpanan :</label>
                                                <div class="col-sm-7">
                                                    <div class="md-form mt-0">
                                                        <select name="Jenis_Simpanan" class="form-control" id="Jenis_Simpanan">
                                                            <option selected value="0" readonly>-- Pilih Jenis Simpanan --</option>
                                                            <?php
                                                            $sql_js = mysqli_query($konek, "SELECT * FROM jenis_simpanan");
                                                            while ($js = mysqli_fetch_array($sql_js)) {
                                                            ?>
                                                                <option value="<?= $js['Nama_Simpanan'] ?>"><?= $js['Nama_Simpanan'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Tanggal_Transaksi" class="col-sm-3 col-form-label text-left" style="font-size: 15px">Tanggal Simpanan :</label>
                                                <div class="col-sm-7">
                                                    <div class="md-form mt-0">
                                                        <div class="form-group row">
                                                            <div class="col-sm-7">
                                                                <input type="text" value="<?= $date->format('d F Y, H:i:s A'); ?>" class="form-control" id="Tanggal_Transaksi" name="Tanggal_Transaksi" required readonly>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Saldo_Simpanan" class="col-sm-3 col-form-label text-left">Besar Simpanan :</label>
                                                <div class="col-sm-7">
                                                    <div class="md-form mt-0">
                                                        <input type="number" class="form-control text-left" id="Saldo_Simpanan" placeholder="0.00" name="Saldo_Simpanan" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="gambar" class="col-sm-3 col-form-label text-left">Bukti Transfer :</label>
                                                <div class="col-sm-7">
                                                    <div class="md-form mt-0">
                                                        <img src="#" id="v_gambar" alt="Preview Gambar" width="200"><br>
                                                        <input style="margin-top: 10px" width="30" type="file" name="gambar" id="gambar">
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-left"></label>
                                                <div class="col-sm-7">
                                                    <div class="md-form mt-0">
                                                        <input type="submit" value="Simpan" name="simpan" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Simpan" style="margin-top: 5px; height: auto" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!-- memunculkan gambar -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#Jenis_Simpanan').change(function() {
            jenis_simpanan = $(this).val();
            console.log(jenis_simpanan);
            if (jenis_simpanan == 'Simpanan Wajib') {
                $('#Saldo_Simpanan').val(30000).attr("readonly", true)
            } else {
                $('#Saldo_Simpanan').val('').attr("readonly", false)
            }
        })



        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#v_gambar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#gambar").change(function() {
            bacaGambar(this);
        });
    })
</script>