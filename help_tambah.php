<?php 
if($_GET['Konfigurasi']!=='Simpanan' && $_GET['Konfigurasi']!=='Pinjaman'){
    $help = "help_guide"; 
}else{
    $help = "help_jasa";
}
$menu = "$help"; 
?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Help</li>
            <li class="ml-auto active font-weight-bold">Informasi <?= $_GET['Konfigurasi']; ?></li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-form-help-tambah">
                    <div class="card-body">
                        <div class="row clearfix">
                            <a href="help_info.php?Konfigurasi=<?= $_GET['Konfigurasi']; ?>"><button type="button" class="btn btn-danger btn-sm"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</button></a>
                            
                        </div>

                        <br>
                        <form method="post" action="" class="was-validated font-weight-small">
                            <div class="row">
                                <div class="col-md-10 container">
                                    <div class="card">
                                        <div class="card-header text-center bg-primary text-white"><span>Tambah Panduan</span></div>
                                        <?php
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                                $namaPanduan        = $_POST['Nama_Panduan'];
                                                $isiPanduan         = $_POST['Isi_Panduan'];
                                                $jenisPanduan       = $_POST['Jenis_Panduan'];
                                                $tglUbah            = date('Y-m-d');
                                                
                                                //simpan data Panduan
                                                $simpan = mysqli_query(
                                                    $konek,
                                                    "INSERT INTO `konfigurasi` (`ID_Konfigurasi`,`Nama_Konfigurasi`, `Isi_Konfigurasi`, `Jenis_Konfigurasi`, `Tanggal_Ubah`) 
                                                    VALUES (null,'$namaPanduan','$isiPanduan', '$jenisPanduan', '$tglUbah')"
                                                );

                                                if ($jenisPanduan=='Simpanan' || $jenisPanduan=='Pinjaman') {
                                                    echo "<script>document.location.href = 'help_jasa.php?Konfigurasi=$_GET[Konfigurasi]';</script>";
                                                } else {
                                                    echo "<script>document.location.href = 'help_guide.php?Konfigurasi=$_GET[Konfigurasi]';</script>";
                                                }
                                            }
                                        ?>
                                        <div class="card-body">
                                            <br>
                                            <div class="form-group row">
                                                <label for="Nama_Pinjaman" class="col-sm-2 col-form-label text-right">Nama Panduan :</label>
                                                <div class="col-sm-10">
                                                    <div class="md-form mt-0">
                                                        <input type="text" class="form-control" name="Nama_Panduan" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Max_Pinjaman" class="col-sm-2 col-form-label text-right">Isi Panduan :</label>
                                                <div class="col-sm-10">
                                                    <div class="md-form mt-0">
                                                        <textarea rows="3" class="form-control" name="Isi_Panduan" required></textarea>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Bunga" class="col-sm-2 col-form-label text-right">Jenis Panduan :</label>
                                                <div class="col-sm-10">
                                                    <div class="md-form mt-0">
                                                        <input type="text" value="<?= $_GET['Konfigurasi']; ?>" class="form-control" name="Jenis_Panduan" readonly>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label text-right"></label>
                                                <div class="col-sm-10">
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