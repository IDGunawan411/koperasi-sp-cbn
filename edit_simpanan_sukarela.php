<?php $menu = 'sukarela'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="simpanan_sukarela.php">Simpanan Sukarela</a></li>
            <li class="breadcrumb-item no-drop active">Edit Simpanan Sukarela</li>
            <li class="ml-auto active font-weight-bold">Edit Simpanan Sukarela</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="" class="was-validated">
                            <div class="row">
                                <div class="col-md-6 container">

                                    <!-- get id  -->
                                    <?php
                                    $sqlEdit = mysqli_query($konek, "SELECT * FROM simpanan WHERE ID_Simpanan='$_GET[ID_Simpanan]'");
                                    $sk = mysqli_fetch_array($sqlEdit);
                                    ?>
                                    <!-- save form edit method post -->
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                        $idSimpanan         = $_POST['ID_Simpanan'];
                                        $idAnggota          = $_POST['ID_Anggota'];
                                        $jenisSimpanan      = $_POST['Jenis_Simpanan'];
                                        $tanggalTransaksi   = $_POST['Tanggal_Transaksi'];
                                        $saldoSimpanan      = $_POST['Saldo_Simpanan'];

                                        //simpan data edit
                                        $update = mysqli_query($konek, "UPDATE simpanan SET
                                                                                ID_Anggota          ='$idAnggota',
                                                                                Jenis_Simpanan      ='$jenisSimpanan',
                                                                                Tanggal_Transaksi   ='$tanggalTransaksi',
                                                                                Saldo_Simpanan      ='$saldoSimpanan'
                                                                                WHERE ID_Simpanan   ='$idSimpanan'");

                                        echo "<script>document.location.href = 'simpanan_sukarela.php';</script>";
                                    }
                                    ?>

                                    <div class="form-group row">
                                        <label for="ID_Simpanan" class="col-sm-4 col-form-label text-right">ID Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['ID_Simpanan'] ?>" name="ID_Simpanan" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ID_Anggota" class="col-sm-4 col-form-label text-right">ID Anggota :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['ID_Anggota']; ?>" name="ID_Anggota" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Jenis_Simpanan" class="col-sm-4 col-form-label text-right">Pilih Jenis Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <select name="Jenis_Simpanan" class="form-control" id="exampleSelectGender">
                                                    <option value="0" selected readonly>-- Pilih Jenis Simpanan --</option>
                                                    <option value="Simpanan Wajib" <?= $sk['Jenis_Simpanan'] == 'Simpanan Wajib' ? 'selected' : "" ?>>Simpanan Wajib</option>
                                                    <option value="Simpanan Sukarela" <?= $sk['Jenis_Simpanan'] == 'Simpanan Sukarela' ? 'selected' : "" ?>>Simpanan Sukarela</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Tanggal_Transaksi" class="col-sm-4 col-form-label text-right">Tanggal Transaksi :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" value="<?= $sk['Tanggal_Transaksi'] ?>" id="Tanggal_Transaksi" name="Tanggal_Transaksi" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Saldo_Simpanan" class="col-sm-4 col-form-label text-right">Saldo Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" id="Saldo_Simpanan" value="<?= $sk['Saldo_Simpanan']; ?>" name="Saldo_Simpanan" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group  row">
                                        <label class="form-check-label col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <!-- <div class="md-form mt-0">
                                                <input class="form-check-input" type="checkbox" name="remember" required> Saya setuju dengan persyaratan diatas.
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Centang kotak ini untuk melanjutkan.</div>
                                            </div>
                                            <br> -->
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
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