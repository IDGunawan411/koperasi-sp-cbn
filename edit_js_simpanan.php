<?php $menu = 'help_jasa'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Edit Jenis Simpanan</li>
            <li class="ml-auto active font-weight-bold">Edit Jenis Simpanan</li>
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
                                    $sqlEdit = mysqli_query($konek, "SELECT * FROM jenis_simpanan WHERE ID_Jenis_Simpanan='$_GET[ID_Jenis_Simpanan]'");
                                    $sk = mysqli_fetch_array($sqlEdit);
                                    ?>
                                    <!-- save form edit method post -->
                                    <?php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                        $idJsSimpanan       = $_POST['ID_Jenis_Simpanan'];
                                        $Nama_Simpanan      = $_POST['Nama_Simpanan'];
                                        $Besar_Simpanan     = $_POST['Besar_Simpanan'];

                                        //simpan data edit
                                        $update = mysqli_query($konek, "UPDATE jenis_simpanan SET
                                                                                Nama_Simpanan       ='$Nama_Simpanan',
                                                                                Besar_Simpanan      ='$Besar_Simpanan'
                                                                                WHERE ID_Jenis_Simpanan   ='$idJsSimpanan'");

                                        echo "<script>document.location.href = 'help_jasa.php';</script>";
                                    }
                                    ?>
                                    <h5 class="mt-2 text-center">Edit Jenis Simpanan</h5>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="ID_Simpanan" class="col-sm-4 col-form-label text-right">ID Jenis Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['ID_Jenis_Simpanan'] ?>" name="ID_Jenis_Simpanan" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ID_Anggota" class="col-sm-4 col-form-label text-right">Nama Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['Nama_Simpanan']; ?>" name="Nama_Simpanan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ID_Anggota" class="col-sm-4 col-form-label text-right">Besar Simpanan :</label>
                                        <div class="col-sm-8">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $sk['Besar_Simpanan']; ?>" name="Besar_Simpanan">
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