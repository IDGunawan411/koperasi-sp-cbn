<?php $menu = 'data_anggota'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="anggota.php">Anggota</a></li>
            <li class="breadcrumb-item no-drop active">Edit Anggota</li>
            <li class="ml-auto active font-weight-bold">Edit Anggota</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4 bg-dark rounded text-white p-2 text-center">
                            <a>Edit Data Anggota</a>
                        </div>
                        <form method="post" action="" class="was-validated">
                            <div class="row">
                                <div class="col-md-6 container">
                                    <!-- get id  -->
                                    <?php
                                    $sqlEdit = mysqli_query($konek, "SELECT * FROM anggota WHERE ID_Anggota='$_GET[ID_Anggota]'");
                                    $e = mysqli_fetch_array($sqlEdit);
                                    ?>
                                    <!-- save form edit method post -->
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                        $idAnggota          = $_POST['ID_Anggota'];
                                        $idTabungan         = $_POST['ID_Tabungan'];
                                        $namaAnggota        = $_POST['Nama_Anggota'];
                                        $jenisKelamin       = $_POST['Jenis_Kelamin'];
                                        $tempatLahir        = $_POST['Tempat_Lahir'];
                                        $tanggalLahir       = $_POST['Tanggal_Lahir'];
                                        $pendidikanTerakhir = $_POST['Pendidikan_Terakhir'];
                                        $statusPerkawinan   = $_POST['Status_Perkawinan'];
                                        $noKtp              = $_POST['No_KTP'];
                                        $noKK               = $_POST['No_KK'];
                                        $noTelp             = $_POST['No_Telp'];
                                        $noRek              = $_POST['No_Rek'];
                                        $alamat             = $_POST['Alamat'];

                                        //simpan data edit
                                        $update = mysqli_query($konek, "UPDATE anggota SET
                                                                                ID_Tabungan='$idTabungan',
                                                                                Nama_Anggota='$namaAnggota',
                                                                                Jenis_Kelamin='$jenisKelamin',
                                                                                Tempat_Lahir='$tempatLahir',
                                                                                Tanggal_Lahir='$tanggalLahir',
                                                                                Pendidikan_Terakhir='$pendidikanTerakhir',
                                                                                Status_Perkawinan='$statusPerkawinan',
                                                                                No_KTP='$noKtp',
                                                                                No_KK='$noKK',
                                                                                No_Telp='$noTelp',
                                                                                No_Rek='$noRek',
                                                                                Alamat='$alamat'
                                                                                WHERE ID_Anggota='$idAnggota'");

                                        echo "<script>document.location.href = 'anggota.php';</script>";
                                    }
                                    ?>

                                    <div class="form-group row">
                                        <label for="ID_Anggota" class="col-sm-4 col-form-label text-right">ID Anggota :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $e['ID_Anggota']; ?>" name="ID_Anggota" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ID_Tabungan" class="col-sm-4 col-form-label text-right">ID Tabungan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $e['ID_Tabungan'] ?>" name="ID_Tabungan" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Nama_Anggota" class="col-sm-4 col-form-label text-right">Nama Lengkap :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" value="<?= $e['Nama_Anggota'] ?>" id="Nama_Anggota" placeholder="Masukan Nama Lengkap" name="Nama_Anggota" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Tempat_Lahir" class="col-sm-4 col-form-label text-right" style="font-size: 15px">Tempat, Tgl Lahir :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" value="<?= $e['Tempat_Lahir'] ?>" id="Tempat_Lahir" placeholder="Tempat Lahir" name="Tempat_Lahir" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="date" class="form-control" id="Tanggal_Lahir" value="<?= $e['Tanggal_Lahir']; ?>" name="Tanggal_Lahir" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Tanggal_Entri" class="col-sm-4 col-form-label text-right">Tanggal Masuk :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="date" class="form-control" id="Tanggal_Entri" value="<?= $e['Tanggal_Entri']; ?>" name="Tanggal_Entri" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Jenis_Kelamin" class="col-sm-4 col-form-label text-right">Jenis Kelamin :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <select name="Jenis_Kelamin" class="form-control" id="exampleSelectGender">
                                                    <option value="0" selected disabled>-- Jenis Kelamin --</option>
                                                    <option value="Laki-Laki" <?= $e['Jenis_Kelamin'] == 'Laki-Laki' ? 'selected' : "" ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?= $e['Jenis_Kelamin'] !== 'Laki-Laki' ? 'selected' : "" ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Pendidikan_Terakhir" class="col-sm-4 col-form-label text-right">Pendidikan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <select name="Pendidikan_Terakhir" class="form-control" id="exampleSelectGender">
                                                    <option value="0" selected disabled>-- Pilih Pendidikan --</option>
                                                    <option value="SD" <?= $e['Pendidikan_Terakhir'] == 'SD' ? 'selected' : "" ?>>SD</option>
                                                    <option value="SLTP" <?= $e['Pendidikan_Terakhir'] == 'SLTP' ? 'selected' : "" ?>>SLTP</option>
                                                    <option value="SLTA" <?= $e['Pendidikan_Terakhir'] == 'SLTA' ? 'selected' : "" ?>>SLTA</option>
                                                    <option value="D1" <?= $e['Pendidikan_Terakhir'] == 'D1' ? 'selected' : "" ?>>D1</option>
                                                    <option value="D2" <?= $e['Pendidikan_Terakhir'] == 'D2' ? 'selected' : "" ?>>D2</option>
                                                    <option value="D3" <?= $e['Pendidikan_Terakhir'] == 'D3' ? 'selected' : "" ?>>D3</option>
                                                    <option value="S1" <?= $e['Pendidikan_Terakhir'] == 'S1' ? 'selected' : "" ?>>S1</option>
                                                    <option value="S2" <?= $e['Pendidikan_Terakhir'] == 'S2' ? 'selected' : "" ?>>S2</option>
                                                    <option value="S3" <?= $e['Pendidikan_Terakhir'] == 'S3' ? 'selected' : "" ?>>S3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Status_Perkawinan" class="col-sm-4 col-form-label text-right">Status :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <select name="Status_Perkawinan" class="form-control" id="exampleSelectGender">
                                                    <option value="0" selected disabled>-- Pilih Status --</option>
                                                    <option value="Belum Menikah" <?= $e['Status_Perkawinan'] == 'Belum Menikah' ? 'selected' : "" ?>>Belum Menikah</option>
                                                    <option value="Menikah" <?= $e['Status_Perkawinan'] == 'Menikah' ? 'selected' : "" ?>>Menikah</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Simpanan_Pokok" class="col-sm-4 col-form-label text-right">Simpanan Pokok :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" id="Simpanan_Pokok" value="100.000" name="Simpanan_Pokok" required readonly>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="No_KTP" class="col-sm-4 col-form-label text-right">No.KTP :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="number" value="<?= $e['No_KTP'] ?>" class="form-control" id="No_KTP" placeholder="Masukan No.KTP" name="No_KTP" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="No_KK" class="col-sm-4 col-form-label text-right">No.KK :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="number" class="form-control" value="<?= $e['No_KK'] ?>" id="No_KK" placeholder="Masukan No.KK" name="No_KK" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="No_Telp" class="col-sm-4 col-form-label text-right">No.Telepon :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="number" class="form-control" id="No_Telp" value="<?= $e['No_Telp'] ?>" placeholder="Masukan No.Telepon" name="No_Telp" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="No_Rek" class="col-sm-4 col-form-label text-right">No.Rekening :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input type="number" class="form-control" id="No_Rek" value="<?= $e['No_Rek'] ?>" placeholder="Masukan No.Rekening" name="No_Rek" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Alamat" class="col-sm-4 col-form-label text-right">Alamat :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <textarea class="form-control" name="Alamat" id="" cols="30" rows="3"><?= $e['Alamat'] ?></textarea>
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