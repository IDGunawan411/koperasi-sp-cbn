<?php $menu = 'help'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="simpanan_wajib.php">Simpanan</a></li>
            <li class="breadcrumb-item no-drop active">Tambah Simpanan</li>

        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row clearfix">
                            <a href="help.php"><button type="button" class="btn btn-danger btn-sm"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</button></a>
                        </div>

                        <br>
                        <form method="post" action="" class="was-validated font-weight-small">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                        $idJenisSimpanan    = $_POST['ID_Jenis_Simpanan'];
                                        $namaSimpanan       = $_POST['Nama_Simpanan'];
                                        $besarSimpanan      = $_POST['Besar_Simpanan'];
                                        $tglEntri           = $_POST['Tgl_Entri'];


                                        if ($namaSimpanan == '' | $besarSimpanan == '' | $tglEntri == '') {
                                            echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                                        Data Belum lengkap !!!
                                                    </div>";
                                        } else {
                                            //simpan data simpanan
                                            $simpan = mysqli_query(
                                                $konek,
                                                "INSERT INTO `jenis_simpanan` (`ID_Jenis_Simpanan`,`Nama_Simpanan`, `Besar_Simpanan`, `Tgl_Entri`) 
                                                VALUES ('$idJenisSimpanan','$namaSimpanan', '$besarSimpanan', '$tglEntri')"
                                            );

                                            if (!$simpan) {
                                                echo "
                                                 <script>
                                                 alert('data gagal ditambahkan');
                                                 document.location.href = 'help.php';
                                                 </script>
                                                 ";
                                            } else {
                                                echo "
                                                 <script>
                                                 document.location.href = 'help.php';
                                                 </script>
                                                 ";
                                            }
                                        }
                                    }
                                    //membuat ID Simpanan
                                    $text           = "JS29";
                                    $query          = mysqli_query($konek, "SELECT max(ID_Jenis_Simpanan) AS last FROM jenis_simpanan WHERE ID_Jenis_Simpanan LIKE '$text%'");
                                    $data1          = mysqli_fetch_array($query);
                                    $lastNoAnggota  = $data1['last'];
                                    $lastNoUrut1    = substr($lastNoAnggota, 4, 4);
                                    $nextNoUrut1    = $lastNoUrut1 + 1;
                                    $nextNoJenisSimpanan = $text . sprintf('%04s', $nextNoUrut1);
                                    ?>

                                    <div class="btn btn-md btn-danger btn-block" style="height: auto">
                                        <i class="fa fa-lock fa-md"></i>
                                        <span>Data Pribadi</span>
                                    </div>

                                    <br>
                                    <div class="form-group row">
                                        <label for="ID_Jenis_Simpanan" class="col-sm-4 col-form-label text-right">ID Jenis Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $nextNoJenisSimpanan; ?>" name="ID_Jenis_Simpanan" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Nama_Simpanan" class="col-sm-4 col-form-label text-right">Nama Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" id="Nama_Simpanan" placeholder="Masukan Nama Simpanan" name="Nama_Simpanan" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Besar_Simpanan" class="col-sm-4 col-form-label text-right">Besar Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="number" class="form-control text-right" id="Besar_Simpanan" placeholder="0.00" name="Besar_Simpanan" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Tgl_Entri" class="col-sm-4 col-form-label text-right" style="font-size: 15px">Tanggal Entri :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" id="Tgl_Entri" name="Tgl_Entri" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label text-right"></label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="submit" value="Simpan" name="simpan" class="btn btn-success" style="margin-top: 5px; height: auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>