<?php $menu = 'form_pend'; ?>
<?php include 'header.php'; ?>

<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Syarat Anggota</li>
            <li class="ml-auto active font-weight-bold">Syarat Anggota</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-left">
                            <h4>Persyaratan yang harus dipenuhi :</h4>
                            <br>
                            <h5><strong>1. Melampirkan :</strong></h5>
                            <div style="margin-left: 30px; font-size: 16px">
                                <span>- Fotocopy Kartu Keluarga ( 1 Lembar ).</span><br>
                                <span>- Fotocopy KTP Terbaru Suami-Istri, masing-masing 1 lembar.</span><br>
                                <span>- Jika belum menikah :</span><br>
                                <span style="margin-left: 40px">Fotocopy KTP calon anggota dan Ahli Waris, masing-masing 1 lembar.</span><br>
                                <span>- Surat Keterangan Domisili dari RT setempat apabila alamat tinggal saat ini berbeda dengan alamat yang tertera di KTP <strong>dan atau jika tidak ada REFERENSI</strong>.</span>
                            </div>
                            <br>
                            <h5><strong>2. Menabung :</strong></h5>
                            <table class="table table-bordered h6">
                                <thead class="text-center">
                                    <tr class="font-weight-bold">
                                        <td scope="col" width="30">No.</td>
                                        <td scope="col" width="300">Jenis Simpanan</td>
                                        <td scope="col" width="150">Nominal</td>
                                        <td scope="col">Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">1</td>
                                        <td>Simpanan Pokok</td>
                                        <td align="center">Rp. 100.000,-</td>
                                        <td>Ditabung satu kali selama menjadi anggota & tidak dapat ditarik selama menjadi anggota</td>
                                    </tr>
                                    <tr>
                                        <td align="center">2</td>
                                        <td>Simpanan Wajib</td>
                                        <td align="center">Rp. 30.000,-</td>
                                        <td><strong><u>WAJIB</u></strong> ditabung setiap bulan & tidak dapat ditarik selama menjadi anggota</td>
                                    </tr>
                                    <tr>
                                        <td align="center">3</td>
                                        <td>Simpanan Sukarela</td>
                                        <td align="center">Rp. -</td>
                                        <td>Ditabung menurut kemampuan dan kemauan & dapat ditarik sewaktu-waktu</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>

                            <div class="col-md-12 icon-list-item text-center">
                                <a class="btn btn-success btn-sm" href="form_anggota.php" data-toggle="tooltip" data-placement="top" title="Daftar Sekarang">
                                    <h6><i class="ik ik-arrow-right text-black"></i>Daftar Sekarang</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>