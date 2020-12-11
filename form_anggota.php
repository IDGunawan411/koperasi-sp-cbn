<?php $menu = 'form_pend'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="syarat_anggota.php">Syarat Anggota</a></li>
            <li class="breadcrumb-item no-drop active">Formulir Anggota</li>
            <li class="ml-auto active font-weight-bold">Formulir Anggota</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-form-anggota">
                    <div class="card-body">

                        <div class="row clearfix">
                            <div class="col-md-6 border shadow-sm bg-white container" align="center">
                                <h2><b>FORMULIR</b></h2>
                                <h2><u>PERMOHONAN MENJADI ANGGOTA</u></h2>
                                <h5><b>Status Keanggotaan : Dewasa</b></h5>
                            </div>
                        </div>
                        <a href="anggota.php"><button type="button" class="btn btn-danger btn-sm" style="height: auto"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</button></a>
                        <br>
                        <form method="post" action="" class="" style="border: 4px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="p-3 font-weight-bold bg-dark text-center">
                                            <a class="text-left h5 text-white col-md-1"><i class="fa fa-lock fa-md"></i></a>
                                            <a class="h5 text-right text-white col-md-10">Akun Anggota</a>
                                            <a class="text-left h5 text-white col-md-1"><i class="fa fa-lock fa-md"></i></a>
                                        </div>
                                        <div class="card-body shadow p-3 rounded">
                                            <?php
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                                // post anggota
                                                $idAnggota          = $_POST['ID_Anggota'];
                                                $idTabungan         = $_POST['ID_Tabungan'];
                                                $namaAnggota        = $_POST['Nama_Anggota'];
                                                $jenisKelamin       = $_POST['Jenis_Kelamin'];
                                                $tempatLahir        = $_POST['Tempat_Lahir'];
                                                $tanggalLahir       = $_POST['Tanggal_Lahir'];
                                                $pendidikanTerakhir = $_POST['Pendidikan_Terakhir'];
                                                $statusPerkawinan   = $_POST['Status_Perkawinan'];
                                                $simpananPokok      = $_POST['Simpanan_Pokok'];
                                                $noKtp              = $_POST['No_KTP'];
                                                $noKK               = $_POST['No_KK'];
                                                $noTelp             = $_POST['No_Telp'];
                                                $noRek              = $_POST['No_Rek'];
                                                $tanggalEntri       = $_POST['Tanggal_Entri'];
                                                $alamat             = $_POST['Alamat'];

                                                // user
                                                $idUser = $_POST['ID_User'];
                                                $username = $_POST['Username'];
                                                $password = $_POST['Password'];
                                                $email = $_POST['Email'];
                                                $level = $_POST['Level'];



                                                if ($namaAnggota == '' | $jenisKelamin == '' | $tempatLahir == '' | $tanggalLahir == '' | $tanggalEntri == '' | $pendidikanTerakhir == '' | $statusPerkawinan == '' | $simpananPokok == '' | $noKtp == '' | $noKK == '' | $noTelp == '' | $alamat == '') {
                                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                                        Data Belum lengkap !!!
                                                    </div>";
                                                } else {
                                                    //simpan data anggota
                                                    mysqli_query($konek, "INSERT INTO `anggota` (`ID_Anggota`, `ID_Tabungan`, `ID_User`, `Nama_Anggota`, `Jenis_Kelamin`, `Tempat_Lahir`, `Tanggal_Lahir`,`Pendidikan_Terakhir`, `Status_Perkawinan`, `Simpanan_Pokok`, `No_KTP`, `No_KK`, `No_Telp`, `No_Rek`, `Tanggal_Entri`, `Alamat`)
                                            VALUES ('$idAnggota', '$idTabungan', '$idUser', '$namaAnggota', '$jenisKelamin', '$tempatLahir', '$tanggalLahir', '$pendidikanTerakhir', '$statusPerkawinan', '$simpananPokok', '$noKtp', '$noKK', '$noTelp', '$noRek', '$tanggalEntri', '$alamat')");
                                                
                                                    //simpan data tabungan
                                                    mysqli_query($konek, "INSERT INTO `tabungan` (`ID_Tabungan`, `ID_Anggota`, `Tgl_Mulai`, `Besar_Tabungan`)
                                            VALUES ('$idTabungan', '$idAnggota', '$tanggalEntri', '$simpananPokok');");

                                                    //simpan data gambar
                                                    mysqli_query($konek, "INSERT INTO gambar (ID_Gambar ,Profil_Image, ID_User) VALUES (null,'','$idUser')");
                                                
                                                    //simpan data user
                                                    mysqli_query($konek, "INSERT INTO `user` (`ID_User`, `Username`, `Password`, `Nama_Lengkap`, `Email`, `Level`)
                                            VALUES ('$idUser', '$username', '$password', '$namaAnggota', '$email', '$level');");

                                                    echo "<script>document.location.href = 'anggota.php';</script>";
                                                }
                                            }


                                            //membuat ID Anggota
                                            $today          = "KSA25";
                                            $query          = mysqli_query($konek, "SELECT max(ID_Anggota) AS last FROM anggota WHERE ID_Anggota LIKE '$today%'");
                                            $data           = mysqli_fetch_array($query);
                                            $lastNoBayar    = $data['last'];
                                            $lastNoUrut        = substr($lastNoBayar, 5, 4);
                                            $nextNoUrut        = $lastNoUrut + 1;
                                            $nextNoAnggota    = $today . sprintf('%04s', $nextNoUrut);

                                            //membuat ID Tabungan
                                            $text2          = "KST20";
                                            $query2         = mysqli_query($konek, "SELECT max(ID_Tabungan) AS last2 FROM anggota WHERE ID_Tabungan LIKE '$text2%'");
                                            $data2          = mysqli_fetch_array($query2);
                                            $lastNoTabungan    = $data2['last2'];
                                            $lastNoUrut2    = substr($lastNoTabungan, 5, 4);
                                            $nextNoUrut2    = $lastNoUrut2 + 1;
                                            $nextNoTabungan    = $text2 . sprintf('%04s', $nextNoUrut2);

                                            //membuat ID User
                                            $text3          = "KSP20";
                                            $query2         = mysqli_query($konek, "SELECT max(ID_User) AS last3 FROM user WHERE ID_User LIKE '$text3%'");
                                            $data2          = mysqli_fetch_array($query2);
                                            $lastNoTabungan = $data2['last3'];
                                            $lastNoUrut3    = substr($lastNoTabungan, 5, 4);
                                            $nextNoUrut3    = $lastNoUrut3 + 1;
                                            $nextNoUser     = $text3 . sprintf('%04s', $nextNoUrut3);
                                            ?>
                                            <br>
                                            <div class="form-group row">
                                                <label for="ID_Anggota" class="col-sm-3 col-form-label text-right">ID Anggota :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input class="form-control" type="text" value="<?= $nextNoAnggota; ?>" name="ID_Anggota" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="ID_Tabungan" class="col-sm-3 col-form-label text-right">ID Tabungan :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input class="form-control" type="text" value="<?= $nextNoTabungan; ?>" name="ID_Tabungan" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Nama_Anggota" class="col-sm-3 col-form-label text-right">Nama Lengkap :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="text" class="form-control" id="Nama_Anggota" placeholder="Masukan Nama Lengkap" name="Nama_Anggota" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Tempat_Lahir" class="col-sm-3 col-form-label text-right" style="font-size: 15px">Tempat, Tgl Lahir :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="Tempat_Lahir" placeholder="Tempat Lahir" name="Tempat_Lahir" required>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="date" class="form-control" id="Tanggal_Lahir" name="Tanggal_Lahir" required>
                                                                <div class="valid-feedback">Valid.</div>
                                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Tanggal_Entri" class="col-sm-3 col-form-label text-right">Tanggal Masuk :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="text" class="form-control" id="Tanggal_Entri" value="<?= date('d F Y'); ?>" name="Tanggal_Entri" required readonly>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Jenis_Kelamin" class="col-sm-3 col-form-label text-right">Jenis Kelamin :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <select name="Jenis_Kelamin" class="form-control" id="exampleSelectGender">
                                                            <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                                            <option>Laki-Laki</option>
                                                            <option>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Pendidikan_Terakhir" class="col-sm-3 col-form-label text-right">Pendidikan :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <select name="Pendidikan_Terakhir" class="form-control" id="exampleSelectGender">
                                                            <option selected disabled>-- Pilih Pendidikan --</option>
                                                            <option>SD</option>
                                                            <option>SLTP</option>
                                                            <option>SLTA</option>
                                                            <option>D1</option>
                                                            <option>D2</option>
                                                            <option>D3</option>
                                                            <option>S1</option>
                                                            <option>S2</option>
                                                            <option>S3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Status_Perkawinan" class="col-sm-3 col-form-label text-right">Status :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <select name="Status_Perkawinan" class="form-control" id="exampleSelectGender">
                                                            <option selected disabled>-- Pilih Status --</option>
                                                            <option>Belum Menikah</option>
                                                            <option>Menikah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Simpanan_Pokok" class="col-sm-3 col-form-label text-right">Simpanan Pokok :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="text" class="form-control" id="Simpanan_Pokok" value="100000" name="Simpanan_Pokok" required readonly>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="No_KTP" class="col-sm-3 col-form-label text-right">No.KTP :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="number" class="form-control" id="No_KTP" placeholder="Masukan No.KTP" name="No_KTP" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="No_KK" class="col-sm-3 col-form-label text-right">No.KK :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="number" class="form-control" id="No_KK" placeholder="Masukan No.KK" name="No_KK" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="No_Telp" class="col-sm-3 col-form-label text-right">No.Telepon :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="number" class="form-control" id="No_Telp" placeholder="Masukan No.Telepon" name="No_Telp" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="No_Rek" class="col-sm-3 col-form-label text-right">No.Rekening :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="number" class="form-control" id="No_Rek" placeholder="Masukan No.Rekening" name="No_Rek">
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Alamat" class="col-sm-3 col-form-label text-right">Alamat :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="text" class="form-control" id="Alamat" placeholder="Masukan Alamat" name="Alamat" width="100" height="100" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="p-3 font-weight-bold bg-dark text-center">
                                            <a class="text-left h5 text-white col-md-1"><i class="fa fa-lock fa-md"></i></a>
                                            <a class="h5 text-right text-white col-md-10">Akun User</a>
                                            <a class="text-left h5 text-white col-md-1"><i class="fa fa-lock fa-md"></i></a>
                                        </div>
                                        <div class="card-body shadow p-3 rounded">
                                            <br>
                                            <div class="form-group row">
                                                <label for="ID_User" class="col-sm-3 col-form-label text-right">ID User :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input class="form-control" type="text" value="<?= $nextNoUser; ?>" name="ID_User" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Username" class="col-sm-3 col-form-label text-right">Username :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input class="form-control" type="text" name="Username" placeholder="Masukan Username">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Password" class="col-sm-3 col-form-label text-right">Password :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="password" class="form-control" id="Password" placeholder="Masukan Password" name="Password" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Email" class="col-sm-3 col-form-label text-right">Email :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="text" class="form-control" id="Email" placeholder="Masukan Nama Lengkap" name="Email" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Level" class="col-sm-3 col-form-label text-right">Level :</label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="text" class="form-control" value="Anggota" readonly id="Level" placeholder="Masukan Nama Lengkap" name="Level" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label text-right"></label>
                                                <div class="col-sm-8">
                                                    <div class="md-form mt-0">
                                                        <input type="submit" value="Simpan" name="simpan" class="btn btn-success" style="margin-top: 5px; height: auto" />
                                                    </div>
                                                </div>
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