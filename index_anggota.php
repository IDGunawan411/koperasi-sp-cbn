<?php $menu = 'index'; ?>
<?php include 'header.php'; ?>
<?php
//membuat format rupiah dengan PHP
//tutorial www.malasngoding.com
function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
    $sql_pokok       = mysqli_query($konek, "SELECT SUM(Simpanan_Pokok) as pokok FROM anggota WHERE ID_User='$_SESSION[ID_User]'");
    $total_pk        = mysqli_fetch_array($sql_pokok);
    $total_pokok     = $total_pk['pokok'];

    $sql_total       = mysqli_query($konek, "SELECT SUM(Besar_Tabungan) as tabungan from tabungan 
                                        INNER JOIN anggota on anggota.ID_Anggota = tabungan.ID_Anggota WHERE ID_User='$_SESSION[ID_User]'");
    $total_tb        = mysqli_fetch_array($sql_total);
    $total_tabungan  = $total_tb['tabungan'];

    $sql_pinjaman     = mysqli_query($konek, "SELECT SUM(Besar_Pinjaman) as pinjaman from pinjaman 
                                        INNER JOIN anggota on anggota.ID_Anggota = pinjaman.ID_Anggota WHERE ID_User='$_SESSION[ID_User]' AND Status_Pinjaman='Konfirmasi'");
    $total_pj        = mysqli_fetch_array($sql_pinjaman);
    $total_pinjaman  = $total_pj['pinjaman'];

    $sql_penarikan   = mysqli_query($konek, "SELECT SUM(Besar_Penarikan) as penarikan from penarikan 
                                        INNER JOIN anggota on anggota.ID_Tabungan = penarikan.ID_Tabungan WHERE ID_User='$_SESSION[ID_User]' AND Status_Penarikan='Konfirmasi'");
    $penarikan       = mysqli_fetch_array($sql_penarikan);
    $total_penarikan = $penarikan['penarikan'];

    $sql_simpanan    = mysqli_query($konek, "SELECT SUM(Saldo_Simpanan) as simpan from simpanan 
    INNER JOIN anggota on anggota.ID_Tabungan = simpanan.ID_Tabungan WHERE ID_User='$_SESSION[ID_User]'
    AND Status_Simpanan='Konfirmasi'");
    
    $simpanan        = mysqli_fetch_array($sql_simpanan);
    $total_simpanan  = $simpanan['simpan'];

?>
<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px;">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item no-drop active" style="margin-left: 10px">Dashboard</li>
            <li class="ml-auto active font-weight-bold">Dashboard</li>
        </ol>
        <div class="card p-2 bg-form-dashboard">
            <div class="row clearfix mt-50 mb-50">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget" style="margin-bottom:5px;">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6 class="text-primary">Total Tabungan</h6>
                                    <h4><?php if (isset($total_tabungan)) {
                                            echo rp($total_tabungan);
                                        } ?></h4>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-thumbs-up text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget" style="margin-bottom:5px;">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6 class="text-warning">Total Simpanan</h6>
                                    <h4><?php if (isset($total_pokok)) {
                                            echo rp($total_simpanan + $total_pokok);
                                        } ?></h4>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-calendar text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget" style="margin-bottom:5px;">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6 class="text-success">Total Penarikan</h6>
                                    <h4><?php if (isset($total_penarikan)) {
                                            echo rp($total_penarikan);
                                        } ?></h4>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-message-square text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget" style="margin-bottom:5px;">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6 class="text-danger">Total Pinjaman</h6>
                                    <h4><?php if (isset($total_pinjaman)) {
                                            echo rp($total_pinjaman);
                                        } ?></h4>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-message-square text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>