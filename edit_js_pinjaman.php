<?php $menu = 'help_jasa'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Edit Jenis Pinjaman</li>
            <li class="ml-auto active font-weight-bold">Edit Jenis Pinjaman</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="" class="was-validated">
                            <div class="row">
                                <div class="col-md-6 container shadow-sm border p-2">

                                    <!-- get id  -->
                                    <?php
                                    $sqlEdit = mysqli_query($konek, "SELECT * FROM jenis_pinjaman WHERE ID_Jenis_Pinjaman='$_GET[ID_Jenis_Pinjaman]'");
                                    $sk = mysqli_fetch_array($sqlEdit);
                                    ?>
                                    <!-- save form edit method post -->
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                        $idJsPinjaman       = $_POST['ID_Jenis_Pinjaman'];
                                        $Nama_Pinjaman      = $_POST['Nama_Pinjaman'];
                                        $Max_Pinjaman       = $_POST['Max_Pinjaman'];
                                        $Bunga              = $_POST['Bunga'];


                                        //simpan data edit
                                        $update = mysqli_query($konek, "UPDATE jenis_pinjaman SET
                                                                                Nama_Pinjaman           ='$Nama_Pinjaman',
                                                                                Max_Pinjaman            ='$Max_Pinjaman',
                                                                                Bunga                   ='$Bunga'
                                                                                WHERE ID_Jenis_Pinjaman ='$idJsPinjaman'");

                                        echo "<script>document.location.href = 'help_jasa.php';</script>";
                                    }
                                    ?>
                                    <h5 class="mt-2 text-center">Edit Jenis Pinjaman</h5>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="ID_Pinjaman" class="col-sm-4 col-form-label text-right">ID Jenis Pinjaman :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['ID_Jenis_Pinjaman'] ?>" name="ID_Jenis_Pinjaman" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ID_Anggota" class="col-sm-4 col-form-label text-right">Nama Pinjaman :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['Nama_Pinjaman']; ?>" name="Nama_Pinjaman">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ID_Anggota" class="col-sm-4 col-form-label text-right">Max Pinjaman :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['Max_Pinjaman']; ?>" name="Max_Pinjaman">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="ID_Anggota" class="col-sm-4 col-form-label text-right">Bunga :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['Bunga']; ?>" name="Bunga">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  row">
                                        <div class="col-sm-10">
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