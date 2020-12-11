<?php $menu = 'help'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="Pinjaman_wajib.php">Pinjaman</a></li>
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

                                        $idJenisPinjaman    = $_POST['ID_Jenis_Pinjaman'];
                                        $namaPinjaman       = $_POST['Nama_Pinjaman'];
                                        $maxPinjaman        = $_POST['Max_Pinjaman'];
                                        $bunga              = $_POST['Bunga'];


                                        if ($namaPinjaman == '' | $maxPinjaman == '' | $bunga == '') {
                                            echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                                        Data Belum lengkap !!!
                                                    </div>";
                                        } else {
                                            //simpan data Pinjaman
                                            $simpan = mysqli_query(
                                                $konek,
                                                "INSERT INTO `jenis_Pinjaman` (`ID_Jenis_Pinjaman`,`Nama_Pinjaman`, `Max_Pinjaman`, `Bunga`) 
                                                VALUES ('$idJenisPinjaman','$namaPinjaman', '$maxPinjaman', '$bunga')"
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
                                    //membuat ID Pinjaman
                                    $text           = "JS29";
                                    $query          = mysqli_query($konek, "SELECT max(ID_Jenis_Pinjaman) AS last FROM jenis_Pinjaman WHERE ID_Jenis_Pinjaman LIKE '$text%'");
                                    $data1          = mysqli_fetch_array($query);
                                    $lastNoAnggota  = $data1['last'];
                                    $lastNoUrut1    = substr($lastNoAnggota, 4, 4);
                                    $nextNoUrut1    = $lastNoUrut1 + 1;
                                    $nextNoJenisPinjaman = $text . sprintf('%04s', $nextNoUrut1);
                                    ?>

                                    <div class="btn btn-md btn-danger btn-block" style="height: auto">
                                        <i class="fa fa-lock fa-md"></i>
                                        <span>Data Pribadi</span>
                                    </div>

                                    <br>
                                    <div class="form-group row">
                                        <label for="ID_Jenis_Pinjaman" class="col-sm-4 col-form-label text-right">ID Jenis Pinjaman :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $nextNoJenisPinjaman; ?>" name="ID_Jenis_Pinjaman" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Nama_Pinjaman" class="col-sm-4 col-form-label text-right">Nama Pinjaman :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" id="Nama_Pinjaman" placeholder="Masukan Nama Pinjaman" name="Nama_Pinjaman" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Max_Pinjaman" class="col-sm-4 col-form-label text-right">Besar Pinjaman :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="number" class="form-control text-right" id="Max_Pinjaman" placeholder="0.00" name="Max_Pinjaman" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Bunga" class="col-sm-4 col-form-label text-right">Bunga :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="number" class="form-control text-right" id="Bunga" placeholder="0.00" name="Bunga" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
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