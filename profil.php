<?php $menu = ''; ?>
<?php include 'header.php';?>
<style>
#profileDisplay {
  display: block;
  width: 60%;
  margin: 10px auto;
  border-radius: 20px
}
</style>

<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $dtuser = mysqli_query($konek, "SELECT * FROM user WHERE ID_User='$_SESSION[ID_User]'");
                        $du     = mysqli_fetch_array($dtuser);
                        $dtag   = mysqli_query($konek, "SELECT * FROM anggota WHERE ID_User='$_SESSION[ID_User]'");
                        $da     = mysqli_fetch_array($dtag);
                        $dtfoto = mysqli_query($konek, "SELECT * FROM user INNER JOIN gambar USING(ID_User) WHERE user.ID_User='$_SESSION[ID_User]'");
                        $df     = mysqli_fetch_array($dtfoto);
                        // echo $df['Profil_Image'];
                        ?>
                        <div class="text-center">
                            <div class="form-group text-center">
                                <?php if($df['Profil_Image']==null){ ?>
                                    <a href="edit_foto.php?ID_Gambar=<?= $df['ID_Gambar']; ?>&Profil_Image=<?= $df['Profil_Image'] ?>"><img src="img/download.png" id="profileDisplay"></a>  
                                <?php }else { ?>
                                    <a href="edit_foto.php?ID_Gambar=<?= $df['ID_Gambar']; ?>&Profil_Image=<?= $df['Profil_Image']; ?>"><img src="img/<?= $df['Profil_Image'] ?>" id="profileDisplay"></a>  
                                <?php } ?>
                            </div>
                            
                            <?php if ($_SESSION['Level'] == 'Anggota') { ?>
                                <h4 class="card-title mt-20"><?= $da['Nama_Anggota']; ?></h4>
                            <?php } else { ?>
                                <h4 class="card-title mt-20"><?= $du['Nama_Lengkap']; ?></h4>
                            <?php } ?>
                            <h4 class="card-title text-primary"><?= $du['Level']; ?></h4>
                        </div>
                    
                    </div>
                    <hr class="mb-0">
                    <div class="card-body">
                        <p class="text-dark d-block h6">ID User</p>
                        <h6 class="text-primary"><?= $du['ID_User'] ?></h6>
                        <p class="text-dark d-block h6">Username</p>
                        <h6 class="text-primary"><?= $du['Username'] ?></h6>
                        <p class="text-dark d-block h6">Email address </p>
                        <h6 class="text-primary"><?= $du['Email'] ?></h6>
                        <!-- Alamat Anggota -->
                        <?php if ($_SESSION['Level'] == 'Anggota') { ?>
                            <p class="text-dark d-block h6">Alamat </p>
                            <h6 class="text-primary"><?= $da['Alamat'] ?></h6>
                        <?php } ?>
                        <!-- <iframe src="https://google.com" frameborder="1"></iframe> -->
                        <small class="text-muted d-block pt-30">Social Profile</small>
                        <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                        </li>
                        <!-- Update anggota -->
                        <?php if ($_SESSION['Level'] == 'Anggota') { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-edit-profile" data-toggle="pill" href="#edit_profile" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-edit-user" data-toggle="pill" href="#edit-user" role="tab" aria-controls="pills-user" aria-selected="false">User</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <?php
                        $dtuser_g = mysqli_query($konek, "SELECT * FROM user WHERE ID_User='$_SESSION[ID_User]'");
                        $du_g     = mysqli_fetch_array($dtuser_g);
                        $dtag_g   = mysqli_query($konek, "SELECT * FROM anggota WHERE ID_User='$_SESSION[ID_User]'");
                        $da_g     = mysqli_fetch_array($dtag_g);
                        ?>
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <?php if ($_SESSION['Level'] == 'Anggota') { ?>
                                <div class="card-body">
                                    <p class="h5"><strong>Profile Anggota Koperasi</strong></p>
                                    <hr class="bg-danger">
                                    <div class="row">
                                        <div class="col-md-6 h6 mb-15">ID Anggota
                                            <p class="text-danger h5"><?= $da['ID_Anggota']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">ID Tabungan
                                            <p class="text-danger h5"><?= $da['ID_Tabungan']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Nama Anggota
                                            <p class="text-danger h5"><?= $da['Nama_Anggota']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Jenis Kelamin
                                            <p class="text-danger h5"><?= $da['Jenis_Kelamin']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Tempat, Tgl/Lahir
                                            <p class="text-danger h5"><?= $da['Tempat_Lahir'] . ", " . tgl($da['Tanggal_Lahir']); ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Pendidikan Terakhir
                                            <p class="text-danger h5"><?= $da['Pendidikan_Terakhir']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Status Perkawinan
                                            <p class="text-danger h5"><?= $da['Status_Perkawinan']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">No KTP
                                            <p class="text-danger h5"><?= $da['No_KTP']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">No KK
                                            <p class="text-danger h5"><?= $da['No_KK']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">No Rek
                                            <p class="text-danger h5"><?= $da['No_Rek']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Tgl Daftar
                                            <p class="text-danger h5"><?= $da['Tanggal_Entri']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="card-body">
                                    <p class="h5"><strong>Profile Petugas Koperasi</strong></p>
                                    <hr class="bg-danger">
                                    <div class="row">
                                        <div class="col-md-6 h6 mb-15">ID User
                                            <p class="text-danger h5"><?= $du['ID_User']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Username
                                            <p class="text-danger h5"><?= $du['Username']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Nama Lengkap
                                            <p class="text-danger h5"><?= $du['Nama_Lengkap']; ?></p>
                                        </div>
                                        <div class="col-md-6 h6 mb-15">Email Address
                                            <p class="text-danger h5"><?= $du['Email']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="edit_profile" role="tabpanel" aria-labelledby="pills-edit-profile">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                            $ID_Anggota             = $_POST['ID_Anggota'];
                                            $Nama_Anggota           = $_POST['Nama_Anggota'];
                                            $Jenis_Kelamin          = $_POST['Jenis_Kelamin'];
                                            $Tempat_Lahir           = $_POST['Tempat_Lahir'];
                                            $Tanggal_Lahir          = $_POST['Tanggal_Lahir'];
                                            $Pendidikan             = $_POST['Pendidikan'];
                                            $Alamat                 = $_POST['Alamat'];
                                            $Status_Perkawinan      = $_POST['Status_Perkawinan'];
                                            $No_KTP                 = $_POST['No_KTP'];
                                            $No_KK                  = $_POST['No_KK'];
                                            $No_Rek                 = $_POST['No_Rek'];

                                            mysqli_query($konek, "UPDATE anggota SET Nama_Anggota  = '$Nama_Anggota',
                                                                                    Jenis_Kelamin  = '$Jenis_Kelamin',
                                                                                    Tempat_Lahir   = '$Tempat_Lahir',
                                                                                    Tanggal_Lahir  = '$Tanggal_Lahir',
                                                                                Pendidikan_Terakhir= '$Pendidikan',
                                                                                Status_Perkawinan  = '$Status_Perkawinan',
                                                                                        No_KTP     = '$No_KTP',
                                                                                        No_KK      = '$No_KK',
                                                                                        No_Rek     = '$No_Rek',
                                                                                        Alamat     = '$Alamat'
                                                                                  WHERE ID_Anggota = '$ID_Anggota'");

                                            mysqli_query($konek, "UPDATE user SET Nama_Lengkap = '$Nama_Anggota' WHERE ID_User = '$_SESSION[ID_User]'");

                                            echo "<script>window.location.href='profil.php'</script>";
                                        }
                                        ?>
                                        <div class="col-md-6 h6 mb-15"> <strong>ID Anggota</strong>
                                            <input type="text" name="ID_Anggota" class="form-control" value="<?= $da_g['ID_Anggota'] ?>" readonly>
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>ID Tabungan</strong>
                                            <input type="text" class="form-control" value="<?= $da_g['ID_Tabungan'] ?>" readonly>
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>Nama Anggota</strong>
                                            <input type="text" name="Nama_Anggota" class="form-control" value="<?= $da_g['Nama_Anggota'] ?>">
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>Jenis Kelamin</strong>
                                            <input type="text" name="Jenis_Kelamin" class="form-control" value="<?= $da_g['Jenis_Kelamin'] ?>">
                                        </div>
                                        <div class="col-md-6 h6 mb-15">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Tempat</strong>
                                                    <input type="text" name="Tempat_Lahir" class="form-control" value="<?= $da_g['Tempat_Lahir'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Tgl/Lahir</strong>
                                                    <input type="date" name="Tanggal_Lahir" class="form-control" value="<?= $da_g['Tanggal_Lahir'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>Pendidikan Terakhir</strong>
                                            <input type="text" name="Pendidikan" class="form-control" value="<?= $da_g['Pendidikan_Terakhir'] ?>">
                                        </div>
                                        <div class="col-md-12 h6 mb-15"> <strong>Alamat</strong>
                                            <textarea name="Alamat" class="form-control"><?= $da_g['Alamat'] ?></textarea>
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>Status Perkawinan</strong>
                                            <input name="Status_Perkawinan" type="text" class="form-control" value="<?= $da_g['Status_Perkawinan'] ?>">
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>No KTP</strong>
                                            <input name="No_KTP" type="text" class="form-control" value="<?= $da_g['No_KTP'] ?>">
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>No KK</strong>
                                            <input name="No_KK" type="text" class="form-control" value="<?= $da_g['No_KK'] ?>">
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>No Rek</strong>
                                            <input name="No_Rek" type="text" class="form-control" value="<?= $da_g['No_Rek'] ?>">
                                        </div>
                                        <!-- <div class="col-md-6 h6 mb-15"> <strong>Tgl Daftar</strong>
                                            <input type="text" class="form-control" value="<?= $da_g['Tanggal_Entri'] ?>" readonly>
                                        </div> -->
                                        <div class="col-md-12 h6 mb-15">
                                            <input type="submit" name="" value="Simpan" id="" class="btn btn-primary">
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="edit-user" role="tabpanel" aria-labelledby="pills-edit-user">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                            $ID_User    = $_POST['ID_User'];
                                            $Username   = $_POST['Username'];
                                            $Password   = $_POST['Password'];
                                            $Email      = $_POST['Email'];
                                            $Nama_Lengkap   = $_POST['Nama_Lengkap'];

                                            mysqli_query($konek, "UPDATE user SET Username  = '$Username',
                                                                                  Password  = '$Password',
                                                                                  Email     = '$Email',
                                                                                  Nama_lengkap = '$Nama_Lengkap'
                                                                            WHERE ID_User   = '$ID_User'");

                                            echo "<script>window.location.href='profil.php'</script>";
                                        }
                                        ?>
                                        <div class="col-md-6 h6 mb-15"> <strong>ID User</strong>
                                            <input value="<?= $du_g['ID_User']; ?>" type="text" name="ID_User" class="form-control" readonly>
                                        </div>
                                        <?php if($_SESSION['Level']=='Petugas'){ ?>
                                            <div class="col-md-6 h6 mb-15"> <strong>Nama Lengkap</strong>
                                                <input value="<?= $du_g['Nama_Lengkap']; ?>" type="text" name="Nama_Lengkap" class="form-control">
                                            </div>
                                        <?php }else{ ?>
                                            <input value="<?= $da_g['Nama_Anggota']; ?>" type="hidden" name="Nama_Lengkap" class="form-control" readonly>
                                        <?php } ?>
                                        <div class="col-md-6 h6 mb-15"> <strong>Username</strong>
                                            <input value="<?= $du_g['Username']; ?>" type="text" name="Username" class="form-control">
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>Password</strong>
                                            <input value="<?= $du_g['Password']; ?>" type="text" name="Password" class="form-control">
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>Email</strong>
                                            <input value="<?= $du_g['Email']; ?>" type="text" name="Email" class="form-control">
                                        </div>
                                        <div class="col-md-6 h6 mb-15"> <strong>Level</strong>
                                            <input value="<?= $du_g['Level']; ?>" type="text" name="Level" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-12 h6 mb-15">
                                            <input type="submit" class="btn btn-primary" value="Simpan">
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
